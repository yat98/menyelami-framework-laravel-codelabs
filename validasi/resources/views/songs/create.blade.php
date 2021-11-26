<form action="{{ url('/songs') }}" method="POST">
    @csrf

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach

            {{-- @foreach ($errors->get('artist') as $error)
                <li>{{ $error }}</li>
            @endforeach --}}
            {{-- <li>{!! $errors->first('artist', '<b class="error">:message</b>') !!}</li> --}}
        </ul>
    @endif

    <div>
        <label for="track">Track</label>
        <input type="text" name="track_no" value="{{ old('track_no') }}">
    </div>

    <div>
        <label for="title">Title</label>
        <input type="text" name="title" value="{{ old('title') }}">
        {!! $errors->first('title', '<div class="error">:message</div>') !!}
    </div>

    <div>
        <label for="album">Album</label>
        <input type="text" name="album" value="{{ old('album') }}">
    </div>

    <div>
        <label for="artist">Artist</label>
        <input type="text" name="artist" value="{{ old('artist') }}"
            class="{{ $errors->has('artist') ? 'has-error' : '' }}">
        {!! $errors->first('artist', '<div class="error">:message</div>') !!}
    </div>

    @foreach (range(1, 5) as $index)
        <div>
            <label for="person-{{ $index }}">Person {{ $index }}</label>
            <input type="text" name="person[{{ $index }}][name]" id="person-{{ $index }}"
                value="{{ old('person.' . $index . '.name') }}">
            {!! $errors->first('person.' . $index . '.name', '<div class="error">:message</div>') !!}
        </div>
    @endforeach

    <div>
        <button type="submit">Tambah</button>
    </div>
</form>
