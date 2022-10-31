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
  <div class="col-lg-6">
    <div class="card">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Semua Jenis Kontak</h6>
      </div>
      <div class="card-body">
        <div class="row justify-content-center align-items-center">
          @foreach ($jenis_kontaks as $jk)
          <div class="col-md-4 mb-4">
            <a href="#" onclick="actionJenis(event, this, '{{ route('jenis_kontak.destroy', $jk->id) }}')" class="btn btn-light btn-icon-split">
              <span class="icon text-dark-600">
                <i class="fab fa-{{ $jk->jenis_kontak }}"></i>
              </span>
              <span class="text">{{ Str::title($jk->jenis_kontak) }}</span>
            </a>
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-6">
    <div class="card">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-dark">Action</h6>
      </div>
      <div class="card-body">
        <button class="btn-tambah-jenis btn btn-success d-block mx-auto" data-toggle="modal" data-target="#modalCrud"><i class="fas fa-plus-circle mr-1"></i> Tambah Jenis Kontak</button>
        <div class="action-jenis">
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

    window.editJenis = function(e, el) {
      e.preventDefault();
      let jenis_kontak = $(el).parents('.action-jenis').find('h5').text().toLowerCase();
      let id = $(el).parents('.action-jenis').find('div.mt-4.text-center form').attr('action').split('/')[6];

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
    }


    window.actionJenis = function(e, el, route) {
      e.preventDefault();

      const jenis = $(el).find('span.text').text();
      const tempt = `
        <h1 class="text-center mt-4" style="font-size:52px;"><i class="text-dark fab fa-${jenis.toLowerCase()}"></i></h1>
        <h5 class="text-center font-weight-bold text-dark">${jenis}</h5>
        <div class="mt-4 text-center">
          <a href="#" onclick="editJenis(event, this)" class="btn btn-primary btn-circle mr-1"><i class="fas fa-edit"></i></a>
          <form action="${route}" method="POST" class="d-inline" onsubmit="return confirm('Apakah anda yakin untuk menghapus jenis kontak bernama ${jenis} ??')">
            @method('DELETE')
            @csrf
            <button type="submit" class="btn btn-danger btn-circle"><i class="fas fa-trash"></i></button>
          </form>
        </div>
      `;
      $('.action-jenis').html(tempt)
    }
  });

</script>
@endsection
