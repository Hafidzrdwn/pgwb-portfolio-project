@extends('layouts.admin', ['title' => 'Edit Project'])

@section('header', "Edit Project ({$projek->nama})")

@section('content')
<div class="row">
  <div class="col-12">
    <div class="card mb-5">
      <div class="card-header py-3">
        <a href="{{ route('projek.index') }}" class="btn btn-dark"><i class="fas fa-angle-double-left mr-1"></i>Kembali</a>
      </div>
      <div class="card-body">
        <form action="{{ route('projek.update', $projek->id) }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <div class="form-group">
            <label class="form-label" for="nama_siswa">Nama siswa</label>
            <input type="text" class="form-control @error('nama_siswa') is-invalid @enderror" name="nama_siswa" id="nama_siswa" value="{{ $projek->siswa->nama }}" placeholder="Masukkan nama siswa.." disabled>
            <input type="hidden" name="nama_siswa" value="{{ $projek->siswa->nama }}">
            <input type="hidden" name="siswa_id" value="{{ $projek->siswa->id }}">
            @error('nama_siswa')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="foto" class="form-label d-block">Foto project (max:2mb)</label>
            <div class="row justify-content-start align-items-center">
              <div class="col-lg-4 col-md-4 col-sm-5 col-12">
                <img id="preview-image-before-upload" src="{{ asset('storage/'. $projek->foto) }}" alt="preview image" class="img-thumbnail mt-2 mb-3 w-100" data-toggle="modal" data-target="#modalFoto">
              </div>
              <div class="col-lg-5 col-md-5 col-sm-6 col-12 p-0">
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
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="nama_projek" class="form-label">Nama project</label>
                <input type="text" class="form-control @error('nama_projek') is-invalid @enderror" id="nama_projek" name="nama_projek" placeholder="Masukkan nama project anda.." value="{{ old('nama_projek', $projek->nama) }}">
                @error('nama_projek')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="jenis_projek" class="form-label">Jenis project</label>
                <select autocomplete="off" id="jenis_projek" class="form-control form-select @error('jenis_projek') is-invalid @enderror" name="jenis_projek">
                  <option selected disabled>Pilih jenis project</option>
                  @foreach($jenis_projek as $jp)
                  <option value="{{ $jp }}" @if(old('jenis_projek', $projek->jenis)==$jp) selected @endif>
                    {{ $jp }}
                  </option>
                  @endforeach
                </select>
                @error('jenis_projek')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
            </div>
          </div>
          <div class="mb-3">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="link" class="form-label">Link/Url project</label>
                  <input type="text" class="form-control @error('link') is-invalid @enderror" name="link" id="link" value="{{ old('link', $projek->link) }}" placeholder="Masukkan link/url project anda..">
                  @error('link')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="deskripsi" class="form-label">Deskripsi project</label>
                  <textarea class="form-control @error('deskripsi') is-invalid @enderror" rows="4" id="deskripsi" name="deskripsi" placeholder="Masukkan deskripsi project..">{{ old('deskripsi', $projek->deskripsi) }}</textarea>
                  @error('deskripsi')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>
              </div>
            </div>
          </div>
          <button type="submit" class="btn btn-primary">Edit projek</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
