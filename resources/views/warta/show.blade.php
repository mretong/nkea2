@extends('layouts.members')

@section('content')


	<a href="{{ route('members.warta.index') }}"><button class="btn btn-success">Senarai Warta</button></a><br /><br />

	@include('messages._formErrors')

	{!! Form::model($warrant, ['route' => ['members.warta.show', $warrant->id]]) !!}

	<table class="table table-bordered table-striped">
		<tr>
			<thead><th colspan="2"><h4>Kemaskini Warta</h4></th></thead>
		</tr>
		<tr>
			<td>{!! Form::label('nama', 'Blok', ['class'=>'col-sm-6']) !!}</td>
			<td>{{ Form::select('blok_id', $blok, null, ['class' => 'form-control col-sm-6', 'placeholder' => 'Pilih Blok']) }}</td>
		</tr>
		<tr>
			<td>{!! Form::label('nama', 'Pakej', ['class'=>'col-sm-6']) !!}</td>
			<td>{{ Form::select('pakej_id', $pakej, null, ['class' => 'form-control col-sm-6', 'placeholder' => 'Pilih Pakej']) }}</td>
		</tr>
		<tr>
			<td>{!! Form::label('tarikh_warta', 'Tarikh Warta', ['class'=>'form control col-sm-6']) !!}</td>
			<td>{!! Form::date('tarikh_warta', \Carbon\Carbon::now(), ['class'=>'form-control col-sm-6']) !!}</td>
		</tr>
		<tr>
			<td>{!! Form::label('jilid', 'Jilid Warta', ['class'=>'col-sm-8']) !!}</td>
			<td>{!! Form::text('jilid_warta',null,['class'=>'form-control col-sm-6']) !!}</td>
		</tr>
		<tr>
			<td>{!! Form::label('no_warta', 'No.Warta', ['class'=>'col-sm-8']) !!}</td>
			<td>{!! Form::text('no_warta',null,['class'=>'form-control col-sm-6']) !!}</td>
		</tr>
		<tr>
			<td>{!! Form::label('rujukan', 'Rujukan', ['class'=>'col-sm-8']) !!}</td>
			<td>{!! Form::text('rujukan',null,['class'=>'form-control col-sm-6']) !!}</td>
		</tr>
		<tr>
			<td>{!! Form::label('catatan', 'Catatan', ['class'=>'col-sm-8']) !!}</td>
			<td>{!! Form::text('catatan',null,['class'=>'form-control col-sm-6']) !!}</td>
		</tr>
		<tr>
			<td colspan="2" align="right">{{ Form::submit('Kemaskini', ['class' => 'btn btn-primary']) }}</td>
		</tr>
	{!! Form::close() !!}

@endsection