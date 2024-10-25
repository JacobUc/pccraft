<?php
namespace App\Http\Controllers\Ecommerce;

use App\Http\Controllers\Controller;
use App\Models\Orden;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon; 
use App\Mail\OrderCancelledMail; 
use Illuminate\Support\Facades\Mail;


class UserOrderController extends Controller
{
    // Mostrar las órdenes del usuario autenticado
    public function index(Request $request)
{
    $query = Orden::where('ID_Usuario', auth()->id());

    // Validar y aplicar el ordenamiento para fecha
    if ($request->filled('fecha') && in_array($request->fecha, ['asc', 'desc'])) {
        $query->orderBy('agregada', $request->fecha);
    }

    // Validar y aplicar el ordenamiento para total
    if ($request->filled('total') && in_array($request->total, ['asc', 'desc'])) {
        $query->orderBy('total', $request->total);
    }

    // Filtro por estado de la orden
    if ($request->filled('estado')) {
        $query->where('estado', $request->estado);
    }

    // Filtro de búsqueda por ID de pedido
    if ($request->filled('search')) {
        $query->where('ID_Orden', 'like', '%' . $request->search . '%');
    }

    // Paginar las órdenes del usuario autenticado
    $orders = $query->paginate(10);

    // Retornar la vista con las órdenes filtradas
    return view('ecommerce.user.ordersUser', compact('orders'));
}

    // Muestra los detalles de una orden específica
    public function show($id)
    {
        $order = Orden::where('ID_Usuario', auth()->id())->findOrFail($id);

        // Retorna la vista de detalle de la orden
        return view('ecommerce.user.show', compact('order'));
    }

    // Método para actualizar el estado de una orden
    public function update(Request $request, $id)
    {
        $order = Orden::where('ID_Usuario', auth()->id())->findOrFail($id);

        // Solo permitir actualización si el estado es 'pedido' o 'enviado'
        if ($order->estado == 'pedido' || $order->estado == 'enviado') {
            $validatedData = $request->validate([
                'estado' => 'required|in:pedido,enviado,cancelado',
            ]);
            
            if ($validatedData['estado'] == 'cancelado') {
                $order->fecha_cancelado = Carbon::now();
                Mail::to($order->usuario->email)->send(new OrderCancelledMail($order));
            }

            $order->estado = $validatedData['estado'];
            $order->save();

            return redirect()->route('user.orders.show', $order->ID_Orden)
                             ->with('success', 'El estado de la orden ha sido actualizado.');
        }

        return redirect()->route('user.orders.show', $order->ID_Orden)
                         ->with('error', 'No se puede cambiar el estado de esta orden.');
    }
}
