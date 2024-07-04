<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>

<body>
    <header class="container m-3 p-3">
        <a href="{{ url('/') }}" class="btn btn-primary">Kembali</a>
    </header>
    <main>
        <div class="container m-3 p-3">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Title</h4>
                    <form method="POST" enctype="multipart/form-data" action="{{ url('/maja/simpan/ttd') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="" class="form-label">Guru</label>
                            <select class="form-control" name="guru" required>
                                <option value="">--Pilih--</option>
                                @foreach ($gurus as $guru)
                                    <option value="{{ $guru->guru_id }}">{{ $guru->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Tampil ??</label>
                            <select class="form-control" name="tampil" required>
                                <option value="">--Pilih--</option>
                                <option value="ya">YA</option>
                                <option value="tidak">TIDAK</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Untuk TTD</label>
                            <input type="file" class="form-control" name="file" id="" placeholder=""
                                aria-describedby="fileHelpId" />
                            <div id="fileHelpId" class="form-text">Help text</div>
                        </div>
                        <input type="submit" value="SIMPAN" class="btn btn-primary" />

                    </form>
                    <br />
                    <br />
                    <table class="table table-bordered">
                        <tr>
                            <td>ID</td>
                            <td>Nama</td>
                            <td>Tampil</td>
                            <td>Gambar</td>
                        </tr>
                        @foreach ($gurus as $item)
                            <tr>
                                <td>{{ $item->guru_id }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ optional($item->ttd)->tampil }}</td>
                                <td>
                                    @if ($item->ttd)
                                        <img src="{{ asset($item->ttd->lokasi ?? '') }}" style="width: 100px"
                                            alt="Gambar Ada agi loading">
                                    @endif

                                </td>
                            </tr>
                        @endforeach
                        <table>
                </div>
            </div>


        </div>
    </main>
    <footer>
        <!-- place footer here -->
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>
</body>

</html>
