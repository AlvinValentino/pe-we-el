<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Membuat Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>
    <div class="bg-black text-white" style="max-width: 500px; width:100%; padding: 10px;">
        <form action="{{ $type == 'Create' ? route('mahasiswa.store') : route('mahasiswa.update', $data->id) }}" method="POST">
            @csrf

            @if($type == 'Edit')
            <input type="hidden" name="_method" value="put" />
            @endif

            <table class="w-100">
                <tbody>
                    <tr>
                        @if($type == 'Create')
                        <th colspan="6"><h1 class="text-center">Create Mahasiswa</h1></th>
                        @else
                        <th colspan="6"><h1 class="text-center">Edit Mahasiswa</h1></th>
                        @endif
                    </tr>
                    <tr>
                        <td>Nama</td>
                        <td colspan="3"><input type="text" name="name" class="w-100" value="{{ $data->name ?? '' }}"></td>
                    </tr>
                    <tr>
                        <td>NIM</td>
                        <td colspan="3"><input type="text" name="NIM" class="w-100" value="{{ $data->NIM ?? '' }}"></td>
                    </tr>
                    <tr>
                        <td>Tempat Lahir</td>
                        <td colspan="3"><input type="text" name="tempat_lahir" class="w-100" value="{{ $data->tempat_lahir ?? '' }}"></td>
                    </tr>
                    <tr>
                        <td>Tanggal Lahir</td>
                        <td colspan="3"><input type="date" name="tanggal_lahir" class="w-100" value="{{ $data->tanggal_lahir ?? '' }}"></td>
                    </tr>
                    <tr>
                        <td rowspan="3">Jurusan</td>
                        <td colspan="3">
                            <input type="radio" name="jurusan" value="Bisnis Digital" {{ ($data->jurusan ?? '') == 'Bisnis Digital' ? 'checked' : '' }}> Bisnis Digital
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <input type="radio" name="jurusan" value="Kewirausahaan" {{ ($data->jurusan ?? '') == 'Kewirausahaan' ? 'checked' : '' }}> Kewirausahaan
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <input type="radio" name="jurusan" value="Sistem dan Teknologi Informasi" {{ ($data->jurusan ?? '') == 'Sistem dan Teknologi Informasi' ? 'checked' : '' }}> Sistem dan Teknologi Informasi
                        </td>
                    </tr>
        
                    <tr>
                        <td>Angkatan</td>
                        <td colspan="3"><input type="text" name="angkatan" class="w-100" value="{{ $data->angkatan ?? '' }}"></td>
                    </tr>
        
                    <tr>
                        <td colspan="3"><button type="submit">{{ $type }}</button></td>
                        <td colspan="3"><button type="button" onclick="history.back()">Batal</button></td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>
</body>
</html>