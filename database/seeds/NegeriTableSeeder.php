<?php

use Illuminate\Database\Seeder;
use App\Negeri;

class NegeriTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Negeri::create([
        	'nama'	=> 'Perlis',
        	'kod'	=> 'PLS'
        ]);

        Negeri::create([
        	'nama'	=> 'Kedah',
        	'kod'	=> 'KDH'
        ]);
    }
}
