<div
    x-show="open"
    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0"
    x-transition:enter-end="opacity-100"
    x-transition:leave="transition ease-in duration-200"
    x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0"
    @keydown.escape.window="if(open) close()"
    x-cloak
    class="fixed inset-0 z-[9999] flex items-center justify-center p-3 sm:p-6 lg:p-10">
    
    {{-- Backdrop --}}
    <div
        class="fixed inset-0 bg-slate-900/60 backdrop-blur-sm transition-opacity"
        @click="close()">
    </div>

    {{-- Modal Box --}}
    <div
        @click.stop
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 scale-95 translate-y-4"
        x-transition:enter-end="opacity-100 scale-100 translate-y-0"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 scale-100 translate-y-0"
        x-transition:leave-end="opacity-0 scale-95 translate-y-4"
        class="relative z-10 flex h-full max-h-[92vh] w-full max-w-6xl flex-col overflow-hidden rounded-2xl bg-white shadow-2xl ring-1 ring-slate-900/5 sm:rounded-3xl">

        {{-- Floating Sticky Close Button --}}
        <button
            @click="close()"
            type="button"
            aria-label="Close modal"
            class="absolute right-4 top-4 z-50 flex h-10 w-10 items-center justify-center rounded-full bg-slate-900/10 text-slate-700 backdrop-blur-md transition hover:bg-slate-900/20 hover:text-slate-900 focus:outline-none focus:ring-2 focus:ring-orange-500 sm:right-6 sm:top-6 sm:h-11 sm:w-11">
            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>

        {{-- Dynamic Content Area --}}
        <div
            id="project-content"
            class="h-full overflow-y-auto scroll-smooth focus:outline-none">

            {{-- Polished Skeleton Loader --}}
            <div class="mx-auto max-w-5xl space-y-8 p-6 sm:p-12 animate-pulse">
                <div class="space-y-4">
                    <div class="flex gap-2">
                        <div class="h-6 w-20 rounded-full bg-slate-200"></div>
                        <div class="h-6 w-24 rounded-full bg-slate-200"></div>
                    </div>
                    <div class="h-10 w-3/4 rounded-xl bg-slate-200 sm:h-14"></div>
                    <div class="h-5 w-1/2 rounded-lg bg-slate-200"></div>
                </div>

                {{-- Image Skeleton --}}
                <div class="h-[350px] w-full rounded-2xl bg-slate-200 sm:h-[500px]"></div>

                {{-- Content Skeleton --}}
                <div class="space-y-3 pt-4">
                    <div class="h-4 w-full rounded bg-slate-200"></div>
                    <div class="h-4 w-5/6 rounded bg-slate-200"></div>
                    <div class="h-4 w-2/3 rounded bg-slate-200"></div>
                </div>
            </div>

        </div>

    </div>

</div>