@extends('layouts.main')
@section('container')

<div data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-root-margin="0px 0px -40%" data-bs-smooth-scroll="true" class="scrollspy-example p-3 rounded-2" tabindex="0">
    {{-- Input Pengaduan --}}
    <h4 id="InputAspirasi" class="col-12 my-4 border-bottom border-4 py-4 fw-bold text-primary text-center mb-5 fs-3">Input Pengaduan</h4>
    <section id="input" style="height: auto;">
        <div class="row">
            <div class="col-md-4">
                <img src="img/telkom4.png" alt="telkom" class="mx-auto d-block">
            </div>
            <div class="col-md-8 px-5">
                @if (request('id_pelaporan') != null)
                <div class="alert mt-3 alert-warning alert-dismissible fade show" role="alert">
                    <strong>Terimakasih Telah Melakukan Pengaduan <br>
                        Nomor Pengaduan : {{ request('id_pelaporan') }}</strong><br>
                    <small class="">Silahkan Di Ingat Nomor pengaduannya!!</small>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
              
                @endif
                @if (request('nis') != null)
                <div class="alert mt-3 alert-danger alert-dismissible fade show" role="alert">
                   <strong> NIS Anda Belum Terdaftar!! </strong><br>
                   <small>Silahkan Isi Datanya Kembali Dengan Benar</small>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
              
                @endif
                <div class="card mb-5 shadow">
                    <div class="card-body p-5">
                        <form action="/aspirasi/store" method="POST" enctype="multipart/form-data" class="row">
                            @csrf
                            <div class="mb-3 col-md-6">
                                <label class="form-label fw-bold">ID Pelapor</label>
                                <input type="text" name="id_pelaporan" class="form-control bg-primary text-light fw-bold" readonly
                                    value="{{ $no }}">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label fw-bold">Nomor Induk Kependudukan</label>
                                <input type="number" name="nis" value="{{ old('nis') }}"
                                    class="form-control @error('nis') is-invalid @enderror">
                                @error('nis')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-4">
                                <label class="form-label fw-bold">Kategori</label>
                                <select id="inputState" class="form-select" name="id_kategori" id="id_kategori1">
                                <option selected disabled>Choose...</option>
                                @foreach ($kategori as $kat)
                                <option value="{{ $kat->id_kategori }}">{{ $kat->ket_kategori }}</option>
                                @endforeach
                                </select>
                            </div>
                            <div class="mb-3 col-md-8">
                                <label class="form-label fw-bold">Lokasi</label>
                                <input type="text" name="lokasi" value="{{ old('lokasi') }}"
                                    class="form-control  @error('lokasi') is-invalid @enderror">
                                @error('lokasi')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Keterangan</label>
                                <textarea name="ket" id="" value="{{ old('ket') }}"
                                    class="form-control @error('ket') is-invalid @enderror" rows="2"></textarea>
                                @error('ket')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="image" class="form-label fw-bold">Upload Gambar</label>
                                <input class="form-control @error('ket') is-invalid @enderror" type="file" id="image" name="image">
                                @error('image')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                              </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
              
                </div>
            </div>
        </div>
    </section>
    {{-- End Input Pengaduan --}}
    {{-- Lihat Pengaduan --}}
    <h4 id="LihatAspirasi" class="col-12 my-4 border-bottom border-4 py-4 fw-bold text-primary text-center mb-5 fs-3">Lihat Pengaduan</h4>
    <section id="aspirasi" class="justify-content-center" style="height: auto;">
        <div class="col-12 my-4 px-5 py-3 rounded">
            <div class="row justify-content-center">
                {{-- Search --}}
                <div class="col-12 pb-3">
                    <form action="/#LihatAspirasi" class="" method="get">
                        <label class="form-label fw-bold">Nomor Pengaduan</label>
                        <div class="input-group">
                            <input type="text" required name="search" value="{{ request('search') }}"
                                class="form-control" placeholder="Masukkan Nomor Pengaduan"
                                aria-label="Recipient's username" aria-describedby="button-addon2">
                            <button class="btn btn-outline-primary" type="submit" id="button-addon2"><i class="bi bi-search"></i></button>
                        </div>
                    </form>
                </div>
                {{-- End Search --}}
                <div class="col-8"> 
                    @if (request('search') != null)
                    <div class="card text-center">
                        @foreach ($aspirasi as $as)
                        <div class="card-header">
                            <div class="d-flex justify-content-between">
                                <div class="nomor bg-danger p-2 rounded text-light"><span class="fw-bold">Nomor Pengaduan : </span>{{ $as->id_aspirasi }}</div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="d-flex justify-content-center mb-3">
                                <div class="gambar mx-3 {{ ($as->input_aspirasi->image === null ? 'd-none' : 'd-block' )}}">
                                        <img src="{{ asset('storage/'. $as->input_aspirasi->image) }}" alt="" width="200px" class="rounded">
                                </div>
                                <div class="keterangan mx-3">
                                    <div class="d-flex border-bottom mb-2">
                                        <p class="fw-bold p-0 m-0 me-2">Kategori : </p>
                                        <p class="p-0 m-0 text-danger fw-bold">{{ $as->kategori->ket_kategori }}</p>
                                    </div>
                                    <div class="d-flex border-bottom mb-2">
                                        <p class="fw-bold p-0 m-0 me-2">Status : </p>
                                        <p class="p-0 m-0">{{ $as->status }}</p>
                                    </div>
                                    <div class="d-flex border-bottom mb-2">
                                        <p class="fw-bold p-0 m-0 me-2">Alamat : </p>
                                        <p class="p-0 m-0">{{ $as->input_aspirasi->lokasi }}</p>
                                    </div>
                                    <div class="d-flex border-bottom mb-2">
                                        <p class="fw-bold p-0 m-0 me-2">Keterangan : </p>
                                        <p class="p-0 m-0">{{ $as->input_aspirasi->ket }}</p>
                                    </div>
                                    @if ($as['feedback'] != null)
                                    <div class="d-flex border-bottom mb-2">
                                        <p class="fw-bold p-0 m-0 me-2">Feedback : </p>
                                        <p class="p-0 m-0">{{ $as->feedback }} <i class="bi bi-star-fill"></i></p>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            @if ($as['status'] == 'Selesai' and $as['feedback'] == null)
                            <h6 class="p-0 m-0 fw-bold text-primary">Rating</h6>
                                    <form action="/aspirasi/feedback" method="POST" class=" p-2 rounded-2 text-center">
                                        @csrf
                                        <input type="hidden" name="id_aspirasi" value="{{ $as->id_aspirasi  }}">
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <button type="radio" class="btn btn-outline-danger" required name="feedback" value="1" >1 <i class="bi bi-star-fill"></i></button>
                                            <button type="radio" class="btn btn-outline-danger" name="feedback" required value="2">2 <i class="bi bi-star-fill"></i></button>
                                            <button type="radio" class="btn btn-outline-primary" name="feedback" required value="3">3 <i class="bi bi-star-fill"></i></button>
                                            <button type="radio" class="btn btn-outline-primary" name="feedback" required value="4">4 <i class="bi bi-star-fill"></i></button>
                                            <button type="radio" class="btn btn-outline-success" name="feedback" required value="5">5 <i class="bi bi-star-fill"></i></button>
                                        </div>
                                    </form>
                                    @endif
                        </div>
                        <div class="card-footer text-muted">
                            {{ $as->input_aspirasi->created_at }}
                        </div>
                    </div>
                    @endforeach
                    @else
                    <div class="card text-center">
                        <div class="card-header">
                            Pengaduan Sekolah
                        </div>
                        <div class="card-body">
                          <h5 class="card-title text-danger fw-bold fs-4">Tidak Ada Aspirasi Siswa</h5>
                          <p class="card-text">
                            Masukkan Nomer Pengaduan
                          </p>
                        </div>
                        <div class="card-footer text-muted">
                          SMK Telkom Jakarta
                        </div>
                    </div>
                    @endif
                    @if ($aspirasi->count())

                    @elseif ($aspirasi->count() and request('search') == null)
                    <div class="card text-center">
                        <div class="card-header">
                            Pengaduan Sekolah
                        </div>
                        <div class="card-body">
                          <h5 class="card-title text-primary fw-bold fs-4 px-4">Aspirasi Dengan Nomor Pengaduan Tersebut <span class="text-danger">Tidak Ada</span></h5>
                          <p class="card-text">
                            Masukkan Nomer Pengaduan Yang Benar
                          </p>
                        </div>
                        <div class="card-footer text-muted">
                          SMK Telkom Jakarta
                        </div>
                      </div>
                    @elseif ($aspirasi->count() == null and request('search') != null)
                    <div class="card text-center">
                        <div class="card-header">
                            Pengaduan Sekolah
                        </div>
                        <div class="card-body">
                          <h5 class="card-title text-primary fw-bold fs-4 px-4">Aspirasi Dengan Nomor Pengaduan Tersebut <span class="text-danger">Tidak Ada</span></h5>
                          <p class="card-text">
                            Masukkan Nomer Pengaduan Yang Benar
                          </p>
                        </div>
                        <div class="card-footer text-muted">
                          SMK Telkom Jakarta
                        </div>
                      </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
    {{-- End Lihat Pengaduan --}}
    {{-- About --}}
    <h4 id="About" class="col-12 my-4 border-bottom border-4 py-4 fw-bold text-primary text-center mb-5 fs-3">About</h4>
    <img src="img/telkom2.png" alt="Telkom" class="d-block mx-auto my-5" width="25%">
    <div class="px-5">
        <p class="text-center">
            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sunt nulla minus pariatur saepe enim inventore facilis nobis ratione. Excepturi obcaecati quae quasi quo accusamus praesentium, ratione ipsam. Rem assumenda placeat nobis suscipit minima! Unde itaque hic ducimus deserunt! Delectus laboriosam qui repellat repellendus rerum iusto iure. Unde fuga corrupti illum.
        </p>
        <p class="text-center">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium possimus itaque illum sequi quisquam nostrum ex voluptas architecto at inventore placeat beatae, quia quae nulla ab obcaecati iusto odio tenetur distinctio vitae exercitationem laudantium. Iste modi perferendis, molestiae nam sed laborum totam placeat mollitia nulla reiciendis saepe tempora excepturi assumenda maiores nostrum sint debitis? Inventore at corrupti recusandae accusamus nostrum fugiat ipsa voluptas temporibus dolor officia a quibusdam illum ratione sequi vel id nisi vitae ex, magnam rem non nesciunt architecto explicabo! Labore ab quisquam nulla necessitatibus! Quibusdam dolore alias, quam obcaecati ipsum, labore iste iure, numquam similique itaque omnis!
        </p>
    </div>
    {{-- End About --}}
</div>
@endsection