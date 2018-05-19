@extends('layouts.members')

@section('content')


	<a href="{{ route('members.blok.index') }}"><button class="btn btn-success">Senarai Blok Pengairan</button></a><br /><br />

	@include('messages._formErrors')

	{!! Form::open(['route' => 'members.blok.create', 'method' => 'post']) !!}
	<table class="table table-bordered table-striped">
		<tr>
			<thead><th colspan="2">Tambah Blok</th></thead>
		</tr>
		
		<tr>
			<td width="27%">{!! Form::label('blok', 'Nama Blok', ['class'=>'form control col-sm-8']) !!}</td>
			<td>{!! Form::text('blok','',['class'=>'form-control col-sm-6']) !!}</td>
		</tr>
		<tr>
			<td>{!! Form::label('lot', 'Jumlah Lot Total', ['class'=>'col-sm-8']) !!}</td>
			<td>{!! Form::text('lot','',['class'=>'form-control col-sm-6']) !!}</td>
		</tr>
		<tr>
			<td>{!! Form::label('kos', 'Anggaran Kos', ['class'=>'col-sm-8']) !!}</td>
			<td>{!! Form::text('kos','',['class'=>'form-control col-sm-6']) !!}</td>
		</tr>
		<tr>
			<td>{!! Form::label('lokaliti', 'Lokaliti', ['class'=>'col-sm-8']) !!}</td>
			<td>{{ Form::select('lokaliti_id', $lokaliti, null, ['class' => 'form-control col-sm-6', 'placeholder' => 'Pilih Lokaliti']) }}</td>
		</tr>
		<tr>
			<td>{!! Form::label('fasa', 'Fasa', ['class'=>'col-sm-8']) !!}</td>
			<td>{{ Form::select('fasa_id', $fasa, null, ['class' => 'form-control col-sm-6', 'placeholder' => 'Pilih Fasa']) }}</td>
		</tr>
		<tr>
			<td>{!! Form::label('pakej', 'Pakej', ['class'=>'col-sm-8']) !!}</td>
			<td>{{ Form::select('pakej_id', $pakej, null, ['class' => 'form-control col-sm-6', 'placeholder' => 'Pilih Pakej']) }}</td>
		</tr>
		<tr>
			<td colspan="2" align="right">{{ Form::submit('Tambah Blok', ['class' => 'btn btn-primary']) }}</td>
		</tr>
	{!! Form::close() !!}

@endsection