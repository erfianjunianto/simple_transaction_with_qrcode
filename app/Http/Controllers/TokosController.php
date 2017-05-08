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

	}

	public function update(Request $request, $id)
	{

	}

	public function destroy($id)
	{

	}
}
