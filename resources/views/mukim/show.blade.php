@extends('layouts.members')

@section('content')

<h1>Kemaskini Maklumat Mukim</h1>

<hr />

{!! Form::model($stay, ['route' => ['mukim.update', $stay->id], 'method' => 'PATCH']) !!}

	<div class="form-group row">
		{!! Form::label('nama', 'Nama Mukim',['class'	=>	'form control col-sm-2']) !!}
		{!! Form::text('nama', null, ['class' => 'form-control col-sm-6' ]) !!}
	</div>

	<div class="form-group row">
		{!! Form::label('geran', 'No. Geran',['class'	=>	'form control col-sm-2']) !!}
		{!! Form::text('geran', null, ['class' => 'form-control col-sm-6']) !!}
	</div>

	<div class="form-group row">
		{!! Form::label('daerah', 'Daerah', ['class'=>'form control col-sm-2']) !!}
		{!! Form::select('id_daerah',$daerah, null, ['class'=>'form-control col-sm-6']) !!}
	</div>

	<div class="form-group row">
		{!! Form::label('wilayah', 'Wilayah', ['class'=>'form control col-sm-2']) !!}
		{!! Form::select('id_wilayah',$wilayah, null, ['class'=>'form-control col-sm-6']) !!}
	</div>

	<div class="form-group">
		{!! Form::submit('Kemaskini', ['class' => 'btn btn-primary']) !!}
		[ <a href="{{ route('mukim.index') }}">Kembali</a> ] 
	</div>


{!! Form::close() !!}
<hr />
@endsection