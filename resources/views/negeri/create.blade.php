@extends('layouts.members')

@section('content')


	<a href="{{ route('members.negeri.index') }}"><button class="btn btn-success">Senarai Negeri</button></a><br /><br />

	@include('messages._formErrors')

	{!! Form::open(['route' => 'members.negeri.create', 'method' => 'post']) !!}
	<table class="table table-bordered table-striped">
		<tr>
			<thead><th colspan="2">Tambah Negeri</th></thead>
		</tr>
		<tr>
			<td width="25%">{!! Form::label('nama', 'Nama Negeri', ['class'=>'form control col-sm-6']) !!}</td>
			<td>{!! Form::text('nama','',['class'=>'form-control col-sm-6']) !!}</td>
		</tr>
		<tr>
			<td>{!! Form::label('kod', 'Kod Negeri', ['class'=>'form control col-sm-6']) !!}</td>
			<td>{!! Form::text('kod','',['class'=>'form-control col-sm-6']) !!}</td>
		</tr>
		<tr>
			<td colspan="2" align="right">{{ Form::submit('Tambah Negeri', ['class' => 'btn btn-primary']) }}</td>
		</tr>
	{!! Form::close() !!}

@endsection