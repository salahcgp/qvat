<?php

use Illuminate\Database\Seeder;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 1, 'name' => 'Admin', 'email' => 'admin@admin.com', 'password' => '$2y$10$cqKKUuLN4l4PdWSO5g2cMeH/PbxAlQ2U2zSTaBMBWyHB9OyWRgau2', 'remember_token' => '', 'team_id' => null,],
            ['id' => 2, 'name' => 'Arjuman', 'email' => 'arjuman@gmail.com', 'password' => '$2y$10$5vsgkV6ibJNQdUKARxiJaO83FNLazJ34qo6qrIDWsxwvRScrcGh56', 'remember_token' => null, 'team_id' => 1,],
            ['id' => 3, 'name' => 'zahed', 'email' => 'zahed@gmail.com', 'password' => '$2y$10$wlRhVkOE6k3hPEuy5xt/fuwYsKF3Zns9CUpGWJuA6MznA5gzMlRzq', 'remember_token' => null, 'team_id' => 1,],

        ];

        foreach ($items as $item) {
            \App\User::create($item);
        }
    }
}
