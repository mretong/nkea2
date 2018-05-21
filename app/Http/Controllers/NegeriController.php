<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Negeri;
use App\Daerah;
use Validator;
use Session;

class NegeriController extends Controller
{
    public function index()
    {
    	$states = Negeri::paginate(10);

    	return view('negeri.index', compact('states'));
    }

    public function create() {

    	return view('negeri.create');
    }

    public function createPost(Request $request) {

    	$validation = Validator::make($request->all(), [
    		'nama'	=> 'required|min:3',
    		'kod'	=> 'required|min:3'
    	]);

    	if($validation->fails()) {
    		return redirect()->route('members.negeri.create')
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

    	return redirect()->route('members.negeri.index');

    }

    public function hapus($id) {

    	$state = Negeri::findOrFail($id)->delete();

    	// delete jugak daerah
    	$daerah = Daerah::where('negeri_id', $id)->delete();


    	if($state)
    		Session::flash('message', 'Berjaya. Data telah dihapus.');
    	else
    		Session::flash('message', 'Gagal. Data gagal dihapus.');


    	return redirect()->route('members.negeri.index');
    }

    public function show($id)
    {
        $state = Negeri::findOrFail($id);
        // dd($state);
        return view('negeri.show', compact('state'));
    }

    public function update($id, Request $request)
    {
        $validation = Validator::make($request->all(), [
            'nama'  => 'required|min:3',
            'kod'   => 'required|min:3'
        ]);

        if($validation->fails()) {
            return redirect()->route('members.negeri.show')
                ->withErrors($validation)
                ->withInputs();
        }
        
        $negeri = Negeri::find($id);

        $negeri->nama         =   strtoupper($request->get('nama'));
        $negeri->kod          =   strtoupper($request->get('kod'));

        $negeri->save();

        if($negeri) 
            Session::flash('message', 'Berjaya. Data telah ditambah.');
        else
            Session::flash('message', 'Gagal. Data gagal ditambah.');

        return redirect()->route('members.negeri.index');
    }

}
