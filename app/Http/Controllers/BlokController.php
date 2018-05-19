<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blok;
use App\Lokaliti;
use App\Fasa;
use App\Pakej;

use Session;
use Validator;

class BlokController extends Controller
{
    public function index()
    {
    	$blocks = Blok::paginate(10);
    	return view('blok.index',compact('blocks'));
    }

    public function create()
    {
    	$lokaliti = Lokaliti::pluck('nama','id');
    	$pakej = Pakej::pluck('nama','id');
    	$fasa = Fasa::pluck('nama','id');

    	return view('blok.create',compact('lokaliti','pakej','fasa'));
    }

    public function createPost(Request $request) {

    	$validation = Validator::make($request->all(), [
    		'blok'	=> 'required|min:3',
            'lot'   => 'required|min:1',
            'kos'   => 'required|min:1',
            'lokaliti_id'   => 'required|numeric',
            'fasa_id'   => 'required|numeric',
    		'pakej_id'	=> 'required|numeric'
    	]);

    	if($validation->fails()) {
    		return redirect()->route('members.blok.create')
    			->withErrors($validation)
    			->withInputs();
    	}

    	$state = Blok::create([
                'nama'  => strtoupper($request->get('blok')),
                'jum_lot_total'  => strtoupper($request->get('lot')),
                'anggaran_kos'  => strtoupper($request->get('kos')),
                'lokaliti_id'  => strtoupper($request->get('lokaliti_id')),
    			'fasa_id'	=> strtoupper($request->get('fasa_id')),
    			'pakej_id'	=> strtoupper($request->get('pakej_id'))
    		]);

    	if($state) 
    		Session::flash('message', 'Berjaya. Data telah ditambah.');
    	else
    		Session::flash('message', 'Gagal. Data gagal ditambah.');

    	return redirect()->route('members.blok.index');

    }

    public function hapus($id) {

    	$state = Blok::findOrFail($id)->delete();

    	if($state)
    		Session::flash('message', 'Berjaya. Data telah dihapus.');
    	else
    		Session::flash('message', 'Gagal. Data gagal dihapus.');


    	return redirect()->route('members.blok.index');
    }
}
