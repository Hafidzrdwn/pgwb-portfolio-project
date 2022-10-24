@extends('layouts.admin', ['title' => 'Master Kontak'])

@section('header', 'Master Kontak')

@section('content')
<div class="row pb-5">
  <div class="col-md-6">
    <div class="card">
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
                  <a href="#" onclick="showKontaks('{{ route('kontak.show', $siswa->id) }}', event)" class="btn-show-projeks btn btn-sm btn-primary btn-circle">
                    <i class="fas fa-phone"></i>
                  </a>
                  <a href="{{ route('projek.create') }}?siswa={{ $siswa->id }}" class="btn btn-sm btn-success btn-circle">
                    <i class="fas fa-plus"></i>
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
  <div class="col-md-6">
    <div class="card">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Kontak Siswa</h6>
      </div>
      <div class="card-body" id="kontaks">
        <h6 class="text-center">Pilih siswa terlebih dahulu cuy</h6>
      </div>
    </div>
  </div>
</div>
@endsection

@section('script')
<script>
  $(document).ready(function() {
    window.showKontaks = function(href, e) {
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
          console.log(data)
          // $('#projeks').html(data)
        }
      });

    };
  })

</script>
@endsection
