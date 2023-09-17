<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('two-factor.login') }}">
        @csrf

        <div>
            <x-input-label for="code" :value="__('Code')" />
            <x-text-input id="code" class="block mt-1 w-full" type="text" name="code" autofocus />
            <x-input-error :messages="$errors->get('code')" class="mt-2" />
        </div>
        <div>
            <x-input-label for="recovery_code" :value="__('Recovery Code')" />
            <x-text-input id="recovery_code" class="block mt-1 w-full" type="text" name="recovery_code" autofocus />
            <x-input-error :messages="$errors->get('code')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ml-3">
                {{ __('Confirm') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
