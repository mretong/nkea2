<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pakej;

use Session;
use Validator;

class PakejController extends Controller
{
    public function index()
    {
    	$packages = Pakej::paginate(10);

    	return view('pakej.index', compact('packages'));
    }

    public function create() {

    	return view('pakej.create');
    }

    public function createPost(Request $request) {

    	$validation = Validator::make($request->all(), [
    		'nama'	=> 'required|min:3',
    		'kod'	=> 'required|min:2'
    	]);

    	if($validation->fails()) {
    		return redirect()->route('members.pakej.create')
    			->withErrors($validation)
    			->withInputs();
    	}

    	$pakej = Pakej::create([
    			'nama'	=> strtoupper($request->get('nama')),
    			'kod'	=> strtoupper($request->get('kod'))
    		]);

    	if($pakej) 
    		Session::flash('message', 'Berjaya. Data telah ditambah.');
    	else
    		Session::flash('message', 'Gagal. Data gagal ditambah.');

    	return redirect()->route('members.pakej.index');

    }

    public function hapus($id) {

    	$pakej = Pakej::findOrFail($id)->delete();

    	// delete jugak daerah
    	$daerah = Daerah::where('negeri_id', $id)->delete();


    	if($pakej)
    		Session::flash('message', 'Berjaya. Data telah dihapus.');
    	else
    		Session::flash('message', 'Gagal. Data gagal dihapus.');


    	return redirect()->route('members.pakej.index');
    }

    //kemaskini start
    public function show($id)
    {
        $package = Pakej::findOrFail($id);

        return view('pakej.show', compact('package'));
    }

    public function update($id, Request $request)
    {

        $validation = Validator::make($request->all(), [
            'nama'  => 'required|min:3',
            'kod'   => 'required|min:2'
        ]);

        if($validation->fails()) {
            return redirect()->route('members.pakej.show')
                ->withErrors($validation)
                ->withInputs();
        }
        
        $pakej = Pakej::find($id);

        $pakej->nama         =   strtoupper($request->get('nama'));
        $pakej->kod          =   strtoupper($request->get('kod'));

        $pakej->save();

        if($pakej) 
            Session::flash('message', 'Berjaya. Data telah dikemaskini.');
        else
            Session::flash('message', 'Gagal. Data gagal dikemaskini.');

        return redirect()->route('members.pakej.index');
    }

    //kemaskini end
}
