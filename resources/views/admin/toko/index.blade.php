@extends("admin.layouts.app")

@section("contentheader_title", "Toko")
@section("contentheader_description", "Toko listing")
@section("section", "Toko")
@section("sub_section", "Listing")
@section("htmlheader_title", "Toko Listing")

@section("headerElems")

	<button class="btn btn-success btn-sm pull-right" data-toggle="modal" data-target="#AddModal">Tambah Toko</button>

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
				<th>Nama Toko</th>
				<th>Alamat Toko</th>
				<th>Ditambahkan pada</th>
				<th>Aksi</th>
			</tr>
			</thead>
			<tbody>
				@foreach ($tokos as $key => $toko)
					<tr>
						<td>{{ $key + 1 }}</td>
						<td>{{ $toko->nama_toko }}</td>
						<td>{{ $toko->alamat_toko }}</td>
						<td>{{ $toko->created_at }}</td>
						<td>
							<button type="button" class="btn btn-sm btn-primary"><i class="fa fa-pencil"></i> </button>
							<button type="button" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> </button>
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
				<h4 class="modal-title" id="myModalLabel">Tambah Toko</h4>
			</div>
			{!! Form::open(['action' => 'TokosController@store', 'id' => 'toko-add-form']) !!}
			<div class="modal-body">
				<div class="box-body">
                    <div class="form-group">
	                  <label for="inputNamaToko">Nama Toko</label>
	                  <input type="text" name="nama_toko" class="form-control" id="inputNamaToko" placeholder="Masukkan Nama Toko">
	                </div>
	                <div class="form-group">
	                  <label for="inputAlamatToko">Alamat Toko</label>
	                  <textarea name="alamat_toko" class="form-control"></textarea>
	                </div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				{!! Form::submit( 'Submit', ['class'=>'btn btn-success']) !!}
			</div>
			{!! Form::close() !!}
		</div>
	</div>
</div>

@endsection