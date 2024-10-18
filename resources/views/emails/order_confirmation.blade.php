<!DOCTYPE html>
<html>
<head>
    <title>Confirmación de tu compra</title>
</head>
<body>
    <h1>¡Gracias por tu compra, {{ $order->usuario->nombre }}!</h1>
    <p>Detalles de tu orden:</p>
    <ul>
        <li><strong>ID de la orden:</strong> {{ $order->ID_Orden }}</li>
        <li><strong>Total:</strong> ${{ $order->total }}</li>
        <li><strong>Fecha:</strong> {{ $order->fecha }}</li>
    </ul>

    <h3>Productos comprados:</h3>
    <ul>
    @foreach ($cartItems as $item)
                <tr>
                    <!-- Producto y detalles -->
                    <td style="padding: 8px; border: 1px solid #dddddd;">
                        <div style="display: flex; align-items: center;">
                            @if ($item->photo)
                                <img src="{{ asset('storage/' . $item->photo) }}" alt="Producto" style="width: 80px; height: 80px; margin-right: 10px;">
                            @else
                                <p>No hay imagen disponible</p>
                            @endif
                            <div>
                                <b>{{ $item->name }}</b><br>
                                Modelo: {{ $item->attributes->model }}<br>
                                Fabricante: {{ $item->attributes->manufacturer }}
                            </div>
                        </div>
                    </td>

                    <!-- Precio del producto -->
                    <td style="padding: 8px; border: 1px solid #dddddd;">
                        ${{ number_format($item->price, 2, '.', ',') }} MXN
                    </td>

                    <!-- Cantidad -->
                    <td style="padding: 8px; border: 1px solid #dddddd;">
                        {{ $item->quantity }}
                    </td>
                </tr>
            @endforeach
    </ul>




    <p>Nos pondremos en contacto contigo para más detalles.</p>
