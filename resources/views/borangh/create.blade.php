@extends('layouts.members')

@section('content')


	<a href="{{ route('members.borangh.index') }}"><button class="btn btn-success">Senarai Pemilik</button></a><br /><br />

	@include('messages._formErrors')

	{!! Form::open(['route' => 'members.borangh.create', 'method' => 'post']) !!}
	<table class="table table-bordered table-striped">
		<tr>
			<thead><th colspan="2"><h4>Tambah Pemilik</h4></th></thead>
		</tr>
		
		<tr>
			<td>{!! Form::label('nama', 'Blok', ['class'=>'col-sm-4']) !!}</td>
			<td>{{ Form::select('blok_id', $blok, null, ['class' => 'form-control col-sm-8', 'placeholder' => 'Pilih Blok']) }}</td>
		</tr>
		<tr>
			<td>{!! Form::label('nama', 'Lot & No.Hakmilik', ['class'=>'col-sm-6']) !!}</td>
			<td>{{ Form::select('lot', $lot, null, ['class' => 'form-control col-sm-8', 'placeholder' => 'Pilih Lot & No.Hakmilik']) }}</td>
		</tr>
		<tr>
			<td>{!! Form::label('pemilik', 'Nama Pemilik', ['class'=>'col-sm-6']) !!}</td>
			<td>{!! Form::text('nama','',['class'=>'form-control col-sm-8']) !!}</td>
		</tr>
		<tr>
			<td>{!! Form::label('kp', 'No. Kad Pengenalan', ['class'=>'col-sm-6']) !!}</td>
			<td>{!! Form::text('no_kp','',['class'=>'form-control col-sm-8']) !!}</td>
		</tr>
		<tr>
			<td>{!! Form::label('status_terima', 'Status Penerima', ['class'=>'col-sm-6']) !!}</td>
			<td>{{ Form::select('status', $status, null, ['class' => 'form-control col-sm-8', 'placeholder' => 'Pilih Status Penerima']) }}</td>
		</tr>
		<tr>
			<td>{!! Form::label('pecahan', 'Pecahan Bahagian', ['class'=>'col-sm-6']) !!}</td>
			<td>{!! Form::text('bahagian','',['class'=>'form-control col-sm-8']) !!}</td>
		</tr>
		<tr>
			<td>{!! Form::label('tarikh', 'Tarikh Borang H', ['class'=>'form control col-sm-6']) !!}</td>
			<td>{!! Form::date('tarikh_h', \Carbon\Carbon::now(), ['class'=>'form-control col-sm-8']) !!}</td>
		</tr>
		<tr>
			<td>{!! Form::label('tarikh', 'Tarikh Terima Borang H', ['class'=>'form control col-sm-6']) !!}</td>
			<td>{!! Form::date('tarikh_terima', \Carbon\Carbon::now(), ['class'=>'form-control col-sm-8']) !!}</td>
		</tr>
		<tr>
			<td>{!! Form::label('jilid', 'Rujukan JKPTG', ['class'=>'col-sm-6']) !!}</td>
			<td>{!! Form::text('jkptg','',['class'=>'form-control col-sm-8']) !!}</td>
		</tr>
		<tr>
			<td>{!! Form::label('no_warta', 'Rujukan JPS', ['class'=>'col-sm-6']) !!}</td>
			<td>{!! Form::text('jps','',['class'=>'form-control col-sm-8']) !!}</td>
		</tr>
		<tr>
			<td>{!! Form::label('bayaran', 'Kategori Bayaran', ['class'=>'col-sm-6']) !!}</td>
			<td>{{ Form::select('kategori', $kategori, null, ['class' => 'form-control col-sm-8', 'placeholder' => 'Pilih Kategori Bayaran']) }}</td>
		</tr>
		
		<tr>
			<td colspan="2" align="right">{{ Form::submit('Tambah', ['class' => 'btn btn-primary']) }}</td>
		</tr>
	{!! Form::close() !!}

@endsection