@extends('layouts.dashboard')

@section('content')
<div align="right">
	<a href="{{ route('page.create') }}" class="btn btn-success btn-sm">Add</a>
</div>
<br />
@if ($message = Session::get('success'))
<div class="alert alert-success">
	<p>{{ $message }}</p>
</div>
@endif

<table class="table table-bordered table-striped">
	<tr>
		<th >ID</th>
		<th >Title</th>
		<th >Catagory</th>
		<th >Created By</th>
		<th>Action</th>
	</tr>
	@foreach($data as $row)
		<tr>
			<td>{{ $row->id }}</td>			
			<td>{{ $row->tittle }}</td>
			<td>{{ $row->catagory_id}}</td>
            <td>{{ $row->created_by}}</td>
			<td>
				
				<form action="{{ route('page.destroy', $row->id) }}" method="post">
					<a href="{{ route('page.show', $row->id) }}" class="btn btn-primary">Show</a>
					<a href="{{ route('page.edit', $row->id) }}" class="btn btn-warning">Edit</a>
                    {{ csrf_field() }}
       {{ method_field('DELETE') }}
					<button type="submit" class="btn btn-danger">Delete</button>
				</form>
			</td>
		</tr>
	@endforeach
</table>








@endsection