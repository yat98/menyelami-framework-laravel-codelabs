<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Order::create([
            'customer' => 'Doni',
            'tipe' => 'coklat kacang',
            'jumlah' => '3',
            'alamat' => 'Jl. Garuda 20 New York',
        ]);

        Order::create([
            'customer' => 'Rini',
            'tipe' => 'keju',
            'jumlah' => '2',
            'alamat' => 'Jl. Juara 12 New York',
        ]);
    }
}
