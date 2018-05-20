@extends('layouts.members')

@section('content')


	<a href="{{ route('members.bicara.create') }}"><button class="btn btn-success">Tambah Perbicaraan</button></a><br /><br />

	@include('messages._success')

	<table class="table table-bordered table-striped">
		<thead>
			<th colspan="5"><h4>Senarai Perbicaraan</h4></th>
		</thead>
		<tr>
			<td><center><strong>Bil</strong></center></td>
			<td><center><strong>No.Lot & Hakmilik</strong></center></td>
			<td><center><strong>Nama Pentadbir</strong></center></td>
			<td><center><strong>Status Bicara</strong></center></td>
			<td><center><strong>Pilihan</strong></center></td>
		</tr>

		@forelse ($hearings as $hearing)
		    <tr>
				<td><center>{{ $loop->iteration }}</td>
				<td><center>{{ $hearing->lot->no_lot }}</td>
				<td><center>{{ $hearing->staff->nama }}</td>
				<td><center>{{ $hearing->status->nama }}</td>
				
				<td><center>					
					<a href="{{ route('members.bicara.hapus', ['id' => $hearing->id]) }}"><button class="btn btn-danger">Hapus</button></a>
				</center></td>
								
			</tr>	
		@empty
		    <tr>
		    	<td colspan="5"><font color="red">No Data</font></td>
		    </tr>
		@endforelse

		@if($hearings->count() > 10)
			<tr>
				<td colspan="5" align="center">{{ $hearings->render() }}</td>
			</tr>
		@endif

	</table>

@endsection