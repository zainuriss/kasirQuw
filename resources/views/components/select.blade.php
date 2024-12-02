<div class="form-group">
    @if ($label)
        <label for="{{ $name }}">{{ $label }}</label>
    @endif
    <select name="{{ $name }}" id="{{ $name }}" {{ $attributes->merge(['class' => 'form-control select2'])}} data-placeholder="Pilih {{ $label ?? $name }}">
        <option value="" disabled hidden {{ $selected === null ? 'selected' : '' }}>
            Pilih {{ $label ?? $name }}
        </option>
        @foreach ($options as $key => $value)
            <option value="{{ $key }}" {{ $selected == $key ? 'selected' : '' }}>
                {{ $value }}
            </option>
        @endforeach
    </select>
</div>