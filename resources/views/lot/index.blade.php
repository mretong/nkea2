@extends('layouts.members')

@section('content')


	<a href="{{ route('members.lot.create') }}"><button class="btn btn-success">Tambah Lot</button></a><br /><br />

	@include('messages._success')

	<table class="table table-bordered table-striped">
		<thead>
			<th colspan="5"><h4>Senarai Lot</h4></th>
		</thead>
		<tr>
			<td><center><strong>Bil</strong></center></td>
			<td><center><strong>Blok</strong></center></td>
			<td><center><strong>No.Lot</strong></center></td>
			<td><center><strong>Hakmilik</strong></center></td>
			<td><center><strong>Pilihan</strong></center></td>
		</tr>

		@forelse ($lots as $lot)
		    <tr>
				<td><center>{{ $loop->iteration }}</td>
				<td><center>{{ $lot->blok->nama }}</td>
				<td><center>{{ $lot->no_lot }}</td>
				<td><center>{{ $lot->no_hakmilik }}</td>
				
				<td><center>					
					<a href="{{ route('members.lot.show', ['id' => $lot->id]) }}"><button class="btn btn-info">Kemaskini</button></a>
					<a href="{{ route('members.lot.hapus', ['id' => $lot->id]) }}"><button class="btn btn-danger">Hapus</button></a>
				</center></td>
								
			</tr>	
		@empty
		    <tr>
		    	<td colspan="5"><font color="red">No Data</font></td>
		    </tr>
		@endforelse

		@if($lots->count() > 10)
			<tr>
				<td colspan="5" align="center">{{ $lots->render() }}</td>
			</tr>
		@endif

	</table>

@endsection