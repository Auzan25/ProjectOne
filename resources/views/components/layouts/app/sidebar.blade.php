<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        @include('partials.head')
        <!-- CSS alertifyjs -->
        <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/css/alertify.min.css"/>
        <!-- Default theme -->
        <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/css/themes/default.min.css"/>
    </head>
    {{-- <body class="min-h-screen bg-white dark:bg-zinc-800"> --}}
    <body class="min-h-screen bg-gray-50 dark:bg-zinc-800">

        <div class="hidden lg:block h-16"></div> <!-- Décalage équivalent à la hauteur du header -->

        <header class="mx-3 hidden lg:flex fixed top-0 z-50 left-[16rem] w-[calc(100%-16rem)] items-center justify-between bg-white dark:bg-zinc-800 shadow-md rounded-bl-xl px-6 py-2 h-14">
            <div class="flex items-center space-x-4">
                <h1 class="text-lg font-semibold text-gray-800 dark:text-white uppercase">CRM Auchan Sénégal</h1>
            </div>

            <!-- Barre de recherche centrée -->
            <div class="relative w-[40%]">
                {{-- <div class="flex rounded-md shadow-sm overflow-hidden border border-gray-300 dark:border-zinc-600 bg-white dark:bg-zinc-700">
                    <!-- Menu déroulant à gauche -->
                    <div class="relative">
                        <button id="searchFilterToggle" type="button"
                            class="flex items-center justify-between px-3 py-2 text-sm bg-gray-100 dark:bg-zinc-800 text-gray-700 dark:text-white hover:bg-gray-200 dark:hover:bg-zinc-700">
                            Tout
                            <svg class="ml-1 h-4 w-4" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.293l3.71-4.06a.75.75 0 111.08 1.04l-4.25 4.667a.75.75 0 01-1.08 0L5.21 8.27a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                            </svg>
                        </button>

                        <!-- Menu déroulant caché par défaut -->
                        <ul id="searchFilter"
                            class="absolute z-10 mt-1 hidden w-36 bg-white dark:bg-zinc-700 shadow rounded-md py-1 text-sm text-gray-700 dark:text-white">
                            <li class="px-3 py-2 hover:bg-gray-100 dark:hover:bg-zinc-600 cursor-pointer">Clients</li>
                            <li class="px-3 py-2 hover:bg-gray-100 dark:hover:bg-zinc-600 cursor-pointer">Commandes</li>
                            <li class="px-3 py-2 hover:bg-gray-100 dark:hover:bg-zinc-600 cursor-pointer">Produits</li>
                        </ul>
                    </div>


                    <!-- Champ de texte -->
                    <input
                        type="text"
                        placeholder="Rechercher..."
                        class="flex-1 px-4 py-2 text-sm text-gray-900 dark:text-white bg-white dark:bg-zinc-700 focus:outline-none"
                    />

                    <!-- Bouton recherche -->
                    <button type="submit" class="px-3 bg-blue-500 hover:bg-blue-600 text-white">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35M16.65 16.65A7 7 0 1116.65 2a7 7 0 010 14z" />
                        </svg>
                    </button>
                </div> --}}
            </div>

            <!-- Menu utilisateur à droite -->
            <div class="flex items-center space-x-4">
                <button class="relative">
                    <svg class="w-6 h-6 text-gray-700 dark:text-white" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11c0-3.072-1.355-5.695-4-6.32V4a2 2 0 10-4 0v.68C8.355 5.305 7 7.928 7 11v3.159c0 .538-.214 1.055-.595 1.436L5 17h5m5 0v1a3 3 0 11-6 0v-1m6 0H9"/>
                    </svg>
                </button>

                <!-- Flux user dropdown -->
                <flux:dropdown position="bottom" align="end">
                    <flux:profile
                        :name="auth()->user()->name"
                        :initials="auth()->user()->initials()"
                        icon:trailing="chevrons-up-down"
                    />
                    <flux:menu class="w-[220px]">
                        <flux:menu.radio.group>
                            <flux:menu.item :href="route('settings.profile')" icon="user" wire:navigate>Mon profil</flux:menu.item>
                            <flux:menu.item :href="route('settings.profile')" icon="cog" wire:navigate>Paramètres</flux:menu.item>
                        </flux:menu.radio.group>
                        <flux:menu.separator />
                        <form method="POST" action="{{ route('logout') }}" class="w-full">
                            @csrf
                            <flux:menu.item as="button" type="submit" icon="arrow-right-start-on-rectangle" class="w-full">
                                Déconnexion
                            </flux:menu.item>
                        </form>
                    </flux:menu>
                </flux:dropdown>
            </div>
        </header>
        <!-- new header created end -->
        



        {{-- <flux:sidebar sticky stashable class="border-e border-zinc-200 bg-zinc-50 dark:border-zinc-700 dark:bg-zinc-900"> --}}
        <flux:sidebar sticky stashable class="border-e border-zinc-200 bg-gray-100 shadow-lg dark:border-zinc-700 dark:bg-zinc-900">
            <flux:sidebar.toggle class="lg:hidden" icon="x-mark" />

            <a href="{{ route('dashboard') }}" class="me-5 flex items-center space-x-2 rtl:space-x-reverse" wire:navigate>
                <x-app-logo />
            </a>

            <flux:navlist variant="outline">
                <flux:navlist.group :heading="__('Platforme')" class="grid">
                    <flux:navlist.item icon="home" :href="route('dashboard')" :current="request()->routeIs('dashboard')" wire:navigate>{{ __('Dashboard') }}</flux:navlist.item>
                </flux:navlist.group>

                <flux:navlist.group :heading="__('Gestion')" class="grid">
                    <flux:navlist.item icon="users" :href="route('admin.customers')" :current="request()->routeIs('admin.customers')" wire:navigate.hover>{{ __('Clients') }}</flux:navlist.item>
                    {{-- <flux:navlist.item icon="home" :href="route('dashboard')" :current="request()->routeIs('dashboard')" wire:navigate>{{ __('Ventes') }}</flux:navlist.item> --}}
                    {{-- <flux:navlist.item icon="home" :href="route('dashboard')" :current="request()->routeIs('dashboard')" wire:navigate>{{ __('Produits') }}</flux:navlist.item> --}}

                    {{-- <flux:navlist.item icon="shopping-cart" :href="route('ventes.index')" :current="request()->routeIs('ventes.*')" wire:navigate>{{ __('Ventes') }}</flux:navlist.item> --}}
                    <flux:navlist.item icon="shopping-cart" :href="route('admin.ventes')" :current="request()->routeIs('admin.ventes')" wire:navigate>{{ __('Ventes') }}</flux:navlist.item>
                    <flux:navlist.item icon="folder" :href="route('admin.ventes')" :current="request()->routeIs('admin.ventes')" wire:navigate>{{ __('Rapports & Segments') }}</flux:navlist.item>
                    {{-- <flux:navlist.item icon="box" :href="route('produits.index')" :current="request()->routeIs('produits.*')" wire:navigate>{{ __('Produits') }}</flux:navlist.item> --}}
                    {{-- <flux:navlist.item icon="user-circle" :href="route('utilisateurs.index')" :current="request()->routeIs('utilisateurs.*')" wire:navigate>{{ __('Utilisateurs') }}</flux:navlist.item> --}}
                    {{-- <flux:navlist.item icon="building-storefront" :href="route('magasins.index')" :current="request()->routeIs('magasins.*')" wire:navigate>{{ __('Magasins') }}</flux:navlist.item> --}}
                    {{-- <flux:navlist.item icon="clipboard-document-check" :href="route('taches.index')" :current="request()->routeIs('taches.*')" wire:navigate>{{ __('Tâches') }}</flux:navlist.item> --}}
                    {{-- <flux:navlist.item icon="truck" :href="route('commandes.index')" :current="request()->routeIs('commandes.*')" wire:navigate>{{ __('Commandes') }}</flux:navlist.item> --}}
                    {{-- <flux:navlist.item icon="handshake" :href="route('partenaires.index')" :current="request()->routeIs('partenaires.*')" wire:navigate>{{ __('Partenaires') }}</flux:navlist.item> --}}
                    {{-- <flux:navlist.item icon="chat-bubble-left-right" :href="route('chat.index')" :current="request()->routeIs('chat.*')" wire:navigate>{{ __('Chat') }}</flux:navlist.item> --}}
                    <flux:navlist.group expandable heading="Favorites" class="hidden lg:grid">
                        <flux:navlist.item href="#">Marketing site</flux:navlist.item>
                        <flux:navlist.item href="#">Android app</flux:navlist.item>
                        <flux:navlist.item href="#">Brand guidelines</flux:navlist.item>
                    </flux:navlist.group>
                </flux:navlist.group>
            </flux:navlist>

            <flux:spacer />

            <flux:navlist variant="outline">
                <flux:navlist.item icon="user-circle" :href="route('admin.users')" :current="request()->routeIs('admin.users')" wire:navigate>{{ __('Utilisateurs') }}</flux:navlist.item>
                {{-- <flux:navlist.item icon="question-mark-circle" :href="route('faq')" :current="request()->routeIs('faq')" wire:navigate>{{ __('FAQ') }}</flux:navlist.item>
                <flux:navlist.item icon="star" href="route('reviews.index')" :current="request()->routeIs('reviews.*')" wire:navigate>
                    {{ __('Avis Clients') }}
                </flux:navlist.item> --}}

                {{-- <flux:navlist.item icon="folder-git-2" :href="route('admin.dashbrolesperms')" :current="request()->routeIs('admin.dashbrolesperms')" wire:navigate>
                {{ __('Roles & Permissions') }}
                </flux:navlist.item> --}}
                <flux:navlist.item icon="book-open-text" href="https://laravel.com/docs/starter-kits#livewire" target="_blank">
                {{ __('Documentation') }}
                </flux:navlist.item>
            </flux:navlist>

            <!-- Desktop User Menu -->
            <flux:dropdown class="hidden lg:block" position="bottom" align="start">
                <flux:profile
                    :name="auth()->user()->name"
                    :initials="auth()->user()->initials()"
                    icon:trailing="chevrons-up-down"
                />

                <flux:menu class="w-[220px]">
                    <flux:menu.radio.group>
                        <div class="p-0 text-sm font-normal">
                            <div class="flex items-center gap-2 px-1 py-1.5 text-start text-sm">
                                <span class="relative flex h-8 w-8 shrink-0 overflow-hidden rounded-lg">
                                    <span
                                        class="flex h-full w-full items-center justify-center rounded-lg bg-neutral-200 text-black dark:bg-neutral-700 dark:text-white"
                                    >
                                        {{ auth()->user()->initials() }}
                                    </span>
                                </span>

                                <div class="grid flex-1 text-start text-sm leading-tight">
                                    <span class="truncate font-semibold">{{ auth()->user()->name }}</span>
                                    <span class="truncate text-xs">{{ auth()->user()->email }}</span>
                                </div>
                            </div>
                        </div>
                    </flux:menu.radio.group>

                    <flux:menu.separator />

                    <flux:menu.radio.group>
                        <flux:menu.item :href="route('settings.profile')" icon="cog" wire:navigate>{{ __('Settings') }}</flux:menu.item>
                    </flux:menu.radio.group>

                    <flux:menu.separator />

                    <form method="POST" action="{{ route('logout') }}" class="w-full">
                        @csrf
                        <flux:menu.item as="button" type="submit" icon="arrow-right-start-on-rectangle" class="w-full">
                            {{ __('Log Out') }}
                        </flux:menu.item>
                    </form>
                </flux:menu>
            </flux:dropdown>
        </flux:sidebar>

        <!-- Mobile User Menu -->
        <flux:header class="lg:hidden">
            <flux:sidebar.toggle class="lg:hidden" icon="bars-2" inset="left" />

            <flux:spacer />

            <flux:dropdown position="top" align="end">
                <flux:profile
                    :initials="auth()->user()->initials()"
                    icon-trailing="chevron-down"
                />

                <flux:menu>
                    <flux:menu.radio.group>
                        <div class="p-0 text-sm font-normal">
                            <div class="flex items-center gap-2 px-1 py-1.5 text-start text-sm">
                                <span class="relative flex h-8 w-8 shrink-0 overflow-hidden rounded-lg">
                                    <span
                                        class="flex h-full w-full items-center justify-center rounded-lg bg-neutral-200 text-black dark:bg-neutral-700 dark:text-white"
                                    >
                                        {{ auth()->user()->initials() }}
                                    </span>
                                </span>

                                <div class="grid flex-1 text-start text-sm leading-tight">
                                    <span class="truncate font-semibold">{{ auth()->user()->name }}</span>
                                    <span class="truncate text-xs">{{ auth()->user()->email }}</span>
                                </div>
                            </div>
                        </div>
                    </flux:menu.radio.group>

                    <flux:menu.separator />

                    <flux:menu.radio.group>
                        <flux:menu.item :href="route('settings.profile')" icon="cog" wire:navigate>{{ __('Settings') }}</flux:menu.item>
                    </flux:menu.radio.group>

                    <flux:menu.separator />

                    <form method="POST" action="{{ route('logout') }}" class="w-full">
                        @csrf
                        <flux:menu.item as="button" type="submit" icon="arrow-right-start-on-rectangle" class="w-full">
                            {{ __('Log Out') }}
                        </flux:menu.item>
                    </form>
                </flux:menu>
            </flux:dropdown>
        </flux:header>

        {{ $slot }}

        <!-- JavaScript Alertifyjs -->
        <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/alertify.min.js"></script>
        <script>
            document.addEventListener('livewire:init', () => {
                window.addEventListener('notify', event => {
                    //console.log('Received notification event:', event.detail[0].text);
                    alertify.set('notifier','position', event.detail[0].position || 'top-right');
                    alertify.notify(event.detail[0].text, event.detail[0].type || 'success');
                });
            });
        </script>

        @fluxScripts

        @stack('scripts')

    </body>
</html>



