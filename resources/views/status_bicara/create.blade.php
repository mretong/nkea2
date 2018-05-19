@extends('layouts.members')

@section('content')


	<a href="{{ route('members.status_bicara.index') }}"><button class="btn btn-success">Senarai Status Bicara</button></a><br /><br />

	@include('messages._formErrors')

	{!! Form::open(['route' => 'members.status_bicara.create', 'method' => 'post']) !!}
	<table class="table table-bordered table-striped">
		<tr>
			<thead><th colspan="2">Tambah Status Bicara</th></thead>
		</tr>
		<tr>
			<td width="25%">{!! Form::label('nama', 'Status', ['class'=>'form control col-sm-6']) !!}</td>
			<td>{!! Form::text('nama','',['class'=>'form-control col-sm-6']) !!}</td>
		</tr>
		<tr>
			<td>{!! Form::label('kod', 'Kod/Singkatan', ['class'=>'form control col-sm-6']) !!}</td>
			<td>{!! Form::text('kod','',['class'=>'form-control col-sm-6']) !!}</td>
		</tr>
		<tr>
			<td colspan="2" align="right">{{ Form::submit('Tambah', ['class' => 'btn btn-primary']) }}</td>
		</tr>
	{!! Form::close() !!}

@endsection