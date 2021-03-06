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
    		'wilayah_id'  =>  'required|numeric',
            'nama'	      => 'required|min:3',
    		'kod'         => 'required|min:2'
    	]);

    	if($validation->fails()) {
    		return redirect()->route('members.lokaliti.create')
    			->withErrors($validation)
    			->withInputs();
    	}

    	$local = Lokaliti::create([
                'wilayah_id'  => strtoupper($request->get('wilayah_id')),
    			'nama'	      => strtoupper($request->get('nama')),
    			'kod'	      => strtoupper($request->get('kod'))
    		]);

    	if($local) 
    		Session::flash('message', 'Berjaya. Data telah ditambah.');
    	else
    		Session::flash('message', 'Gagal. Data gagal ditambah.');

    	return redirect()->route('members.lokaliti.index');

    }

    public function hapus($id) {

    	$local = Lokaliti::findOrFail($id)->delete();

    	if($local)
    		Session::flash('message', 'Berjaya. Data telah dihapus.');
    	else
    		Session::flash('message', 'Gagal. Data gagal dihapus.');


    	return redirect()->route('members.lokaliti.index');
    }

    //kemaskini start
    public function show($id)
    {
        $ppk = Lokaliti::findOrFail($id);
        $territorys = Wilayah::pluck('nama','id');

        return view('lokaliti.show', compact('ppk','territorys'));
    }

    public function update($id, Request $request)
    {

        $validation = Validator::make($request->all(), [
            'wilayah_id'  =>  'required|numeric',
            'nama'        => 'required|min:3',
            'kod'         => 'required|min:2'
        ]);

        if($validation->fails()) {
            return redirect()->route('members.lokaliti.show')
                ->withErrors($validation)
                ->withInputs();
        }
        
        $lokaliti = Lokaliti::find($id);

        $lokaliti->wilayah_id   =   strtoupper($request->get('wilayah_id'));
        $lokaliti->nama         =   strtoupper($request->get('nama'));
        $lokaliti->kod          =   strtoupper($request->get('kod'));

        $lokaliti->save();

        if($lokaliti) 
            Session::flash('message', 'Berjaya. Data telah dikemaskini.');
        else
            Session::flash('message', 'Gagal. Data gagal dikemaskini.');

        return redirect()->route('members.lokaliti.index');
    }

    //kemaskini end
}
