  <!DOCTYPE html>
  <html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Web Portfolio - {{ $title }}</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('template/vendor/datatables/dataTables.bootstrap4.css') }}" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('template/css/sb-admin-2.css') }}" rel="stylesheet" type="text/css">

    <style>
      #preview-image-before-upload,
      .image-show {
        cursor: pointer;
      }

      form label {
        color: #5a5c69 !important;
      }

      textarea {
        resize: none !important;
      }

      .link-kontak {
        transition: .3s;
      }

      .link-kontak:hover {
        color: #4e73df !important;
      }

    </style>


  </head>

  <body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

      @include('partials.admin.sidebar')

      <!-- Content Wrapper -->
      <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

          @include('partials.admin.topbar')

          <!-- Begin Page Content -->
          <div class="container-fluid">
            <h1 class="h3 mb-4 text-gray-800">@yield('header')</h1>
            @yield('content')

          </div>
          <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        @include('partials.admin.footer')

      </div>
      <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <form method="POST" action="{{ route('logout') }}">
              @csrf
              <button type="submit" class="btn btn-danger">Logout</button>
            </form>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal Review Foto -->
    <div class="modal fade" id="modalFoto" tabindex="-1" aria-labelledby="modalFotoLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title text-dark" id="modalFotoLabel">Review Foto</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="row justify-content-center align-items-center">
              <div class="col-md-12">
                <img id="review-foto" class="w-100" src="" alt="review foto">
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="https://kit.fontawesome.com/2e160f1ac0.js" crossorigin="anonymous"></script>

    <script src="{{ asset('template/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('template/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('template/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('template/js/sb-admin-2.min.js') }}"></script>

    <script src="{{ asset('template/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('template/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('template/js/demo/datatables-demo.js') }}"></script>
    <script type="application/javascript">
      $('#dt').dataTable({
        "jQueryUI": true
        , "scrollX": true
      });

      $('input[type="file"]').change(function(e) {
        let fileName = e.target.files[0].name;
        $('.custom-file-label').html(fileName);
      });

      $('#foto').change(function() {

        let reader = new FileReader();

        reader.onload = (e) => {

          $('#preview-image-before-upload').attr('src', e.target.result);
        }

        reader.readAsDataURL(this.files[0]);

      });

      $('#preview-image-before-upload, .image-show').on('click', function() {
        $('#review-foto').attr('src', $(this).attr('src'));
      });

    </script>
    @yield('script')
    {{-- <!-- Page level plugins -->
    <script src="{{ asset('template/vendor/chart.js/Chart.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('template/js/demo/chart-area-demo.js') }}"></script>
    <script src="{{ asset('template/js/demo/chart-pie-demo.js') }}"></script> --}}

  </body>

  </html>
