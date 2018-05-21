@extends('layouts.members')

@section('content')


	<a href="{{ route('members.borangh.index') }}"><button class="btn btn-success">Senarai Pemilik</button></a><br /><br />

	@include('messages._formErrors')

	{!! Form::model($kform, ['route' => ['members.borangh.show', $kform->id]]) !!}

	<table class="table table-bordered table-striped">
		<tr>
			<thead><th colspan="2"><h4>Kemaskini Pemilik</h4></th></thead>
		</tr>
		<tr>
			<td width="27%">{!! Form::label('blok', 'Nama Blok', ['class'=>'form control col-sm-8']) !!}</td>
			<td>{{ Form::select('blok_id', $blok, null, ['class' => 'form-control col-sm-6', 'placeholder' => 'Pilih Blok']) }}</td>
		</tr>
		<tr>
			<td width="27%">{!! Form::label('lot', 'No.Lot & Hakmilik', ['class'=>'form control col-sm-8']) !!}</td>
			<td>{{ Form::select('lot_id', $lot, null, ['class' => 'form-control col-sm-6', 'placeholder' => 'Pilih Lot & Hakmilik']) }}</td>
		</tr>
		<tr>
			<td width="27%">{!! Form::label('nama', 'Tarikh Borang-K', ['class'=>'form control col-sm-8']) !!}</td>
			<td>{!! Form::date('tarikh_k', \Carbon\Carbon::now(), ['class'=>'form-control col-sm-6']) !!}</td>
		</tr>
		<tr>
			<td width="27%">{!! Form::label('nama', 'Tarikh Terima', ['class'=>'form control col-sm-8']) !!}</td>
			<td>{!! Form::date('tarikh_terima', \Carbon\Carbon::now(), ['class'=>'form-control col-sm-6']) !!}</td>
		</tr>
		<tr>
			<td>{!! Form::label('kod', 'Rujukan JKPTG', ['class'=>'col-sm-8']) !!}</td>
			<td>{!! Form::text('rujukan_jkptg',null,['class'=>'form-control col-sm-6']) !!}</td>
		</tr>
		<tr>
			<td>{!! Form::label('kod', 'Rujukan JPS', ['class'=>'col-sm-8']) !!}</td>
			<td>{!! Form::text('rujukan_jps',null,['class'=>'form-control col-sm-6']) !!}</td>
		</tr>
		<tr>
			<td>{!! Form::label('kod', 'Rujukan Fail', ['class'=>'col-sm-8']) !!}</td>
			<td>{!! Form::text('rujukan_fail',null,['class'=>'form-control col-sm-6']) !!}</td>
		</tr>
		<tr>
			<td>{!! Form::label('kod', 'Attachment', ['class'=>'col-sm-8']) !!}</td>
		</tr>
		<tr>
			<td colspan="2" align="right">{{ Form::submit('Kemaskini', ['class' => 'btn btn-primary']) }}</td>
		</tr>
	{!! Form::close() !!}

@endsection