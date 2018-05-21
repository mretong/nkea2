@extends('layouts.members')

@section('content')


	<a href="{{ route('members.bicara.index') }}"><button class="btn btn-success">Senarai Perbicaraan</button></a><br /><br />

	@include('messages._formErrors')

	{!! Form::model($hears, ['route' => ['members.bicara.show', $hears->id]]) !!}

	<table class="table table-bordered table-striped">
		<tr>
			<thead><th colspan="2"><h4>Kemaskini Perbicaraan</h4></th></thead>
		</tr>
		<tr>
			<td>{!! Form::label('daerah', 'Daerah', ['class'=>'col-sm-6']) !!}</td>
			<td>{{ Form::select('daerah_id', $daerah, null, ['class' => 'form-control col-sm-6', 'placeholder' => 'Pilih Daerah']) }}</td>
		</tr>
		<tr>
			<td>{!! Form::label('mukim', 'Mukim', ['class'=>'col-sm-6']) !!}</td>
			<td>{{ Form::select('mukim_id', $mukim, null, ['class' => 'form-control col-sm-6', 'placeholder' => 'Pilih Mukim']) }}</td>
		</tr>
		<tr>
			<td>{!! Form::label('blok', 'Blok', ['class'=>'col-sm-6']) !!}</td>
			<td>{{ Form::select('blok_id', $blok, null, ['class' => 'form-control col-sm-6', 'placeholder' => 'Pilih Blok']) }}</td>
		</tr>
		<tr>
			<td>{!! Form::label('lot', 'Lot', ['class'=>'col-sm-6']) !!}</td>
			<td>{{ Form::select('lot_id', $lot, null, ['class' => 'form-control col-sm-6', 'placeholder' => 'Pilih Lot']) }}</td>
		</tr>
		<tr>
			<td>{!! Form::label('tarikh_bicara', 'Tarikh Bicara', ['class'=>'form control col-sm-6']) !!}</td>
			<td>{!! Form::date('tarikh_1', \Carbon\Carbon::now(), ['class'=>'form-control col-sm-6']) !!}</td>
		</tr>
		<tr>
			<td>{!! Form::label('pentadbir', 'Pentadbir', ['class'=>'col-sm-6']) !!}</td>
			<td>{{ Form::select('staff_id', $staff, null, ['class' => 'form-control col-sm-6', 'placeholder' => 'Pilih Pentadbir']) }}</td>
		</tr>
		<tr>
			<td>{!! Form::label('status', 'Status Bicara', ['class'=>'col-sm-6']) !!}</td>
			<td>{{ Form::select('status_id', $status, null, ['class' => 'form-control col-sm-6', 'placeholder' => 'Pilih Status Bicara']) }}</td>
		</tr>
		<tr>
			<td>{!! Form::label('bil_bicara', 'Bil. Perbicaraan', ['class'=>'col-sm-8']) !!}</td>
			<td>{!! Form::text('bilangan_bicara',null,['class'=>'form-control col-sm-6']) !!}</td>
		</tr>
		<tr>
			<td>{!! Form::label('luas', 'Luas Diambil(Ha)', ['class'=>'col-sm-8']) !!}</td>
			<td>{!! Form::text('luas_ambil',null,['class'=>'form-control col-sm-6']) !!}</td>
		</tr>
		<tr>
			<td>{!! Form::label('rm', 'Harga/(Ha)', ['class'=>'col-sm-8']) !!}</td>
			<td>{!! Form::text('harga_tanah',null,['class'=>'form-control col-sm-6']) !!}</td>
		</tr>
		<tr>
			<td>{!! Form::label('tuan', 'Bil. Tuan Tanah', ['class'=>'col-sm-8']) !!}</td>
			<td>{!! Form::text('bil_pemilik',null,['class'=>'form-control col-sm-6']) !!}</td>
		</tr>
		<tr>
			<td>{!! Form::label('rm', 'Pampasan (RM)', ['class'=>'col-sm-8']) !!}</td>
			<td>{!! Form::text('pampasan',null,['class'=>'form-control col-sm-6']) !!}</td>
		</tr>
		<tr>
			<td>{!! Form::label('rm', 'Lain-lain Kos(RM)', ['class'=>'col-sm-8']) !!}</td>
			<td>{!! Form::text('kos_lain',null,['class'=>'form-control col-sm-6']) !!}</td>
		</tr>
		<tr>
			<td>{!! Form::label('mada', 'Wakil MADA', ['class'=>'col-sm-6']) !!}</td>
			<td>{{ Form::select('wakil_mada', $staff, null, ['class' => 'form-control col-sm-6', 'placeholder' => 'Pilih Wakil MADA']) }}</td>
		</tr>
		<tr>
			<td>{!! Form::label('jps', 'Wakil JPS', ['class'=>'col-sm-6']) !!}</td>
			<td>{{ Form::select('wakil_jps', $staff, null, ['class' => 'form-control col-sm-6', 'placeholder' => 'Pilih Wakil JPS']) }}</td>
		</tr>
		<tr>
			<td>{!! Form::label('kod', 'Jajaran', ['class'=>'col-sm-8']) !!}</td>
			<td>{!! Form::text('jajaran',null,['class'=>'form-control col-sm-6']) !!}</td>
		</tr>
		<tr>
			<td>{!! Form::label('kod', 'Catatan', ['class'=>'col-sm-8']) !!}</td>
			<td>{!! Form::text('catatan',null,['class'=>'form-control col-sm-6']) !!}</td>
		</tr>
		<tr>
			<td colspan="2" align="right">{{ Form::submit('Kemaskini', ['class' => 'btn btn-primary']) }}</td>
		</tr>
		{!! Form::close() !!}
@endsection