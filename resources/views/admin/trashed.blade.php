@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Trash Pages</h1>
@stop

@section('content')
    <div class="row">
    <div class="col-lg-12 margin-tb">
       
@if ($message = Session::get('success'))
    <div class="alert alert-info btn-sm" role="alert">
        <p>{{ $message }}</p>
    </div>
@endif

<div class="container">
<table class="table table-secondary table-hover">
    <tr>
        {{-- <th>Id</th> --}}
        <th>Name</th>
        <th>Slug</th>
        {{-- <th>Body</th>
        <th>Featured_Images</th>
        <th>Meta_Title</th>
        <th>Meta_Description</th>
        <th>Meta_Keyword</th> --}}
        <th>Status</th>
        {{-- <th>Action</th> --}}
        <th width="280px">Action</th>
    </tr>
    @foreach ($pages as $page)
    <tr>
        {{-- <td>{{ $id }}</td> --}}
        <td>{{ $page->name }}</td>
        <td>{{ $page->slug }}</td>
        {{-- <td>{!!$page->body !!}</td>
        <td>{{ $page->meta_title }}</td>
        <td>{{ $page->meta_description}}</td>
        <td>{{ $page->meta_keyword }}</td> --}}
        {{-- <td><img src="/images/{{ $page->feature_image }}" width="100px"></td> --}}
        <td>{{ $page->status}}</td>
        <td>
            <form action="{{ route('pages.trashed.destroy',$page->id) }}" method="POST">
               @csrf
                <button type="submit" class="btn btn-danger" onclick="return confirm('Ary you sure')" >ForseDelete<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                    <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
                  </svg></button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
</div>
{{-- {!! $pages->links() !!} --}}
  

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop