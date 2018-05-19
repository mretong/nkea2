@extends('layouts.members')

@section('content')


	<a href="{{ route('members.staff.create') }}"><button class="btn btn-success">Tambah Maklumat Staff</button></a><br /><br />

	@include('messages._success')

	<table class="table table-bordered table-striped">
		<thead>
			<th colspan="5"><h4>Senarai Maklumat Staff</h4></th>
		</thead>
		<tr>
			<td><center><strong>Bil</strong></center></td>
			<td><center><strong>Nama</strong></center></td>
			<td><center><strong>Ptj</strong></center></td>
			<td><center><strong>Pilihan</strong></center></td>
		</tr>

		@forelse ($staffs as $staff)
		    <tr>
				<td><center>{{ $loop->iteration }}</td>
				<td><center>{{ $staff->nama }}</td>
				<td><center>{{ $staff->ptj->nama }}</td>
				
				<td><center>					
					<a href="{{ route('members.staff.hapus', ['id' => $staff->id]) }}"><button class="btn btn-danger">Hapus</button></a>
				</center></td>
								
			</tr>	
		@empty
		    <tr>
		    	<td colspan="5"><font color="red">No Data</font></td>
		    </tr>
		@endforelse

		@if($staffs->count() > 10)
			<tr>
				<td colspan="5" align="center">{{ $staffs->render() }}</td>
			</tr>
		@endif

	</table>

@endsection