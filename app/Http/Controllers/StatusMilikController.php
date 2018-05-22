<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\StatusMilik;

use Session;
use Validator;

class StatusMilikController extends Controller
{
    public function index()
    {
    	$owned = StatusMilik::paginate(10);

    	return view('status_milik.index', compact('owned'));
    }

    public function create() {

    	return view('status_milik.create');
    }

    public function createPost(Request $request) {

    	$validation = Validator::make($request->all(), [
    		'nama'	=> 'required|min:3',
    		'kod'	=> 'required|min:2'
    	]);

    	if($validation->fails()) {
    		return redirect()->route('members.status_milik.create')
    			->withErrors($validation)
    			->withInputs();
    	}

    	$owned = StatusMilik::create([
    			'nama'	=> strtoupper($request->get('nama')),
    			'kod'	=> strtoupper($request->get('kod'))
    		]);

    	if($owned) 
    		Session::flash('message', 'Berjaya. Data telah ditambah.');
    	else
    		Session::flash('message', 'Gagal. Data gagal ditambah.');

    	return redirect()->route('members.status_milik.index');

    }

    public function hapus($id) {

    	$owned = StatusMilik::findOrFail($id)->delete();


    	if($owned)
    		Session::flash('message', 'Berjaya. Data telah dihapus.');
    	else
    		Session::flash('message', 'Gagal. Data gagal dihapus.');


    	return redirect()->route('members.status_milik.index');
    }

    //kemaskini start
    public function show($id)
    {
        $milikan = StatusMilik::findOrFail($id);

        return view('status_milik.show', compact('milikan'));
    }

    public function update($id, Request $request)
    {

        $validation = Validator::make($request->all(), [
            'nama'      => 'required|min:3',
            'kod'       => 'required|min:2'
        ]);

        if($validation->fails()) {
            return redirect()->route('members.status_milik.show')
                ->withErrors($validation)
                ->withInputs();
        }
        
        $smilik = StatusMilik::find($id);

        $smilik->nama         =   strtoupper($request->get('nama'));
        $smilik->kod          =   strtoupper($request->get('kod'));

        $smilik->save();

        if($smilik) 
            Session::flash('message', 'Berjaya. Data telah dikemaskini.');
        else
            Session::flash('message', 'Gagal. Data gagal dikemaskini.');

        return redirect()->route('members.status_milik.index');
    }

    //kemaskini end
}
