@extends('layouts.members')

@section('content')


	<a href="{{ route('members.fasa.index') }}"><button class="btn btn-success">Senarai Fasa</button></a><br /><br />

	@include('messages._formErrors')

	{!! Form::open(['route' => 'members.fasa.create', 'method' => 'post']) !!}
	<table class="table table-bordered table-striped">
		<tr>
			<thead><th colspan="2">Tambah Fasa</th></thead>
		</tr>
		<tr>
			<td width="25%">{!! Form::label('nama', 'Nama Fasa', ['class'=>'form control col-sm-6']) !!}</td>
			<td>{!! Form::text('nama','',['class'=>'form-control col-sm-6']) !!}</td>
		</tr>
		<tr>
			<td>{!! Form::label('kod', 'Kod Fasa', ['class'=>'form control col-sm-6']) !!}</td>
			<td>{!! Form::text('kod','',['class'=>'form-control col-sm-6']) !!}</td>
		</tr>
		<tr>
			<td colspan="2" align="right">{{ Form::submit('Tambah Fasa', ['class' => 'btn btn-primary']) }}</td>
		</tr>
	{!! Form::close() !!}

@endsection