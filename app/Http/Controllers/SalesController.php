<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Sales;
use Validator;
use Session;


class SalesController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
	{	

		$sales = Sales::all();

		return View('admin.sales.index', ['sales' => $sales]);
	}

	public function store(Request $request){
		$validator = Sales::validate($request->all());

		if($validator->fails()){
			return redirect()->back()->withErrors($validator)->withInput();
		}else{

			$sales = new Sales();

			$sales->nama_sales = $request->nama_sales;
			$sales->kode_sales = strtoupper($request->kode_sales);

			$simpan_sales = $sales->save();

			if($simpan_sales){
				$request->session()->flash('message', 'Sales berhasil ditambahkan');
				return redirect()->route('sales.index');
			}else{
				return redirect()->back()->withErrors('Gagal Input Sales');
			}

		}
	}

	public function show($id){

	}

	public function edit($id){

		$sales = Sales::findOrFail($id);

		if(isset($sales->id)) {	

			return view('admin.sales.edit', ['sales' => $sales]);

		} else {
			return view('errors.404', [
				'record_id' => $id,
				'record_name' => ucfirst("sales"),
			]);
		}
	}

	public function update(Request $request, $id){

		$validator = Toko::validate($request->all());

		if ($validator->fails()) {
			#return redirect()->route('toko/'.$id.'/edit')->withErrors($validator)->withInput();
			return redirect()->back()->withErrors($validator)->withInput();;
		}else{
			
				$sales = Sales::findOrFail($id);
				$sales->nama_sales = ucwords($request->input('nama_sales'));
				$sales->kode_sales = strtoupper($request->input('kode_sales'));
				$sales->save();

				Session::flash('message','Data Sales berhasil diubah');
				return redirect()->route('sales.index');
			
		}
	}

	public function destroy($id){

		Sales::find($id)->delete();

		return redirect()->route('sales.index');
	}

}
