@extends('layouts.members')

@section('content')


	<a href="{{ route('members.bicara.index') }}"><button class="btn btn-success">Senarai Perbicaraan</button></a><br /><br />

	@include('messages._formErrors')

	{!! Form::open(['route' => 'members.bicara.create', 'method' => 'post']) !!}
	<table class="table table-bordered table-striped">
		<tr>
			<thead><th colspan="2"><h4>Tambah Perbicaraan</h4></th></thead>
		</tr>
		
		<tr>
			<td>{!! Form::label('nama', 'Daerah', ['class'=>'col-sm-6']) !!}</td>
			<td>{{ Form::select('daerah_id', $daerah, null, ['class' => 'form-control col-sm-6', 'placeholder' => 'Pilih Daerah']) }}</td>
		</tr>
		<tr>
			<td>{!! Form::label('nama', 'Mukim', ['class'=>'col-sm-6']) !!}</td>
			<td>{{ Form::select('mukim_id', $mukim, null, ['class' => 'form-control col-sm-6', 'placeholder' => 'Pilih Mukim']) }}</td>
		</tr>
		<tr>
			<td>{!! Form::label('nama', 'Blok', ['class'=>'col-sm-6']) !!}</td>
			<td>{{ Form::select('blok_id', $blok, null, ['class' => 'form-control col-sm-6', 'placeholder' => 'Pilih Blok']) }}</td>
		</tr>
		<tr>
			<td>{!! Form::label('nama', 'Lot', ['class'=>'col-sm-6']) !!}</td>
			<td>{{ Form::select('lot_id', $lot, null, ['class' => 'form-control col-sm-6', 'placeholder' => 'Pilih Lot']) }}</td>
		</tr>
		<tr>
			<td>{!! Form::label('tarikh_bicara', 'Tarikh Bicara', ['class'=>'form control col-sm-6']) !!}</td>
			<td>{!! Form::date('tarikh_bicara', \Carbon\Carbon::now(), ['class'=>'form-control col-sm-6']) !!}</td>
		</tr>
		<tr>
			<td>{!! Form::label('nama', 'Pentadbir', ['class'=>'col-sm-6']) !!}</td>
			<td>{{ Form::select('staff_id', $staff, null, ['class' => 'form-control col-sm-6', 'placeholder' => 'Pilih Pentadbir']) }}</td>
		</tr>
		<tr>
			<td>{!! Form::label('nama', 'Status Bicara', ['class'=>'col-sm-6']) !!}</td>
			<td>{{ Form::select('status_id', $status, null, ['class' => 'form-control col-sm-6', 'placeholder' => 'Pilih Status Bicara']) }}</td>
		</tr>
		<tr>
			<td>{!! Form::label('kod', 'Bil. Perbicaraan', ['class'=>'col-sm-8']) !!}</td>
			<td>{!! Form::text('kod','',['class'=>'form-control col-sm-6']) !!}</td>
		</tr>
		<tr>
			<td>{!! Form::label('kod', 'Luas Diambil(Ha)', ['class'=>'col-sm-8']) !!}</td>
			<td>{!! Form::text('kod','',['class'=>'form-control col-sm-6']) !!}</td>
		</tr>
		<tr>
			<td>{!! Form::label('kod', 'Harga/(Ha)', ['class'=>'col-sm-8']) !!}</td>
			<td>{!! Form::text('kod','',['class'=>'form-control col-sm-6']) !!}</td>
		</tr>
		<tr>
			<td>{!! Form::label('kod', 'Bil. Tuan Tanah', ['class'=>'col-sm-8']) !!}</td>
			<td>{!! Form::text('kod','',['class'=>'form-control col-sm-6']) !!}</td>
		</tr>
		<tr>
			<td>{!! Form::label('kod', 'Pampasan (RM)', ['class'=>'col-sm-8']) !!}</td>
			<td>{!! Form::text('kod','',['class'=>'form-control col-sm-6']) !!}</td>
		</tr>
		<tr>
			<td>{!! Form::label('kod', 'Lain-lain Kos(RM)', ['class'=>'col-sm-8']) !!}</td>
			<td>{!! Form::text('kod','',['class'=>'form-control col-sm-6']) !!}</td>
		</tr>
		<tr>
			<td>{!! Form::label('nama', 'Wakil MADA', ['class'=>'col-sm-6']) !!}</td>
			<td>{{ Form::select('staff_id', $staff, null, ['class' => 'form-control col-sm-6', 'placeholder' => 'Pilih Wakil MADA']) }}</td>
		</tr>
		<tr>
			<td>{!! Form::label('nama', 'Wakil JPS', ['class'=>'col-sm-6']) !!}</td>
			<td>{{ Form::select('staff_id', $staff, null, ['class' => 'form-control col-sm-6', 'placeholder' => 'Pilih Wakil JPS']) }}</td>
		</tr>
		<tr>
			<td>{!! Form::label('kod', 'Jajaran', ['class'=>'col-sm-8']) !!}</td>
			<td>{!! Form::text('kod','',['class'=>'form-control col-sm-6']) !!}</td>
		</tr>
		<tr>
			<td>{!! Form::label('kod', 'Catatan', ['class'=>'col-sm-8']) !!}</td>
			<td>{!! Form::text('kod','',['class'=>'form-control col-sm-6']) !!}</td>
		</tr>
		
		<tr>
			<td colspan="2" align="right">{{ Form::submit('Tambah Perbicaraan', ['class' => 'btn btn-primary']) }}</td>
		</tr>
	{!! Form::close() !!}

@endsection