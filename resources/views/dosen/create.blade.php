<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Membuat Dosen</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>
    <div class="bg-black text-white" style="max-width: 500px; width:100%; padding: 10px;">
        <form action="{{ $type == 'Create' ? route('dosen.store') : route('dosen.update', $data->id) }}" method="POST">
            @csrf

            @if($type == 'Edit')
            <input type="hidden" name="_method" value="put" />
            @endif

            <table class="w-100">
                <tbody>
                    <tr>
                        @if($type == 'Create')
                        <th colspan="6"><h1 class="text-center">Create Dosen</h1></th>
                        @else
                        <th colspan="6"><h1 class="text-center">Edit Dosen</h1></th>
                        @endif
                    </tr>
                    <tr>
                        <td>NIP</td>
                        <td colspan="3"><input type="text" name="nip" class="w-100" value="{{ $data->nip ?? '' }}"></td>
                    </tr>
                    <tr>
                        <td>Nama Dosen</td>
                        <td colspan="3"><input type="text" name="nama_dosen" class="w-100" value="{{ $data->nama_dosen ?? '' }}"></td>
                    </tr>
                    <tr>
                        <td>Pendidikan Terakhir</td>
                        <td colspan="3">
                            <select name="pendidikan_terakhir" class="w-100">
                                <option value="" selected disabled>-- Pilih Pendidikan Terakhir --</option>
                                <option value="SD" {{ ($data->pendidikan_terakhir ?? '') == 'SD' ? 'selected' : '' }}>SD</option>
                                <option value="SMP" {{ ($data->pendidikan_terakhir ?? '') == 'SMP' ? 'selected' : '' }}>SMP</option>
                                <option value="SMA/K" {{ ($data->pendidikan_terakhir ?? '') == 'SMA/K' ? 'selected' : '' }}>SMA/K</option>
                                <option value="D3" {{ ($data->pendidikan_terakhir ?? '') == 'D3' ? 'selected' : '' }}>D3</option>
                                <option value="S1" {{ ($data->pendidikan_terakhir ?? '') == 'S1' ? 'selected' : '' }}>S1</option>
                                <option value="S2" {{ ($data->pendidikan_terakhir ?? '') == 'S2' ? 'selected' : '' }}>S2</option>
                                <option value="S3" {{ ($data->pendidikan_terakhir ?? '') == 'S3' ? 'selected' : '' }}>S3</option>
                            </select>
                        </td>
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
                        <td>Mengajar Mata Kuliah</td>
                        <td colspan="3">
                            <select name="matakuliah" class="w-100">
                                <option value="" selected disabled>-- Pilih Mata Kuliah --</option>
                                @foreach($matakuliahs as $matakuliah)
                                    <option value="{{ $matakuliah->id }}" {{ ($matakuliah->pendidikan_terakhir ?? '') == $matakuliah->nama_mk ? 'selected' : '' }}>{{ $matakuliah->nama_mk }}</option>
                                @endforeach
                            </select>
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