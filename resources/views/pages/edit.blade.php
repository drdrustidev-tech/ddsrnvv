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
 <a href="{{ route('page.index') }}" class="btn btn-default">Back</a>
</div>

<form method="post" action="{{ route('page.update', $data->id) }}" enctype="multipart/form-data">

{{ csrf_field() }}
{{ method_field('PUT') }}
 
<div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Tittle:</strong>
                    <input type="text" name="tittle" value="{{ $data->tittle }}" class="form-control" placeholder="Name">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Catagory:</strong>
                    <input type="text" name="catagory_id" value="{{ $data->catagory_id }}" class="form-control" placeholder="Name">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Body:</strong>
                    <textarea class="form-control" style="height:50px" name="body">
                   
                    {!!html_entity_decode($data->body)!!}</textarea>
                </div>
            </div>

            
            
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </div>

</form>

@endsection
@section('script')
<script type="text/javascript" src="{{ asset('node_modules/tinymce/tinymce.js') }}"></script>
<script type="text/javascript">
    tinymce.init({
        selector:'textarea',
        height : "400"
        
    });
</script>
@endsection