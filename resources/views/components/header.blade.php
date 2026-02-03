<header x-data="{ open: false }" class="sticky top-0 z-40 backdrop-blur bg-blue-50/30">
    <div class="max-w-7xl mx-auto px-4">
        <div class="flex items-center justify-between h-20">

            {{-- LEFT: Logo --}}
            <a href="{{ route('jobs.index') }}" class="flex items-center gap-3">
                <div class="w-12 h-12 md:w-14 md:h-14 rounded-2xl bg-lime-50/50 flex items-center justify-center">
                    <img src="{{ asset('images/leafhire.webp') }}" alt="LeafHire Icon"
                        class="w-9 h-9 md:w-12 md:h-12 object-contain" />
                </div>

                <span class="text-lg md:text-xl font-semibold tracking-tight text-lime-600">
                    Leaf<span class="font-bold text-lime-900">Hire</span>
                </span>
            </a>

            {{-- CENTER / RIGHT: Desktop navigation --}}
            <nav class="hidden md:flex items-center gap-2">

                <a href="{{ route('jobs.index') }}"
                    class="inline-flex items-center gap-2 px-4 py-2 rounded-xl text-sm font-medium
                           text-lime-700 hover:text-lime-900 hover:bg-lime-100 transition">
                    <x-heroicon-o-magnifying-glass class="w-5 h-5" />
                    Browse Jobs
                </a>

                @auth
                    <a href="{{ route('my-job-applications.index') }}"
                        class="inline-flex items-center gap-2 px-4 py-2 rounded-xl text-sm font-medium
                               text-gray-700 hover:text-gray-900 hover:bg-gray-100 transition">
                        <x-heroicon-o-clipboard-document-check class="w-5 h-5" />
                        My Applications
                    </a>

                    @if (auth()->user()->isEmployer())
                        <a href="{{ route('employer.index') }}"
                            class="inline-flex items-center gap-2 px-4 py-2 rounded-xl text-sm font-medium
                                   text-gray-700 hover:text-gray-900 hover:bg-gray-100 transition">
                            <x-heroicon-o-briefcase class="w-5 h-5" />
                            My Job Listings
                        </a>

                        <a href="{{ route('jobs.create') }}"
                            class="inline-flex items-center gap-2 px-5 py-2 rounded-xl text-sm font-semibold
                                   bg-lime-600 text-white hover:bg-lime-700 transition shadow-sm">
                            <x-heroicon-o-plus-circle class="w-5 h-5" />
                            Post a Job
                        </a>
                    @else
                        <a href="{{ route('employer.create') }}"
                            class="inline-flex items-center gap-2 px-5 py-2 rounded-xl text-sm font-semibold
                                   bg-lime-600 text-white hover:bg-lime-700 transition shadow-sm">
                            <x-heroicon-o-rocket-launch class="w-5 h-5" />
                            Start Hiring
                        </a>
                    @endif

                    {{-- User --}}
                    <div class="flex items-center gap-2 pl-3 ml-2 border-l border-gray-300">
                        <div class="w-9 h-9 rounded-full bg-gray-200 flex items-center justify-center text-gray-600">
                            <x-heroicon-o-user class="w-5 h-5" />
                        </div>

                        <span class="text-sm font-medium text-gray-700">
                            {{ auth()->user()->name }}
                        </span>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button class="p-2 rounded-lg text-gray-500 hover:text-red-600 hover:bg-red-50 transition"
                                title="Logout">
                                <x-heroicon-o-arrow-right-on-rectangle class="w-5 h-5" />
                            </button>
                        </form>
                    </div>
                @endauth

                @guest
                    <a href="{{ route('login') }}"
                        class="inline-flex items-center gap-2 px-5 py-2 rounded-xl text-sm font-semibold
                               bg-lime-600 text-white hover:bg-lime-700 transition shadow-sm">
                        <x-heroicon-o-arrow-right-on-rectangle class="w-5 h-5" />
                        Login
                    </a>
                @endguest
            </nav>

            {{-- RIGHT: Mobile menu button --}}
            <button @click="open = !open"
                class="md:hidden inline-flex items-center justify-center w-10 h-10 rounded-xl
                       bg-white border border-gray-200 text-gray-700 hover:bg-gray-50 transition"
                aria-label="Open menu">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>

        </div>
    </div>

    {{-- MOBILE MENU (unchanged logic, layout is fine) --}}
    <div x-cloak x-show="open" x-transition @click.outside="open = false"
        class="md:hidden absolute top-full inset-x-0 backdrop-blur-xs">
        <div class="px-6 py-6 space-y-3 bg-white/95 rounded-b-2xl">

            <a href="{{ route('jobs.index') }}"
                class="flex items-center justify-center gap-2 py-3 rounded-xl text-sm font-semibold
                       text-lime-700 bg-lime-100">
                <x-heroicon-o-magnifying-glass class="w-5 h-5" />
                Browse Jobs
            </a>

            @auth
                <a href="{{ route('my-job-applications.index') }}"
                    class="flex items-center justify-center gap-2 py-3 rounded-xl text-sm font-medium
                           text-gray-700 bg-gray-100">
                    <x-heroicon-o-clipboard-document-check class="w-5 h-5" />
                    My Applications
                </a>

                @if (auth()->user()->isEmployer())
                    <a href="{{ route('employer.index') }}"
                        class="flex items-center justify-center gap-2 py-3 rounded-xl text-sm font-medium
                               text-gray-700 bg-gray-100">
                        <x-heroicon-o-briefcase class="w-5 h-5" />
                        My Job Listings
                    </a>

                    <a href="{{ route('jobs.create') }}"
                        class="flex items-center justify-center gap-2 py-3 rounded-xl text-sm font-semibold
                               bg-lime-600 text-white">
                        <x-heroicon-o-plus-circle class="w-5 h-5" />
                        Post a Job
                    </a>
                @else
                    <a href="{{ route('employer.create') }}"
                        class="flex items-center justify-center gap-2 py-3 rounded-xl text-sm font-semibold
                               bg-lime-600 text-white">
                        <x-heroicon-o-rocket-launch class="w-5 h-5" />
                        Start Hiring
                    </a>
                @endif

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button
                        class="w-full flex items-center justify-center gap-2 py-3 rounded-xl
                               text-sm font-semibold text-red-600 bg-red-50">
                        <x-heroicon-o-arrow-right-on-rectangle class="w-5 h-5" />
                        Logout
                    </button>
                </form>
            @endauth
        </div>
    </div>
</header>
