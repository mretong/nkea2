@extends('layouts.members')

@section('content')


	<a href="{{ route('members.aduan.create') }}"><button class="btn btn-success">Tambah Aduan</button></a><br /><br />

	@include('messages._success')

	<table class="table table-bordered table-striped">
		<thead>
			<th colspan="5"><h4>Senarai Aduan</h4></th>
		</thead>
		<tr>
			<td><center><strong>Bil</strong></center></td>
			<td><center><strong>Tarikh Terima</strong></center></td>
			<td><center><strong>No.Lot & No.Hakmilik</strong></center></td>
			<td><center><strong>Status Aduan</strong></center></td>
			<td><center><strong>Pilihan</strong></center></td>
		</tr>

		@forelse ($complaints as $complaint)
		    <tr>
				<td><center>{{ $loop->iteration }}</td>
				<td><center>{{ $complaint->tarikh_terima }}</td>
				<td><center>{{ $complaint->lot->no_lot }} - {{ $complaint->lot->no_hakmilik }} </td>
				<td><center>{{ $complaint->status->nama }}</td>
				
				<td><center>					
					
					<a href="{{ route('members.aduan.hapus', ['id' => $complaint->id]) }}"><button class="btn btn-danger">Hapus</button></a>
				</center></td>
								
			</tr>	
		@empty
		    <tr>
		    	<td colspan="5"><font color="red">No Data</font></td>
		    </tr>
		@endforelse

		@if($complaints->count() > 10)
			<tr>
				<td colspan="5" align="center">{{ $complaints->render() }}</td>
			</tr>
		@endif

	</table>

@endsection