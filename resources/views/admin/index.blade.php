@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Pages <a class="btn btn-info btn-sm" href="{{ route('pages.create') }}">Add Pages</a></h1>
@stop

@section('content')
    <div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
           
        </div>
        <div class="pull-right">
            
        </div>
       
    </div>
</div>

@if ($message = Session::get('success'))
    <div class="alert alert-info btn-sm" role="alert">
        <p>{{ $message }}</p>
    </div>
@endif

<div class="container">
    <a href="{{ route('pages.all') }}">All |   </a><a href="{{ route('pages.public') }}">Published |</a><a href="{{ route('pages.draf') }}">Draft</a>
<table class="table table-border table-hover">
    <tr>
        {{-- <th>Id</th> --}}
        <th>
            <form action="#" id="my-form">
                
              <select name="option" id="option">
                    <option value="" selected>Bulk Action</option>
                    <option value="Draf">Draft</option>
                    <option value="Draf">Trash</option>
               </select> 
               <button type="submit" class="btn btn-info btn-sm">Apply</button>
                </form>
        </th>
        <th>Name</th>
        <th>Slug</th>
        {{-- <th>Body</th>
        <th>Featured_Images</th>
        <th>Meta_Title</th>
        <th>Meta_Description</th>
        <th>Meta_Keyword</th> --}}
        <th>Status</th>
        <th>Action</th>
        {{-- <th width="280px">Action</th> --}}
    </tr>
    @foreach ($pages as $page)
    <tr>
        {{-- <td>{{ $id }}</td> --}}
        <td>  <input type="checkbox" name="items[]" value="{{ $page->id }}"></td>
        <td>{{ $page->name }}</td>
        <td>{{ $page->slug }}</td>
        {{-- <td>{!!$page->body !!}</td>
        <td>{{ $page->meta_title }}</td>
        <td>{{ $page->meta_description}}</td>
        <td>{{ $page->meta_keyword }}</td> --}}
        {{-- <td><img src="/images/{{ $page->feature_image }}" width="100px"></td> --}}
        <td>{{ $page->status}}</td>
        <td>
            <form action="{{ route('pages.destroy',$page->id) }}" method="POST" >

                <a class="btn btn-info" href="{{ route('pages.show',$page->id) }}"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                    <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                    <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                  </svg></a>

                <a class="btn btn-primary" href="{{ route('pages.edit',$page->id) }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
             <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
             <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
            </svg></a>

                @csrf
                @method('DELETE')
  
                <button type="submit" class="btn btn-danger "><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                    <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
                  </svg></button>
            </form>
        </td>
    </tr>
    @endforeach

</table>
</div>
{!! $pages->links() !!} 

  {{-- <script>
    document.getElementById("option").addEventListener("change", function() {
        if (this.value === "Draf") {
            document.getElementById("my-form").submit();
        }
    });
</script> --}}

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop