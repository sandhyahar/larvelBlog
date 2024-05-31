@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
   
@stop

@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New Page</h2>
        </div>
        
    </div>
</div>
   
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
   
<form action="{{ route('pages.store') }}" method="POST" enctype="multipart/form-data" id="myForm" onsubmit="return submitForm()">
    @csrf
  
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                <input type="text" name="name" class="form-control" placeholder="Name" value="{{ old('name') }}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Slug:</strong>
                <input type="text" name="slug" class="form-control" placeholder="Slug" value="{{ old('slug') }}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                
            <div class="card">
               <div class="card-header">
                <strong>Body:</strong>
                </div> 
                <div class="card-body">
                   <textarea id="body" name="body"></textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Featured_Images:</strong>
                <input type="file" name="feature_image" class="form-control" placeholder="Name" value="{{ old('featured_image') }}"> 
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Meta_Title:</strong>
                <input type="text" name="meta_title" class="form-control" placeholder="Name" value="{{ old('meta_title') }}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Meta_Description</strong>
                <textarea class="form-control" style="height:150px" name="meta_description" placeholder="Detail" value="{{ old('meta_description') }}"></textarea>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Meta_Keyword:</strong>
                <input type="text" name="meta_keyword" class="form-control" placeholder="Name" value="{{ old('meta_keyword')}}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Status:</strong>
                <select name="status" id="status">
                    <option value="" disabled selected>Select....</option>
                    <option value="Public">Public</option>
                    <option value="Draft">Draft</option>
                    <option value="Trash">Trash</option>
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
               
                <input type="hidden" name="parent_page" class="form-control">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
   
</form>
<script src="{{ asset('node_modules/tinymce/tinymce.min.js') }}"></script>

<script src="https://cdn.tiny.cloud/1/b1t4icbi4d23s20xwco8p8rso1r2j64gg9joberylzw4yasi/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    tinymce.init({
        selector: '#body',
        plugins: 'code image',
        toolbar: 'undo redo | styleselect | fontsizeselect | bold italic | alignleft aligncenter alignright alignjustify | outdent indent | link image | code',
        menubar: true
    });
    



    
 </script>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop