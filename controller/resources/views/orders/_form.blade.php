<div class="form-group">
    {{ Form::label('customer', 'Customer') }}
    {{ Form::text('customer', null, ['class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::label('tipe', 'Tipe') }}
    {{ Form::select('tipe', ['kacang' => 'Kacang', 'coklat-kacang' => 'Coklat Kacang', 'keju' => 'Keju'], null, ['class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::label('jumlah', 'Jumlah') }}
    {{ Form::text('jumlah', null, ['class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::label('alamat', 'Alamat') }}
    {{ Form::textarea('alamat', null, ['class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::submit('Simpan', ['class' => 'btn btn-primary mt-4']) }}
</div>
