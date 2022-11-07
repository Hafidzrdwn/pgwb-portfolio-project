<div class="row justify-content-center align-items-center">
  @forelse ($kontaks as $kontak)
  <div class="col-md-4 p-2 text-center p-0">
    <a class="text-muted link-kontak" target="_blank" href="{{ $links[$kontak->jenis_kontak] . $kontak->pivot->deskripsi }}">
      <h2 class="m-0"><i class="fa fa-{{ $kontak->jenis_kontak }}"></i></h2>
      <p style="font-size: 14px;">{{ $kontak->pivot->deskripsi }}</p>
    </a>
    <div class="text-center">
      <a href="{{ route('kontak.edit', $kontak->pivot->id) }}" class="btn btn-sm btn-outline-primary btn-circle mr-1"><i class="fas fa-edit"></i></a>
      <form class="d-inline" action="{{ route('kontak.destroy', $kontak->pivot->id) }}" method="POST" onsubmit="return confirm('Anda yakin ingin menghapus kontak ini??')">
        @method('DELETE')
        @csrf
        <button type="submit" class="btn btn-sm btn-outline-danger btn-circle"><i class="fas fa-trash"></i></button>
      </form>
    </div>
  </div>
  @empty
  <div class="col-md-12 text-center">
    <h6 class="text-muted">Tidak ada kontak.</h6>
  </div>
  @endforelse
</div>
