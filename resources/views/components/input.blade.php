@props(['name', 'type' => 'text', 'label', 'value' => '', 'img' => 'null'])
<div class="mt-5 w-3/4 mx-2">
    <div class="flex items-center">
        <label for="{{ $name }}" class="text-Primary font-medium text-xl">{{ ucfirst($label) }}</label>
        @if ($img != 'null')
            <img src="{{ $img }}" class="w-7 ml-3">
        @endif
    </div>
    @error($name)
        <span class="text-red-600 font-bold ml-5">*{{ $message }}</span>
    @enderror
    <input type="{{ $type }}" id="{{ $name }}" name="{{ $name }}" value="{{ $value }}"
        class="w-full bg-transparent outline-0 cursor-pointer mt-4 border-2 rounded-xl border-Primary p-2">
</div>
