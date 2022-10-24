@extends('layouts.admin', ['title' => 'Tambah Siswa'])

@section('header', 'Tambah Siswa')

@section('content')
<div class="row justify-content-start align-items-center">
  <div class="col-md-12">
    <div class="card mb-5">
      <div class="card-header py-3">
        <a href="{{ url()->previous() }}" class="btn btn-dark"><i class="fas fa-angle-double-left mr-1"></i>Kembali</a>
      </div>
      <div class="card-body">
        <form action="{{ route('siswa.store') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="nisn">NISN</label>
                <input type="text" class="form-control @error('nisn') is-invalid @enderror" id="nisn" name="nisn" placeholder="Masukkan nisn siswa.." value="{{ old('nisn') }}">
                @error('nisn')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" placeholder="Masukkan nama siswa.." value="{{ old('nama') }}">
                @error('nama')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Masukkan alamat email siswa.." value="{{ old('email') }}">
                @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="jk">Jenis kelamin</label>
                <select id="jk" class="form-control form-select @error('jenis_kelamin') is-invalid @enderror" name="jenis_kelamin" autocomplete="off">
                  <option selected disabled>Pilih jenis kelamin</option>
                  <option value="Laki-laki" @if(old('jenis_kelamin')=="Laki-laki" ) selected @endif>Laki-laki</option>
                  <option value="Perempuan" @if(old('jenis_kelamin')=="Perempuan" ) selected @endif>Perempuan</option>
                </select>
                @error('jenis_kelamin')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="alamat">Alamat</label>
            <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" placeholder="Masukkan alamat siswa.." value="{{ old('alamat') }}">
            @error('alamat')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="foto" class="d-block">Foto (max:2mb)</label>
            <div class="row justify-content-start align-items-center">
              <div class="col-lg-3 col-md-4 col-sm-5 col-12">
                <img id="preview-image-before-upload" src="{{ asset('storage/default.jpg') }}" alt="preview image" class="img-thumbnail mt-2 mb-3 w-100" data-toggle="modal" data-target="#modalFoto">
              </div>
              <div class="col-lg-4 col-md-5 col-sm-6 col-12 p-0">
                <span>*review foto (klik untuk memperbesar)</span>
              </div>
            </div>
            <div class="custom-file">
              <input type="file" class="custom-file-input @error('foto') is-invalid @enderror" id="foto" name="foto">
              <label class="custom-file-label" for="foto">Choose file</label>
              @error('foto')
              <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
          </div>
          <div class="form-group">
            <label for="about">About siswa</label>
            <textarea class="form-control @error('about') is-invalid @enderror" id="about" name="about" placeholder="Masukkan tentang siswa..">{{ old('about') }}</textarea>
            @error('about')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          <button type="submit" class="btn btn-success">Tambah</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
