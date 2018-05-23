@extends('layouts.members')

@section('content')


	<a href="{{ route('members.aduan.index') }}"><button class="btn btn-success">Senarai Aduan</button></a><br /><br />

	@include('messages._formErrors')

	{!! Form::model($aduan, ['route' => ['members.aduan.show', $aduan->id]]) !!}

	<table class="table table-bordered table-striped">
		<tr>
			<thead><th colspan="2"><h4>Kemaskini Aduan</h4></th></thead>
		</tr>
		
		<tr>
			<td width="27%">{!! Form::label('nama', 'No.Aduan', ['class'=>'form control col-sm-8']) !!}</td>
			<td>{!! Form::text('no_aduan',null,['class'=>'form-control col-sm-6']) !!}</td>
		</tr>
		<tr>
			<td>{!! Form::label('tarikh', 'Tarikh Aduan', ['class'=>'col-sm-8']) !!}</td>
			<td>{!! Form::date('tarikh_terima', \Carbon\Carbon::now(), ['class'=>'form-control col-sm-6']) !!}</td>
		</tr>
		<tr>
			<td>{!! Form::label('tarikh', 'Tarikh Jangka Selesai', ['class'=>'col-sm-8']) !!}</td>
			<td>{!! Form::date('tarikh_selesai', \Carbon\Carbon::now(), ['class'=>'form-control col-sm-6']) !!}</td>
		</tr>
		<tr>
			<td>{!! Form::label('kod', 'Masa Terima', ['class'=>'col-sm-8']) !!}</td>
			<td>{!! Form::time('masa_terima',null,['class'=>'form-control col-sm-6','placeholder'=>'example: 1430H']) !!}</td>
		</tr>
		<tr>
			<td>{!! Form::label('staff', 'Staff Terima', ['class'=>'col-sm-8']) !!}</td>
			<td>{{ Form::select('staff_id', $staff, null, ['class' => 'form-control col-sm-6', 'placeholder' => 'Pilih Staff']) }}</td>
		</tr>
		<tr>
			<td>{!! Form::label('blok', 'Blok', ['class'=>'col-sm-8']) !!}</td>
			<td>{{ Form::select('blok_id', $blok, null, ['class' => 'form-control col-sm-6', 'placeholder' => 'Pilih Blok']) }}</td>
		</tr>
		<tr>
			<td>{!! Form::label('lot', 'No.Lot & Hakmilik', ['class'=>'col-sm-8']) !!}</td>
			<td>{{ Form::select('lot_id', $lot, null, ['class' => 'form-control col-sm-6', 'placeholder' => 'Pilih Lot & Hakmilik']) }}</td>
		</tr>
		<tr>
			<td width="27%">{!! Form::label('nama', 'Nama Pengadu', ['class'=>'form control col-sm-8']) !!}</td>
			<td>{!! Form::text('nama_pengadu',null,['class'=>'form-control col-sm-6']) !!}</td>
		</tr>
		<tr>
			<td width="27%">{!! Form::label('nama', 'No.Tel Pengadu', ['class'=>'form control col-sm-8']) !!}</td>
			<td>{!! Form::text('no_tel',null,['class'=>'form-control col-sm-6']) !!}</td>
		</tr>
		<tr>
			<td width="27%">{!! Form::label('nama', 'Catatan', ['class'=>'form control col-sm-8']) !!}</td>
			<td>{!! Form::text('catatan',null,['class'=>'form-control col-sm-6']) !!}</td>
		</tr>
		<tr>
			<td width="27%">{!! Form::label('nama', 'Maklumbalas', ['class'=>'form control col-sm-8']) !!}</td>
			<td>{!! Form::text('maklumbalas',null,['class'=>'form-control col-sm-6']) !!}</td>
		</tr>
		<tr>
			<td>{!! Form::label('nama', 'Status Aduan', ['class'=>'col-sm-8']) !!}</td>
			<td>{{ Form::select('status_aduan_id', $status, null, ['class' => 'form-control col-sm-6', 'placeholder' => 'Pilih Status Aduan']) }}</td>
		</tr>

		<tr>
			<td colspan="2" align="right">{{ Form::submit('Kemaskini', ['class' => 'btn btn-primary']) }}</td>
		</tr>
	{!! Form::close() !!}

@endsection