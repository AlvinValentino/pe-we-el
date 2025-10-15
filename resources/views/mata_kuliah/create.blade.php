<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Membuat Mata Kuliah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>
    <div class="bg-black text-white" style="max-width: 500px; width:100%; padding: 10px;">
        <form action="{{ $type == 'Create' ? route('matakuliah.store') : route('matakuliah.update', $data->id) }}" method="POST">
            @csrf

            @if($type == 'Edit')
            <input type="hidden" name="_method" value="put" />
            @endif

            <table class="w-100">
                <tbody>
                    <tr>
                        @if($type == 'Create')
                        <th colspan="6"><h1 class="text-center">Create Mata Kuliah</h1></th>
                        @else
                        <th colspan="6"><h1 class="text-center">Edit Mata Kuliah</h1></th>
                        @endif
                    </tr>
                    <tr>
                        <td>Kode MK</td>
                        <td colspan="3"><input type="text" name="kode_mk" class="w-100" value="{{ $data->kode_mk ?? '' }}"></td>
                    </tr>
                    <tr>
                        <td>Nama MK</td>
                        <td colspan="3"><input type="text" name="nama_mk" class="w-100" value="{{ $data->nama_mk ?? '' }}"></td>
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
                        <td colspan="3"><button type="submit">{{ $type }}</button></td>
                        <td colspan="3"><button type="button" onclick="history.back()">Batal</button></td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>
</body>
</html>