<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link href="https://cdn.jsdelivr.net/npm/froala-editor@latest/css/froala_editor.pkgd.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.0/trix.css">

</head>
<body>
    <div id="app">
        @include('inc.navbar')
        <div class="container py-4">
                <div class="row justify-content-center">
                    <div class="col-md-3">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <a href="{{route('home')}}">Home</a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{route('posts.create')}}">New Posts</a>
                            </li>
                            <li class="list-group-item">
                                    <a href="{{route('posts.index')}}">All Posts</a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{route('posts.trashed')}}">Trash Post</a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{route('category.index')}}">Category</a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{route('category.create')}}">New Category</a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{route('tags.index')}}">Tags</a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{route('tags.create')}}">New Tag</a>
                            </li>
                            @if(Auth::check())
                            <li class="list-group-item">
                                <a href="{{route('user.profile')}}">My Profile</a>
                            </li>
                            @if(Auth::user()->admin)
                                <li class="list-group-item">
                                    <a href="{{route('settings.index')}}">Settings</a>
                                </li>
                            @endif
                            @endif
                        </ul>
                    </div>
                <div class="col-md-9">
                     @yield('content')
                </div>
                </div>
        </div>
     </div>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
     <script>
         @if(Session::has('success'))
         toastr.success(" {{Session::get('success')}} ")
         @endif
         @if(Session::has('info'))
         toastr.info(" {{Session::get('info')}} ")
         @endif
     </script>

      <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
      <script>
          CKEDITOR.replace('article-ckeditor');
      </script>

      <!-- Include Editor JS files. -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/froala-editor@latest/js/froala_editor.pkgd.min.js"></script>

        <!-- Initialize the editor. -->
    <script>
        new FroalaEditor('textarea');
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.0/trix.js"></script>
</body>
</html>
