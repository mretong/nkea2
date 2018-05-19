@extends('layouts.members')

@section('content')


	<a href="{{ route('members.staff.index') }}"><button class="btn btn-success">Senarai Maklumat Staff</button></a><br /><br />

	@include('messages._formErrors')

	{!! Form::open(['route' => 'members.staff.create', 'method' => 'post']) !!}
	<table class="table table-bordered table-striped">
		<tr>
			<thead><th colspan="2">Tambah Maklumat Staff</th></thead>
		</tr>
		<tr>
			<td width="27%">{!! Form::label('nama', 'Nama Staff', ['class'=>'form control col-sm-6']) !!}</td>
			<td>{!! Form::text('nama','',['class'=>'form-control col-sm-6']) !!}</td>
		</tr>
		<tr>
			<td>{!! Form::label('nama', 'PTJ', ['class'=>'col-sm-6']) !!}</td>
			<td>{{ Form::select('ptj_id', $ptjs, null, ['class' => 'form-control col-sm-6', 'placeholder' => 'Pilih PTJ']) }}</td>
		</tr>
		<tr>
			<td colspan="2" align="right">{{ Form::submit('Tambah Daerah', ['class' => 'btn btn-primary']) }}</td>
		</tr>
	{!! Form::close() !!}

@endsection