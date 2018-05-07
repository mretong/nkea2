<?php

use Illuminate\Database\Seeder;
use App\Daerah;

class DaerahTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	// PERLIS
    	Daerah::create([
    		'negeri_id'	=> 1,
    		'nama'		=> 'Perlis',
    		'kod'		=> 'PLS'
    	]);

    	// KEDAH
    	Daerah::create([
    		'negeri_id'	=> 2,
    		'nama'		=> 'Kota Setar',
    		'kod'		=> 'KS'
    	]);
        
    	Daerah::create([
    		'negeri_id'	=> 2,
    		'nama'		=> 'Kubang Pasu',
    		'kod'		=> 'KP'
    	]);
        
    	Daerah::create([
    		'negeri_id'	=> 2,
    		'nama'		=> 'Padang Terap',
    		'kod'		=> 'PT'
    	]);
        
    	Daerah::create([
    		'negeri_id'	=> 2,
    		'nama'		=> 'Pendang',
    		'kod'		=> 'PDG'
    	]);

    	Daerah::create([
    		'negeri_id'	=> 2,
    		'nama'		=> 'Pokok Sena',
    		'kod'		=> 'PS'
    	]);

    	Daerah::create([
    		'negeri_id'	=> 2,
    		'nama'		=> 'Yan',
    		'kod'		=> 'YAN'
    	]);

    	Daerah::create([
    		'negeri_id'	=> 2,
    		'nama'		=> 'Sik',
    		'kod'		=> 'SIK'
    	]);




        


    }
}
