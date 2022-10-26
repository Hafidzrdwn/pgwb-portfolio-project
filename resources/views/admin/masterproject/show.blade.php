@if (!$projeks->isEmpty())
<div class="row">
  @foreach ($projeks as $projek)
  <div class="col-md-12">
    <div class="card shadow mb-3 p-2">
      <div class="card-body">
        <div class="row justify-content-center align-items-center">
          <div class="col-md-7">
            <img src="{{ asset('images/admin/' . $projek->foto) }}" class="rounded w-100" alt="Foto Projek">
          </div>
          <div class="col-md-5">
            <h5 class="text-dark font-weight-bold">{{ $projek->nama }}</h5>
            <span class="badge badge-primary">{{ $projek->jenis }}</span>
            <p class="mt-3 mb-4 small">
              {{ Str::of($projek->deskripsi)->limit(72) }}
            </p>
            <a class="btn btn-primary btn-sm @if(!$projek->link) disabled @endif" href="{{ $projek->link }}" target="_blank">
              <i class="fas fa-eye mr-1"></i>Lihat
            </a>
            <a class="btn btn-dark btn-sm" href="">
              <i class="fas fa-info-circle mr-1"></i>Detail
            </a>
          </div>
        </div>
      </div>
      <div class="card-footer">
        <div class="row justify-content-between align-items-center">
          <div class="col-md-6">
            <small>
              <i class="fas fa-calendar-alt mr-1 text-info"></i>
              <span class="text-muted">
                {{ $projek->tanggal }}
              </span>
            </small>
          </div>
          <div class="col-md-6 text-right">
            <a href="{{ route('projek.edit', $projek->id) }}" class="btn btn-sm btn-primary">
              <i class="fas fa-edit"></i>
            </a>
            <form action="{{ route('projek.destroy', $projek->id) }}" onsubmit="return confirm('Yakin ingin menghapus projek ini?')" class="d-inline" method="POST">
              @method('DELETE')
              @csrf
              <button type="submit" class="btn btn-sm btn-danger">
                <i class="fas fa-trash"></i>
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endforeach
</div>
@else
<h6 class="text-center">Siswa belum memiliki project satupun.</h6>
<a href="{{ route('projek.create') }}?siswa={{ $id }}" class="text-center d-block">Ayo buat projek..</a>
@endif
