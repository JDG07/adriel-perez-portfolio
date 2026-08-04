@php
    use Illuminate\Support\Facades\Storage;

    $images = $project->images;

    if ($images->isEmpty() && $project->thumbnail) {
        $images = collect([
            (object)[
                'image' => $project->thumbnail,
            ],
        ]);
    }
@endphp

<div
    x-data="{
        current: 0,
        lightbox: false,
        total: {{ $images->count() }},
        next() { this.current = this.current === this.total - 1 ? 0 : this.current + 1 },
        prev() { this.current = this.current === 0 ? this.total - 1 : this.current - 1 }
    }"
    @keydown.left.window="if(lightbox || open) prev()"
    @keydown.right.window="if(lightbox || open) next()"
    class="min-h-full bg-white text-slate-800"
>

    {{-- Header --}}
    <header class="px-6 pt-8 sm:px-12 sm:pt-12">
        <div class="flex flex-col-reverse justify-between gap-6 sm:flex-row sm:items-start">
            
            <div class="space-y-3 max-w-3xl">
                {{-- Categories --}}
                @if($project->categories->count())
                    <div class="flex flex-wrap gap-2">
                        @foreach($project->categories as $category)
                            <span class="inline-flex items-center rounded-full bg-orange-50 px-3 py-1 text-xs font-semibold text-orange-600 ring-1 ring-inset ring-orange-500/20">
                                {{ $category->name }}
                            </span>
                        @endforeach
                    </div>
                @endif

                {{-- Title --}}
                <h1 class="text-3xl font-extrabold tracking-tight text-slate-900 sm:text-5xl">
                    {{ $project->title }}
                </h1>

                {{-- Excerpt --}}
                @if($project->excerpt)
                    <p class="text-base text-slate-600 sm:text-lg leading-relaxed">
                        {{ $project->excerpt }}
                    </p>
                @endif
            </div>

            {{-- Year Badge --}}
            @if($project->year)
                <div class="self-start shrink-0 rounded-2xl bg-orange-50 px-4 py-2 border border-orange-100 text-center">
                    <span class="block text-xs font-bold uppercase tracking-wider text-orange-500">Year</span>
                    <span class="text-xl font-extrabold text-slate-900 sm:text-2xl">{{ $project->year }}</span>
                </div>
            @endif

        </div>
    </header>

    {{-- Gallery Section --}}
    <section class="px-6 mt-8 sm:px-12 sm:mt-10">
        
        {{-- Main Stage --}}
        <div class="group relative overflow-hidden rounded-2xl bg-slate-950 border border-slate-100 shadow-inner">
            
            @foreach($images as $index => $image)
                <div 
                    x-show="current === {{ $index }}"
                    x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0"
                    x-transition:enter-end="opacity-100"
                    class="flex items-center justify-center">
                    
                    <img
                        @click="lightbox = true"
                        src="{{ Storage::url($image->image) }}"
                        alt="{{ $project->title }} image {{ $index + 1 }}"
                        class="h-[380px] w-full object-contain cursor-zoom-in sm:h-[550px] transition-transform duration-300 group-hover:scale-[1.01]"
                    >
                </div>
            @endforeach

            {{-- Zoom Hint --}}
            <button
                @click="lightbox = true"
                class="pointer-events-none absolute bottom-4 right-4 flex items-center gap-2 rounded-full bg-slate-900/75 px-3.5 py-1.5 text-xs font-medium text-white opacity-0 backdrop-blur-md transition-all group-hover:opacity-100">
                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v6m-3-3h6" />
                </svg>
                Click to expand
            </button>

            {{-- Navigation Arrows --}}
            <template x-if="total > 1">
                <div>
                    <button
                        @click="prev()"
                        aria-label="Previous image"
                        class="absolute left-4 top-1/2 flex h-10 w-10 -translate-y-1/2 items-center justify-center rounded-full bg-white/80 text-slate-800 shadow-md backdrop-blur transition hover:bg-white hover:scale-105 active:scale-95 focus:outline-none">
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                        </svg>
                    </button>

                    <button
                        @click="next()"
                        aria-label="Next image"
                        class="absolute right-4 top-1/2 flex h-10 w-10 -translate-y-1/2 items-center justify-center rounded-full bg-white/80 text-slate-800 shadow-md backdrop-blur transition hover:bg-white hover:scale-105 active:scale-95 focus:outline-none">
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                        </svg>
                    </button>
                </div>
            </template>

            {{-- Image Counter --}}
            <template x-if="total > 1">
                <div class="absolute bottom-4 left-4 rounded-full bg-slate-900/75 px-3 py-1 text-xs font-semibold text-white backdrop-blur-md">
                    <span x-text="current + 1"></span> / <span x-text="total"></span>
                </div>
            </template>

        </div>

        {{-- Thumbnails --}}
        <template x-if="total > 1">
            <div class="mt-4 flex gap-3 overflow-x-auto pb-2 scrollbar-thin scrollbar-thumb-slate-200">
                @foreach($images as $index => $image)
                    <button
                        @click="current = {{ $index }}"
                        class="relative flex-shrink-0 rounded-xl overflow-hidden focus:outline-none transition-transform active:scale-95">
                        <img
                            src="{{ Storage::url($image->image) }}"
                            alt="Thumbnail {{ $index + 1 }}"
                            class="h-16 w-20 object-cover transition-all duration-200 sm:h-20 sm:w-28"
                            :class="current === {{ $index }} 
                                ? 'ring-2 ring-orange-500 opacity-100 scale-100' 
                                ? 'opacity-50 hover:opacity-90 grayscale-[30%] hover:grayscale-0'"
                        >
                    </button>
                @endforeach
            </div>
        </template>

    </section>

    {{-- Description & Metadata --}}
    <section class="px-6 py-10 sm:px-12 sm:py-12">
        
        <div class="prose prose-slate max-w-none prose-headings:font-bold prose-headings:text-slate-900 prose-a:text-orange-500 hover:prose-a:text-orange-600">
            {!! $project->description !!}
        </div>

        {{-- Footer Specs Grid --}}
        <div class="mt-12 grid gap-6 border-t border-slate-100 pt-8 sm:grid-cols-3 sm:items-center">

            <div class="space-y-1">
                <p class="text-xs font-semibold uppercase tracking-wider text-slate-400">Client</p>
                <p class="font-bold text-slate-900">{{ $project->client ?? 'Confidential' }}</p>
            </div>

            <div class="space-y-1">
                <p class="text-xs font-semibold uppercase tracking-wider text-slate-400">Year</p>
                <p class="font-bold text-slate-900">{{ $project->year ?? 'N/A' }}</p>
            </div>

            <div class="sm:text-right">
                @if($project->project_url)
                    <a
                        href="{{ $project->project_url }}"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="inline-flex items-center gap-2 rounded-full bg-orange-500 px-6 py-3 text-sm font-semibold text-white shadow-md shadow-orange-500/20 transition-all hover:-translate-y-0.5 hover:bg-orange-600 hover:shadow-lg focus:outline-none focus:ring-2 focus:ring-orange-500 focus:ring-offset-2">
                        <span>Visit Live Project</span>
                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 6H5.25A2.25 2.25 0 003 8.25v10.5A2.25 2.25 0 005.25 21h10.5A2.25 2.25 0 0018 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25" />
                        </svg>
                    </a>
                @endif
            </div>

        </div>

    </section>

    {{-- Fullscreen Lightbox --}}
    <div
        x-show="lightbox"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        @keydown.escape.window="lightbox = false"
        x-cloak
        class="fixed inset-0 z-[99999] flex items-center justify-center bg-slate-950/95 backdrop-blur-lg">

        {{-- Lightbox Close Button --}}
        <button
            @click="lightbox = false"
            aria-label="Close lightbox"
            class="absolute top-6 right-6 z-10 flex h-11 w-11 items-center justify-center rounded-full bg-white/10 text-white transition hover:bg-white/20 focus:outline-none">
            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>

        {{-- Image Display --}}
        @foreach($images as $index => $image)
            <img
                x-show="current === {{ $index }}"
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 scale-95"
                x-transition:enter-end="opacity-100 scale-100"
                src="{{ Storage::url($image->image) }}"
                alt="{{ $project->title }} expanded preview"
                class="max-h-[85vh] max-w-[90vw] rounded-lg object-contain select-none">
        @endforeach

        {{-- Navigation Controls --}}
        <template x-if="total > 1">
            <div>
                <button
                    @click="prev()"
                    aria-label="Previous image"
                    class="absolute left-4 flex h-12 w-12 items-center justify-center rounded-full bg-white/10 text-white transition hover:bg-white/20 focus:outline-none sm:left-8">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                    </svg>
                </button>

                <button
                    @click="next()"
                    aria-label="Next image"
                    class="absolute right-4 flex h-12 w-12 items-center justify-center rounded-full bg-white/10 text-white transition hover:bg-white/20 focus:outline-none sm:right-8">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                    </svg>
                </button>

                <div class="absolute bottom-6 rounded-full bg-white/10 px-4 py-1.5 text-xs font-semibold text-white backdrop-blur-md">
                    <span x-text="current + 1"></span> / <span x-text="total"></span>
                </div>
            </div>
        </template>

    </div>

</div>