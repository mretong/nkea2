<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Negeri;
use App\Daerah;

use Validator;
use Session;

class DaerahController extends Controller
{
    public function index() {

    	$districts = Daerah::paginate(10);

    	return view('daerah.index', compact('districts'));
    }

    public function create() {

    	$states = Negeri::pluck('nama', 'id');

    	return view('daerah.create', compact('states'));
    }

    public function createPost(Request $request) {

        $validation = Validator::make($request->all(), [
            'negeri_id' => 'required|numeric',
            'nama'      => 'required|min:3',
            'kod'       => 'required|min:2'
        ]);


        if($validation->fails()){
            return redirect()->route('members.daerah.create')
                ->withErrors($validation)
                ->withInput();                
        }

        $district = Daerah::create([
            'negeri_id' => strtoupper($request->get('negeri_id')),
            'nama'      => strtoupper($request->get('nama')),
            'kod'       => strtoupper($request->get('kod'))
        ]);

        if($district)
            Session::flash('message', 'Berjaya. Data telah ditambah.');
        else
            Session::flash('message', 'Gagal. Data gagal ditambah.');

        return redirect()->route('members.daerah.index');
    }


    //Delete function
    public function hapus($id) {

        $district = Daerah::findOrFail($id)->delete();

        if($district)
            Session::flash('message', 'Berjaya. Data telah dihapus.');
        else
            Session::flash('message', 'Gagal. Data gagal dihapus.');

        return redirect()->route('members.daerah.index');

    }
    //delete function end


    //kemaskini start
    public function show($id)
    {
        $district = Daerah::findOrFail($id);
        $states = Negeri::pluck('nama','id');

        return view('daerah.show', compact('district','states'));
    }

    public function update($id, Request $request)
    {

        $validation = Validator::make($request->all(), [
            'negeri_id' => 'required|numeric',
            'nama'      => 'required|min:3',
            'kod'       => 'required|min:2'
        ]);

        if($validation->fails()) {
            return redirect()->route('members.daerah.show')
                ->withErrors($validation)
                ->withInputs();
        }
        
        $daerah = Daerah::find($id);

        $daerah->negeri_id    =   strtoupper($request->get('negeri_id'));
        $daerah->nama         =   strtoupper($request->get('nama'));
        $daerah->kod          =   strtoupper($request->get('kod'));

        $daerah->save();

        if($daerah) 
            Session::flash('message', 'Berjaya. Data telah dikemaskini.');
        else
            Session::flash('message', 'Gagal. Data gagal dikemaskini.');

        return redirect()->route('members.daerah.index');
    }

    //kemaskini end

}
