<section id="contact" class="py-24 bg-[#F8F8F8]">

    <div class="max-w-6xl mx-auto px-6">

        {{-- Heading --}}
        <div class="text-center mb-16">

            <p class="uppercase tracking-[0.3em] text-[#F68B1F] font-semibold">
                CONTACT
            </p>

            <h2 class="text-5xl font-black text-[#303030] mt-3">
                {{ $siteSetting->contact_heading }}
            </h2>

            <p class="text-[#606060] mt-5 max-w-2xl mx-auto leading-8">
                {{ $siteSetting->contact_description }}
            </p>

        </div>

        <div class="grid lg:grid-cols-2 gap-10">

            {{-- LEFT --}}
            <div class="space-y-14">

                {{-- Email --}}
                <div class="bg-white rounded-3xl p-6 shadow-sm border border-gray-100 flex items-center gap-5 hover:shadow-lg transition">

                    <div class="w-14 h-14 rounded-2xl bg-[#F68B1F]/10 flex items-center justify-center">

                        <i class="fa-solid fa-envelope text-[#F68B1F] text-xl"></i>

                    </div>

                    <div>

                        <p class="text-sm uppercase tracking-widest text-gray-400">
                            Email
                        </p>

                        <p class="font-semibold text-[#303030]">
                            {{ $siteSetting->contact_email }}
                        </p>

                    </div>

                </div>

                {{-- Phone --}}
                <div class="bg-white rounded-3xl p-6 shadow-sm border border-gray-100 flex items-center gap-5 hover:shadow-lg transition">

                    <div class="w-14 h-14 rounded-2xl bg-[#F68B1F]/10 flex items-center justify-center">

                        <i class="fa-solid fa-phone text-[#F68B1F] text-xl"></i>

                    </div>

                    <div>

                        <p class="text-sm uppercase tracking-widest text-gray-400">
                            Phone
                        </p>

                        <p class="font-semibold text-[#303030]">
                            {{ $siteSetting->contact_phone }}
                        </p>

                    </div>

                </div>

                {{-- Location --}}
                <div class="bg-white rounded-3xl p-6 shadow-sm border border-gray-100 flex items-center gap-5 hover:shadow-lg transition">

                    <div class="w-14 h-14 rounded-2xl bg-[#F68B1F]/10 flex items-center justify-center">

                        <i class="fa-solid fa-location-dot text-[#F68B1F] text-xl"></i>

                    </div>

                    <div>

                        <p class="text-sm uppercase tracking-widest text-gray-400">
                            Location
                        </p>

                        <p class="font-semibold text-[#303030]">
                            {{ $siteSetting->contact_address }}
                        </p>

                    </div>

                </div>

            </div>

            {{-- RIGHT --}}
            <div class="bg-white rounded-[32px] shadow-sm border border-gray-100 p-10 flex flex-col justify-between">

                <div>

                    <h3 class="text-3xl font-bold text-[#303030]">
                        Ready to work together?
                    </h3>

                    <p class="text-[#606060] mt-4 leading-8">
                        I'm always open to discussing freelance work,
                        internships, creative collaborations, or full-time opportunities.
                    </p>

                </div>

                {{-- CTA --}}
                <a href="mailto:{{ $siteSetting->contact_email }}?subject=Portfolio%20Inquiry"
                    class="mt-10 inline-flex justify-center items-center gap-3 bg-[#F68B1F] hover:bg-[#d97706] text-white font-semibold py-4 rounded-full transition-all duration-300 shadow-lg hover:shadow-xl">

                    <i class="fa-solid fa-paper-plane"></i>

                    Let's Work Together

                </a>

                {{-- Socials --}}
                <div class="mt-10">

                    <p class="uppercase tracking-[0.2em] text-sm text-gray-400 mb-5">
                        Follow Me
                    </p>

                    <div class="flex gap-4">

                        <a href="{{ $siteSetting->facebook_url }}"
                            target="_blank"
                            class="w-12 h-12 rounded-xl bg-[#F8F8F8] border border-gray-200 flex items-center justify-center hover:bg-[#F68B1F] hover:text-white hover:scale-105 transition">

                            <i class="fa-brands fa-facebook-f text-lg"></i>

                        </a>

                        <a href="{{ $siteSetting->linkedin_url }}"
                            target="_blank"
                            class="w-12 h-12 rounded-xl bg-[#F8F8F8] border border-gray-200 flex items-center justify-center hover:bg-[#F68B1F] hover:text-white hover:scale-105 transition">

                            <i class="fa-brands fa-linkedin-in text-lg"></i>

                        </a>

                        <a href="{{ $siteSetting->behance_url }}"
                            target="_blank"
                            class="w-12 h-12 rounded-xl bg-[#F8F8F8] border border-gray-200 flex items-center justify-center hover:bg-[#F68B1F] hover:text-white hover:scale-105 transition">

                            <i class="fa-brands fa-behance text-lg"></i>

                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>