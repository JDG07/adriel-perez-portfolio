@php
    use Illuminate\Support\Facades\Storage;

    $aboutImage = $siteSetting->about_image
        ? Storage::url($siteSetting->about_image)
        : null;

    $resumePreview = $siteSetting->resume_preview
        ? Storage::url($siteSetting->resume_preview)
        : null;

    $resumePdf = $siteSetting->resume_pdf
        ? Storage::url($siteSetting->resume_pdf)
        : null;
@endphp

<section id="about" class="about bg-[#F8F8F8] py-24">

    @php
        $tags = collect(explode(',', $siteSetting->about_tags ?? ''))
            ->map(fn($tag) => trim($tag))
            ->filter();
    @endphp

    <div class="max-w-7xl mx-auto px-6">

        <div class="grid lg:grid-cols-12 gap-12 items-start">

            {{-- LEFT : OWNER IMAGE --}}
            <div class="lg:col-span-3">

                @if($siteSetting->about_image)

                    <img
                        src="{{ $aboutImage}}"
                        alt="Owner"
                        class="w-full h-[520px] object-cover rounded-[28px] shadow-xl">

                @endif

            </div>

            {{-- CENTER : ABOUT --}}
            <div class="lg:col-span-6">

                <h2
                    class="text-5xl
                            font-black text-[#303030]
                           mb-5">

                    {{ $siteSetting->about_heading }}

                </h2>

                <div
                    class="space-y-5
                           text-[16px]
                           font-medium
                           leading-8
                           text-[#606060] ">

                    <p>{!! $siteSetting->about_paragraph_1 !!}</p>

                    <p>{!! $siteSetting->about_paragraph_2 !!}</p>

                    <p>{!! $siteSetting->about_paragraph_3 !!}</p>

                </div>

                {{-- TAGS --}}
                <div class="flex flex-wrap gap-3 mt-10">

                    @foreach($tags as $tag)
                        <span
                            class="inline-flex items-center
                                rounded-full
                                border border-[#F5821F]
                                bg-[#FFF5EC]
                                px-5 py-2
                                text-sm font-medium
                                text-[#F5821F]
                                shadow-sm
                                transition-all duration-300
                                hover:-translate-y-1
                                hover:scale-105
                                hover:bg-[#F5821F]
                                hover:text-white
                                hover:shadow-lg">

                            {{ $tag }}

                        </span>
                    @endforeach

                </div>

            </div>

            {{-- RIGHT : RESUME --}}
            <div class="lg:col-span-3">

                @if($siteSetting->resume_preview)

                    <div
                        class="rounded-[24px]
                            border-2 border-[#F5821F]
                            bg-white
                            p-3
                            shadow-xl
                            transition-all duration-300
                            hover:-translate-y-2
                            hover:shadow-2xl">

                        <img
                            src="{{ $resumePreview }}"
                            class="rounded-xl w-full h-[360px] object-cover">

                    </div>

                @endif

                @if($siteSetting->resume_pdf)

                    <div class="mt-6 flex justify-center">

                        <a
                            href="{{ $resumePdf }}"
                            download="{{ $siteSetting->name ?? 'Adriel_Perez' }}_Resume.pdf"
                            class="group mt-6 inline-flex items-center justify-center
                                gap-4 rounded-full
                                bg-[#F5821F]
                                px-10 py-4
                                font-medium
                                text-white
                                shadow-lg
                                transition-all duration-300
                                hover:-translate-y-1
                                hover:bg-[#E46F0C]
                                hover:shadow-2xl">

                            {{ $siteSetting->resume_button_text }}

                            <span
                                class="flex h-8 w-8 items-center justify-center
                                    rounded-full bg-white">

                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="h-4 w-4 text-[#F5821F]"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor">

                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M12 3v12m0 0l4-4m-4 4l-4-4m-5 8h18"/>

                                </svg>

                            </span>

                        </a>

                    </div>

                @endif

            </div>

        </div>

    </div>

</section>