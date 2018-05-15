@extends('layouts.members')

@section('content')


	<a href="{{ route('members.aduan.index') }}"><button class="btn btn-success">Senarai Aduan</button></a><br /><br />

	@include('messages._formErrors')

	{!! Form::open(['route' => 'members.aduan.create', 'method' => 'post']) !!}
	<table class="table table-bordered table-striped">
		<tr>
			<thead><th colspan="2"><h4>Tambah Aduan</h4></th></thead>
		</tr>
		
		<tr>
			<td width="27%">{!! Form::label('nama', 'No.Aduan', ['class'=>'form control col-sm-8']) !!}</td>
			<td>{!! Form::text('nama','',['class'=>'form-control col-sm-6']) !!}</td>
		</tr>
		<tr>
			<td>{!! Form::label('kod', 'Tarikh Aduan', ['class'=>'col-sm-8']) !!}</td>
			<td>{!! Form::date('tarikh_aduan', \Carbon\Carbon::now(), ['class'=>'form-control col-sm-6']) !!}</td>
		</tr>
		<tr>
			<td>{!! Form::label('kod', 'Tarikh Jangka Selesai', ['class'=>'col-sm-8']) !!}</td>
			<td>{!! Form::date('tarikh_selesai', \Carbon\Carbon::now(), ['class'=>'form-control col-sm-6']) !!}</td>
		</tr>
		<tr>
			<td>{!! Form::label('kod', 'Masa Terima', ['class'=>'col-sm-8']) !!}</td>
			<td>{!! Form::time('masa','',['class'=>'form-control col-sm-6','placeholder'=>'example: 1430H']) !!}</td>
		</tr>
		<tr>
			<td>{!! Form::label('nama', 'Staff Terima', ['class'=>'col-sm-8']) !!}</td>
			<td>{{ Form::select('staff_id', $staff, null, ['class' => 'form-control col-sm-6', 'placeholder' => 'Pilih Staff']) }}</td>
		</tr>
		<tr>
			<td>{!! Form::label('nama', 'Blok', ['class'=>'col-sm-8']) !!}</td>
			<td>{{ Form::select('blok_id', $blok, null, ['class' => 'form-control col-sm-6', 'placeholder' => 'Pilih Blok']) }}</td>
		</tr>
		<tr>
			<td>{!! Form::label('nama', 'No.Lot & Hakmilik', ['class'=>'col-sm-8']) !!}</td>
			<td>{{ Form::select('no_lot', $lot, null, ['class' => 'form-control col-sm-6', 'placeholder' => 'Pilih Lot & Hakmilik']) }}</td>
		</tr>
		<tr>
			<td width="27%">{!! Form::label('nama', 'Nama Pengadu', ['class'=>'form control col-sm-8']) !!}</td>
			<td>{!! Form::text('pengadu','',['class'=>'form-control col-sm-6']) !!}</td>
		</tr>
		<tr>
			<td width="27%">{!! Form::label('nama', 'No.Tel Pengadu', ['class'=>'form control col-sm-8']) !!}</td>
			<td>{!! Form::text('no_tel','',['class'=>'form-control col-sm-6']) !!}</td>
		</tr>
		<tr>
			<td width="27%">{!! Form::label('nama', 'Catatan', ['class'=>'form control col-sm-8']) !!}</td>
			<td>{!! Form::text('catatan','',['class'=>'form-control col-sm-6']) !!}</td>
		</tr>
		<tr>
			<td width="27%">{!! Form::label('nama', 'Maklumbalas', ['class'=>'form control col-sm-8']) !!}</td>
			<td>{!! Form::text('m_balas','',['class'=>'form-control col-sm-6']) !!}</td>
		</tr>
		<tr>
			<td>{!! Form::label('nama', 'Status Aduan', ['class'=>'col-sm-8']) !!}</td>
			<td>{{ Form::select('status_id', $status, null, ['class' => 'form-control col-sm-6', 'placeholder' => 'Pilih Status Aduan']) }}</td>
		</tr>
		<tr>
			<td colspan="2" align="right">{{ Form::submit('Tambah Aduan', ['class' => 'btn btn-primary']) }}</td>
		</tr>
	{!! Form::close() !!}

@endsection