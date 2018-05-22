<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mukim;
use App\Daerah;
use App\Wilayah;

use Validator;
use Session;

class MukimController extends Controller
{
    public function index()
    {
    	$stays = Mukim::paginate(10);

    	return view('mukim.index',compact('stays'));
    }

    public function create() {

    	$district = Daerah::pluck('nama', 'id');
        $territory = Wilayah::pluck('nama','id');


    	return view('mukim.create', compact('district','territory'));
    }

    public function createPost(Request $request) {

        $validation = Validator::make($request->all(), [
            'daerah_id' 	=> 'required|numeric',
            'wilayah_id' 	=> 'required|numeric',
            'nama'      	=> 'required|min:3'
        ]);


        if($validation->fails()){
            return redirect()->route('members.mukim.create')
                ->withErrors($validation)
                ->withInput();                
        }

        $stay = Mukim::create([
            'daerah_id' 	=> strtoupper($request->get('daerah_id')),
            'wilayah_id' 	=> strtoupper($request->get('wilayah_id')),
            'nama'      	=> strtoupper($request->get('nama'))
        ]);

        if($stay)
            Session::flash('message', 'Berjaya. Data telah ditambah.');
        else
            Session::flash('message', 'Gagal. Data gagal ditambah.');

        return redirect()->route('members.mukim.index');
    }

    public function hapus($id) {

        $stay = Mukim::findOrFail($id)->delete();

        if($stay)
            Session::flash('message', 'Berjaya. Data telah dihapus.');
        else
            Session::flash('message', 'Gagal. Data gagal dihapus.');

        return redirect()->route('members.mukim.index');

    }

    //kemaskini start
    public function show($id)
    {
        $stay = Mukim::findOrFail($id);
        $district = Daerah::pluck('nama', 'id');
        $territory = Wilayah::pluck('nama','id');

        return view('mukim.show', compact('stay','district','territory'));
    }

    public function update($id, Request $request)
    {

        $validation = Validator::make($request->all(), [
            'daerah_id'     => 'required|numeric',
            'wilayah_id'    => 'required|numeric',
            'nama'          => 'required|min:3'
        ]);

        if($validation->fails()) {
            return redirect()->route('members.mukim.show')
                ->withErrors($validation)
                ->withInputs();
        }
        
        $mukim = Mukim::find($id);

        $mukim->daerah_id    =   strtoupper($request->get('daerah_id'));
        $mukim->nama         =   strtoupper($request->get('nama'));
        $mukim->wilayah_id   =   strtoupper($request->get('wilayah_id'));

        $mukim->save();

        if($mukim) 
            Session::flash('message', 'Berjaya. Data telah dikemaskini.');
        else
            Session::flash('message', 'Gagal. Data gagal dikemaskini.');

        return redirect()->route('members.mukim.index');
    }

    //kemaskini end
}
