@extends('layouts.members')

@section('content')


	<a href="{{ route('members.daerah.index') }}"><button class="btn btn-success">Senarai Daerah</button></a><br /><br />

	@include('messages._formErrors')

	{!! Form::model($district, ['route' => ['members.daerah.show', $district->id]]) !!}

	<table class="table table-bordered table-striped">
		<tr>
			<thead><th colspan="2"><h4>Kemaskini Daerah</h4></th></thead>
		</tr>
		<tr>
			<td>{!! Form::label('nama', 'Negeri', ['class'=>'col-sm-8']) !!}</td>
			<td>{{ Form::select('negeri_id', $states, null, ['class' => 'form-control col-sm-6', 'placeholder' => 'Pilih Negeri']) }}</td>
		</tr>
		<tr>
			<td width="25%">{!! Form::label('nama', 'Nama Daerah', ['class'=>'form control col-sm-8']) !!}</td>
			<td>{!! Form::text('nama', null,['class'=>'form-control col-sm-6']) !!}</td>
		</tr>
		<tr>
			<td>{!! Form::label('kod', 'Kod Daerah', ['class'=>'form control col-sm-8']) !!}</td>
			<td>{!! Form::text('kod', null,['class'=>'form-control col-sm-6']) !!}</td>
		</tr>
		<tr>
			<td colspan="2" align="right">{{ Form::submit('Kemaskini', ['class' => 'btn btn-primary']) }}</td>
		</tr>
	{!! Form::close() !!}

@endsection