<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\Report;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $customer=Customer::create([
            'name'=>'jose',
            'last_name'=>'ramirez',
            'phone'=>'54484665',
            'email'=>'jose@outlook.com'
        ]);

        Report::create([
            'user_id'=>1,
            'description'=>"Agrego cliente id ".$customer->id,
        ]);

        $customer=Customer::create([
            'name'=>'María',
            'last_name'=>'Gonzalez',
            'phone'=>'5444465',
            'email'=>'maria@outlook.com'
        ]);

        Report::create([
            'user_id'=>1,
            'description'=>"Agrego cliente ".$customer->id,
        ]);

        $customer=Customer::create([
            'name'=>'Javier',
            'last_name'=>'Ortega',
            'phone'=>'222222415',
            'email'=>'javier@outlook.com'
        ]);

        Report::create([
            'user_id'=>1,
            'description'=>"Agrego cliente ".$customer->id,
        ]);
    }
}
