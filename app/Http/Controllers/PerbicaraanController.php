<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Perbicaraan;
use App\Daerah;
use App\Mukim;
use App\Blok;
use App\Lot;
use App\Staff;
use App\StatusBicara;

use Session;
use Validator;

class PerbicaraanController extends Controller
{
    public function index()
    {
    	$hearings = Perbicaraan::paginate(10);
    	return view('bicara.index',compact('hearings'));
    }

    public function create()
    {
    	$daerah = Daerah::pluck('nama','id');
    	$blok = Blok::pluck('nama','id');
    	$mukim = Mukim::pluck('nama','id');
    	$lot = Lot::pluck('no_lot','id');
    	$staff = Staff::pluck('nama','id');
    	$status = StatusBicara::pluck('nama','id');

    	return view('bicara.create',compact('daerah','blok','mukim','lot','staff','status'));
    }

    public function createPost(Request $request) {

    	$validation = Validator::make($request->all(), [
            'daerah_id'  => 'required|numeric',
            'mukim_id'  => 'required|numeric',
            'blok_id'  => 'required|numeric',
            'lot_id'  => 'required|numeric',
            'pentadbir_id'  => 'required|numeric',
            'status_id'  => 'required|numeric',
            'bicara'  => 'required|min:1',
            'luas'  => 'required|min:1',
            'harga'  => 'required|min:1',
            'tuan_tanah'  => 'required|min:1',
            'pampasan'  => 'required|min:1',
            'lain'  => 'required|min:1',
    		'jajaran'	=> 'required|min:1',
    		'catatan'	=> 'required|min:1'
    	]);

    	if($validation->fails()) {
    		return redirect()->route('members.bicara.create')
    			->withErrors($validation)
    			->withInputs();
    	}

    	$hears = Perbicaraan::create([
                'daerah_id'  => strtoupper($request->get('daerah_id')),
                'mukim_id'  => strtoupper($request->get('mukim_id')),
                'blok_id'  => strtoupper($request->get('blok_id')),
                'lot_id'  => strtoupper($request->get('lot_id')),
                'tarikh_1'  => strtoupper($request->get('tarikh_bicara')),
                'staff_id'  => strtoupper($request->get('pentadbir_id')),
                'status_id'  => strtoupper($request->get('status_id')),
                'bilangan_bicara'  => strtoupper($request->get('bicara')),
                'luas_ambil'  => strtoupper($request->get('luas')),
                'harga_tanah'  => strtoupper($request->get('harga')),
                'bil_pemilik'  => strtoupper($request->get('tuan_tanah')),
                'pampasan'  => strtoupper($request->get('pampasan')),
                'kos_lain'  => strtoupper($request->get('lain')),
                'wakil_mada'  => strtoupper($request->get('mada_id')),
                'wakil_jps'  => strtoupper($request->get('jps_id')),
    			'jajaran'	=> strtoupper($request->get('jajaran')),
    			'catatan'	=> strtoupper($request->get('catatan'))
    		]);
        
    	if($hears) 
    		Session::flash('message', 'Berjaya. Data telah ditambah.');
    	else
    		Session::flash('message', 'Gagal. Data gagal ditambah.');

    	return redirect()->route('members.bicara.index');

    }

    public function hapus($id) {

    	$hears = Perbicaraan::findOrFail($id)->delete();

    	if($hears)
    		Session::flash('message', 'Berjaya. Data telah dihapus.');
    	else
    		Session::flash('message', 'Gagal. Data gagal dihapus.');


    	return redirect()->route('members.bicara.index');
    }

    //kemaskini start
    public function show($id)
    {
        $hears = Perbicaraan::findOrFail($id);
        $daerah = Daerah::pluck('nama','id');
        $blok = Blok::pluck('nama','id');
        $mukim = Mukim::pluck('nama','id');
        $lot = Lot::pluck('no_lot','id');
        $staff = Staff::pluck('nama','id');
        $status = StatusBicara::pluck('nama','id');

        return view('bicara.show', compact('hears','blok','daerah','mukim','lot','staff','status'));
    }

    public function update($id, Request $request)
    {

        $validation = Validator::make($request->all(), [
            'daerah_id'  => 'required|numeric',
            'mukim_id'  => 'required|numeric',
            'blok_id'  => 'required|numeric',
            'lot_id'  => 'required|numeric',
            'pentadbir_id'  => 'required|numeric',
            'status_id'  => 'required|numeric',
            'bicara'  => 'required|min:1',
            'luas'  => 'required|min:1',
            'harga'  => 'required|min:1',
            'tuan_tanah'  => 'required|min:1',
            'pampasan'  => 'required|min:1',
            'lain'  => 'required|min:1',
            'jajaran'   => 'required|min:1',
            'catatan'   => 'required|min:1'
        ]);

        if($validation->fails()) {
            return redirect()->route('members.bicara.show')
                ->withErrors($validation)
                ->withInputs();
        }
        
        $bicara = Warta::find($id);

        $bicara->blok_id         =   strtoupper($request->get('daerah_id'));
        $bicara->pakej_id          =   strtoupper($request->get('mukim_id'));
        $bicara->tarikh_warta          =   strtoupper($request->get('blok_id'));
        $bicara->jilid_warta          =   strtoupper($request->get('lot_id'));
        $bicara->jilid_warta          =   strtoupper($request->get('tarikh_bicara'));
        $bicara->no_warta          =   strtoupper($request->get('pentadbir_id'));
        $bicara->rujukan          =   strtoupper($request->get('status_id'));
        $bicara->catatan          =   strtoupper($request->get('catatan'));

        $bicara->save();

        if($bicara) 
            Session::flash('message', 'Berjaya. Data telah dikemaskini.');
        else
            Session::flash('message', 'Gagal. Data gagal dikemaskini.');

        return redirect()->route('members.bicara.index');
    }

    //kemaskini end.
}
