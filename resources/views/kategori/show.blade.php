@extends('layouts.members')

@section('content')


	<a href="{{ route('members.kategori.index') }}"><button class="btn btn-success">Senarai Kategori Pampasan</button></a><br /><br />

	@include('messages._formErrors')

	{!! Form::model($kategori, ['route' => ['members.kategori.show', $kategori->id]]) !!}

	<table class="table table-bordered table-striped">
		<tr>
			<thead><th colspan="2"><h4>Kemaskini Kategori Pampasan</h4></th></thead>
		</tr>
		<tr>
			<td width="25%">{!! Form::label('nama', 'Jenis Pampasan', ['class'=>'form control col-sm-8']) !!}</td>
			<td>{!! Form::text('nama',null,['class'=>'form-control col-sm-6']) !!}</td>
		</tr>
		<tr>
			<td>{!! Form::label('kod', 'Kod Pampasan', ['class'=>'form control col-sm-8']) !!}</td>
			<td>{!! Form::text('kod',null,['class'=>'form-control col-sm-6']) !!}</td>
		</tr>
		<tr>
			<td colspan="2" align="right">{{ Form::submit('Kemaskini', ['class' => 'btn btn-primary']) }}</td>
		</tr>
	{!! Form::close() !!}

@endsection