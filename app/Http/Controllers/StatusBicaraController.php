<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\StatusBicara;

use Session;
use Validator;

class StatusBicaraController extends Controller
{
    public function index()
    {
    	$comps = StatusBicara::paginate(10);

    	return view('status_bicara.index', compact('comps'));
    }

    public function create() {

    	return view('status_bicara.create');
    }

    public function createPost(Request $request) {

    	$validation = Validator::make($request->all(), [
    		'nama'	=> 'required|min:3',
    		'kod'	=> 'required|min:3'
    	]);

    	if($validation->fails()) {
    		return redirect()->route('members.status_bicara.create')
    			->withErrors($validation)
    			->withInputs();
    	}

    	$state = StatusBicara::create([
    			'nama'	=> strtoupper($request->get('nama')),
    			'kod'	=> strtoupper($request->get('kod'))
    		]);

    	if($state) 
    		Session::flash('message', 'Berjaya. Data telah ditambah.');
    	else
    		Session::flash('message', 'Gagal. Data gagal ditambah.');

    	return redirect()->route('members.status_bicara.index');

    }

    public function hapus($id) {

    	$state = StatusBicara::findOrFail($id)->delete();


    	if($state)
    		Session::flash('message', 'Berjaya. Data telah dihapus.');
    	else
    		Session::flash('message', 'Gagal. Data gagal dihapus.');


    	return redirect()->route('members.status_bicara.index');
    }
}
