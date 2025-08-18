@include('admin.layouts.header')
<body>
  <div class="container-fluid">
    <div class="row">
      @include('admin.layouts.sidebar')
      <main class="col-md-10 p-4">
      @yield('content')
      </main>
    </div>
  </div>
</body>
