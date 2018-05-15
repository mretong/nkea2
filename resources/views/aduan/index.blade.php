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
			<td><center><strong>No.Lot</strong></center></td>
			<td><center><strong>Status Aduan</strong></center></td>
			<td><center><strong>Pilihan</strong></center></td>
		</tr>

		@forelse ($reports as $report)
		    <tr>
				<td><center>{{ $loop->iteration }}</td>
				<td><center>{{ $report->tarikh_terima }}</td>
				<td><center>{{ $report->lot_id }}</td>
				<td><center>{{ $report->status_aduan_id }}</td>
				
				<td><center>					
					<a href="#"><button class="btn btn-primary">Kemaskini</button></a>
					<a href="{{ route('members.aduan.hapus', ['id' => $aduan->id]) }}"><button class="btn btn-danger">Hapus</button></a>
				</center></td>
								
			</tr>	
		@empty
		    <tr>
		    	<td colspan="5"><font color="red">No Data</font></td>
		    </tr>
		@endforelse

		@if($reports->count() > 10)
			<tr>
				<td colspan="5" align="center">{{ $reports->render() }}</td>
			</tr>
		@endif

	</table>

@endsection