<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'My App')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <script src="https://kit.fontawesome.com/4f2d7302b1.js" crossorigin="anonymous"></script>
    <link rel="icon" type="image/webp" href="{{ asset('images/city_logo.webp') }}">
    @stack('styles')
</head>

<body class="bg-cover bg-center bg-no-repeat min-h-screen"
    style="background-image: url('{{ asset('images/cover.webp') }}');">
    @auth
    <header class="bg-white/90 backdrop-blur-sm border-b border-gray-200 fixed top-0 left-0 w-full z-50"
        x-data="{ mobileMenuOpen: false, userMenuOpen: false }">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <a href="{{ route(Auth::user()->getRoleNames()->first() . '.dashboard') }}" class="flex items-center space-x-2">
                    <img src="{{ asset('images/city_logo.webp') }}" class="h-8 w-8 object-contain" alt="Logo">
                    <span class="text-lg font-semibold text-gray-800">Color Run</span>
                </a>
                <div class="hidden sm:flex flex-grow justify-center space-x-6 text-sm font-medium text-gray-700">
                    <a href="{{ route(Auth::user()->getRoleNames()->first() . '.dashboard') }}" class="hover:text-blue-600 transition">Home</a>
                    @role('superadmin')
                    <a href="#" class="hover:text-blue-600 transition">List of accounts</a>
                    @endrole
                    <a href="{{ route(Auth::user()->getRoleNames()->first() . '.verifyQr.index') }}" class="hover:text-blue-600 transition">Verify Qr</a>
                </div>
                <div class="hidden sm:block">
                    <div class="relative" x-data="{ open: false }">
                        <button @click="open = !open"
                            class="flex items-center space-x-2 text-sm text-gray-700 hover:text-blue-600 focus:outline-none">
                            <span>
                                @auth
                                {{ Auth::user()->name }}
                                @endauth
                            </span>
                            <i class="fa-solid fa-caret-down"></i>
                        </button>
                        <div x-show="open" @click.outside="open = false" x-transition
                            class="absolute right-0 mt-2 w-40 bg-white border border-gray-200 rounded-md shadow-lg z-50">
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Update
                                Profile</a>
                            <form method="POST" action="{{ route(Auth::user()->getRoleNames()->first() . '.logout') }}">
                                @csrf
                                <button type="submit"
                                    class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-gray-100">
                                    Logout
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="sm:hidden">
                    <button @click="mobileMenuOpen = !mobileMenuOpen"
                        class="text-gray-700 hover:text-blue-600 focus:outline-none transition-all duration-300">
                        <template x-if="!mobileMenuOpen">
                            <i class="fas fa-bars text-xl"></i>
                        </template>
                        <template x-if="mobileMenuOpen">
                            <i class="fas fa-xmark text-xl"></i>
                        </template>
                    </button>
                </div>
            </div>
            <div x-show="mobileMenuOpen" x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 -translate-y-2" x-transition:enter-end="opacity-100 translate-y-0"
                x-transition:leave="transition ease-in duration-200"
                x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 -translate-y-2"
                class="sm:hidden mt-2 pb-4 space-y-2">

                <a href="#" class="block px-2 py-1 text-sm text-gray-700 hover:text-blue-600">Home</a>
                <a href="#" class="block px-2 py-1 text-sm text-gray-700 hover:text-blue-600">Update Profile</a>
                <form method="POST" action="#">
                    @csrf
                    <button type="submit" class="w-full text-left px-2 py-1 text-sm text-red-600 hover:bg-gray-100">
                        Logout
                    </button>
                </form>
            </div>
        </div>
    </header>
    @endauth

    <main class="flex items-center justify-center min-h-screen pt-5 px-4">
        @yield('content')
    </main>

    @stack('scripts')
</body>

</html>