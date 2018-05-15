@extends('layouts.members')

@section('content')


	<a href="{{ route('members.mukim.index') }}"><button class="btn btn-success">Senarai Mukim</button></a><br /><br />

	@include('messages._formErrors')

	{!! Form::open(['route' => 'members.mukim.create', 'method' => 'post']) !!}
	<table class="table table-bordered table-striped">
		<tr>
			<thead><th colspan="2">Tambah Mukim</th></thead>
		</tr>
		<tr>
			<td width="27%">{!! Form::label('nama', 'Nama Mukim', ['class'=>'form control col-sm-6']) !!}</td>
			<td>{!! Form::text('nama','',['class'=>'form-control col-sm-6']) !!}</td>
		</tr>
		<tr>
			<td>{!! Form::label('nama', 'Daerah', ['class'=>'col-sm-6']) !!}</td>
			<td>{{ Form::select('daerah_id', $district, null, ['class' => 'form-control col-sm-6', 'placeholder' => 'Pilih Daerah']) }}</td>
		</tr>
		<tr>
			<td>{!! Form::label('nama', 'Wilayah', ['class'=>'col-sm-6']) !!}</td>
			<td>{{ Form::select('wilayah_id', $territory, null, ['class' => 'form-control col-sm-6', 'placeholder' => 'Pilih Daerah']) }}</td>
		</tr>
		<tr>
			<td colspan="2" align="right">{{ Form::submit('Tambah Mukim', ['class' => 'btn btn-primary']) }}</td>
		</tr>
	{!! Form::close() !!}

@endsection