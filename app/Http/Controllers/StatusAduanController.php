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
    		'kod'	=> 'required|min:2'
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

    	if($state)
    		Session::flash('message', 'Berjaya. Data telah dihapus.');
    	else
    		Session::flash('message', 'Gagal. Data gagal dihapus.');


    	return redirect()->route('members.status_aduan.index');
    }

    //kemaskini start
    public function show($id)
    {
        $saduan = StatusAduan::findOrFail($id);

        return view('status_aduan.show', compact('saduan'));
    }

    public function update($id, Request $request)
    {

        $validation = Validator::make($request->all(), [
            'nama'      => 'required|min:3',
            'kod'       => 'required|min:2'
        ]);

        if($validation->fails()) {
            return redirect()->route('members.status_aduan.show')
                ->withErrors($validation)
                ->withInputs();
        }
        
        $aduan = StatusAduan::find($id);

        $aduan->nama         =   strtoupper($request->get('nama'));
        $aduan->kod          =   strtoupper($request->get('kod'));

        $aduan->save();

        if($aduan) 
            Session::flash('message', 'Berjaya. Data telah dikemaskini.');
        else
            Session::flash('message', 'Gagal. Data gagal dikemaskini.');

        return redirect()->route('members.status_aduan.index');
    }

    //kemaskini end
}
