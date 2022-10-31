<div class="row justify-content-center align-items-center">
  @forelse ($kontaks as $kontak)
  <div class="col-md-4 p-2 text-center">
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
