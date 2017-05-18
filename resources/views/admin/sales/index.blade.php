@extends("admin.layouts.app")

@section("contentheader_title", "Sales")
@section("contentheader_description", "Sales listing")
@section("section", "Sales")
@section("sub_section", "Listing")
@section("htmlheader_title", "Sales Listing")

@section("headerElems")

	<button class="btn btn-success btn-sm pull-right" data-toggle="modal" data-target="#AddModal">Tambah Sales</button>

@endsection

@section("main-content")

@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="box box-success">
	<!--<div class="box-header"></div>-->
	<div class="box-body">
		<table id="example1" class="table table-bordered">
			<thead>
			<tr class="success">
				<th>No</th>
				<th>Nama Sales</th>
				<th>Kode Sales</th>
				<th>Ditambahkan pada</th>
				<th>Aksi</th>
			</tr>
			</thead>
			<tbody>
				@foreach ($sales as $key => $sales)
					<tr>
						<td>{{ $key + 1 }}</td>
						<td>{{ $sales->nama_sales }}</td>
						<td>{{ $sales->kode_sales }}</td>
						<td>{{ $sales->created_at }}</td>
						<td>
							<a href="{{ url('/sales/'.$sales->id.'/edit') }}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
							{!! Form::open(['route' => ['toko.destroy', $sales->id], 'method' => 'delete', 'style'=>'display:inline']) !!}
							<button class="btn btn-sm btn-danger" type="submit"><i class="fa fa-trash"></i></button>
							{!!  Form::close() !!}
						</td>
					</tr>
				@endforeach

			</tbody>
		</table>
	</div>
</div>

<!--- Add Modal -->
<div class="modal fade" id="AddModal" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Tambah Sales</h4>
			</div>
			{!! Form::open(['action' => 'SalesController@store', 'id' => 'sales-add-form']) !!}
			<div class="modal-body">
				<div class="box-body">
                    <div class="form-group">
	                  <label for="inputNamaToko">Nama Sales</label>
	                  <input type="text" name="nama_sales" value="{{ old('nama_sales') }}" class="form-control" id="inputNamaSales" placeholder="Masukkan Nama Sales">
	                </div>
	                <div class="form-group">
	                  <label for="inputAlamatToko">Kode Sales</label>
	                  <input type="text" name="kode_sales" value="{{ old('kode_sales') }}" class="form-control" id="inputKodeSales" placeholder="Masukkan Kode Sales">
	                </div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				{!! Form::submit( 'Simpan', ['class'=>'btn btn-success']) !!}
			</div>
			{!! Form::close() !!}
		</div>
	</div>
</div>

@endsection