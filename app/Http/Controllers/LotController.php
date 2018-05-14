<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blok;
use App\Lot;
use App\Mukim;

use Session;
use Validator;

class LotController extends Controller
{
    public function index()
    {
    	$lots = Lot::paginate(10);
    	return view('lot.index',compact('lots'));
    }

    public function create()
    {
    	$blok = Blok::pluck('nama','id');
    	$mukim = Mukim::pluck('nama','id');

    	return view('lot.create',compact('blok','mukim'));
    }

    public function createPost(Request $request) {

    	$validation = Validator::make($request->all(), [
    		'nama'	=> 'required|min:3',
    		'kod'	=> 'required|min:3'
    	]);

    	if($validation->fails()) {
    		return redirect()->route('members.lot.create')
    			->withErrors($validation)
    			->withInputs();
    	}

    	$state = Blok::create([
    			'nama'	=> strtoupper($request->get('nama')),
    			'kod'	=> strtoupper($request->get('kod'))
    		]);

    	if($state) 
    		Session::flash('message', 'Berjaya. Data telah ditambah.');
    	else
    		Session::flash('message', 'Gagal. Data gagal ditambah.');

    	return redirect()->route('members.lot.index');

    }

    public function hapus($id) {

    	$state = Blok::findOrFail($id)->delete();

    	if($state)
    		Session::flash('message', 'Berjaya. Data telah dihapus.');
    	else
    		Session::flash('message', 'Gagal. Data gagal dihapus.');


    	return redirect()->route('members.lot.index');
    }
}
