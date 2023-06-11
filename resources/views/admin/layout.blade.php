<!DOCTYPE html>
<html lang="en">
  <head>
    
    @include('admin.componants.head')

    @yield('style')
  
  </head>
  <body>
    <div class="container-scroller">
      
      @include('admin.componants.sidebar')
      @include('admin.componants.navbar')
      <div class="container-fluid page-body-wrapper">
        @yield('content')
      </div>
    </div>
    @include('admin.componants.script')
  </body>
</html>