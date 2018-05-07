<?php

use Illuminate\Database\Seeder;
use App\Fasa;

class FasaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Fasa::create([
        	'kod'	=>	'1001',
        	'nama'	=>	'Fasa I'
        ]);

        Fasa::create([
        	'kod'	=>	'1002',
        	'nama'	=>	'Fasa II'
        ]);

        Fasa::create([
        	'kod'	=>	'1003',
        	'nama'	=>	'Fasa III'
        ]);

        Fasa::create([
        	'kod'	=>	'1004',
        	'nama'	=>	'Fasa III A'
        ]);

        Fasa::create([
        	'kod'	=>	'1005',
        	'nama'	=>	'Fasa IV'
        ]);

        Fasa::create([
        	'kod'	=>	'1006',
        	'nama'	=>	'Fasa V'
        ]);

        Fasa::create([
        	'kod'	=>	'1007',
        	'nama'	=>	'Fasa VI'
        ]);
    }
}
