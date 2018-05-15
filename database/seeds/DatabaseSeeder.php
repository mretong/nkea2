<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserTableSeeder::class);
        $this->call(WilayahTableSeeder::class);
        $this->call(LokalitiTableSeeder::class);
        $this->call(DaerahTableSeeder::class);
        $this->call(FasaTableSeeder::class);
        $this->call(PakejTableSeeder::class);
        $this->call(NegeriTableSeeder::class);
        $this->call(PtjTableSeeder::class);
    }
}
