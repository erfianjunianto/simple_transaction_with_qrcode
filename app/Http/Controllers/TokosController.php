<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
Use App\Toko;
use Validator;
use Session;

class TokosController extends Controller
{
	public function index()
	{	
		$tokos = Toko::all();

		return View('admin.toko.index', ['tokos' => $tokos]);
	}   

	public function create(Request $request)
	{

	}

	public function store(Request $request)
	{
		$validator = Toko::validate($request->all());
			
		if ($validator->fails()) {
			return redirect()->back()->withErrors($validator)->withInput();
		}else{

			$toko = new Toko;

			$toko->nama_toko = $request->nama_toko;
			$toko->alamat_toko = $request->alamat_toko;
			
			$simpan_toko = $toko->save();

			if($simpan_toko){
				Session::flash('message','Toko berhasil ditambahkan');
				return redirect()->route('toko.index');	
			}else{
				return redirect()->back()->withErrors("Gagal Input");	
			}
			
		}
	}

	public function show($id)
	{

	}

	public function edit($id)	
	{
		$toko = Toko::findOrFail($id);

		if(isset($toko->id)) {	

			return view('admin.toko.edit', ['toko' => $toko]);

		} else {
			return view('errors.404', [
				'record_id' => $id,
				'record_name' => ucfirst("toko"),
			]);
		}
	}

	public function update(Request $request, $id)
	{
		$validator = Toko::validate($request->all());

		if ($validator->fails()) {
			#return redirect()->route('toko/'.$id.'/edit')->withErrors($validator)->withInput();
			return redirect()->back()->withErrors($validator)->withInput();;
		}else{
			
				$toko = Toko::findOrFail($id);
				$toko->nama_toko = ucwords($request->input('nama_toko'));
				$toko->alamat_toko = $request->input('alamat_toko');
				$toko->save();

				Session::flash('message','Data Toko berhasil diubah');
				return redirect()->route('toko.index');
			
		}
	}

	public function destroy($id)
	{

		Toko::find($id)->delete();

		return redirect()->route('toko.index');
		
	}
}
