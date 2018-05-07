<?php

use Illuminate\Database\Seeder;
use App\Pakej;

class PakejTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pakej::create([
        	'kod'	=>	'1001',
        	'nama'	=>	'Pakej 1'
        ]);

        Pakej::create([
        	'kod'	=>	'1002',
        	'nama'	=>	'Pakej 2'
        ]);

        Pakej::create([
        	'kod'	=>	'1003',
        	'nama'	=>	'Pakej 3'
        ]);

        Pakej::create([
        	'kod'	=>	'1004',
        	'nama'	=>	'Pakej 4'
        ]);

        Pakej::create([
        	'kod'	=>	'2001',
        	'nama'	=>	'Tambahan 1'
        ]);

        Pakej::create([
        	'kod'	=>	'2002',
        	'nama'	=>	'Tambahan 2'
        ]);

        Pakej::create([
        	'kod'	=>	'2003',
        	'nama'	=>	'Tambahan 3'
        ]);

        Pakej::create([
        	'kod'	=>	'2004',
        	'nama'	=>	'Tambahan 4'
        ]);
    }
}
