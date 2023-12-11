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
                            <select class="form-control" name="guru">
                                <option value="">--Pilih--</option>
                                @foreach ($gurus as $guru)
                                    <option value="{{ $guru->guru_id }}">{{ $guru->nama }}</option>
                                @endforeach
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
                        @foreach ($gurus as $item)
                            <tr>
                                <td>{{ $item->guru_id }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>
                                    @php
                                        $guruId = str_replace('-', '', $item->guru_id);
                                        $imageName = $guruId . '.png'; // Ganti dengan format nama file gambar yang sesuai
                                        $imagePath = 'storage/images/guru' . $imageName;
                                    @endphp
                                    @if (file_exists(public_path($imagePath)))
                                        <div style="width: 30px">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                fill="currentColor" class="w-5 h-5">
                                                <path fill-rule="evenodd"
                                                    d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </div>

                                        <img src="{{ asset($imagePath) }}" style="width: 100px"
                                            alt="Gambar Ada agi loading">
                                    @else
                                        <br />
                                        <br />
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
