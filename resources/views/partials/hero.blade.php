<section
    id="home"
    class="min-h-screen flex items-center justify-center pt-24 lg:pt-28">
    
    {{-- Hero Content --}}
    <div class="relative z-20 text-center max-w-4xl mx-auto px-auto">

        {{-- Logo --}}
        @if($siteSetting && $siteSetting->hero_logo)

            <img
                src="{{ asset('storage/'.$siteSetting->hero_logo) }}"
                class="mx-auto w-28 md:w-36 lg:w-44 mb-8"
                alt="Logo">

        @endif

        {{-- Badge --}}
        @if($siteSetting && $siteSetting->hero_badge)

            <span
                class="inline-block
                       px-5
                       py-2
                       rounded-full
                       bg-orange-500/90
                       text-white
                       text-sm
                       mb-12">

                {{ $siteSetting->hero_badge }}

            </span>

        @endif

        {{-- Headline --}}
        <h1
            class="text-3xl
                   md:text-5xl
                   font-semibold 
                   text-[#303030]
                   leading-tight">

            {{ $siteSetting->hero_headline }}

        </h1>

        {{-- Buttons --}}
        <div class="mt-10 flex flex-col items-center gap-10">

            <a
                href="{{ route('home') }}#projects"
                class="px-10
                       py-4
                       rounded-full
                       bg-white
                       text-gray-700
                       shadow-xl
                       transition
                       hover:-translate-y-1">

                {{ $siteSetting->projects_button_text }}

            </a>

            @if($siteSetting && $siteSetting->resume_pdf)

                <a
                    href="{{ asset('storage/'.$siteSetting->resume_pdf) }}"
                    download
                    class="text-[#606060] underline hover:text-orange-400">

                    {{ $siteSetting->resume_button_text }}

                </a>

            @endif

        </div>

    </div>
    

</section>