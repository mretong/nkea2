@extends('layouts.members')

@section('content')


	<a href="{{ route('members.lokaliti.index') }}"><button class="btn btn-success">Senarai Lokaliti</button></a><br /><br />

	@include('messages._formErrors')

	{!! Form::open(['route' => 'members.lokaliti.create', 'method' => 'post']) !!}
	<table class="table table-bordered table-striped">
		<tr>
			<thead><th colspan="2">Tambah Lokaliti</th></thead>
		</tr>
		<tr>
			<td>{!! Form::label('nama', 'Wilayah', ['class'=>'col-sm-6']) !!}</td>
			<td>{{ Form::select('wilayah_id', $territorys, null, ['class' => 'form-control col-sm-6', 'placeholder' => 'Pilih Wilayah']) }}</td>
		</tr>
		<tr>
			<td width="27%">{!! Form::label('nama', 'Nama Lokaliti', ['class'=>'form control col-sm-6']) !!}</td>
			<td>{!! Form::text('nama','',['class'=>'form-control col-sm-6']) !!}</td>
		</tr>
		<tr>
			<td>{!! Form::label('kod', 'Kod Lokaliti', ['class'=>'col-sm-6']) !!}</td>
			<td>{!! Form::text('kod','',['class'=>'form-control col-sm-6']) !!}</td>
		</tr>
		<tr>
			<td colspan="2" align="right">{{ Form::submit('Tambah Lokaliti', ['class' => 'btn btn-primary']) }}</td>
		</tr>
	{!! Form::close() !!}

@endsection