<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="{{ $page->meta_keyword }}" content="{{ $page->meta_description }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $page->meta_title }}</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item active">
              <a class="nav-link" href="/home">Home</a>
            </li>
          </ul>
        </div>
      </nav>
   
    <div class="container">
    <header>
        <h1>{{ $page->name}} </h1>  
    </header>
    {!! $page->body !!}
    <img src="/images/{{ $page->feature_image }}" width="500px" height="200px">
</div> 
</body>
</html>