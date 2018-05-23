<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Aduan;
use App\Blok;
use App\Lot;
use App\Staff;
use App\StatusAduan;

use Session;
use Validator;

class AduanController extends Controller
{
    public function index()
    {
    	$complaints = Aduan::paginate(10);

    	return view('aduan.index',compact('complaints'));
    }

    public function create()
    {
    	$blok = Blok::pluck('nama','id');
    	$lot = Lot::pluck('no_lot','id');
    	$staff = Staff::pluck('nama','id');
    	$status = StatusAduan::pluck('nama','id');

    	return view('aduan.create',compact('blok','lot','staff','status'));
    }

    public function createPost(Request $request) {

    	$validation = Validator::make($request->all(), [
            'aduan'  => 'required|min:2',
            'tarikh_aduan'  => 'required',
            'tarikh_selesai'  => 'required',
            'masa'  => 'required',
            'staff_id'  => 'required|numeric',
            'blok_id'  => 'required|numeric',
            'no_lot'  => 'required|numeric',
            'pengadu'  => 'required|min:2',
            'no_tel'  => 'required|min:2',
            'catatan'  => 'required|min:2',
            'm_balas'  => 'required|min:2',
    		'status_id'	=> 'required|numeric'
    	]);

    	if($validation->fails()) {
    		return redirect()->route('members.aduan.create')
    			->withErrors($validation)
    			->withInputs();
    	}

    	$aduan = Aduan::create([
                'no_aduan'  => strtoupper($request->get('aduan')),
                'tarikh_terima'  => strtoupper($request->get('tarikh_aduan')),
                'tarikh_selesai'  => strtoupper($request->get('tarikh_selesai')),
                'masa_terima'  => strtoupper($request->get('masa')),
                'staff_id'  => strtoupper($request->get('staff_id')),
                'blok_id'  => strtoupper($request->get('blok_id')),
                'lot_id'  => strtoupper($request->get('no_lot')),
                'nama_pengadu'  => strtoupper($request->get('pengadu')),
                'no_tel'  => strtoupper($request->get('no_tel')),
                'catatan'  => strtoupper($request->get('catatan')),
    			'maklumbalas'	=> strtoupper($request->get('m_balas')),
    			'status_aduan_id'	=> strtoupper($request->get('status_id'))
    		]);

    	if($aduan) 
    		Session::flash('message', 'Berjaya. Data telah ditambah.');
    	else
    		Session::flash('message', 'Gagal. Data gagal ditambah.');

    	return redirect()->route('members.aduan.index');

    }

    public function hapus($id) {

    	$aduan = Aduan::findOrFail($id)->delete();

    	if($aduan)
    		Session::flash('message', 'Berjaya. Data telah dihapus.');
    	else
    		Session::flash('message', 'Gagal. Data gagal dihapus.');


    	return redirect()->route('members.aduan.index');
    }

    //kemaskini start
    public function show($id)
    {
        $aduan = Aduan::findOrFail($id);
        $blok = Blok::pluck('nama','id');
        $lot = Lot::pluck('no_lot','id');
        $staff = Staff::pluck('nama','id');
        $status = StatusAduan::pluck('nama','id');

        return view('aduan.show', compact('aduan','blok','lot','staff','status'));
    }

    public function update($id, Request $request)
    {

        $validation = Validator::make($request->all(), [
            'no_aduan'  => 'required|min:2',
            'tarikh_terima'  => 'required',
            'tarikh_selesai'  => 'required',
            'masa_terima'  => 'required',
            'staff_id'  => 'required|numeric',
            'blok_id'  => 'required|numeric',
            'lot_id'  => 'required|numeric',
            'nama_pengadu'  => 'required|min:2',
            'no_tel'  => 'required|min:2',
            'catatan'  => 'required|min:2',
            'maklumbalas'  => 'required|min:2',
            'status_aduan_id' => 'required|numeric'
        ]);

        if($validation->fails()) {
            return redirect()->route('members.aduan.show')
                ->withErrors($validation)
                ->withInputs();
        }
        
        $comps = Aduan::find($id);

        $comps->no_aduan        =   strtoupper($request->get('no_aduan'));
        $comps->tarikh_terima   =   strtoupper($request->get('tarikh_terima'));
        $comps->tarikh_selesai  =   strtoupper($request->get('tarikh_selesai'));
        $comps->masa_terima     =   strtoupper($request->get('masa_terima'));
        $comps->staff_id        =   strtoupper($request->get('staff_id'));
        $comps->blok_id         =   strtoupper($request->get('blok_id'));
        $comps->lot_id          =   strtoupper($request->get('lot_id'));
        $comps->nama_pengadu    =   strtoupper($request->get('nama_pengadu'));
        $comps->no_tel          =   strtoupper($request->get('no_tel'));
        $comps->catatan         =   strtoupper($request->get('catatan'));
        $comps->maklumbalas     =   strtoupper($request->get('maklumbalas'));
        $comps->status_aduan_id =   strtoupper($request->get('status_aduan_id'));

        $comps->save();

        if($comps) 
            Session::flash('message', 'Berjaya. Data telah dikemaskini.');
        else
            Session::flash('message', 'Gagal. Data gagal dikemaskini.');

        return redirect()->route('members.aduan.index');
    }

    //kemaskini end.
}
