<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-4xl text-m leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <x-slot name="slot">
        <div class="pb-12 bg-s">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="p-4 sm:p-8 bg-m text-s shadow sm:rounded-lg">
                    <div class="max-w-xl">
                        <livewire:profile.update-profile-information-form />

                    </div>
                </div>

                <div class="p-4 sm:p-8 bg-m shadow sm:rounded-lg">
                    <div class="max-w-xl">
                        <livewire:profile.update-password-form />
                    </div>
                </div>

                <div class="p-4 sm:p-8 bg-m shadow sm:rounded-lg">
                    <div class="max-w-xl">
                        <livewire:profile.delete-user-form />
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
</x-app-layout>
