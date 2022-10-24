@extends('layouts.admin', ['title' => $siswa->nama])

@section('header', 'Detail Siswa')

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

<div class="row @if(Session::has('success')) mb-5 @else my-5 @endif justify-content-center align-items-start">
  <div class="col-md-4">
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <div class="row justify-content-between align-items-center">
          <div class="col-md-6">
            <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-address-card mr-1"></i>Detail Data</h6>
          </div>
          <div class="col-md-6 text-right">
            <a href="{{ route('siswa.index') }}" class="text-dark"><i class="fas fa-angle-double-left mr-1"></i>Kembali</a>
          </div>
        </div>
      </div>
      <div class="card-body text-center">
        <div class="mx-auto rounded-circle" style="height: 200px; width: 200px; background: url({{ asset('storage/' . $siswa->foto) }}); background-size: cover; background-position: center center;"></div>
        <h4 class="text-dark font-weight-bold mt-3">{{ Str::title($siswa->nama) }}</h4>
        <p>Nisn : {{ $siswa->nisn }}</p>
        <p class="text-dark">@if($siswa->jenis_kelamin == "Laki-laki") <i class="fas fa-mars text-primary mr-1"></i> @else <i class="fas fa-venus text-danger mr-1"></i> @endif{{ $siswa->jenis_kelamin }}</p>
        <p class="mr-3"><i class="fas fa-map-marked-alt text-dark mr-2"></i><a href="http://maps.google.com/?q={{ $siswa->alamat }}" target="_blank">{{ $siswa->alamat }}</a></p>
        <p><i class="fas fa-envelope text-dark mr-2"></i><a href="mailto: {{ $siswa->email }}" target="_blank">{{ $siswa->email }}</a></p>

        <div class="row justify-content-center align-items-center mt-4">
          <div class="col-md-6">
            <a href="{{ route('siswa.edit', $siswa->id) }}?page=show" class="btn btn-primary"><i class="fas fa-edit"></i></a>
            <form action="{{ route('siswa.destroy', $siswa->id) }}" method="POST" onsubmit="return confirm('Apakah anda yakin untuk menghapus siswa bernama {{ $siswa->nama }}??')" class="d-inline ml-2">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
            </form>
          </div>
        </div>

      </div>
    </div>

    <div class="card shadow">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-phone-alt mr-1"></i>Kontak</h6>
      </div>
      <div class="card-body">
        <div class="row justify-content-center align-items-center">
          @forelse ($siswa->kontaks as $kontak)
          <div class="col-md-6 p-2 text-center">
            <a class="text-muted link-kontak" target="_blank" href="{{ $links[$kontak->jenis_kontak] . $kontak->pivot->deskripsi }}">
              <h2 class="m-0"><i class="fa fa-{{ $kontak->jenis_kontak }}"></i></h2>
              <p style="font-size: 14px;">{{ $kontak->pivot->deskripsi }}</p>
            </a>
          </div>
          @empty
          <div class="col-md-12 text-center">
            <h6 class="text-muted">Tidak ada kontak.</h6>
          </div>
          @endforelse
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-8">
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-rocket mr-1"></i>About {{ $siswa->nama }}</h6>
      </div>
      <div class="card-body">
        <p class="text-center text-dark">{{ $siswa->about }}</p>
      </div>
    </div>
    <div class="card shadow">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-code mr-1"></i>Project {{ $siswa->nama }}</h6>
      </div>
      <div class="card-body">
        @if($siswa->projeks->count() > 0)
        <div class="row align-items-center justify-content-center">
          @foreach ($siswa->projeks as $projek)
          <div class="col-md-6">
            <div class="card shadow mb-4 border">
              <div class="card-body">
                <img src="{{ asset('storage/'. $projek->foto) }}" class="w-100 mb-3 rounded" alt="Foto Project">
                <h5 class="text-dark">{{ Str::title($projek->nama) }}</h5>
                <span class="badge badge-primary">{{ $projek->jenis }}</span>
                <p class="mt-3">
                  {{ Str::of($projek->deskripsi)->limit('60') }}
                </p>
                <div class="btn-group mt-3 w-100" role="group" aria-label="Basic example">
                  <a class="btn btn-primary @if(!$projek->link) disabled @endif" href="{{ $projek->link }}" target="_blank">
                    <i class="fas fa-eye mr-1"></i>Lihat projek
                  </a>
                  <a class="btn btn-dark" href="{{ route('projek.show', $projek->id) }}">
                    <i class="fas fa-info-circle mr-1"></i>Detail
                  </a>
                </div>
              </div>
              <div class="card-footer">
                <p class="text-dark m-0"><i class="fas fa-calendar-alt mr-2 text-primary"></i>{{ $projek->created_at->format('d F Y') }}</p>
              </div>
            </div>
          </div>
          @endforeach
        </div>
        <a href="{{ route('siswa.projeks', $siswa->id) }}" class="btn btn-primary d-block mx-auto w-50 mt-3">Lihat semua projek..</a>
        @else
        <div class="row">
          <div class="col-md-12">
            <div class="alert alert-danger text-center">Belum ada project</div>
          </div>
        </div>
        @endif

      </div>
    </div>
  </div>
</div>
@endsection
