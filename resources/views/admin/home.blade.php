@extends("admin.layouts.app")

@section("contentheader_title", "Dashboard")
@section("contentheader_description", "Dashboard")
@section("section", "Dashboard")
@section("sub_section", "Dashboard")
@section("htmlheader_title", "Dashboard")

@section("headerElems")

@endsection

@section("main-content")


<div class="box box-success">
	<!--<div class="box-header"></div>-->
	<div class="alert alert-danger">
        <p>Selamat Datang :: {{ Auth::user()->admin }}</p>
    </div>
</div>
@endsection