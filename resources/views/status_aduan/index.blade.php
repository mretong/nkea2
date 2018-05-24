@extends('layouts.members')

@section('content')


	<a href="{{ route('members.status_aduan.create') }}"><button class="btn btn-success">Tambah Status Aduan</button></a><br /><br />

	@include('messages._success')

	<table class="table table-bordered table-striped">
		<thead>
			<th colspan="4"><h4>Senarai Status Aduan</h4></th>
		</thead>
		<tr>
			<td><center><strong>Bil</strong></center></td>
			<td><center><strong>Status</strong></center></td>
			<td><center><strong>Kod</strong></center></td>
			<td><center><strong>Pilihan</strong></center></td>
		</tr>

		@forelse ($comps as $comp)
		    <tr>
				<td><center>{{ $loop->iteration }}</td>
				<td><center>{{ $comp->nama }}</td>
				<td><center>{{ $comp->kod }}</td>
				
				<td><center>
					<a href="{{ route('members.status_aduan.show', ['id' => $comp->id]) }}"><button class="btn btn-info">Kemaskini</button></a>
					<a href="{{ route('members.status_aduan.hapus', ['id' => $comp->id]) }}" onclick="return myFunction();"><button class="btn btn-danger">Hapus</button></a>
					<script>
						function myFunction()
						{
							if(!confirm("Are You Sure to delete this data from the system?"))
							event.preventDefault();
						}
					</script>
				</center></td>
								
			</tr>	
		@empty
		    <tr>
		    	<td colspan="4"><font color="red">No Data</font></td>
		    </tr>
		@endforelse

		@if($comps->count() >= 10 || $comps->count() <= 10)
			<tr>
				<td colspan="4" align="center">{{ $comps->render() }}</td>
			</tr>
		@endif

	</table>

@endsection