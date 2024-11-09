<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $order1 = Order::create([
            'user_id'=>'5',
            'product_id'=>'3',
            'status'=>'Pending',
        ]);
        $order2 = Order::create([
            'user_id'=>'3',
            'product_id'=>'4',
            'status'=>'Pending',
        ]);
        $order3 = Order::create([
            'user_id'=>'2',
            'product_id'=>'1',
            'status'=>'Pending',
        ]);
        $order4 = Order::create([
            'user_id'=>'4',
            'product_id'=>'1',
            'status'=>'Pending',
        ]);
    }
}
