<input 
    id="{{ $id }}" 
    type="{{ $type }}" 
    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm {{ $class }}"
    @if($required) required @endif
    @if($autofocus) autofocus @endif
    @if($autocomplete) autocomplete="{{ $autocomplete }}" @endif
    {{ $attributes }}
>