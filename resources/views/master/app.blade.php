  @include('master.header')

  @include('master.navbar')

  @include('master.sidebar')

  <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div class="content">
          <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    {{-- <div class="card"> --}}
                      @yield('content')
                    {{-- </div> --}}
                </div>
            </div>
          </div>
        </div>       
    </div>
  <!-- /.content-wrapper -->
@include('master.footer')
@include('master.js')
</body>
</html>