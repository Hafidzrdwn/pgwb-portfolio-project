@extends('layouts.admin', ['title' => 'Tambah Kontak'])

@section('header', 'Tambah Kontak '. $siswa->nama)

@section('content')
<div class="row">
  <div class="col-12">
    <div class="card mb-5">
      <div class="card-header py-3">
        <a href="{{ route('kontak.index') }}" class="btn btn-dark"><i class="fas fa-angle-double-left mr-1"></i>Kembali</a>
      </div>
      <div class="card-body">
        <form action="{{ route('kontak.store') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label class="form-label" for="nama_siswa">Nama siswa</label>
            <input type="text" class="form-control @error('nama_siswa') is-invalid @enderror" id="nama_siswa" name="nama_siswa" placeholder="Masukkan nama siswa.." value="{{ old('nama_siswa', $siswa->nama) }}" disabled>
            <input type="hidden" name="nama_siswa" value="{{ $siswa->nama }}">
            <input type="hidden" name="siswa_id" value="{{ $siswa->id }}">
            @error('nama_siswa')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="jenis_kontak">Jenis kontak</label>
            <select id="jenis_kontak" class="form-control form-select @error('jenis_kontak') is-invalid @enderror" name="jenis_kontak" autocomplete="off">
              <option selected disabled>Pilih jenis kontak</option>
              @foreach ($jenis_kontaks as $jk)
              <option value="{{ $jk->id }}" @if(old('jenis_kontak')==$jk->id) selected @endif>{{ Str::title($jk->jenis_kontak) }}</option>
              @endforeach
            </select>
            @error('jenis_kontak')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon3">https://</span>
              </div>
              <input type="text" class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" id="deskripsi" placeholder="Pilih jenis kontak terlebih dahulu.." value="{{ old('deskripsi') }}" disabled>
              @error('deskripsi')
              <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
          </div>
          <button type="submit" class="btn btn-success">Tambah</button>
        </form>
      </div>
    </div>
  </div>
</div>

<input type="hidden" id="links" value="{{ json_encode($links) }}">
@endsection

@section('script')
<script>
  $(document).ready(function() {
    $('#jenis_kontak').on('change', function() {

      let jenis_kontak = $(this).find('option:selected').text().toLowerCase();
      let deskripsi = $('#deskripsi');
      let links = JSON.parse($('#links').val());

      $(deskripsi).parents('.input-group').find('.input-group-prepend > span').text(links[jenis_kontak]['link']);
      $(deskripsi).prop('disabled', false);
      $(deskripsi).attr('placeholder', links[jenis_kontak]['placeholder']);

    });
  });

</script>
@endsection
