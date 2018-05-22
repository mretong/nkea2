<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Staff;
use App\Ptj;

use Session;
use Validator;

class StaffController extends Controller
{
    public function index() {

    	$staffs = Staff::paginate(10);

    	return view('staff.index', compact('staffs'));
    }

    public function create() {

    	$ptjs = Ptj::pluck('nama', 'id');

    	return view('staff.create', compact('ptjs'));
    }

    public function createPost(Request $request) {

        $validation = Validator::make($request->all(), [
            'ptj_id' => 'required|numeric',
            'nama'   => 'required|min:3'
        ]);


        if($validation->fails()){
            return redirect()->route('members.staff.create')
                ->withErrors($validation)
                ->withInput();                
        }

        $staff = Staff::create([
            'ptj_id' => strtoupper($request->get('ptj_id')),
            'nama'      => strtoupper($request->get('nama'))
        ]);

        if($staff)
            Session::flash('message', 'Berjaya. Data telah ditambah.');
        else
            Session::flash('message', 'Gagal. Data gagal ditambah.');

        return redirect()->route('members.staff.index');
    }

    public function hapus($id) {

        $staff = Staff::findOrFail($id)->delete();

        if($staff)
            Session::flash('message', 'Berjaya. Data telah dihapus.');
        else
            Session::flash('message', 'Gagal. Data gagal dihapus.');

        return redirect()->route('members.staff.index');

    }

    //kemaskini start
    public function show($id)
    {
        $staff = Staff::findOrFail($id);
        $ptjs = Ptj::pluck('nama', 'id');

        return view('staff.show', compact('staff','ptjs'));
    }

    public function update($id, Request $request)
    {

        $validation = Validator::make($request->all(), [
            'ptj_id' => 'required|numeric',
            'nama'   => 'required|min:3'
        ]);

        if($validation->fails()) {
            return redirect()->route('members.staff.show')
                ->withErrors($validation)
                ->withInputs();
        }
        
        $pekerja = Staff::find($id);

        $pekerja->ptj_id        =   strtoupper($request->get('ptj_id'));
        $pekerja->nama          =   strtoupper($request->get('nama'));

        $pekerja->save();

        if($pekerja) 
            Session::flash('message', 'Berjaya. Data telah dikemaskini.');
        else
            Session::flash('message', 'Gagal. Data gagal dikemaskini.');

        return redirect()->route('members.staff.index');
    }

    //kemaskini end
}
