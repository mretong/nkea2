@extends('layouts.members')

@section('content')


	<a href="{{ route('members.pakej.index') }}"><button class="btn btn-success">Senarai Pakej</button></a><br /><br />

	@include('messages._formErrors')

	{!! Form::model($package, ['route' => ['members.pakej.show', $package->id]]) !!}

	<table class="table table-bordered table-striped">
		<tr>
			<thead><th colspan="2"><h4>Kemaskini Pakej</h4></th></thead>
		</tr>
		<tr>
			<td width="25%">{!! Form::label('nama', 'Nama Pakej', ['class'=>'form control col-sm-6']) !!}</td>
			<td>{!! Form::text('nama',null,['class'=>'form-control col-sm-6']) !!}</td>
		</tr>
		<tr>
			<td>{!! Form::label('kod', 'Kod Pakej', ['class'=>'form control col-sm-6']) !!}</td>
			<td>{!! Form::text('kod',null,['class'=>'form-control col-sm-6']) !!}</td>
		</tr>
		<tr>
			<td colspan="2" align="right">{{ Form::submit('Kemaskini', ['class' => 'btn btn-primary']) }}</td>
		</tr>
	{!! Form::close() !!}

@endsection