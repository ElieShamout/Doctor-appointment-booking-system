<!DOCTYPE html>
<html lang="en">
<head>
    @include('user.head')
</head>
<body>
    @include('user.header')

    <div class="container-fluid page-body-wrapper px-0">
        @yield('content')
    </div>   
</body>
</html>