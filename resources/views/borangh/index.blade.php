@extends('layouts.members')

@section('content')


	<a href="{{ route('members.borangh.create') }}"><button class="btn btn-success">Tambah Pemilik</button></a><br><br>
	<!-- <a href="{{ route('members.borangh.create') }}"><button class="btn btn-success" style="float:right;">Pembayaran</button></a><br /><br /> -->

	@include('messages._success')

	<table class="table table-bordered table-striped">
		<thead>
			<th colspan="5"><h4>Senarai Pemilik</h4></th>
		</thead>
		<tr>
			<td><center><strong>Bil</strong></center></td>
			<td><center><strong>Blok & Lot</strong></center></td>
			<td><center><strong>No.KP</strong></center></td>
			<td><center><strong>Pemilik</strong></center></td>
			<td><center><strong>Pilihan</strong></center></td>
		</tr>

		@forelse ($owners as $owner)
		    <tr>
				<td><center>{{ $loop->iteration }}</td>
				<td><center>{{ $owner->blok->nama }} - {{ $owner->lot->no_lot  }} </td>
				<td><center>{{ $owner->no_kp }}</td>
				<td><center>{{ $owner->nama }}</td>
				
				<td><center>					
					<a href="{{ route('members.borangh.show', ['id' => $owner->id]) }}"><button class="btn btn-info">Kemaskini</button></a>
					<a href="{{ route('members.borangh.hapus', ['id' => $owner->id]) }}"><button class="btn btn-danger">Hapus</button></a>
				</center></td>
								
			</tr>	
		@empty
		    <tr>
		    	<td colspan="5"><font color="red">No Data</font></td>
		    </tr>
		@endforelse

		@if($owners->count() > 10)
			<tr>
				<td colspan="5" align="center">{{ $owners->render() }}</td>
			</tr>
		@endif

	</table>

@endsection