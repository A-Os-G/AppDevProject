<?php

use Livewire\Volt\Component;

new class extends Component
{
    public function logout(): void
    {
        auth()->guard('web')->logout();

        session()->invalidate();
        session()->regenerateToken();

        $this->redirect('/', navigate: true);
    }
}; ?>

<nav x-data="{ open: false }" class="bg-white dark:bg-m border-b border-gray-100 dark:border-gray-700">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 shadow-xl">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="/dashboard">
                        <img src="/pics/logo.jpg" class="block h-16 w-auto fill-current text-gray-800 dark:text-gray-200" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <div class="inline-flex items-center px-1 pt-1 hover:border-b-2 rounded text-sm font-medium leading-5 text-s focus:outline-none focus:text-white focus:border-s transition duration-150 ease-in-out">
                        <a href="{{url('/dashboard')}}">
                        {{ __('Home') }}
                        </a>
                    </div>
                    <!-- Doen't have a route yet -->
                    <div class="inline-flex items-center px-1 pt-1 hover:border-b-2 rounded text-sm font-medium leading-5 text-s focus:outline-none focus:text-white focus:border-s transition duration-150 ease-in-out">
                        <a href="{{url('/shop')}}">
                        {{ __('Shop') }}
                        </a>
                    </div>
                    <div class="inline-flex items-center px-1 pt-1 hover:border-b-2 rounded text-sm font-medium leading-5 text-s focus:outline-none focus:text-white focus:border-s transition duration-150 ease-in-out">
                        <a href="{{url('/cart')}}">
                        {{ __('Cart') }}
                        </a>
                    </div>
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-m bg-s hover:text-s hover:bg-m focus:outline-none transition ease-in-out duration-150">
                            <div x-data="{ name: '{{ auth()->user()->name }}' }" x-text="name" x-on:profile-updated.window="name = $event.detail.name"></div>

                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>
                        
                    <x-slot name="content">
                        <a href='/profile'>
                            <div class="block w-full px-4 py-2 text-left text-sm leading-5 bg-m hover:bg-s hover:text-m text-s focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out">
                                {{ __('Profile') }}
                            </div>
                        </a>

                        @if (Auth::check())
                        <div class="block w-full px-4 py-2 text-left text-sm leading-5 bg-m hover:bg-s hover:text-m text-s focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out">
                            <form action="{{ route('logout') }}" method="post">
                                    @csrf
                                <button class="" type="submit">Logout</button>
                            </form>
                        @endif
                        </div>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-m  hover:text-s hover:bg-m bg-s transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <a href='/dashboard'>
                <div class="block w-full px-4 py-2 text-bold text-left text-sm leading-5 bg-m hover:bg-s hover:text-m text-s focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out">
                    {{ __('Home') }}
                </div>
            </a>

            <a href='/shop'>
                <div class="block w-full px-4 py-2 text-bold text-left text-sm leading-5 bg-m hover:bg-s hover:text-m text-s focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out">
                    {{ __('Shop') }}
                </div>
            </a>

            <a href='/cart'>
                <div class="block w-full px-4 py-2 text-bold text-left text-sm leading-5 bg-m hover:bg-s hover:text-m text-s focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out">
                    {{ __('Cart') }}
                </div>
            </a>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800 dark:text-gray-200" x-data="{ name: '{{ auth()->user()->name }}' }" x-text="name" x-on:profile-updated.window="name = $event.detail.name"></div>
                <div class="font-medium text-sm text-gray-500">{{ auth()->user()->email }}</div>
            </div>

            <div class="block w-full px-4 py-2 text-left text-sm leading-5 bg-m hover:bg-s hover:text-m text-s focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out">
                <a href="{{url('/profile')}}">
                    {{ __('Profile') }}
                </a>
            </div>

                @if (Auth::check())
            <div class="block w-full px-4 py-2 text-left text-sm leading-5 bg-m hover:bg-s hover:text-m text-s focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out">
                <form action="{{ route('logout') }}" method="post">
                        @csrf
                    <button class="" type="submit">Logout</button>
                </form>
            </div>
                @endif
        </div>
    </div>
</nav>
