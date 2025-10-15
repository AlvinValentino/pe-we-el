@php $i = 1; @endphp

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>Halaman Mata Kuliah</title>
</head>
<body>
    <div>
        <div class="d-flex gap-2">
            <a href="{{ route('matakuliah.create-form') }}">
                <button type="button" class="btn btn-primary">Add Mata Kuliah</button>
            </a>

            <a href="{{ route('mahasiswa.index') }}">
                <button type="button" class="btn btn-secondary">Data Mahasiswa</button>
            </a>
            
            <a href="{{ route('dosen.index') }}">
                <button type="button" class="btn btn-secondary">Data Dosen</button>
            </a>
        </div>

        <table class="table table-striped table-striped-columns mt-3">
            <thead>
                <tr class="text-center">
                    <th scope="col">#</th>
                    <th scope="col">Kode MK</th>
                    <th scope="col">Nama MK</th>
                    <th scope="col">Jurusan</th>
                    <th scope="col">SKS</th>
                    <th scope="col">Dosen Pengampu</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($matakuliahs as $matakuliah)
                    <tr class="text-center">
                        <td scope="row">{{ $i++ }}</td>
                        <td>{{ $matakuliah['kode_mk'] }}</td>
                        <td>{{ $matakuliah['nama_mk'] }}</td>
                        <td>{{ $matakuliah['jurusan'] }}</td>
                        <td>{{ $matakuliah['sks'] }}</td>
                        <td>{{ $matakuliah['dosen'] ? $matakuliah['dosen']['nama_dosen'] : '' }}</td>
                        <td class="d-flex gap-2 justify-content-center">
                            <a href="{{ route('matakuliah.edit-form', $matakuliah['id']) }}">
                                <button type="button" class="btn btn-warning">Edit</button>
                            </a>
                            <form action="{{ route('matakuliah.delete', $matakuliah['id']) }}" method="POST">
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