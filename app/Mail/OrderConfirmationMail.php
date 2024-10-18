<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\Product;


class OrderConfirmationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $order;
    public $cartItems;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($order, $cartItems)
    {
        $this->order = $order;
        $this->cartItems = $cartItems;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        foreach ($this->cartItems as $item) {
            // Suponiendo que la imagen está en $item->attributes->image
            if (!empty($item->attributes->image)) {
                $item->photo = $item->attributes->image;
            } else {
                $item->photo = null;
            }
        }
        
    
        return $this->subject('Confirmación de tu compra')
                    ->view('emails.order_confirmation')
                    ->with([
                        'order' => $this->order,
                        'cartItems' => $this->cartItems,
                    ]);
    }
    
}
