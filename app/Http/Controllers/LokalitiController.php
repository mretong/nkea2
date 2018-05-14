<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lokaliti;
use App\Wilayah;

use Session;
use Validator;

class LokalitiController extends Controller
{
    public function index()
    {
    	$locals = Lokaliti::paginate(10);

    	return view('lokaliti.index', compact('locals'));
    }

    public function create() {

        $territorys = Wilayah::pluck('nama','id');
    	return view('lokaliti.create',compact('territorys'));
    }

    public function createPost(Request $request) {

    	$validation = Validator::make($request->all(), [
    		'nama'	=> 'required|min:3',
    		'kod'	=> 'required|min:3'
    	]);

    	if($validation->fails()) {
    		return redirect()->route('members.lokaliti.create')
    			->withErrors($validation)
    			->withInputs();
    	}

    	$state = Negeri::create([
    			'nama'	=> strtoupper($request->get('nama')),
    			'kod'	=> strtoupper($request->get('kod'))
    		]);

    	if($state) 
    		Session::flash('message', 'Berjaya. Data telah ditambah.');
    	else
    		Session::flash('message', 'Gagal. Data gagal ditambah.');

    	return redirect()->route('members.lokaliti.index');

    }

    public function hapus($id) {

    	$state = Negeri::findOrFail($id)->delete();

    	// delete jugak daerah
    	$daerah = Daerah::where('negeri_id', $id)->delete();


    	if($state)
    		Session::flash('message', 'Berjaya. Data telah dihapus.');
    	else
    		Session::flash('message', 'Gagal. Data gagal dihapus.');


    	return redirect()->route('members.lokaliti.index');
    }
}
