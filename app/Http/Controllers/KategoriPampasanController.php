<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\KategoriPampasan;

use Session;
use Validator;

class KategoriPampasanController extends Controller
{
    public function index()
    {
    	$kategori = KategoriPampasan::paginate(10);

    	return view('kategori.index', compact('kategori'));
    }

    public function create() {

    	return view('kategori.create');
    }

    public function createPost(Request $request) {

    	$validation = Validator::make($request->all(), [
    		'nama'	=> 'required|min:3',
    		'kod'	=> 'required|min:2'
    	]);

    	if($validation->fails()) {
    		return redirect()->route('members.kategori.create')
    			->withErrors($validation)
    			->withInputs();
    	}

    	$cat = KategoriPampasan::create([
    			'nama'	=> strtoupper($request->get('nama')),
    			'kod'	=> strtoupper($request->get('kod'))
    		]);

    	if($cat) 
    		Session::flash('message', 'Berjaya. Data telah ditambah.');
    	else
    		Session::flash('message', 'Gagal. Data gagal ditambah.');

    	return redirect()->route('members.kategori.index');

    }

    public function hapus($id) {

    	$cat = KategoriPampasan::findOrFail($id)->delete();


    	if($cat)
    		Session::flash('message', 'Berjaya. Data telah dihapus.');
    	else
    		Session::flash('message', 'Gagal. Data gagal dihapus.');


    	return redirect()->route('members.kategori.index');
    }

    //kemaskini start
    public function show($id)
    {
        $kategori = KategoriPampasan::findOrFail($id);

        return view('kategori.show', compact('kategori'));
    }

    public function update($id, Request $request)
    {

        $validation = Validator::make($request->all(), [
            'nama'      => 'required|min:3',
            'kod'       => 'required|min:2'
        ]);

        if($validation->fails()) {
            return redirect()->route('members.kategori.show')
                ->withErrors($validation)
                ->withInputs();
        }
        
        $pampasan = KategoriPampasan::find($id);

        $pampasan->nama         =   strtoupper($request->get('nama'));
        $pampasan->kod          =   strtoupper($request->get('kod'));

        $pampasan->save();

        if($pampasan) 
            Session::flash('message', 'Berjaya. Data telah dikemaskini.');
        else
            Session::flash('message', 'Gagal. Data gagal dikemaskini.');

        return redirect()->route('members.kategori.index');
    }

    //kemaskini end
}
