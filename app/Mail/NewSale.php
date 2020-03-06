<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewSale extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $sale;
    public function __construct($sale)
    {
        $this->sale = $sale;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

       $mail =  $this->view('mails/new-sale')
                    ->subject('New sale registred')
                    ->from(env('MAIL_FROM'))
                    ->attach(storage_path('app/agreements/' . $this->sale->agreement))
                    ->with('sale',  $this->sale);

        if($this->sale->images) {
            foreach($this->sale->images as $image) {
                $mail->attach(public_path('img/' . $image));
            }
        }
        return $mail;
    }
}
