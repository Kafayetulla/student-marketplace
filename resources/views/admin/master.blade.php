<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>Admin | @yield('title')</title>

      @include('admin.includes.head')
      @yield('customStyle')
      <!-- Layout styles -->
      <link rel="stylesheet" href="{{asset('admin/assets/css/style.css')}}">
  </head>
  <body>
  @include('sweetalert::alert');
  <div class="container-scroller">
      @include('admin.includes.sidebar')
      <div class="container-fluid page-body-wrapper">
          @include('admin.includes.navbar')
          <div class="main-panel">
              <div class="content-wrapper">
                  @if(session()->has('message'))
                      <div class="alert alert-success">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                          {{session()->get('message')}}
                      </div>
                  @endif
                  @if ($errors->any())
                      <div class="alert alert-danger">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                          <ul>
                              @foreach ($errors->all() as $error)
                                  <li>{{ $error }}</li>
                              @endforeach
                          </ul>
                      </div>
                  @endif
                  @yield('content')
              </div>
              @include('admin.includes.footer')
          </div>
          <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  @include('admin.includes.scripts')
  @yield('customScripts')
  </body>
</html>
