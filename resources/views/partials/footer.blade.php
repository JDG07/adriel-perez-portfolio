<footer class="bg-[#0D1117] border-t border-white/10">

    <div class="max-w-7xl mx-auto px-6 py-16">

        <div class="grid lg:grid-cols-3 gap-12 items-start">

            {{-- Brand --}}
            <div>

                <h2 class="text-3xl font-black text-white">
                    Adriel<span class="text-[#F68B1F]">.</span>
                </h2>

                <p class="text-gray-400 mt-5 leading-8 max-w-sm">
                    A passionate Senior Creative Designer creating modern,
                    responsive, and user-focused digital experiences.
                </p>

            </div>

            {{-- Quick Links --}}
            <div>

                <h3 class="text-white font-semibold mb-6">
                    Quick Links
                </h3>

                <div class="grid grid-cols-2 gap-4 text-gray-400">

                    <a href="#home" class="hover:text-[#F68B1F] transition">
                        Home
                    </a>

                    <a href="#about" class="hover:text-[#F68B1F] transition">
                        About
                    </a>

                    <a href="#projects" class="hover:text-[#F68B1F] transition">
                        Projects
                    </a>

                    <a href="#testimonials" class="hover:text-[#F68B1F] transition">
                        Testimonials
                    </a>

                    <a href="#contact" class="hover:text-[#F68B1F] transition">
                        Contact
                    </a>

                </div>

            </div>

            {{-- Social --}}
            <div>

                <h3 class="text-white font-semibold mb-6">
                    Connect With Me
                </h3>

                <div class="flex gap-4">

                    <a href="{{ $siteSetting->facebook_url }}"
                        target="_blank"
                        class="w-12 h-12 rounded-xl bg-[#161B22] border border-white/10 flex items-center justify-center text-gray-300 hover:bg-[#F68B1F] hover:text-white transition">

                        <i class="fa-brands fa-facebook-f"></i>

                    </a>

                    <a href="{{ $siteSetting->linkedin_url }}"
                        target="_blank"
                        class="w-12 h-12 rounded-xl bg-[#161B22] border border-white/10 flex items-center justify-center text-gray-300 hover:bg-[#F68B1F] hover:text-white transition">

                        <i class="fa-brands fa-linkedin-in"></i>

                    </a>

                    <a href="{{ $siteSetting->behance_url }}"
                        target="_blank"
                        class="w-12 h-12 rounded-xl bg-[#161B22] border border-white/10 flex items-center justify-center text-gray-300 hover:bg-[#F68B1F] hover:text-white transition">

                        <i class="fa-brands fa-behance"></i>

                    </a>

                </div>

                <a href="mailto:{{ $siteSetting->contact_email }}"
                    class="inline-flex items-center gap-2 mt-8 text-[#F68B1F] hover:text-orange-300 transition">

                    <i class="fa-solid fa-envelope"></i>

                    {{ $siteSetting->contact_email }}

                </a>

            </div>

        </div>

        {{-- Divider --}}
        <div class="border-t border-white/10 mt-14 pt-8">

            <div class="flex flex-col md:flex-row items-center justify-between gap-4">

                <p class="text-gray-500 text-sm">
                    © {{ date('Y') }} Adriel Perez. All Rights Reserved.
                </p>


            </div>

        </div>

    </div>

</footer>