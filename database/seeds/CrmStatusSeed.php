<?php

use Illuminate\Database\Seeder;

class CrmStatusSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 1, 'title' => 'Lead', 'created_by_id' => null, 'created_by_team_id' => null,],
            ['id' => 2, 'title' => 'Customer', 'created_by_id' => null, 'created_by_team_id' => null,],
            ['id' => 3, 'title' => 'Partner', 'created_by_id' => null, 'created_by_team_id' => null,],

        ];

        foreach ($items as $item) {
            \App\CrmStatus::create($item);
        }
    }
}
