<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\User;

class NewUser extends Mailable
{
    use Queueable, SerializesModels;

    public $user;

    public function __construct(User $user)
    {
      $this->user = $user;
    }

    public function build()
    {
        return $this->view('mails.new-user')
                    ->subject('Registro de nuevo usuario');
    }
}
