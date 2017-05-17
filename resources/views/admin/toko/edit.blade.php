@extends("admin.layouts.app")

@section("contentheader_title", "Toko")
@section("contentheader_description", "Edit Toko")
@section("section", "Toko")
@section("sub_section", "Edit")
@section("htmlheader_title", "Toko Edit")

@section("headerElems")


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


<div class="row">
	<div class="col-md-12">
		<div class="box box-primary">
			<div class="box-header with-border">
		        <div class="col-sm-8">
		          <h3 class="box-title">Edit Toko</h3>  
		        </div>
		        <div class="col-sm-4">
		          
		        </div>
	        	
	      	</div>
	      	<div class="box-body">
				{!! Form::model($toko, ['route' => ['toko.update', $toko->id ], 'method'=>'PUT', 'id' => 'toko-edit-form', 'class' => 'form-horizontal']) !!}
					<div class="form-group">
		              <label class="col-sm-2 control-label" for="inputNamaToko">Nama Toko</label>
		              <div class="col-sm-8">
		              	<input type="text" name="nama_toko" value="{{ $toko->nama_toko }}" class="form-control" id="inputNamaToko" placeholder="Masukkan Nama Toko">
		              </div>
		            </div>
		            <div class="form-group">
		              <label class="col-sm-2 control-label" for="inputAlamatToko">Alamat Toko</label>
		              <div class="col-sm-8">
		              	<textarea name="alamat_toko" class="form-control">{{ $toko->alamat_toko }}</textarea>
		              </div>
		            </div>
					<div class="box-footer">
						{!! Form::submit( 'Update', ['class'=>'btn btn-success pull-right']) !!} 
						<button class="btn btn-default pull-left">
							<a href="{{ url('/toko') }}">Cancel</a>
						</button>
					</div>
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>

@endsection