@extends('layouts.members')


@section('content')

<h1>Menu Mukim</h1>

<hr />

<a href="{{ route('mukim.create') }}" class="btn btn-warning"><b>Tambah Maklumat Mukim Baru</b></a>
<a href="{{ route('setting.index') }}" class="btn btn-warning" style="float: right;"><b>Menu Utama</b></a> 

<hr />

<table class="table table-bordered table-striped">
	<tr>
		<td><center>Bil</td>
		<td><center>Nama</td>
		<td><center>Daerah</td>
		<td><center>Wilayah</td>
		<td><center>Pilihan</td>
	</tr>

	@foreach($mukim as $stay)
	<tr>
		<td><center>{{ $loop->iteration }}</td>
		<td><center>{{ $stay->nama }}</td>
		<td><center>{{ $stay->daerah->nama }}</td>
		<td><center>{{ $stay->wilayah->nama }}</td>

		<td><center>
				{!! Form::open(['route' => ['mukim.destroy', $stay->id], 'method' => 'delete', 'onclick'=>'return myFunction();']) !!}
					{!! Form::submit('Buang', ['class' => 'btn btn-danger']) !!}{!! Form::close() !!}
				{!! Form::open(['route' => ['mukim.show', $stay->id], 'method' => 'get']) !!}
					{!! Form::submit('Kemaskini', ['class' => 'btn btn-primary']) !!}{!! Form::close() !!}

					<script>
						function myFunction()
						{
							if(!confirm("Are You Sure to Delete this data from the system?"))
							event.preventDefault();
						}
					</script>		
	</tr>
	@endforeach

</table>

@endsection