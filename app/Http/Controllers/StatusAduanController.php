<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\StatusAduan;

use Session;
use Validator;

class StatusAduanController extends Controller
{
    public function index()
    {
    	$comps = StatusAduan::paginate(10);

    	return view('status_aduan.index', compact('comps'));
    }

    public function create() {

    	return view('status_aduan.create');
    }

    public function createPost(Request $request) {

    	$validation = Validator::make($request->all(), [
    		'nama'	=> 'required|min:3',
    		'kod'	=> 'required|min:3'
    	]);

    	if($validation->fails()) {
    		return redirect()->route('members.status_aduan.create')
    			->withErrors($validation)
    			->withInputs();
    	}

    	$state = StatusAduan::create([
    			'nama'	=> strtoupper($request->get('nama')),
    			'kod'	=> strtoupper($request->get('kod'))
    		]);

    	if($state) 
    		Session::flash('message', 'Berjaya. Data telah ditambah.');
    	else
    		Session::flash('message', 'Gagal. Data gagal ditambah.');

    	return redirect()->route('members.status_aduan.index');

    }

    public function hapus($id) {

    	$state = StatusAduan::findOrFail($id)->delete();

    	// delete jugak daerah
    	$daerah = Daerah::where('negeri_id', $id)->delete();


    	if($state)
    		Session::flash('message', 'Berjaya. Data telah dihapus.');
    	else
    		Session::flash('message', 'Gagal. Data gagal dihapus.');


    	return redirect()->route('members.status_aduan.index');
    }
}
