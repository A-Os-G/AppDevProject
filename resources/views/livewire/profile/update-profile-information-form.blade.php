<?php

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Validation\Rule;
use Livewire\Volt\Component;

new class extends Component
{
    public string $name = '';

    public string $email = '';

    public string $phone = '';

    public string $address = '';


    public function mount(): void
    {
        $this->name = auth()->user()->name;
        $this->phone = auth()->user()->phone;
        $this->email = auth()->user()->email;
        $this->address = auth()->user()->address;


    }

    public function updateProfileInformation(): void
    {
        $user = auth()->user();

        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255', Rule::unique(User::class)->ignore($user->id)],
            'phone' => ['required','string','min:11', 'max:11', Rule::unique(User::class)->ignore($user->id)],
            'address' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique(User::class)->ignore($user->id)],

        ]);

        $user->fill($validated);

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->save();

        $this->dispatch('profile-updated', name: $user->name);
    }

    public function sendVerification(): void
    {
        $user = auth()->user();

        if ($user->hasVerifiedEmail()) {
            $path = session('url.intended', RouteServiceProvider::HOME);

            $this->redirect($path);

            return;
        }

        $user->sendEmailVerificationNotification();

        session()->flash('status', 'verification-link-sent');
    }
}; ?>

<section>
    <header>
        <h2 class="text-lg font-medium text-s">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-s">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form wire:submit="updateProfileInformation" class="mt-6 space-y-6 ">
        <div>
            <label for="name" :value="__('Name')" class="text-s">Name</label>
            <input wire:model="name" id="name" name="name" type="text" class="mt-1 block w-full bg-s focus:bg-s border-gray-300 focus:border-m rounded-md shadow-sm text-m" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <label for="phone" :value="__('Phone')" class="text-s">Phone</label>
            <input wire:model="phone" id="phone" name="phone" type="text" class="mt-1 block w-full bg-s focus:bg-s border-gray-300 focus:border-m rounded-md shadow-sm text-m" required autofocus autocomplete="phone" />
            <x-input-error class="mt-2" :messages="$errors->get('phone')" />
        </div>

        <div>
            <label for="address" :value="__('Address')" class="text-s"> Address</label>
            <input wire:model="address" id="address" name="address" type="text" class="mt-1 block w-full  bg-s focus:bg-s border-gray-300 focus:border-m rounded-md shadow-sm text-m" required autofocus autocomplete="address" />
            <x-input-error class="mt-2" :messages="$errors->get('address')" />
        </div>

        <div>
            <label for="email" :value="__('Email')" class="text-s">Email</label>
            <input wire:model="email" id="email" name="email" type="email" class="mt-1 block w-full  bg-s focus:bg-s border-gray-300 focus:border-m rounded-md shadow-sm text-m" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if (auth()->user() instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! auth()->user()->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800 dark:text-gray-200">
                        {{ __('Your email address is unverified.') }}

                        <button wire:click.prevent="sendVerification" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4">
            <button class="bg-s text-m rounded-lg px-3 py-2 hover:bg-m hover:text-s border">{{ __('Save') }}</button>

            <x-action-message class="mr-3" on="profile-updated">
                {{ __('Saved.') }}
            </x-action-message>
        </div>
    </form>
</section>
