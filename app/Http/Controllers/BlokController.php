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
    		'nama'	=> 'required|min:3',
    		'kod'	=> 'required|min:3'
    	]);

    	if($validation->fails()) {
    		return redirect()->route('members.blok.create')
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
