<section id="testimonials" class="py-28 bg-[#F8F8F8]">

    <div class="container-custom">

        {{-- Heading --}}
        <div class="text-center mb-16">

            <p class="uppercase tracking-[0.3em] text-[#F68B1F] font-semibold">
                Testimonials
            </p>

            <h2 class="text-5xl font-black text-[#303030] mt-3">
                What Clients & Colleagues Say
            </h2>

            <p class="text-[#606060] mt-5 max-w-2xl mx-auto">
                Experiences from clients, teammates, and collaborators I've had the
                pleasure of working with.
            </p>

        </div>

        {{-- Testimonial Cards --}}
        <div class="space-y-6">

            @foreach($testimonials as $testimonial)

                <div
                    class="bg-white rounded-[24px] border border-gray-200 p-6 shadow-sm hover:shadow-lg hover:border-[#F68B1F]/40 transition-all duration-300">

                    <div class="flex gap-6 items-start">

                        {{-- Reviewer --}}
                        <div class="w-28 flex-shrink-0 text-center">

                            @if($testimonial->photo)

                                <img
                                    src="{{ Storage::url($testimonial->photo) }}"
                                    class="w-16 h-16 rounded-full object-cover mx-auto border-2 border-[#F68B1F]">

                            @endif

                            <div class="mt-3">

                                <h3 class="font-bold text-[#303030] text-sm">
                                    {{ $testimonial->reviewer_name }}
                                </h3>

                                @if($testimonial->occupation)
                                    <p class="text-xs text-[#606060]">
                                        {{ $testimonial->occupation }}
                                    </p>
                                @endif

                                @if($testimonial->location)
                                    <p class="text-xs text-gray-400 mt-1">
                                        📍 {{ $testimonial->location }}
                                    </p>
                                @endif

                            </div>

                        </div>

                        {{-- Content --}}
                        <div class="flex-1">

                            <div class="flex justify-between items-center mb-4">

                                {{-- Rating --}}
                                <div class="flex gap-1">

                                    @for($i = 1; $i <= 5; $i++)

                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            class="w-4 h-4 {{ $i <= $testimonial->rating ? 'text-[#F68B1F]' : 'text-gray-300' }}"
                                            fill="currentColor"
                                            viewBox="0 0 20 20">

                                            <path d="M9.049.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.914c.969 0 1.371 1.24.588 1.81l-3.975 2.888a1 1 0 00-.364 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.975-2.888a1 1 0 00-1.176 0l-3.975 2.888c-.783.57-1.838-.196-1.539-1.118l1.519-4.674a1 1 0 00-.364-1.118L.128 8.101c-.783-.57-.38-1.81.588-1.81H5.63a1 1 0 00.951-.69L8.1.927z"/>

                                        </svg>

                                    @endfor

                                </div>

                                {{-- Company Logo --}}
                                @if($testimonial->company_logo)

                                    <img
                                        src="{{ Storage::url($testimonial->company_logo) }}"
                                        class="h-8 object-contain max-w-[90px]">

                                @endif

                            </div>

                            {{-- Quote --}}
                            <div class="relative pl-6">

                                <span class="absolute left-0 top-0 text-4xl leading-none font-serif font-bold text-[#F68B1F]">
                                    “
                                </span>

                                <div class="prose max-w-none prose-p:text-[#606060] prose-p:leading-7 prose-p:mb-0">
                                    {!! $testimonial->feedback !!}
                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            @endforeach

        </div>

    </div>

</section>