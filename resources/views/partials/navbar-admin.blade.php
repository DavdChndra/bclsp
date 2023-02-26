<nav class="navbar navbar-expand-lg bg-light p-lg-3 p-sm-0 p-md-3">
    <div class="container">
        <a class="navbar-brand fw-bold text-primary fs-3" href="/admin">Admin | Aspirasi Siswa</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
            <form action="/logout" method="post">
                @csrf
                <button type="submit" class="btn btn-lg btn-outline-danger" ><i class="bi bi-box-arrow-right"></i></button>
            </form>
        </div>
    </div>
</nav>
