@extends('layouts.members')

@section('content')


	<a href="{{ route('members.kategori.index') }}"><button class="btn btn-success">Senarai Jenis Pampasan</button></a><br /><br />

	@include('messages._formErrors')

	{!! Form::open(['route' => 'members.kategori.create', 'method' => 'post']) !!}
	<table class="table table-bordered table-striped">
		<tr>
			<thead><th colspan="2">Tambah Jenis Pampasan</th></thead>
		</tr>
		<tr>
			<td width="25%">{!! Form::label('nama', 'Jenis Pampasan', ['class'=>'form control col-sm-8']) !!}</td>
			<td>{!! Form::text('nama','',['class'=>'form-control col-sm-6']) !!}</td>
		</tr>
		<tr>
			<td>{!! Form::label('kod', 'Kod Pampasan', ['class'=>'form control col-sm-8']) !!}</td>
			<td>{!! Form::text('kod','',['class'=>'form-control col-sm-6']) !!}</td>
		</tr>
		<tr>
			<td colspan="2" align="right">{{ Form::submit('Tambah', ['class' => 'btn btn-primary']) }}</td>
		</tr>
	{!! Form::close() !!}

@endsection