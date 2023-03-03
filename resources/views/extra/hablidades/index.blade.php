<div class="basic-form">
    <div class="form-group">
        @foreach ($categorias as $item )
        <div class="form-check form-check-inline">
            <label class="form-check-label">
                <input value="{{ $item->categoria }}" type="checkbox" name="categoria[]" class="form-check-input"
                    checked>{{ $item->categoria }}
            </label>
        </div>

        @endforeach




    </div>

</div>
