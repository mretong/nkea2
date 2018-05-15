@extends('layouts.members')

@section('content')


	<a href="{{ route('members.borangk.create') }}"><button class="btn btn-success">Tambah BorangK</button></a><br /><br />

	@include('messages._success')

	<table class="table table-bordered table-striped">
		<thead>
			<th colspan="5"><h4>Senarai Borang-K</h4></th>
		</thead>
		<tr>
			<td><center><strong>Bil</strong></center></td>
			<td><center><strong>Blok</strong></center></td>
			<td><center><strong>No.Lot</strong></center></td>
			<td><center><strong>Tarikh Borang-K</strong></center></td>
			<td><center><strong>Pilihan</strong></center></td>
		</tr>

		@forelse ($kforms as $kform)
		    <tr>
				<td><center>{{ $loop->iteration }}</td>
				<td><center>{{ $kform->nama }}</td>
				<td><center>{{ $kform->kod }}</td>
				<td><center>{{ $kform->wilayah->nama }}</td>
				
				<td><center>					
					<a href="{{ route('members.borangk.hapus', ['id' => $borangk->id]) }}"><button class="btn btn-danger">Hapus</button></a>
				</center></td>
								
			</tr>	
		@empty
		    <tr>
		    	<td colspan="5"><font color="red">No Data</font></td>
		    </tr>
		@endforelse

		@if($kforms->count() > 10)
			<tr>
				<td colspan="5" align="center">{{ $kforms->render() }}</td>
			</tr>
		@endif

	</table>

@endsection