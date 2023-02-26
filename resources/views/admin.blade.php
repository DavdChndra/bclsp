@extends('layouts.main-admin')
@section('container')
<section id="" class="justify-content-center py-4" style="height: 100vh">
    <div class="row">

        <div class="col-12">
            <div class="card">
                <div class="card-body p-4 ">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link active position-relative" aria-current="page" data-bs-toggle="tab" href="#aspirasi">Aspirasis</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#history" data-bs-toggle="tab">History</a>
                        </li>

                    </ul>
                   <div class="row my-2 mt-4 justify-content-center">
                    <div class="col-8 mb-3">
                        <div class="row g-4 justify-content-center">
                            <div class="col-md-3">
                                <div class="dropdown">
                                    <button class="btn btn-outline-secondary w-100 dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                      Kategori
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                        @foreach ($kategori as $kat)
                                        <li><a class="dropdown-item" href="/admin?kategori={{ $kat->id_kategori }}">{{ $kat->ket_kategori }}</a></li>
                                        @endforeach
                                    </ul>
                                  </div>
                            </div>
                            <div class="col-md-3">
                                <div class="dropdown">
                                    <button class="btn btn-outline-secondary w-100 dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                      Status
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                        <li><a class="dropdown-item" href="/admin?status=Menunggu">Menunggu</a></li>
                                        <li><a class="dropdown-item" href="/admin?status=Proses">Proses</a></li>
                                        <li><a class="dropdown-item" href="/admin?status=Selesai">Selesai</a></li>
                                    </ul>
                                  </div>
                            </div>
                            <div class="col-md-3">
                                <form action="/admin" method="get">
                                <div class="input-group">
                                   
                                        <input type="date" required class="form-control" value="{{ request('waktu') }}" name="waktu" aria-label="Recipient's username" aria-describedby="button-addon2">
                                        <button class="btn btn-outline-secondary" type="submit" id="button-addon2"><i class="bi bi-search"></i></button></form>
                                  </div>
                            </div>
                            <div class="col-md-3">
                                <form action="/admin" method="get">
                                <div class="input-group">
                                    <input type="text" required name="search"  value="{{ request('search') }}" class="form-control" placeholder="Nomor aspirasi" aria-label="Recipient's username" aria-describedby="button-addon2">
                                    <button class="btn btn-outline-secondary" type="submit" id="button-addon2"><i class="bi bi-search"></i></button>
                                  </div>
                                </form>
                            </div>
                        </div>
                    </div>
                   </div>
                    <div class="tab-content ">
                        <div role="tabpanel" id="aspirasi" class="tab-pane active">
                            <div class="row">
                                <div class="col-12 ">
                                    <table class="table border-top">
                                        <thead>
                                            <tr>
                                                <th scope="col">No</th>
                                                <th scope="col">Nama</th>
                                                <th scope="col">Kategori</th>
                                                <th scope="col">Lokasi</th>
                                                <th scope="col">Keterangan</th>
                                                <th scope="col">Waktu</th>
                                                <th scope="col">Aksi</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($aspirasi as $as)
                                            <tr class="align-middle">
                                                <th scope="row">{{ $as->id_aspirasi }}</th>
                                                <td>{{ $as->input_aspirasi->siswa->nama }}</td>
                                                <td>{{ $as->kategori->ket_kategori }}</td>
                                                <td>{{ $as->input_aspirasi->lokasi }}</td>
                                                <td>{{ $as->input_aspirasi->ket }}</td>
                                                <td>{{ $as->created_at}}</td>
                                                {{-- Status --}}
                                                <td>  
                                                    @if ($as['status'] == 'Menunggu')
                                                    <form action="/admin/status" method="post">
                                                        @csrf
                                                        <input type="hidden" name="status" value="Proses">
                                                        <input type="hidden" name="id_aspirasi"
                                                            value="{{ $as->id_aspirasi }}">
                                                        <button type="submit"
                                                            class="btn btn-outline-primary w-100">Proses</button>
                                                    </form>
                                                    @elseif($as['status'] == 'Proses')
                                                    <form action="/admin/status" method="post">
                                                        @csrf
                                                        <input type="hidden" name="status" value="Selesai">
                                                        <input type="hidden" name="id_aspirasi"
                                                            value="{{ $as->id_aspirasi }}">
                                                        <button type="submit"
                                                            class="btn btn-outline-success w-100">Selesai</button>
                                                    </form>
                                                    @else
                                                    <button type="submit"
                                                    class="btn btn-outline-secondary w-100" disabled>Selesai</button>
                                                    @endif
                                                    {{-- End Status --}}
                                                </td>
                                                {{-- Delete --}}
                                                <td>
                                                    <form action="/admin/delete" method="post">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $as->id_aspirasi }}">
                                                    <button type="submit" class="btn btn-outline-danger">Delete</button>
                                                    </form>
                                                </td>
                                                {{-- End Delete --}}
                                            </tr>
                                            @endforeach
                                        </tbody>

                                    </table>
                                    @if ($aspirasi->count())

                                    @else
                                    <p class="text-center fs-4 mt-5">Tidak ada Aspirasi Siswa. </p>
                                    @endif
                                   <div class="d-flex justify-content-end"> 
                                    {{ $aspirasi->links() }}
                                   </div>
                                </div>
                            </div>
                        </div>
                        <div role="tabpanel" id="history" class="tab-pane ">
                            <div class="row ">
                                <div class="col-12 ">
                                    <table class="table border-top">
                                        <thead>
                                            <tr>
                                                <th scope="col">No</th>
                                                <th scope="col">Nama</th>
                                                <th scope="col">Kategori</th>
                                                <th scope="col">Lokasi</th>
                                                <th scope="col">Keterangan</th>
                                                <th scope="col">Waktu</th>
                                                <th scope="col">Ratting</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($selesai as $as)
                                            <tr>
                                                <th scope="row">{{ $as->id_aspirasi }}</th>
                                                <td>{{ $as->input_aspirasi->siswa->nama }}</td>
                                                <td>{{ $as->kategori->ket_kategori }}</td>
                                                <td>{{ $as->input_aspirasi->lokasi }}</td>
                                                <td>{{ $as->input_aspirasi->ket }}</td>
                                                <td>{{ $as->created_at}}</td>
                                                <td> <div class="fw-bold">
                                                    {{ $as->feedback }} <i class="bi bi-star-fill"></i>
                                                </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>

                                    </table>
                                    @if ($selesai->count())
                                    @else
                                    <p class="text-center fs-4 mt-5">Tidak ada Aspirasi Siswa. </p>
                                    @endif
                                    <div class="d-flex justify-content-end">
                                        {{ $selesai->links() }}
                                       </div>
                                </div>
                            </div>
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>

      
    </div>
</section>
@endsection
