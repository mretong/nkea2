<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Warta;
use App\Blok;
use App\Pakej;

class WartaController extends Controller
{
    public function index()
    {
    	$warrants = Warta::paginate(10);
    	return view('warta.index',compact('warrants'));
    }

    public function create()
    {
    	$blok = Blok::pluck('nama','id');
    	$pakej = Pakej::pluck('nama','id');

    	return view('warta.create',compact('blok','pakej'));
    }

    public function createPost(Request $request) {

    	$validation = Validator::make($request->all(), [
    		'nama'	=> 'required|min:3',
    		'kod'	=> 'required|min:3'
    	]);

    	if($validation->fails()) {
    		return redirect()->route('members.warta.create')
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

    	return redirect()->route('members.warta.index');

    }

    public function hapus($id) {

    	$state = Blok::findOrFail($id)->delete();

    	if($state)
    		Session::flash('message', 'Berjaya. Data telah dihapus.');
    	else
    		Session::flash('message', 'Gagal. Data gagal dihapus.');


    	return redirect()->route('members.warta.index');
    }
}
