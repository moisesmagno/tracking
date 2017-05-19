<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class RegisterUserAPIMail extends Mailable
{
    use Queueable, SerializesModels;

    public $dataUser = [];

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($dataUser)
    {
        $this->dataUser = $dataUser;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $address = 'artifice.portal@gmail.com';
        $name = 'Tracking';
        $subject = 'Novo usuário Tracking';

        return $this->markdown('email/register_user/register_user_api')
                    ->from($address, $name)
                    ->subject($subject);;
    }
}
