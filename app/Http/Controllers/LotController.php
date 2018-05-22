<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blok;
use App\Lot;
use App\Mukim;
use App\StatusMilik;

use Session;
use Validator;

class LotController extends Controller
{
    public function index()
    {
    	$lots = Lot::paginate(10);
    	return view('lot.index',compact('lots'));
    }

    public function create()
    {
    	$blok = Blok::pluck('nama','id');
    	$mukim = Mukim::pluck('nama','id');
        $status = StatusMilik::pluck('nama','id');

    	return view('lot.create',compact('blok','mukim','status'));
    }

    public function createPost(Request $request) {

    	$validation = Validator::make($request->all(), [
            'blok_id'  => 'required|numeric',
            'mukim_id'  => 'required|numeric',
            'lot'  => 'required|min:3',
    		'hakmilik'	=> 'required|min:3',
    		'status_id'	=> 'required|numeric'
    	]);

    	if($validation->fails()) {
    		return redirect()->route('members.lot.create')
    			->withErrors($validation)
    			->withInputs();
    	}

    	$state = Lot::create([
                'blok_id'           => strtoupper($request->get('blok_id')),
                'mukim_id'          => strtoupper($request->get('mukim_id')),
                'no_lot'            => strtoupper($request->get('lot')),
    			'no_hakmilik'	    => strtoupper($request->get('hakmilik')),
    			'status_milik_id'	=> strtoupper($request->get('status_id'))
    		]);

    	if($state) 
    		Session::flash('message', 'Berjaya. Data telah ditambah.');
    	else
    		Session::flash('message', 'Gagal. Data gagal ditambah.');

    	return redirect()->route('members.lot.index');

    }

    public function hapus($id) {

    	$state = Lot::findOrFail($id)->delete();

    	if($state)
    		Session::flash('message', 'Berjaya. Data telah dihapus.');
    	else
    		Session::flash('message', 'Gagal. Data gagal dihapus.');


    	return redirect()->route('members.lot.index');
    }

    //kemaskini start
    public function show($id)
    {
        $lots = Lot::findOrFail($id);
        $blok = Blok::pluck('nama','id');
        $mukim = Mukim::pluck('nama','id');
        $status = StatusMilik::pluck('nama','id');

        return view('lot.show', compact('lots','blok','mukim','status'));
    }

    public function update($id, Request $request)
    {

        $validation = Validator::make($request->all(), [
            'blok_id'           => 'required|numeric',
            'mukim_id'          => 'required|numeric',
            'no_lot'            => 'required|min:3',
            'no_hakmilik'       => 'required|min:3',
            'status_milik_id'   => 'required|numeric'
        ]);

        if($validation->fails()) {
            return redirect()->route('members.lot.show')
                ->withErrors($validation)
                ->withInputs();
        }
        
        $lot = Lot::find($id);

        $lot->blok_id           =   strtoupper($request->get('blok_id'));
        $lot->mukim_id          =   strtoupper($request->get('mukim_id'));
        $lot->no_lot            =   strtoupper($request->get('no_lot'));
        $lot->no_hakmilik       =   strtoupper($request->get('no_hakmilik'));
        $lot->status_milik_id   =   strtoupper($request->get('status_milik_id'));

        $lot->save();

        if($lot) 
            Session::flash('message', 'Berjaya. Data telah dikemaskini.');
        else
            Session::flash('message', 'Gagal. Data gagal dikemaskini.');

        return redirect()->route('members.lot.index');
    }

    //kemaskini end
}
