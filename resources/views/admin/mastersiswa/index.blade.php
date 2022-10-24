@extends('layouts.admin', ['title' => 'Master Siswa'])

@section('header', 'Master Siswa')

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
          <h6 class="m-0 font-weight-bold text-primary">Data Semua Siswa</h6>
        </div>
        <div class="col-md-6 text-right">
          <a href="{{ route('siswa.create') }}" class="btn btn-success"><i class="fas fa-plus-circle mr-1"></i> Tambah siswa</a>
        </div>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table w-100 table-striped table-bordered table-hover" id="dt">
            <thead>
              <tr class="text-nowrap">
                <th>No</th>
                <th>NISN</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>Jumlah projek</th>
                <th>Jumlah kontak</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($siswas as $siswa)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $siswa->nisn }}</td>
                <td class="text-nowrap">{{ Str::title($siswa->nama) }}</td>
                <td>{{ $siswa->jenis_kelamin }}</td>
                <td>{{ $siswa->projeks->count() }}</td>
                <td>{{ $siswa->kontaks->count() }}</td>
                <td class="text-nowrap">
                  <a href="{{ route('siswa.show', $siswa->id) }}" class="btn btn-dark"><i class="fas fa-info-circle"></i></a>
                  <a href="{{ route('siswa.edit', $siswa->id) }}?page=index" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                  <form action="{{ route('siswa.destroy', $siswa->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah anda yakin untuk menghapus siswa bernama {{ $siswa->nama }}??')">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
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
@endsection
