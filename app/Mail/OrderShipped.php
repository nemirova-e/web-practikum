<?php

declare(strict_types=1);

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\UserResponse;

class OrderShipped extends Mailable
{
    use Queueable;
    use SerializesModels;

    /**
     * Сopy of the order.
     *
     * @var \App\Models\UserResponse
     */
    protected $response;

    /**
     * Create a new message instance.
     *
     * @param  \App\Models\UserResponse $response
     * @return void
     */
    public function __construct(UserResponse $response)
    {
        $this->response = $response;
    }

    /**
     * Create message.
     *
     * @return $this
     */
    public function build():Mailable
    {
        return $this->view('send_mail', [
            'response' => $this->response
        ])
        ->from('zastrahui-bratuhu@example.com', 'Маркетплейс Застрахуй братуху');
    }
}
