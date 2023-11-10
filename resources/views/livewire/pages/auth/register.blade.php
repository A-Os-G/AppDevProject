<?php

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;


new #[Layout('layouts.guest')] class extends Component
{
    public string $name = '';

    public string $phone = '';

    public string $address = '';

    public string $email = '';

    public string $password = '';

    public string $password_confirmation = '';

    public function register(): void
    {
        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255','unique:'.User::class],
            'phone' => ['required','string', 'min:11','max:11','unique:'.User::class],
            'address' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
        ]);

        $validated['password'] = Hash::make($validated['password']);

        event(new Registered($user = User::create($validated)));

        auth()->login($user);

        $this->redirect(RouteServiceProvider::HOME, navigate: true);
    }
}; ?>

<div>
    <form wire:submit="register">
        <!-- Name -->
        <div class="text-m">
            <label for="name" :value="__('Name')" >Name</label>
            <input wire:model="name" id="name" class="block m-0.5 w-full rounded-md bg-m text-m" type="text" name="name" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Phone -->
        <div class="mt-2 text-m">
            <label for="phone" :value="__('Phone')">Phone</label>
            <input wire:model="phone" id="phone" class="block m-0.5 w-full rounded-md bg-m text-s" type="text" phone="phone" required autofocus autocomplete="phone" />
            <x-input-error :messages="$errors->get('phone')" class="mt-2" />
        </div>
        <!-- address -->
        <div class="mt-2 text-m">
            <label for="address" :value="__('Address')">Address</label>
            <input wire:model="address" id="address" class="block m-0.5 w-full rounded-md bg-m text-s" type="text" address="address" required autofocus autocomplete="address" />
            <x-input-error :messages="$errors->get('address')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-2 text-m">
            <label for="email" :value="__('Email')">Email</label>
            <input wire:model="email" id="email" class="block m-0.5 w-full rounded-md bg-m text-s" type="email" name="email" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-2 text-m">
            <label for="password" :value="__('Password')">Password</label>

            <input wire:model="password" id="password" class="block m-0.5 w-full rounded-md bg-m text-s"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-2 text-m">
            <label for="password_confirmation" :value="__('Confirm Password')">Confirm Password</label>

            <input wire:model="password_confirmation" id="password_confirmation" class="block m-0.5 w-full rounded-md bg-m text-s"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="block items-center justify-end mt-0.5 mb-5">
            <a class=" underline text-sm text-m hover:text-indigo-500 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}" wire:navigate>
                {{ __('Already registered?') }}
            </a>
        </div>
        <div class="flex items-center justify-center p-2 rounded-full hover:text-m hover:bg-s bg-m text-s font-semibold border-2 border-m">
        <button class="w-80">
            {{ __('Register') }}
        </button>
        </div>
    </form>
</div>
