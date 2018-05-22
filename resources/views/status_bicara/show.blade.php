@extends('layouts.members')

@section('content')


	<a href="{{ route('members.status_bicara.index') }}"><button class="btn btn-success">Senarai Status Bicara</button></a><br /><br />

	@include('messages._formErrors')

	{!! Form::model($bicara, ['route' => ['members.status_bicara.show', $bicara->id]]) !!}

	<table class="table table-bordered table-striped">
		<tr>
			<thead><th colspan="2"><h4>Kemaskini Status Bicara</h4></th></thead>
		</tr>
		<tr>
			<td width="25%">{!! Form::label('nama', 'Status', ['class'=>'form control col-sm-6']) !!}</td>
			<td>{!! Form::text('nama',null,['class'=>'form-control col-sm-6']) !!}</td>
		</tr>
		<tr>
			<td>{!! Form::label('kod', 'Kod/Singkatan', ['class'=>'form control col-sm-6']) !!}</td>
			<td>{!! Form::text('kod',null,['class'=>'form-control col-sm-6']) !!}</td>
		</tr>
		<tr>
			<td colspan="2" align="right">{{ Form::submit('Kemaskini', ['class' => 'btn btn-primary']) }}</td>
		</tr>
	{!! Form::close() !!}

@endsection