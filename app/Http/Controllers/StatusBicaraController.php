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

    //kemaskini start
    public function show($id)
    {
        $bicara = StatusBicara::findOrFail($id);

        return view('status_bicara.show', compact('bicara'));
    }

    public function update($id, Request $request)
    {

        $validation = Validator::make($request->all(), [
            'nama'  => 'required|min:3',
            'kod'   => 'required|min:2'
        ]);

        if($validation->fails()) {
            return redirect()->route('members.status_bicara.show')
                ->withErrors($validation)
                ->withInputs();
        }
        
        $status_bicara = StatusBicara::find($id);

        $status_bicara->nama         =   strtoupper($request->get('nama'));
        $status_bicara->kod          =   strtoupper($request->get('kod'));

        $status_bicara->save();

        if($status_bicara) 
            Session::flash('message', 'Berjaya. Data telah dikemaskini.');
        else
            Session::flash('message', 'Gagal. Data gagal dikemaskini.');

        return redirect()->route('members.status_bicara.index');
    }

    //kemaskini end
}
