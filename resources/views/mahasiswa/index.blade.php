@php $i = 1; @endphp

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>Halaman Mahasiswa</title>
</head>
<body>
    <div>
        <div class="d-flex gap-2">
            <a href="{{ route('mahasiswa.create-form') }}">
                <button type="button" class="btn btn-primary">Add Mahasiswa</button>
            </a>

            <a href="{{ route('dosen.index') }}">
                <button type="button" class="btn btn-secondary">Data Dosen</button>
            </a>

            <a href="{{ route('matakuliah.index') }}">
                <button type="button" class="btn btn-secondary">Data Mata Kuliah</button>
            </a>

            <a href="{{ route('krs.index') }}">
                <button type="button" class="btn btn-secondary">Data KRS</button>
            </a>
        </div>

        <table class="table table-striped table-striped-columns mt-3">
            <thead>
                <tr class="text-center">
                    <th scope="col">#</th>
                    <th scope="col">NIM</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Tempat Lahir</th>
                    <th scope="col">Tanggal Lahir</th>
                    <th scope="col">Jurusan</th>
                    <th scope="col">Angkatan</th>
                    <th scope="col">Max SKS</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($mahasiswas as $mahasiswa)
                    <tr class="text-center">
                        <td scope="row">{{ $i++ }}</td>
                        <td>{{ $mahasiswa['NIM'] }}</td>
                        <td>{{ $mahasiswa['name'] }}</td>
                        <td>{{ $mahasiswa['tempat_lahir'] }}</td>
                        <td>{{ $mahasiswa['tanggal_lahir'] }}</td>
                        <td>{{ $mahasiswa['jurusan'] }}</td>
                        <td>{{ $mahasiswa['angkatan'] }}</td>
                        <td>{{ $mahasiswa['max_sks'] }}</td>
                        <td class="d-flex gap-2 justify-content-center">
                            <a href="{{ route('mahasiswa.edit-form', $mahasiswa['id']) }}">
                                <button type="button" class="btn btn-warning">Edit</button>
                            </a>
                            <form action="{{ route('mahasiswa.delete', $mahasiswa['id']) }}" method="POST">
                                @csrf
                                <input type="hidden" name="_method" value="delete" />
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>