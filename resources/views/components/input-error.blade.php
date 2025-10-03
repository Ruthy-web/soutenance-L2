@if ($errors->has($attributes->get('wire:model')))
    <div class="mt-2 text-sm text-red-600 {{ $class }}">
        {{ $errors->first($attributes->get('wire:model')) }}
    </div>
@endif