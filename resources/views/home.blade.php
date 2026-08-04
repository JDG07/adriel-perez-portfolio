@extends('layouts.app')

@section('content')
<div
    x-data="projectGallery()"
    class="relative"
>

<section id="landing" class="relative">

    {{-- Background --}}
    <div class="absolute inset-0 opacity-50">

        <video
            autoplay
            muted
            loop
            playsinline
            class="w-full h-full object-cover opacity-50"
            >

            <source src="{{ asset('storage/'.$siteSetting->hero_bg_video) }}">

        </video>

    </div>

    {{-- Foreground --}}
    <div class="relative z-10">

        @include('partials.hero')

        @include('partials.clients')

    </div>

</section>

@include('partials.stats')

@include('partials.about')

@include('partials.tools')

@include('partials.projects')

@include('partials.testimonials')

@include('partials.contact')

@include('partials.footer', ['siteSetting' => $siteSetting])

@include('partials.project-modal')

</div>
@endsection