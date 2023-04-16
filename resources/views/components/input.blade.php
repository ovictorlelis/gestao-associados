<div class="form-floating">
    <input {{ $attributes }} class="form-control shadow-none" id="{{ $input }}" label="{{ $label }}"
        name="{{ $input }}" placeholder="{{ $label }}">
    <label for="{{ $input }}">{{ $label }}</label>
</div>
@error($input)
    <div class="form-text text-danger">
        {{ $message }}
    </div>
@enderror
