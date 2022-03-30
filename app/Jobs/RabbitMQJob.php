<?php

declare(strict_types=1);

namespace App\Jobs;

use App\Http\Controllers\ProductController;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\UserResponse;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderShipped;
use App\Models\Product;

class RabbitMQJob implements ShouldQueue
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */

    protected UserResponse $response;

    /**
     * Create a new job instance.
     * @param App/Models/UserResponse $response
     * @return void
     */
    public function __construct(UserResponse $response)
    {
        $this->response = $response;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $product = $this->response->product;
        Mail::to($product->company->email)->send(new OrderShipped($this->response));
    }
}
