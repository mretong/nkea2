@extends('layouts.members')

@section('content')


	<a href="{{ route('members.lot.index') }}"><button class="btn btn-success">Senarai Lot</button></a><br /><br />

	@include('messages._formErrors')

	{!! Form::open(['route' => 'members.lot.create', 'method' => 'post']) !!}
	<table class="table table-bordered table-striped">
		<tr>
			<thead><th colspan="2"><h4>Tambah Lot</h4></th></thead>
		</tr>
		
		<tr>
			<td>{!! Form::label('nama', 'Blok', ['class'=>'col-sm-8']) !!}</td>
			<td>{{ Form::select('blok_id', $blok, null, ['class' => 'form-control col-sm-6', 'placeholder' => 'Pilih Blok']) }}</td>
		</tr>
		<tr>
			<td>{!! Form::label('nama', 'Mukim', ['class'=>'col-sm-8']) !!}</td>
			<td>{{ Form::select('mukim_id', $mukim, null, ['class' => 'form-control col-sm-6', 'placeholder' => 'Pilih Mukim']) }}</td>
		</tr>
		<tr>
			<td>{!! Form::label('kod', 'No.Lot', ['class'=>'col-sm-8']) !!}</td>
			<td>{!! Form::text('kod','',['class'=>'form-control col-sm-6']) !!}</td>
		</tr>
		<tr>
			<td>{!! Form::label('kod', 'Hakmilik', ['class'=>'col-sm-8']) !!}</td>
			<td>{!! Form::text('kod','',['class'=>'form-control col-sm-6']) !!}</td>
		</tr>
		
		<tr>
			<td colspan="2" align="right">{{ Form::submit('Tambah Blok', ['class' => 'btn btn-primary']) }}</td>
		</tr>
	{!! Form::close() !!}

@endsection