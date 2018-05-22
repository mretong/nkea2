@extends('layouts.members')

@section('content')


	<a href="{{ route('members.mukim.index') }}"><button class="btn btn-success">Senarai Mukim</button></a><br /><br />

	@include('messages._formErrors')

	{!! Form::model($stay, ['route' => ['members.mukim.show', $stay->id]]) !!}

	<table class="table table-bordered table-striped">
		<tr>
			<thead><th colspan="2"><h4>Kemaskini Mukim</h4></th></thead>
		</tr>
		<tr>
			<td width="27%">{!! Form::label('nama', 'Nama Mukim', ['class'=>'form control col-sm-6']) !!}</td>
			<td>{!! Form::text('nama',null,['class'=>'form-control col-sm-6']) !!}</td>
		</tr>
		<tr>
			<td>{!! Form::label('daerah', 'Daerah', ['class'=>'col-sm-6']) !!}</td>
			<td>{{ Form::select('daerah_id', $district, null, ['class' => 'form-control col-sm-6', 'placeholder' => 'Pilih Daerah']) }}</td>
		</tr>
		<tr>
			<td>{!! Form::label('wilayah', 'Wilayah', ['class'=>'col-sm-6']) !!}</td>
			<td>{{ Form::select('wilayah_id', $territory, null, ['class' => 'form-control col-sm-6', 'placeholder' => 'Pilih Wilayah']) }}</td>
		</tr>
		<tr>
			<td colspan="2" align="right">{{ Form::submit('Kemaskini', ['class' => 'btn btn-primary']) }}</td>
		</tr>
	{!! Form::close() !!}

@endsection