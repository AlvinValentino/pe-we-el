<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Menambah KRS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>
    <div class="bg-black text-white" style="max-width: 500px; width:100%; padding: 10px;">
        <form action="{{ $type == 'Create' ? route('krs.store') : route('krs.update', $data->id) }}" method="POST">
            @csrf

            @if($type == 'Edit')
            <input type="hidden" name="_method" value="put" />
            @endif

            <table class="w-100">
                <tbody>
                    <tr>
                        @if($type == 'Create')
                        <th colspan="6"><h1 class="text-center">Tambah KRS</h1></th>
                        @else
                        <th colspan="6"><h1 class="text-center">Edit KRS</h1></th>
                        @endif
                    </tr>
                    <tr>
                        <td>Mahasiswa</td>
                        <td colspan="3">
                            <select name="mahasiswa_id" id="mahasiswa_id" class="w-100">
                                <option value="" selected disabled>-- Pilih Mahasiswa --</option>
                                @foreach($mahasiswas as $mahasiswa)
                                    <option value="{{ $mahasiswa->id }}" {{ ($data->mahasiswa_id ?? '') == $mahasiswa->id ? 'selected' : '' }}>{{ $mahasiswa->NIM }} - {{ $mahasiswa->name }}</option>
                                @endforeach
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Mata Kuliah</td>
                        <td colspan="3">
                            <select name="matakuliah_id" id="matakuliah_id" class="w-100">
                                <option value="" selected disabled>-- Pilih Mata Kuliah --</option>
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $('#mahasiswa_id').on('change', function() {
        let mahasiswaId = $(this).val();

        $('#matakuliah_id').html('<option value="" selected disabled>-- Pilih Mata Kuliah --</option>');

        if (mahasiswaId) {
            $.ajax({
                url: '/get-mata-kuliah-by-mahasiswa/' + mahasiswaId,
                type: 'GET',
                dataType: 'json',
                success: function(response) {
                    $('#matakuliah_id').empty();
                    $('#matakuliah_id').append('<option value="" selected disabled>-- Pilih Mata Kuliah --</option>');

                    $.each(response, function(key, matakuliah) {
                        $('#matakuliah_id').append(
                            `<option value="${matakuliah.id}">${matakuliah.kode_mk} - ${matakuliah.nama_mk}</option>`
                        );
                    });
                },
                error: function() {
                    alert('Terjadi kesalahan saat memuat data mata kuliah.');
                }
            });
        }
    });
});
</script>