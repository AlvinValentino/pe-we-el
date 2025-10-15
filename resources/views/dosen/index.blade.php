@php $i = 1; @endphp

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>Halaman Dosen</title>
</head>
<body>
    <div>
        <div class="d-flex gap-2">
            <a href="{{ route('dosen.create-form') }}">
                <button type="button" class="btn btn-primary">Add Dosen</button>
            </a>
            <a href="{{ route('matakuliah.index') }}">
                <button type="button" class="btn btn-secondary">Data Mata Kuliah</button>
            </a>
            <a href="{{ route('mahasiswa.index') }}">
                <button type="button" class="btn btn-secondary">Data Mahasiswa</button>
            </a>
        </div>

        <table class="table table-striped table-striped-columns mt-3">
            <thead>
                <tr class="text-center">
                    <th scope="col">#</th>
                    <th scope="col">NIP</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Pendidikan Terakhir</th>
                    <th scope="col">Jurusan</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dosens as $dosen)
                    <tr class="text-center">
                        <td scope="row">{{ $i++ }}</td>
                        <td>{{ $dosen['nip'] }}</td>
                        <td>{{ $dosen['nama_dosen'] }}</td>
                        <td>{{ $dosen['pendidikan_terakhir'] }}</td>
                        <td>{{ $dosen['jurusan'] }}</td>
                        <td class="d-flex gap-2 justify-content-center">
                            <a href="{{ route('dosen.edit-form', $dosen['id']) }}">
                                <button type="button" class="btn btn-warning">Edit</button>
                            </a>
                            <form action="{{ route('dosen.delete', $dosen['id']) }}" method="POST">
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