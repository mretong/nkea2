@extends('layouts.members')

@section('content')


	<a href="{{ route('members.wilayah.create') }}"><button class="btn btn-success">Tambah Wilayah</button></a><br /><br />

	@include('messages._success')

	<table class="table table-bordered table-striped">
		<thead>
			<th colspan="5"><h4>Senarai Wilayah</h4></th>
		</thead>
		<tr>
			<td><center><strong>Bil</strong></center></td>
			<td><center><strong>Nama Wilayah</strong></center></td>
			<td><center><strong>Kod Wilayah</strong></center></td>
			<td><center><strong>Daerah</strong></center></td>
			<td><center><strong>Pilihan</strong></center></td>
		</tr>

		@forelse ($territorys as $territory)
		    <tr>
				<td><center>{{ $loop->iteration }}</td>
				<td><center>{{ $territory->nama }}</td>
				<td><center>{{ $territory->kod }}</td>
				<td><center>{{ $territory->daerah->nama }}</td>
				
				<td><center>					
					<a href="{{ route('members.wilayah.hapus', ['id' => $territory->id]) }}"><button class="btn btn-danger">Hapus</button></a>
				</center></td>
								
			</tr>	
		@empty
		    <tr>
		    	<td colspan="5"><font color="red">No Data</font></td>
		    </tr>
		@endforelse

		@if($territorys->count() > 10)
			<tr>
				<td colspan="5" align="center">{{ $territorys->render() }}</td>
			</tr>
		@endif

	</table>

@endsection