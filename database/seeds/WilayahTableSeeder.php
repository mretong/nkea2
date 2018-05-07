<?php

use Illuminate\Database\Seeder;
use App\Wilayah;

class WilayahTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	Wilayah::create([
    		'nama'	=> 'Wilayah 1',
    		'kod'	=> 'W1'
    	]);

    	Wilayah::create([
    		'nama'	=> 'Wilayah 2',
    		'kod'	=> 'W2'
    	]);

    	Wilayah::create([
    		'nama'	=> 'Wilayah 3',
    		'kod'	=> 'W3'
    	]);

    	Wilayah::create([
    		'nama'	=> 'Wilayah 4',
    		'kod'	=> 'W4'
    	]);


        	
    }
}
