@php
    use Illuminate\Support\Facades\Storage;
@endphp

<section
    id="clients"
    class="py-14 lg:py-20">

    <div class="relative">

        <!-- Left Fade -->
        <div class="pointer-events-none absolute left-0 top-0 z-10 h-full w-24 bg-gradient-to-r from-white to-transparent"></div>

        <!-- Right Fade -->
        <div class="pointer-events-none absolute right-0 top-0 z-10 h-full w-24 bg-gradient-to-l from-white to-transparent"></div>

        <div class="clients-slider">

            <div class="clients-track">

                @foreach($clients as $client)

                    <div class="client-logo">

                        <img
                            src="{{ Storage::url($client->logo) }}"
                            alt="{{ $client->name }}">

                    </div>

                @endforeach

                {{-- Duplicate once for seamless loop --}}
                @foreach($clients as $client)

                    <div class="client-logo">

                        <img
                            src="{{ Storage::url($client->logo) }}"
                            alt="{{ $client->name }}">

                    </div>

                @endforeach

            </div>

        </div>

    </div>

</section>