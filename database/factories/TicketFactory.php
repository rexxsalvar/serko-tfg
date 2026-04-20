<?php

namespace Database\Factories;

use App\Models\Event;
use App\Models\Order;
use App\Models\Seat;
use App\Models\Ticket;
use Illuminate\Database\Eloquent\Factories\Factory;

class TicketFactory extends Factory
{
    protected $model = Ticket::class;

    public function definition(): array
    {
        return [
            'order_id' => Order::factory(),
            'event_id' => Event::factory(),
            'seat_id' => Seat::factory(),
            'qr_code' => base64_encode($this->faker->uuid()),
            'price' => $this->faker->randomFloat(2, 20, 180),
        ];
    }
}
