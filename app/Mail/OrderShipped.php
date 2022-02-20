<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\UserResponse;

class OrderShipped extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Экземпляр заказа.
     *
     * @var \App\Models\UserResponse
     */
    protected $response;

    /**
     * Создать экземпляр нового сообщения.
     *
     * @param  \App\Models\UserResponse $response
     * @return void
     */
    public function __construct(UserResponse $response)
    {
        $this->response = $response;
    }

    /**
     * Создать сообщение.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('send_mail',[
            'response' => $this->response
        ])
            ->from('zastrahui-bratuhu@example.com', 'Маркетплейс Застрахуй братуху');
    }
}
