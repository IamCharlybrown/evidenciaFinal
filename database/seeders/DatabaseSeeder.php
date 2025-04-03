<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Payment;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::factory(10)->create()->each(function ($user) {
            $orders = Order::factory(2)->create(['user_id' => $user->id]);

            foreach ($orders as $order) {
                $products = Product::factory(3)->create();

                foreach ($products as $product) {
                    OrderItem::factory()->create([
                        'order_id' => $order->id,
                        'product_id' => $product->id,
                    ]);
                }

                Payment::factory()->create(['order_id' => $order->id]);
            }
        });
    }
}
