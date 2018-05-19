<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ptj;

use Session;
use Validator;

class PtjController extends Controller
{
    public function index()
    {
    	$ptjs = Ptj::paginate(10);

    	return view('ptj.index', compact('ptjs'));
    }

    public function create() {

    	return view('ptj.create');
    }

    public function createPost(Request $request) {

    	$validation = Validator::make($request->all(), [
    		'nama'	=> 'required|min:3',
    		'kod'	=> 'required|min:3'
    	]);

    	if($validation->fails()) {
    		return redirect()->route('members.ptj.create')
    			->withErrors($validation)
    			->withInputs();
    	}

    	$ptj = Ptj::create([
    			'nama'	=> strtoupper($request->get('nama')),
    			'kod'	=> strtoupper($request->get('kod'))
    		]);

    	if($ptj) 
    		Session::flash('message', 'Berjaya. Data telah ditambah.');
    	else
    		Session::flash('message', 'Gagal. Data gagal ditambah.');

    	return redirect()->route('members.ptj.index');

    }

    public function hapus($id) {

    	$ptj = Ptj::findOrFail($id)->delete();

    	// delete jugak daerah
    	$daerah = Daerah::where('negeri_id', $id)->delete();


    	if($ptj)
    		Session::flash('message', 'Berjaya. Data telah dihapus.');
    	else
    		Session::flash('message', 'Gagal. Data gagal dihapus.');


    	return redirect()->route('members.ptj.index');
    }
}
