@php
use Illuminate\Support\Facades\Storage;
@endphp

<section id="tools" class="py-28 bg-[#F8F8F8]">

    <div class="container-custom">

        <div class="text-center mb-16">

            <p class="uppercase tracking-[0.3em] text-brand-orange font-semibold">
                Design Tools
            </p>

            <h2 class="text-5xl font-black text-[#303030] mt-3">
                Software & Technologies
            </h2>

            <p class="mt-5 max-w-2xl mx-auto text-[#606060] leading-8">
                Professional software I use to create high-quality graphic designs,
                branding, digital layouts, and creative assets.
            </p>

        </div>

        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-10">

            @foreach($tools as $tool)

                <div class="text-center group">

                    {{-- Pill Card --}}
                    <div
                        class="mx-auto
                            h-72
                            w-48
                            rounded-full
                            border
                            border-gray-200
                            bg-white
                            flex
                            flex-col
                            items-center
                            justify-center
                            shadow-sm
                            transition-all
                            duration-300
                            hover:bg-[#F8F8F8]
                            hover:border-[#F68B1F]
                            hover:-translate-y-2
                            hover:shadow-xl">

                        {{-- Logo Circle --}}
                        <div
                            class="flex
                                h-24
                                w-24
                                items-center
                                justify-center
                                rounded-full
                                bg-white
                                ring-1
                                ring-gray-200
                                shadow-sm
                                transition-all
                                duration-300
                                group-hover:ring-[#F68B1F]
                                group-hover:ring-4
                                group-hover:shadow-xl">

                            <img
                                src="{{ Storage::url($tool->icon) }}"
                                class="h-12 w-12 object-contain transition duration-300 group-hover:scale-110">
                        </div>

                        <h3
                            class="mt-6
                                px-5
                                text-center
                                text-base
                                font-semibold
                                text-[#303030]
                                leading-5
                                line-clamp-2
                                min-h-[2.5rem]">

                            {{ $tool->name }}

                        </h3>

                    </div>

                    {{-- Description --}}
                    <p
                        class="mt-5
                            text-sm
                            leading-6
                            text-[#606060]">

                        {{ $tool->label }}

                    </p>

                </div>

            @endforeach

        </div>

    </div>

</section>