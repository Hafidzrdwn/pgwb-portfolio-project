@extends('layouts.admin', ['title' => 'Master Projek'])

@section('header', 'Master Projek')

@section('content')
@if($msg = Session::get('success'))
<div class="row">
  <div class="col-md-12">
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      {!! $msg !!}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  </div>
</div>
@endif
<div class="row mb-5">
  <div class="col-md-5">
    <div class="card shadow">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Siswa</h6>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-striped table-bordered table-hover w-100">
            <thead>
              <tr class="text-nowrap">
                <th>Nisn</th>
                <th>Nama</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody id="table-siswa">
              @forelse ($siswas as $siswa)
              <tr>
                <td>{{ $siswa->nisn }}</td>
                <td class="text-nowrap">{{ $siswa->nama }}</td>
                <td class="text-nowrap">
                  <a href="#" onclick="showProjeks('{{ route('projek.show', $siswa->id) }}', event)" class="btn-show-projeks btn btn-sm btn-primary btn-circle">
                    <i class="fas fa-folder-open"></i>
                  </a>
                  <a href="{{ route('projek.create') }}?siswa={{ $siswa->id }}" class="btn btn-sm btn-success btn-circle">
                    <i class="fas fa-folder-plus"></i>
                  </a>
                </td>
              </tr>
              @empty
              <tr>
                <td colspan="3" class="text-center">Tidak ada data siswa.</td>
              </tr>
              @endforelse
            </tbody>
          </table>
          {{ $siswas->links() }}
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-7">
    <div class="card shadow">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Projek Siswa</h6>
      </div>
      <div class="card-body" id="projeks">
        <h6 class="text-center">Pilih siswa terlebih dahulu cuy</h6>
      </div>
    </div>
  </div>
</div>
@endsection

@section('script')
<script>
  $(document).ready(function() {

    window.showProjeks = function(href, e) {
      e.preventDefault();

      $.ajax({
        url: href
        , method: 'GET'
        , beforeSend: function() {
          $('#projeks').html(

            `
            <div class="text-center mt-3">
              <div class="spinner-border text-primary" role="status">
                <span class="sr-sm">
                  <span class="sr-only">Loading...</span>
                </span>
              </div>
              <p class="text-primary mt-3">Loading...</p>
            </div>

          `
          );
        }
        , success: function(data) {
          // console.log(data)
          $('#projeks').html(data)
        }
      });

    };

  });

</script>
@endsection
