<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;
use App\Models\Product;

class OrderConfirmationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $order;
    public $cartItems;

    public function __construct($order, $cartItems)
    {
        $this->order = $order;
        $this->cartItems = $cartItems;
    }

    public function build()
{
    $email = $this->subject('Confirmación de tu compra')
                  ->view('emails.order_confirmation')
                  ->with([
                      'order' => $this->order,
                      'cartItems' => $this->cartItems,
                  ]);

    // Incrustar imágenes en el correo
    foreach ($this->cartItems as $index => $item) {
        // Verificar si el producto tiene una imagen asociada
        if (!empty($item->attributes->image)) {
            // Ruta de la imagen almacenada
            $path = storage_path('app/public/' . $item->attributes->image);
            Log::info("Ruta de la imagen para el producto {$item->name}: " . $path);

            // Verificar que el archivo existe
            if (file_exists($path)) {
                Log::info("El archivo existe para el producto {$item->name}.");
                // Incrustar la imagen y generar el CID
                $cid = $this->embedFromPath($path, 'product_image_' . $index);
                Log::info("CID generado para el producto {$item->name}: " . $cid);
                $item->photo_cid = $cid; // Guardar el CID en la propiedad `photo_cid`
            } else {
                Log::warning("El archivo de imagen no se encontró para el producto {$item->name} en la ruta: " . $path);
                $item->photo_cid = null; // Si no existe la imagen, establecer como null
            }
        } else {
            Log::info("El producto {$item->name} no tiene una imagen asociada.");
            $item->photo_cid = null; // Si no hay imagen, establecer como null
        }
    }

    return $email;
}


}
