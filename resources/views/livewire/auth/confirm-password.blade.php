<div>
    <form wire:submit="confirmPassword" class="space-y-6">
        <div>
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="mt-1 block w-full" type="password" wire:model="form.password" required autocomplete="current-password" />
            <x-input-error class="mt-2" wire:model="form.password" />
        </div>

        <div class="flex items-center justify-end">
            <x-primary-button>
                {{ __('Confirm') }}
            </x-primary-button>
        </div>
    </form>
</div>
