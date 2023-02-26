@extends('layouts.main')
@section('container')
<h1 class="fw-bold my-5 text-center">Layanan Pengaduan Siswa</h1>
    <div class="d-flex justify-content-center">
        <div class="">
            <div id="carouselExampleControlsNoTouching" class="carousel slide " data-bs-touch="false">
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img src="{{ asset('img/a5f0e031592e11b0d022e8a963140a43.jpg') }}" class="d-block" height="230" width="500"
                      alt="...">
                  </div>
                  <div class="carousel-item">
                    <img src="{{ asset('img/pengaduan1.png') }}" class="d-block" height="230" width="500"
                      alt="...">
                  </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>
              </div>
        </div>
        <div class="ms-4">
                <Article>
                    <p style="text-align: justify">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab facilis in est optio fugiat recusandae illum quasi vel reprehenderit, esse atque odio nostrum minima voluptatibus molestias nam id velit debitis praesentium eveniet eaque laboriosam. t vero qui soluta doloremque vitae animi consequuntur nulla, molestiae fugit nemo dolorum non voluptas.</p>
                    <p style="text-align: justify">Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam cum earum quidem? Ullam quibusdam sequi cupiditate laudantium hic natus atque et nulla id, illo necessitatibus? Porro minima sapiente aliquam quam quod accusamus ad nisi, qui maiores nobis molestiae provident nesciunt natus veniam nisi quae quam fugit esse est animi. Ullam, aperiam rem animi blanditiis nobis optio, adipisci soluta ducimus aut labore ratione, quae dolores suscipit sint ipsum provident.</p>
                </Article>
          
        </div>
    </div>
@endsection
