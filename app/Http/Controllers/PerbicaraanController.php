<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Perbicaraan;
use App\Daerah;
use App\Mukim;
use App\Blok;
use App\Lot;
use App\Staff;
use App\StatusBicara;

use Session;
use Validator;

class PerbicaraanController extends Controller
{
    public function index()
    {
    	$hearings = Perbicaraan::paginate(10);
    	return view('bicara.index',compact('hearings'));
    }

    public function create()
    {
    	$daerah = Daerah::pluck('nama','id');
    	$blok = Blok::pluck('nama','id');
    	$mukim = Mukim::pluck('nama','id');
    	$lot = Lot::pluck('no_lot','no_hakmilik');
    	$staff = Staff::pluck('nama','id');
    	$status = StatusBicara::pluck('nama','id');

    	return view('bicara.create',compact('daerah','blok','mukim','lot','staff','status'));
    }

    public function createPost(Request $request) {

    	$validation = Validator::make($request->all(), [
    		'nama'	=> 'required|min:3',
    		'kod'	=> 'required|min:3'
    	]);

    	if($validation->fails()) {
    		return redirect()->route('members.bicara.create')
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

    	return redirect()->route('members.bicara.index');

    }

    public function hapus($id) {

    	$state = Blok::findOrFail($id)->delete();

    	if($state)
    		Session::flash('message', 'Berjaya. Data telah dihapus.');
    	else
    		Session::flash('message', 'Gagal. Data gagal dihapus.');


    	return redirect()->route('members.bicara.index');
    }
}
