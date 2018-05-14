@extends('layouts.members')

@section('content')


	<a href="{{ route('members.warta.index') }}"><button class="btn btn-success">Senarai Warta</button></a><br /><br />

	@include('messages._formErrors')

	{!! Form::open(['route' => 'members.warta.create', 'method' => 'post']) !!}
	<table class="table table-bordered table-striped">
		<tr>
			<thead><th colspan="2"><h4>Tambah Warta</h4></th></thead>
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
			<td>{!! Form::label('kod', 'Jilid Warta', ['class'=>'col-sm-8']) !!}</td>
			<td>{!! Form::text('kod','',['class'=>'form-control col-sm-6']) !!}</td>
		</tr>
		<tr>
			<td>{!! Form::label('kod', 'No.Warta', ['class'=>'col-sm-8']) !!}</td>
			<td>{!! Form::text('kod','',['class'=>'form-control col-sm-6']) !!}</td>
		</tr>
		<tr>
			<td>{!! Form::label('kod', 'Rujukan', ['class'=>'col-sm-8']) !!}</td>
			<td>{!! Form::text('kod','',['class'=>'form-control col-sm-6']) !!}</td>
		</tr>
		<tr>
			<td>{!! Form::label('kod', 'Catatan', ['class'=>'col-sm-8']) !!}</td>
			<td>{!! Form::text('kod','',['class'=>'form-control col-sm-6']) !!}</td>
		</tr>
		
		<tr>
			<td colspan="2" align="right">{{ Form::submit('Tambah Warta', ['class' => 'btn btn-primary']) }}</td>
		</tr>
	{!! Form::close() !!}

@endsection