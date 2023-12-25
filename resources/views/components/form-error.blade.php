@if($errors->has($field))

	<div class="invalid-feedback d-block">
        <strong>{{ $errors->first($field) }}</strong>
    </div>

@endif