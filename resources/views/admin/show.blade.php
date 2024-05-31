@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Add New Product</h2>
            </div>
            
        </div>
    </div>
    <div class="row" style="padd">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong><br>
               {{ $page->name}} 
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Slug:</strong><br>
                {{ $page->slug }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12" >
            <div class="form-group" >
                <strong>Body:</strong><br>
                {!! $page->body !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Feature_Image:</strong><br>
                <img src="/images/{{ $page->feature_image }}" width="500px" height="200px">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Meta_Title:</strong><br>
                {{ $page->meta_title }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Meta_Description:</strong><br>
                {{ $page->meta_description }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Meta_Keyword:</strong><br>
                {{ $page->meta_keyword }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Status:</strong><br>
                {{ $page->status }}
            </div>
        </div>
    </div>
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