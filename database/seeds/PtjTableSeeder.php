<?php

use Illuminate\Database\Seeder;
use App\Ptj;

class PtjTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Ptj::create([
        	'nama'	=>	'Lembaga Kemajuan Pertanian Muda (MADA)',
        	'kod'	=>	'MADA'
        ]);

        Ptj::create([
        	'nama'	=>	'Jabatan Pengairan Dan Saliran (Kedah)',
        	'kod'	=>	'JPS(Kedah)'
        ]);

        Ptj::create([
        	'nama'	=>	'Jabatan Pengairan Dan Saliran (Perlis)',
        	'kod'	=>	'JPS(Perlis)'
        ]);

        Ptj::create([
        	'nama' 	=>	'Jabatan Pengairan Dan Saliran MUDA',
        	'kod'	=>	'JPS(MUDA)'
        ]);

        Ptj::create([
        	'nama'	=>	'Jabatan Ketua Pengarah Tanah dan Galian',
        	'kod'	=>	'JKPTG(Kedah)'
        ]);

        Ptj::create([
        	'nama' => 	'Jabatan Ketua Pengarah Tanah dan Galian',
        	'kod'  => 	'JKPTG(Perlis)'
        ]);
    }
}
