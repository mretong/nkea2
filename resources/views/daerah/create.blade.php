@extends('layouts.members')

@section('content')


	<a href="{{ route('members.daerah.index') }}"><button class="btn btn-success">Senarai Daerah</button></a><br /><br />

	@include('messages._formErrors')

	{!! Form::open(['route' => 'members.daerah.create', 'method' => 'post']) !!}
	<table class="table table-bordered table-striped">
		<tr>
			<thead><th colspan="2">Tambah Daerah</th></thead>
		</tr>
		<tr>
			<td>{!! Form::label('nama', 'Nama Daerah', ['class'=>'col-sm-6']) !!}</td>
			<td>{{ Form::select('negeri_id', $states, null, ['class' => 'form-control', 'placeholder' => 'Pilih Negeri']) }}</td>
		</tr>
		<tr>
			<td width="27%">{!! Form::label('nama', 'Nama Daerah', ['class'=>'form control col-sm-6']) !!}</td>
			<td>{!! Form::text('nama','',['class'=>'form-control col-sm-6']) !!}</td>
		</tr>
		<tr>
			<td>{!! Form::label('kod', 'Kod Daerah', ['class'=>'col-sm-6']) !!}</td>
			<td>{!! Form::text('kod','',['class'=>'form-control col-sm-6']) !!}</td>
		</tr>
		<tr>
			<td colspan="2" align="right">{{ Form::submit('Tambah Daerah', ['class' => 'btn btn-primary']) }}</td>
		</tr>
	{!! Form::close() !!}

@endsection