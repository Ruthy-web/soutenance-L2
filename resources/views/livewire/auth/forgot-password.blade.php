<div>
    <form wire:submit="requestPasswordReset" class="space-y-6">
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="mt-1 block w-full" type="email" wire:model="form.email" required autofocus />
            <x-input-error class="mt-2" wire:model="form.email" />
        </div>

        <div class="flex items-center justify-end">
            <x-primary-button>
                {{ __('Email Password Reset Link') }}
            </x-primary-button>
        </div>
    </form>
</div>
