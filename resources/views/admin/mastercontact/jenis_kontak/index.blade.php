@extends('layouts.admin', ['title' => 'Jenis Kontak'])

@section('header', 'Jenis Kontak')

@section('content')
@if($msg = Session::get('success'))
<div class="row">
  <div class="col-md-6">
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      {!! $msg !!}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  </div>
</div>
@endif
<div class="row">
  <div class="col-lg-12">
    <div class="card">
      <div class="card-header py-3 row align-items-center justify-content-between">
        <div class="col-md-6">
          <h6 class="m-0 font-weight-bold text-primary">Data Semua Jenis Kontak</h6>
        </div>
        <div class="col-md-6 text-right">
          <button class="btn-tambah-jenis btn btn-success" data-toggle="modal" data-target="#modalCrud"><i class="fas fa-plus-circle mr-1"></i> Tambah Jenis Kontak</button>
        </div>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table w-100 table-striped table-bordered table-hover" id="dt">
            <thead>
              <tr class="text-nowrap">
                <th>No</th>
                <th>Nama</th>
                <th>Icon</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($jenis_kontaks as $jk)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>
                  <h6>{{ $jk->jenis_kontak }}</h6>
                </td>
                <td><i class="h3 fa fa-{{ $jk->jenis_kontak }}"></i></td>
                <td>
                  <a href="#" class="btn-edit-jenis btn btn-primary btn-circle mr-1"><i class="fas fa-edit"></i></a>
                  <form action="{{ route('jenis_kontak.destroy', $jk->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah anda yakin untuk menghapus jenis kontak bernama {{ $jk->jenis_kontak }}??')">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger btn-circle"><i class="fas fa-trash"></i></button>
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal Crud -->
<div class="modal fade" id="modalCrud" tabindex="-1" aria-labelledby="modalCrudLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-dark" id="modalCrudLabel">Tambah Jenis Kontak</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('jenis_kontak.store') }}" method="POST">
          @csrf
          <div class="row justify-content-center align-items-center">
            <div class="col-md-12">
              <label for="jenis_kontak">Nama jenis kontak</label>
              <input type="text" class="form-control" name="jenis_kontak" id="jenis_kontak" placeholder="Masukkan jenis kontak baru..">
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-success" disabled>Tambah</button>
      </div>
      </form>
    </div>
  </div>
</div>

@endsection

@section('script')
<script>
  $(document).ready(function() {
    $('#modalCrud').on('hidden.bs.modal', function() {
      $('#jenis_kontak').val('');
      $('#modalCrud button[type="submit"]').attr('disabled', true);
    });



    // input jenis kontak
    $('#jenis_kontak').on('keyup', function() {
      if ($(this).val().trim()) {
        $('#modalCrud button[type="submit"]').attr('disabled', false);
      } else {
        $('#modalCrud button[type="submit"]').attr('disabled', true);
      }
    });

    $('.btn-tambah-jenis').click(function(e) {
      e.preventDefault();
      $('#modalCrudLabel').text('Tambah Jenis Kontak');
      // set modal button
      $('#modalCrud button[type="submit"]').text('Tambah');

      if ($('#modalCrud button[type="submit"]').hasClass('btn-primary')) {
        $('#modalCrud button[type="submit"]').toggleClass('btn-primary btn-success');
      }

      // set modal form
      $('#modalCrud form').attr('action', "{{ route('jenis_kontak.store') }}");
      $('#modalCrud form').append(`
        @method('POST')
      `);
      $('#jenis_kontak').val('');
      $('#modalCrud button[type="submit"]').attr('disabled', true);
    })

    $('.btn-edit-jenis').click(function(e) {
      e.preventDefault();
      let jenis_kontak = $(this).parents('tr').find('td:nth-child(2) h6').text();
      let id = $(this).parents('tr').find('td:nth-child(4) form').attr('action').split('/')[6];

      // show modal
      $('#modalCrud').modal('show');
      // set modal title
      $('#modalCrudLabel').text('Edit Jenis Kontak');
      // set modal button
      $('#modalCrud button[type="submit"]').text('Edit');
      if ($('#modalCrud button[type="submit"]').hasClass('btn-success')) {
        $('#modalCrud button[type="submit"]').toggleClass('btn-success btn-primary');
      }
      // set modal form
      $('#modalCrud form').attr('action', "/admin/master/jenis_kontak/" + id);
      $('#modalCrud form').append(`
        @method('PUT')
      `);
      $('#jenis_kontak').val(jenis_kontak);
      $('#modalCrud button[type="submit"]').attr('disabled', false);
    })
  });

</script>
@endsection
