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
    	$lot = Lot::pluck('no_lot','no_hakmilik');
    	$staff = Staff::pluck('nama','id');
    	$status = StatusAduan::pluck('nama','id');

    	return view('aduan.create',compact('blok','lot','staff','status'));
    }

    public function createPost(Request $request) {

    	$validation = Validator::make($request->all(), [
            'aduan'  => 'required|min:3',
            'staff_id'  => 'required|numeric',
            'blok_id'  => 'required|numeric',
            'no_lot'  => 'required|numeric',
            'pengadu'  => 'required|min:3',
            'no_tel'  => 'required|min:3',
            'catatan'  => 'required|min:3',
            'm_balas'  => 'required|min:3',
    		'status_id'	=> 'required|numeric'
    	]);

    	if($validation->fails()) {
    		return redirect()->route('members.blok.create')
    			->withErrors($validation)
    			->withInputs();
    	}

    	$state = Aduan::create([
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

    	if($state) 
    		Session::flash('message', 'Berjaya. Data telah ditambah.');
    	else
    		Session::flash('message', 'Gagal. Data gagal ditambah.');

    	return redirect()->route('members.blok.index');

    }

    public function hapus($id) {

    	$state = Aduan::findOrFail($id)->delete();

    	if($state)
    		Session::flash('message', 'Berjaya. Data telah dihapus.');
    	else
    		Session::flash('message', 'Gagal. Data gagal dihapus.');


    	return redirect()->route('members.blok.index');
    }
}
