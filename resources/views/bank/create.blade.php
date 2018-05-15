@extends('layouts.members')

@section('content')


	<a href="{{ route('members.bank.index') }}"><button class="btn btn-success">Senarai Bank</button></a><br /><br />

	@include('messages._formErrors')

	{!! Form::open(['route' => 'members.bank.create', 'method' => 'post']) !!}
	<table class="table table-bordered table-striped">
		<tr>
			<thead><th colspan="2">Tambah Bank</th></thead>
		</tr>
		<tr>
			<td width="25%">{!! Form::label('nama', 'Nama Bank', ['class'=>'form control col-sm-6']) !!}</td>
			<td>{!! Form::text('nama','',['class'=>'form-control col-sm-6']) !!}</td>
		</tr>
		<tr>
			<td>{!! Form::label('kod', 'Kod Bank', ['class'=>'form control col-sm-6']) !!}</td>
			<td>{!! Form::text('kod','',['class'=>'form-control col-sm-6']) !!}</td>
		</tr>
		<tr>
			<td colspan="2" align="right">{{ Form::submit('Tambah Bank', ['class' => 'btn btn-primary']) }}</td>
		</tr>
	{!! Form::close() !!}

@endsection