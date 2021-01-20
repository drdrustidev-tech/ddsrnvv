@extends('layouts.dashboard')

@section('content')

@if ($message = Session::get('success'))
<div class="alert alert-success">
	<p>{{ $message }}</p>
</div>
@endif

<table class="table table-bordered table-striped">
	<tr>
		<th width="10%">id</th>
		<th width="20%">User Name</th>
		<th width="20%">User Email</th>	
		<th width="40%">User Role</th>	
		<th width="30%">Action</th>
	</tr>
	@foreach($data as $row)
		<tr>
			<td>{{ $row->id }}</td>
			<td>{{ $row->name }}</td>
			<td>{{ $row->email }}</td>	
			<td>
			@foreach($row->roles as $role)			
			{{ $role->name}}
			@endforeach			
			</td>				
			<td>
					<a href="{{ route('asignrole.edit', $row->id) }}" class="btn btn-warning">Asign Role</a>
				
				
			</td>
		</tr>
	@endforeach
</table>








@endsection