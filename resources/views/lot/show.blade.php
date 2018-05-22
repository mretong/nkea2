@extends('layouts.members')

@section('content')


	<a href="{{ route('members.lot.index') }}"><button class="btn btn-success">Senarai Lot</button></a><br /><br />

	@include('messages._formErrors')

	{!! Form::model($lots, ['route' => ['members.lot.show', $lots->id]]) !!}

	<table class="table table-bordered table-striped">
		<tr>
			<thead><th colspan="2"><h4>Kemaskini Lot</h4></th></thead>
		</tr>
		
		<tr>
			<td>{!! Form::label('blok', 'Blok', ['class'=>'col-sm-8']) !!}</td>
			<td>{{ Form::select('blok_id', $blok, null, ['class' => 'form-control col-sm-6', 'placeholder' => 'Pilih Blok']) }}</td>
		</tr>
		<tr>
			<td>{!! Form::label('mukim', 'Mukim', ['class'=>'col-sm-8']) !!}</td>
			<td>{{ Form::select('mukim_id', $mukim, null, ['class' => 'form-control col-sm-6', 'placeholder' => 'Pilih Mukim']) }}</td>
		</tr>
		<tr>
			<td>{!! Form::label('lot', 'No.Lot', ['class'=>'col-sm-8']) !!}</td>
			<td>{!! Form::text('no_lot',null,['class'=>'form-control col-sm-6']) !!}</td>
		</tr>
		<tr>
			<td>{!! Form::label('hakmilik', 'Hakmilik', ['class'=>'col-sm-8']) !!}</td>
			<td>{!! Form::text('no_hakmilik',null,['class'=>'form-control col-sm-6']) !!}</td>
		</tr>
		<tr>
			<td>{!! Form::label('status', 'Status Tanah', ['class'=>'col-sm-8']) !!}</td>
			<td>{{ Form::select('status_milik_id', $status, null, ['class' => 'form-control col-sm-6', 'placeholder' => 'Pilih Status Tanah']) }}</td>
		</tr>

		<tr>
			<td colspan="2" align="right">{{ Form::submit('Kemaskini', ['class' => 'btn btn-primary']) }}</td>
		</tr>
	{!! Form::close() !!}

@endsection