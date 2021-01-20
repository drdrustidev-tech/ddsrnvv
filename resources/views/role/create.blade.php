@extends('layouts.dashboard')

@section('content')
@if($errors->any())
<div class="alert alert-danger">
 <ul>
  @foreach($errors->all() as $error)
  <li>{{ $error }}</li>
  @endforeach
 </ul>
</div>
@endif
<div align="right">
 <a href="{{ route('role.index') }}" class="btn btn-default">Back</a>
</div>

<form method="post" action="{{ route('role.store') }}" enctype="multipart/form-data">

{{ csrf_field() }}
 <div class="form-group row">
   <label class="col-md-4 text-right">Enter Catagory Name</label>
   <div class="col-md-8">
      <input type="text" name="name" class="form-control input-lg" />
   </div>
 </div>
 

 <div class="form-group row">
   <label class="col-md-4 text-right">Enter Role Description</label>
   <div class="col-md-8">
      <input type="text" name="description" class="form-control input-lg" />
   </div>
 </div>
 
 
 <div class="form-group text-center">
  <input type="submit" name="add" class="btn btn-primary input-lg" value="Add" />
 </div>

</form>

@endsection