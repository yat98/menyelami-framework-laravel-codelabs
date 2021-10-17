<form method="POST" action="{{ url('upload-profile-picture') }}" enctype="multipart/form-data">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <p>
        <label for="nama">Pilih photo</label>
        <input type="file" name="photo">
    </p>
    <p>
        <input type="submit" value="Upload">
    </p>
</form>
