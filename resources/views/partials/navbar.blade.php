@php
    use Illuminate\Support\Facades\Storage;
@endphp

<header
    id="navbar"
    class="fixed top-5 left-0 right-0 z-50 transition-all duration-300">

    <nav
        class="mx-auto flex max-w-7xl items-center justify-between
               rounded-full border border-white/30
               bg-white/70 backdrop-blur-xl
               px-6 py-2.5
               shadow-lg">

        {{-- Logo --}}
        <a href="#home" class="flex items-center">

            @if(!empty($siteSetting?->hero_logo))

                <img
                    src="{{ Storage::url($siteSetting->hero_logo) }}"
                    alt="Logo"
                    class="h-9 w-auto">

            @else

                <span class="text-3xl font-bold text-[#F68B1F]">
                    A
                </span>

            @endif

        </a>

        {{-- Desktop Navigation --}}
        <div class="hidden lg:flex items-center gap-7">

            @foreach([
                'about' => 'About Me',
                'tools' => 'Design Tools',
                'projects' => 'Design Projects',
                'reviews' => 'Reviews',
                'contact' => 'Contact Me'
            ] as $id => $label)

                <a
                    href="#{{ $id }}"
                    class="nav-link">

                    {{ $label }}

                </a>

            @endforeach

        </div>

        {{-- Home Button --}}
        <a
            href="#home"
            class="hidden lg:flex
                   h-12 w-12
                   items-center justify-center
                   rounded-full
                   bg-[#F68B1F]
                   text-white
                   shadow-lg
                   transition-all duration-300
                   hover:-translate-y-1
                   hover:bg-[#E46F0C]
                   hover:shadow-xl">

            <svg
                xmlns="http://www.w3.org/2000/svg"
                class="h-5 w-5"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor">

                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M3 10.5L12 3l9 7.5M5 9.5V21h14V9.5"/>

            </svg>

        </a>

        {{-- Mobile button --}}
        <button
            id="menuBtn"
            class="lg:hidden rounded-xl p-2 transition hover:bg-orange-50">

            <svg
                xmlns="http://www.w3.org/2000/svg"
                class="h-7 w-7 text-[#F68B1F]"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor">

                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M4 6h16M4 12h16M4 18h16"/>

            </svg>

        </button>

    </nav>

    {{-- Mobile Menu --}}
    <div
        id="mobileMenu"
        class="mx-6 mt-3 hidden rounded-3xl bg-white shadow-xl">

        @foreach([
            'home' => 'Home',
            'about' => 'About Me',
            'tools' => 'Design Tools',
            'projects' => 'Design Projects',
            'reviews' => 'Reviews',
            'contact' => 'Contact Me'
        ] as $id => $label)

            <a
                href="#{{ $id }}"
                class="block border-b px-6 py-4 hover:bg-orange-50">

                {{ $label }}

            </a>

        @endforeach

    </div>

</header>