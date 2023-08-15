<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css')}}">
    <script src="{{asset('/docs/5.3/assets/js/color-modes.js')}}"></script>


    <title>@yield('title')</title>
</head>
<body>
    <header class="p-3 text-bg-dark">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                    <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"></use></svg>
                </a>

                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li><a href="{{route('site.main')}}" class="nav-link px-2 text-white">
                    @if(Auth::user() !== null)
                    Home
                    @else
                    Main
                    @endif
                    </a></li>
                    <li><a href="{{route('socials.about')}}" class="nav-link px-2 text-white">About</a></li>
                    <li><a href="{{route('socials.contacts')}}" class="nav-link px-2 text-white">Contacts</a></li>
                    @can('view', auth()->user())
                    <li><a href="{{route('admin.index')}}" class="nav-link px-2 text-white">Admin</a></li>
                    @endcan
                </ul>

                <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search">
                    <input type="search" class="form-control form-control-dark text-bg-dark" placeholder="Search..." aria-label="Search">
                </form>

                <div class="text-end">
                @if(Auth::user() !== null)
                    <div class="dropdown text-end">
                        <a href="#" class="d-block link-body-emphasis text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="{{auth()->user()->avatar}}" alt="avatar" width="32" height="32" class="rounded-circle">
                        </a>
                        <ul class="dropdown-menu text-small">
                            <li><a class="dropdown-item" href="{{route('posts.create')}}">New post</a></li>
                            <li><a class="dropdown-item" href="{{route('users.settings')}}">Settings</a></li>
                            <li><a class="dropdown-item" href="{{route('users.profile', Auth::user())}}">Profile</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form action="{{route('auth.logout')}}" method="post">
                                    @csrf
                                    <button type="submit" class="dropdown-item">Logout</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                @else
                    <a type="button" class="btn btn-outline-light me-2" href="{{route('auth.login')}}">Login</a>
                    <a type="button" class="btn btn-warning" href="{{route('auth.register')}}">Register</a>
                @endif
                </div>
            </div>
        </div>
    </header>
    <br><br><br><br>
    <div class="container">
        @yield('content')
    </div>
</body>
<script type="text/javascript" src="{{asset('https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js')}}"></script>
</html><br><br><br><br>