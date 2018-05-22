@extends('layouts.members')

@section('content')


	<a href="{{ route('members.lokaliti.index') }}"><button class="btn btn-success">Senarai Negeri</button></a><br /><br />

	@include('messages._formErrors')

	{!! Form::model($ppk, ['route' => ['members.lokaliti.show', $ppk->id]]) !!}

	<table class="table table-bordered table-striped">
		<tr>
			<thead><th colspan="2"><h4>Kemaskini Negeri</h4></th></thead>
		</tr>
		<tr>
			<td>{!! Form::label('wilayah', 'Wilayah', ['class'=>'col-sm-6']) !!}</td>
			<td>{{ Form::select('wilayah_id', $territorys, null, ['class' => 'form-control col-sm-6', 'placeholder' => 'Pilih Wilayah']) }}</td>
		</tr>
		<tr>
			<td width="27%">{!! Form::label('nama', 'Nama Lokaliti', ['class'=>'form control col-sm-6']) !!}</td>
			<td>{!! Form::text('nama',null,['class'=>'form-control col-sm-6']) !!}</td>
		</tr>
		<tr>
			<td>{!! Form::label('lokaliti', 'Kod Lokaliti', ['class'=>'col-sm-6']) !!}</td>
			<td>{!! Form::text('kod',null,['class'=>'form-control col-sm-6']) !!}</td>
		</tr>
		<tr>
			<td colspan="2" align="right">{{ Form::submit('Kemaskini', ['class' => 'btn btn-primary']) }}</td>
		</tr>
	{!! Form::close() !!}

@endsection