<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Borangk;
use App\Blok;


class BorangkController extends Controller
{
    public function index()
    {
    	$kforms = Borangk::paginate(10);
    	return view('borangk.index',compact('kforms'));
    }

    public function create()
    {
    	$blok = Blok::pluck('nama','id');

    	return view('borangk.create',compact('blok'));
    }

    public function createPost(Request $request) {

    	$validation = Validator::make($request->all(), [
    		'nama'	=> 'required|min:3',
    		'kod'	=> 'required|min:3'
    	]);

    	if($validation->fails()) {
    		return redirect()->route('members.borangk.create')
    			->withErrors($validation)
    			->withInputs();
    	}

    	$kform = Borangk::create([
    			'nama'	=> strtoupper($request->get('nama')),
    			'kod'	=> strtoupper($request->get('kod'))
    		]);

    	if($kform) 
    		Session::flash('message', 'Berjaya. Data telah ditambah.');
    	else
    		Session::flash('message', 'Gagal. Data gagal ditambah.');

    	return redirect()->route('members.borangk.index');

    }

    public function hapus($id) {

    	$state = Borangk::findOrFail($id)->delete();

    	if($state)
    		Session::flash('message', 'Berjaya. Data telah dihapus.');
    	else
    		Session::flash('message', 'Gagal. Data gagal dihapus.');


    	return redirect()->route('members.borangk.index');
    }
}
