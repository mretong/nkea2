<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fasa;

use Session;
use Validator;

class FasaController extends Controller
{
    public function index()
    {
    	$phases = Fasa::paginate(10);

    	return view('fasa.index', compact('phases'));
    }

    public function create() {

    	return view('fasa.create');
    }

    public function createPost(Request $request) {

    	$validation = Validator::make($request->all(), [
    		'nama'	=> 'required|min:3',
    		'kod'	=> 'required|min:2'
    	]);

    	if($validation->fails()) {
    		return redirect()->route('members.fasa.create')
    			->withErrors($validation)
    			->withInputs();
    	}

    	$phase = Fasa::create([
    			'nama'	=> strtoupper($request->get('nama')),
    			'kod'	=> strtoupper($request->get('kod'))
    		]);

    	if($phase) 
    		Session::flash('message', 'Berjaya. Data telah ditambah.');
    	else
    		Session::flash('message', 'Gagal. Data gagal ditambah.');

    	return redirect()->route('members.fasa.index');

    }

    public function hapus($id) {

    	$phase = Fasa::findOrFail($id)->delete();

    	// delete jugak daerah
    	$daerah = Daerah::where('negeri_id', $id)->delete();


    	if($phase)
    		Session::flash('message', 'Berjaya. Data telah dihapus.');
    	else
    		Session::flash('message', 'Gagal. Data gagal dihapus.');


    	return redirect()->route('members.fasa.index');
    }

    //kemaskini start
    public function show($id)
    {
        $phase = Fasa::findOrFail($id);

        return view('fasa.show', compact('phase'));
    }

    public function update($id, Request $request)
    {

        $validation = Validator::make($request->all(), [
            'nama'  => 'required|min:3',
            'kod'   => 'required|min:2'
        ]);

        if($validation->fails()) {
            return redirect()->route('members.fasa.show')
                ->withErrors($validation)
                ->withInputs();
        }
        
        $fasa = Fasa::find($id);

        $fasa->nama         =   strtoupper($request->get('nama'));
        $fasa->kod          =   strtoupper($request->get('kod'));

        $fasa->save();

        if($fasa) 
            Session::flash('message', 'Berjaya. Data telah dikemaskini.');
        else
            Session::flash('message', 'Gagal. Data gagal dikemaskini.');

        return redirect()->route('members.fasa.index');
    }

    //kemaskini end
}
