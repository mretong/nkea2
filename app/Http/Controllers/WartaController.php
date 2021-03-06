<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Warta;
use App\Blok;
use App\Pakej;

use Session;
use Validator;

class WartaController extends Controller
{
    public function index()
    {
    	$warrants = Warta::paginate(10);
    	return view('warta.index',compact('warrants'));
    }

    public function create()
    {
    	$blok = Blok::pluck('nama','id');
    	$pakej = Pakej::pluck('nama','id');

    	return view('warta.create',compact('blok','pakej'));
    }

    public function createPost(Request $request) {

    	$validation = Validator::make($request->all(), [
            'blok_id'   => 'required|numeric',
            'pakej_id'   => 'required|numeric',
            'tarikh_warta'   => 'required',
            'jilid'   => 'required|min:2',
            'no_warta'  => 'required|min:2',
    		'rujukan'	=> 'required|min:2',
            'catatan'  => 'required|min:2'
    	]);

    	if($validation->fails()) {
    		return redirect()->route('members.warta.create')
    			->withErrors($validation)
    			->withInputs();
    	}

    	$warrant = Warta::create([
    			'blok_id'	=> strtoupper($request->get('blok_id')),
                'pakej_id'  => strtoupper($request->get('pakej_id')),
                'tarikh_warta'  => strtoupper($request->get('tarikh_warta')),                   
                'jilid_warta'  => strtoupper($request->get('jilid')),
                'no_warta'  => strtoupper($request->get('no_warta')),
                'rujukan'   => strtoupper($request->get('rujukan')),
    			'catatan'	=> strtoupper($request->get('catatan'))
    		]);

    	if($warrant) 
    		Session::flash('message', 'Berjaya. Data telah ditambah.');
    	else
    		Session::flash('message', 'Gagal. Data gagal ditambah.');

    	return redirect()->route('members.warta.index');

    }

    public function hapus($id) {

    	$warrant = Warta::findOrFail($id)->delete();

    	if($warrant)
    		Session::flash('message', 'Berjaya. Data telah dihapus.');
    	else
    		Session::flash('message', 'Gagal. Data gagal dihapus.');


    	return redirect()->route('members.warta.index');
    }


    //kemaskini start
    public function show($id)
    {
        $warrant = Warta::findOrFail($id);
        $blok = Blok::pluck('nama','id');
        $pakej = Pakej::pluck('nama','id');

        return view('warta.show', compact('warrant','blok','pakej'));
    }

    public function update($id, Request $request)
    {

        $validation = Validator::make($request->all(), [
            'blok_id'   => 'required|numeric',
            'pakej_id'   => 'required|numeric',
            'tarikh_warta'   => 'required',
            'jilid_warta'   => 'required|min:2',
            'no_warta'  => 'required|min:2',
            'rujukan'   => 'required|min:2',
            'catatan'  => 'required|min:2'
        ]);

        if($validation->fails()) {
            return redirect()->route('members.warta.show')
                ->withErrors($validation)
                ->withInputs();
        }
        
        $warta = Warta::find($id);

        $warta->blok_id         =   strtoupper($request->get('blok_id'));
        $warta->pakej_id          =   strtoupper($request->get('pakej_id'));
        $warta->tarikh_warta          =   strtoupper($request->get('tarikh_warta'));
        $warta->jilid_warta          =   strtoupper($request->get('jilid_warta'));
        $warta->no_warta          =   strtoupper($request->get('no_warta'));
        $warta->rujukan          =   strtoupper($request->get('rujukan'));
        $warta->catatan          =   strtoupper($request->get('catatan'));

        $warta->save();

        if($warta) 
            Session::flash('message', 'Berjaya. Data telah dikemaskini.');
        else
            Session::flash('message', 'Gagal. Data gagal dikemaskini.');

        return redirect()->route('members.warta.index');
    }

    //kemaskini end.
}
