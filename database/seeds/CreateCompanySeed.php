<?php

use Illuminate\Database\Seeder;

class CreateCompanySeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 1, 'company_name' => 'Test Company', 'billing_address' => 'Muhaisnah-4-Billing
Dubai
United Arab Emirates', 'shipping_address' => 'Muhaisnah-4-Shipping
Dubai
United Arab Emirates', 'mobile' => '501781904', 'phone' => '0498798797', 'email' => 'sohan786@gmail.com', 'trn' => '2398103810298301283', 'created_by_id' => null, 'created_by_team_id' => null,],
            ['id' => 2, 'company_name' => 'Company B', 'billing_address' => 'Muhaisnah-4-B
Dubai
United Arab Emirates', 'shipping_address' => 'Muhaisnah-4-C
Dubai
United Arab Emirates', 'mobile' => '501781904', 'phone' => '501781904', 'email' => 'cutesalah@yahoo.com', 'trn' => '1231231231323123123123123', 'created_by_id' => null, 'created_by_team_id' => null,],
            ['id' => 3, 'company_name' => 'test', 'billing_address' => 'asdfasdf', 'shipping_address' => 'zsdf', 'mobile' => '9798797', 'phone' => '8797978', 'email' => 'cutesalah@yahoo.com', 'trn' => '23234234', 'created_by_id' => 1, 'created_by_team_id' => null,],

        ];

        foreach ($items as $item) {
            \App\CreateCompany::create($item);
        }
    }
}
