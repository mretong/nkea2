@extends('layouts.members')

@section('content')


	<a href="{{ route('members.bank.create') }}"><button class="btn btn-success">Tambah Bank</button></a><br /><br />

	@include('messages._success')

	<table class="table table-bordered table-striped">
		<thead>
			<th colspan="4"><h4>Senarai Bank</h4></th>
		</thead>
		<tr>
			<td><center><strong>Bil</strong></center></td>
			<td><center><strong>Bank</strong></center></td>
			<td><center><strong>Singkatan</strong></center></td>
			<td><center><strong>Pilihan</strong></center></td>
		</tr>

		@forelse ($banks as $bank)
		    <tr>
				<td><center>{{ $loop->iteration }}</td>
				<td><center>{{ $bank->nama }}</td>
				<td><center>{{ $bank->kod }}</td>
				
				<td><center>
					<a href="{{ route('members.bank.show', ['id' => $bank->id]) }}"><button class="btn btn-info">Kemaskini</button></a>
					<a href="{{ route('members.bank.hapus', ['id' => $bank->id]) }}" onclick="return myFunction();"><button class="btn btn-danger">Hapus</button></a>
				</center></td>

				<script>
						function myFunction()
						{
							if(!confirm("Are You Sure to delete this data from the system?"))
							event.preventDefault();
						}
					</script>
								
			</tr>	
		@empty
		    <tr>
		    	<td colspan="4"><font color="red">No Data</font></td>
		    </tr>
		@endforelse

		@if($banks->count() > 10)
			<tr>
				<td colspan="4" align="center">{{ $banks->render() }}</td>
			</tr>
		@endif

	</table>

@endsection