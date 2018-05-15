<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Aduan;
use App\Blok;
use App\Lot;

use Session;
use Validator;

class AduanController extends Controller
{
    public function index()
    {
    	$reports = Aduan::paginate(10);

    	return view('aduan.index',compact('reports'));
    }

    public function create()
    {
    	$blok = Blok::pluck('nama','id');
    	$lot = Lot::pluck('no_lot','no_hakmilik');

    	return view('aduan.create',compact('blok','lot'));
    }

    public function createPost(Request $request) {

    	$validation = Validator::make($request->all(), [
    		'nama'	=> 'required|min:3',
    		'kod'	=> 'required|min:3'
    	]);

    	if($validation->fails()) {
    		return redirect()->route('members.blok.create')
    			->withErrors($validation)
    			->withInputs();
    	}

    	$state = Aduan::create([
    			'nama'	=> strtoupper($request->get('nama')),
    			'kod'	=> strtoupper($request->get('kod'))
    		]);

    	if($state) 
    		Session::flash('message', 'Berjaya. Data telah ditambah.');
    	else
    		Session::flash('message', 'Gagal. Data gagal ditambah.');

    	return redirect()->route('members.blok.index');

    }

    public function hapus($id) {

    	$state = Aduan::findOrFail($id)->delete();

    	if($state)
    		Session::flash('message', 'Berjaya. Data telah dihapus.');
    	else
    		Session::flash('message', 'Gagal. Data gagal dihapus.');


    	return redirect()->route('members.blok.index');
    }
}
