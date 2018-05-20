<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pemilik;
use App\Blok;
use App\Lot;
use App\StatusMilik;
use App\KategoriPampasan;

use Session;
use Validator;

class BoranghController extends Controller
{
    public function index()
    {	
    	$owners = Pemilik::paginate(10);
    	return view('borangh.index', compact('owners'));
    }

    public function create()
    {
    	$blok = Blok::pluck('nama','id');
    	$lot = Lot::pluck('no_lot','id');
    	$status = StatusMilik::pluck('nama','id');
    	$kategori = KategoriPampasan::pluck('nama','id');

    	return view('borangh.create',compact('blok','lot','status','kategori'));
    }

    public function createPost(Request $request) {

    	$validation = Validator::make($request->all(), [
            'blok_id'   => 'required|numeric',
            'lot'   => 'required|numeric',
            'nama'   => 'required',
            'no_kp'   => 'required|min:2',
            'status'  => 'required|numeric',
    		'bahagian'	=> 'required|min:2',
            'tarikh_h'  => 'required|min:2',
            'tarikh_terima'  => 'required|min:2',
            'jkptg'  => 'required|min:2',
            'jps'  => 'required|min:2',
            'kategori'  => 'required|numeric'
    	]);

    	if($validation->fails()) {
    		return redirect()->route('members.borangh.create')
    			->withErrors($validation)
    			->withInputs();
    	}

    	$warrant = Pemilik::create([
    			'blok_id'	=> strtoupper($request->get('blok_id')),
                'lot_id'  => strtoupper($request->get('lot')),
                'nama'  => strtoupper($request->get('nama')),                   
                'no_kp'  => strtoupper($request->get('no_kp')),
                'status_milikan_id'  => strtoupper($request->get('status')),
                'pecahan'   => strtoupper($request->get('bahagian')),
                'tarikh_h'   => strtoupper($request->get('tarikh_h')),
                'tarikh_terima'   => strtoupper($request->get('tarikh_terima')),
                'rujukan_jkptg'   => strtoupper($request->get('jkptg')),
                'rujukan_jps'   => strtoupper($request->get('jps')),
    			'kategori_pampasan_id'	=> strtoupper($request->get('kategori'))
    		]);

    	if($warrant) 
    		Session::flash('message', 'Berjaya. Data telah ditambah.');
    	else
    		Session::flash('message', 'Gagal. Data gagal ditambah.');

    	return redirect()->route('members.borangh.index');

    }

    public function hapus($id) {

    	$warrant = Pemilik::findOrFail($id)->delete();

    	if($warrant)
    		Session::flash('message', 'Berjaya. Data telah dihapus.');
    	else
    		Session::flash('message', 'Gagal. Data gagal dihapus.');


    	return redirect()->route('members.borangh.index');
    }
}
