<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\User;

class UpdateEmailUser extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $password;
    public $new_email;

    public function __construct(User $user,$password, $new_email)
    {
      $this->user = $user;
      $this->password = $password;
      $this->new_email = $new_email;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mails.update-email')
                    ->subject('Actualización de correo electrónico');
    }
}
