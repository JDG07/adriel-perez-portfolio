<section class="py-20 bg-[#F8F8F8]">

    <div class="container-custom">

        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">

            @forelse($stats as $stat)

                <div
                    class="group rounded-3xl bg-white border border-gray-100 p-8 text-center shadow-sm hover:bg-brand-orange transition duration-300">

                    <h3
                        class="text-5xl font-black text-brand-orange group-hover:text-white transition">

                        {{ $stat->value }}

                    </h3>

                    <p
                        class="mt-3 text-gray-500 font-medium group-hover:text-white transition">

                        {{ $stat->label }}

                    </p>

                </div>

            @empty

                <div class="col-span-full text-center text-gray-400">

                    No statistics available.

                </div>

            @endforelse

        </div>

    </div>

</section>