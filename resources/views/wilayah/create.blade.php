@extends('layouts.members')

@section('content')


	<a href="{{ route('members.wilayah.index') }}"><button class="btn btn-success">Senarai Wilayah</button></a><br /><br />

	@include('messages._formErrors')

	{!! Form::open(['route' => 'members.wilayah.create', 'method' => 'post']) !!}
	<table class="table table-bordered table-striped">
		<tr>
			<thead><th colspan="2">Tambah Wilayah</th></thead>
		</tr>
		<tr>
			<td>{!! Form::label('nama', 'Daerah', ['class'=>'col-sm-6']) !!}</td>
			<td>{{ Form::select('daerah_id', $district, null, ['class' => 'form-control col-sm-6', 'placeholder' => 'Pilih Daerah']) }}</td>
		</tr>
		<tr>
			<td width="27%">{!! Form::label('nama', 'Nama Wilayah', ['class'=>'form control col-sm-6']) !!}</td>
			<td>{!! Form::text('nama','',['class'=>'form-control col-sm-6']) !!}</td>
		</tr>
		<tr>
			<td>{!! Form::label('kod', 'Kod Wilayah', ['class'=>'col-sm-6']) !!}</td>
			<td>{!! Form::text('kod','',['class'=>'form-control col-sm-6']) !!}</td>
		</tr>
		<tr>
			<td colspan="2" align="right">{{ Form::submit('Tambah Wilayah', ['class' => 'btn btn-primary']) }}</td>
		</tr>
	{!! Form::close() !!}

@endsection