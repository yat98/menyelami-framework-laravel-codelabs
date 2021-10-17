<form method="POST" action="{{ url('registrasi') }}">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <p>
        <label for="nama">Nama</label>
        <input type="text" name="nama" value="{{ old('nama') }}">
    </p>
    <p>
        <label for="alamat">Alamat</label>
        <input type="text" name="alamat" value="{{ old('alamat') }}">
    </p>
    <p>
        <label for="nomor_ktp">Nomor KTP</label>
        <input type="text" name="nomor_ktp" value="{{ old('nomor_ktp') }}">
    </p>
    <p>
        <input type="submit" value="Daftar">
    </p>
</form>
