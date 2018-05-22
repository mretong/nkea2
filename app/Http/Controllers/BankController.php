<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bank;

use Session;
use Validator;

class BankController extends Controller
{
    public function index()
    {
    	$banks = Bank::paginate(10);

    	return view('bank.index', compact('banks'));
    }

    public function create() {

    	return view('bank.create');
    }

    public function createPost(Request $request) {

    	$validation = Validator::make($request->all(), [
    		'nama'	=> 'required|min:3',
    		'kod'	=> 'required|min:3'
    	]);

    	if($validation->fails()) {
    		return redirect()->route('members.bank.create')
    			->withErrors($validation)
    			->withInputs();
    	}

    	$state = Bank::create([
    			'nama'	=> strtoupper($request->get('nama')),
    			'kod'	=> strtoupper($request->get('kod'))
    		]);

    	if($state) 
    		Session::flash('message', 'Berjaya. Data telah ditambah.');
    	else
    		Session::flash('message', 'Gagal. Data gagal ditambah.');

    	return redirect()->route('members.bank.index');

    }

    public function hapus($id) {

    	$state = Bank::findOrFail($id)->delete();

    	if($state)
    		Session::flash('message', 'Berjaya. Data telah dihapus.');
    	else
    		Session::flash('message', 'Gagal. Data gagal dihapus.');


    	return redirect()->route('members.bank.index');
    }

    //kemaskini start
    public function show($id)
    {
        $bank = Bank::findOrFail($id);

        return view('bank.show', compact('bank'));
    }

    public function update($id, Request $request)
    {

        $validation = Validator::make($request->all(), [
            'nama'  => 'required|min:3',
            'kod'   => 'required|min:3'
        ]);

        if($validation->fails()) {
            return redirect()->route('members.bank.show')
                ->withErrors($validation)
                ->withInputs();
        }
        
        $banker = Bank::find($id);

        $banker->nama         =   strtoupper($request->get('nama'));
        $banker->kod          =   strtoupper($request->get('kod'));

        $banker->save();

        if($banker) 
            Session::flash('message', 'Berjaya. Data telah dikemaskini.');
        else
            Session::flash('message', 'Gagal. Data gagal dikemaskini.');

        return redirect()->route('members.bank.index');
    }

    //kemaskini end
}
