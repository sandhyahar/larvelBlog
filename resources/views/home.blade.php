@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
@if ($message = Session::get('success'))
<div class="alert alert-danger btn-sm" role="alert">
    <p>{{ $message }}</p>
</div>
@endif

<h1>Hello Welcom to Admin Dashboard</h1>


@section('content')
	
@endsection
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop