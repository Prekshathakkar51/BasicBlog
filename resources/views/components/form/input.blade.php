@props(['name', 'type' => 'text', 'label', 'value' => '', 'error' => null])

<label class="floating-label mb-6">
    <input
        type="{{ $type }}"
        name="{{ $name }}"
        value="{{ old($name, $value) }}"
        placeholder="{{ $label }}"
        {{ $attributes->merge(['class' => 'input input-bordered']) }}>

    <span>{{ $label }}</span>
</label>

@error($name)
    <div class="label -mt-4 mb-2">
        <span class="label-text-alt text-error">{{ $message }}</span>
    </div>
@enderror