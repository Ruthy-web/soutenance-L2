<div>
    <form wire:submit="resetPassword" class="space-y-6">
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="mt-1 block w-full" type="email" wire:model="form.email" required autofocus />
            <x-input-error class="mt-2" wire:model="form.email" />
        </div>

        <div>
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="mt-1 block w-full" type="password" wire:model="form.password" required />
            <x-input-error class="mt-2" wire:model="form.password" />
        </div>

        <div>
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
            <x-text-input id="password_confirmation" class="mt-1 block w-full" type="password" wire:model="form.password_confirmation" required />
            <x-input-error class="mt-2" wire:model="form.password_confirmation" />
        </div>

        <div class="flex items-center justify-end">
            <x-primary-button>
                {{ __('Reset Password') }}
            </x-primary-button>
        </div>
    </form>
</div>
