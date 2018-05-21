<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Borangk;
use App\Blok;
use App\Lot;

use Session;
use Validator;


class BorangkController extends Controller
{
    public function index()
    {
    	$kforms = Borangk::paginate(10);
    	return view('borangk.index',compact('kforms'));
    }

    public function create()
    {
    	$blok = Blok::pluck('nama','id');
        $lot = Lot::pluck('no_lot','id');

    	return view('borangk.create',compact('blok','lot'));
    }

    public function createPost(Request $request) {

    	$validation = Validator::make($request->all(), [
            'blok_id'       => 'required|numeric',
            'lot_id'        => 'required|numeric',
            'tarikh_k'      => 'required|min:3',
            'tarikh_terima' => 'required|min:3',
            'jkptg'         => 'required|min:3',
    		'jps'	        => 'required|min:3',
    		'fail'	        => 'required|min:3'
    	]);

    	if($validation->fails()) {
    		return redirect()->route('members.borangk.create')
    			->withErrors($validation)
    			->withInputs();
    	}

    	$kform = Borangk::create([
                'blok_id'  => strtoupper($request->get('blok_id')),
                'lot_id'  => strtoupper($request->get('lot_id')),
                'tarikh_k'  => strtoupper($request->get('tarikh_k')),
                'tarikh_terima'  => strtoupper($request->get('tarikh_terima')),
                'rujukan_jkptg'  => strtoupper($request->get('jkptg')),
    			'rujukan_jps'	=> strtoupper($request->get('jps')),
    			'rujukan_fail'	=> strtoupper($request->get('fail'))
    		]);

    	if($kform) 
    		Session::flash('message', 'Berjaya. Data telah ditambah.');
    	else
    		Session::flash('message', 'Gagal. Data gagal ditambah.');

    	return redirect()->route('members.borangk.index');

    }

    public function hapus($id) {

    	$kform = Borangk::findOrFail($id)->delete();

    	if($kform)
    		Session::flash('message', 'Berjaya. Data telah dihapus.');
    	else
    		Session::flash('message', 'Gagal. Data gagal dihapus.');


    	return redirect()->route('members.borangk.index');
    }

    //kemaskini start
    public function show($id)
    {
        $kform = Borangk::findOrFail($id);
        $blok = Blok::pluck('nama','id');
        $lot = Lot::pluck('no_lot','id');

        return view('borangk.show', compact('kform','blok','lot'));
    }

    public function update($id, Request $request)
    {

        $validation = Validator::make($request->all(), [
            'blok_id'           => 'required|numeric',
            'lot_id'            => 'required|numeric',
            'tarikh_k'          => 'required|min:3',
            'tarikh_terima'     => 'required|min:3',
            'rujukan_jkptg'     => 'required|min:3',
            'rujukan_jps'       => 'required|min:3',
            'rujukan_fail'      => 'required|min:3'
        ]);

        if($validation->fails()) {
            return redirect()->route('members.borangk.show')
                ->withErrors($validation)
                ->withInputs();
        }
        
        $borangk = Warta::find($id);

        $borangk->blok_id         =   strtoupper($request->get('blok_id'));
        $borangk->pakej_id        =   strtoupper($request->get('lot_id'));
        $borangk->tarikh_warta    =   strtoupper($request->get('tarikh_k'));
        $borangk->jilid_warta     =   strtoupper($request->get('tarikh_terima'));
        $borangk->no_warta        =   strtoupper($request->get('rujukan_jkptg'));
        $borangk->rujukan         =   strtoupper($request->get('rujukan_jps'));
        $borangk->catatan         =   strtoupper($request->get('rujukan_fail'));
        
        $borangk->save();

        if($borangk) 
            Session::flash('message', 'Berjaya. Data telah dikemaskini.');
        else
            Session::flash('message', 'Gagal. Data gagal dikemaskini.');

        return redirect()->route('members.borangk.index');
    }

    //kemaskini end.
}
