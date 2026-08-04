@php
    use Illuminate\Support\Facades\Storage;
@endphp

<section
    id="projects"
    class="pt-20 pb-28 bg-[#F8F8F8] overflow-x-hidden overflow-y-visible">

    <div class="container-custom">

        <div class="text-center mb-12">

            <p class="uppercase tracking-[0.3em] text-brand-orange font-semibold">

                Portfolio

            </p>

            <h2 class="text-5xl font-black text-ink-strong mt-3">

                Featured Projects

            </h2>

            <p class="text-muted mt-5 max-w-2xl mx-auto">

                A collection of branding, campaigns, visual identities,
                social media creatives, and marketing materials.

            </p>

        </div>

    </div>

    @if($projects->count())

        <div
            x-data="projectCarousel({{ $projects->count() }})"
            x-init="$nextTick(() => init())"
            class="relative
                px-6
                md:px-16"
        >

            {{-- Viewport (Added vertical padding to prevent scale clipping) --}}
            <div
                class="overflow-hidden py-10 my-2"
                x-ref="viewport">

                <div
                    class="flex gap-8 select-none"
                    style="touch-action: pan-y;"
                    :style="`transform: translate3d(${offset}px, 0, 0); transition: transform 600ms cubic-bezier(0.22, 1, 0.36, 1);`"
                    @touchstart="dragStart($event)"
                    @touchmove="dragMove($event)"
                    @touchend="dragEnd()"
                >

                    @foreach($projects as $project)

                    <div
                        class="group flex-shrink-0 transition-all duration-700 ease-out"
                        :style="`
                            width:${cardWidth}px;

                            opacity:${
                                active === {{ $loop->index }}
                                    ? 1
                                    : 0.30
                            };

                            transform:
                                scale(${
                                    active === {{ $loop->index }}
                                        ? 1.05
                                        : 0.86
                                });

                            filter:
                                blur(${
                                    active === {{ $loop->index }}
                                        ? 0
                                        : 1.5
                                }px);
                        `">

                        <div
                            :class="active === {{ $loop->index }}
                                ? 'shadow-2xl ring-2 ring-[#F68B1F]/20'
                                : 'shadow-md'"
                            class="h-[430px]
                                bg-white
                                rounded-[28px]
                                border border-gray-100
                                transition-all duration-500
                                overflow-hidden
                                flex flex-col">

                            {{-- Thumbnail --}}
                            <div class="px-4 pt-4">

                                <div class="overflow-hidden rounded-2xl h-52">

                                    <img
                                        src="{{ Storage::url($project->thumbnail) }}"
                                        class="w-full
                                            h-full
                                            object-cover
                                            transition-all
                                            duration-700
                                            group-hover:scale-110">

                                </div>

                            </div>

                            {{-- Content --}}
                            <div class="flex flex-col flex-1 px-5 py-4">

                                {{-- Title --}}
                                <h3
                                    class="font-bold
                                        text-lg
                                        text-center
                                        text-[#303030]
                                        line-clamp-2
                                        h-[56px]">

                                    {{ $project->title }}

                                </h3>

                                {{-- Categories --}}
                                <div
                                    class="mt-3
                                        flex flex-wrap
                                        justify-center
                                        gap-2
                                        h-[54px]
                                        overflow-hidden">

                                    @foreach($project->categories as $category)

                                        <span
                                            class="px-3
                                                py-1
                                                rounded-full
                                                bg-[#F4F4F4]
                                                text-gray-500
                                                text-[11px]
                                                leading-none">

                                            {{ $category->name }}

                                        </span>

                                    @endforeach

                                </div>

                                <div class="flex-1"></div>

                                {{-- Button --}}
                                <button
                                    @click="openProject('{{ $project->slug }}')"
                                    class="mx-auto
                                        w-36
                                        py-2.5
                                        rounded-full
                                        bg-white
                                        border
                                        border-gray-200
                                        shadow
                                        text-sm
                                        tracking-[0.25em]
                                        font-semibold
                                        hover:bg-[#F68B1F]
                                        hover:border-[#F68B1F]
                                        hover:text-white
                                        transition">
                                    VIEW
                                </button>

                            </div>

                        </div>

                    </div>

                    @endforeach

                </div>

            </div>

            {{-- Arrows --}}
            <button
                type="button"
                x-show="total > 1"
                @click="prev()"
                :disabled="active === 0"
                :class="active === 0 ? 'opacity-30 cursor-not-allowed' : 'opacity-100 hover:scale-110'"
                class="absolute left-2 md:left-6 top-[45%] -translate-y-1/2 z-20 flex h-12 w-12 items-center justify-center rounded-full bg-white shadow-lg transition"
                aria-label="Previous project"
            >

                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M15 18l-6-6 6-6"/></svg>

            </button>

            <button
                type="button"
                x-show="total > 1"
                @click="next()"
                :disabled="active === total - 1"
                :class="active === total - 1 ? 'opacity-30 cursor-not-allowed' : 'opacity-100 hover:scale-110'"
                class="absolute right-2 md:right-6 top-[45%] -translate-y-1/2 z-20 flex h-12 w-12 items-center justify-center rounded-full bg-white shadow-lg transition"
                aria-label="Next project"
            >

                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 18l6-6-6-6"/></svg>

            </button>

            {{-- Dots --}}
            <div class="mt-12 flex justify-center">

                <div
                    class="relative
                        h-1
                        w-72
                        rounded-full
                        bg-gray-300">

                    <div
                        class="absolute
                            left-0
                            top-0
                            h-full
                            rounded-full
                            bg-[#F68B1F]
                            transition-all
                            duration-500"
                        :style="`
                            width:${100/total}%;
                            transform:translateX(${active*(100)}%);
                        `">
                    </div>

                </div>

            </div>

        </div>

    @else

        <div class="container-custom">

            <div class="text-center text-gray-400 py-20">

                Portfolio projects will appear here.

            </div>

        </div>

    @endif

</section>

<script>
    function projectCarousel(total) {
        return {
            total,
            active: 0,
            cardWidth: 320,
            gap: 32,
            dragging: false,
            dragStartX: 0,
            dragDeltaX: 0,

            init() {
                this.measure();

                let resizeTimer;
                window.addEventListener('resize', () => {
                    clearTimeout(resizeTimer);
                    resizeTimer = setTimeout(() => this.measure(), 150);
                });
            },

            measure() {
                if (!this.$refs.viewport) return;

                const width = this.$refs.viewport.clientWidth;

                this.cardWidth = width < 640
                    ? 260
                    : width < 1024
                        ? 290
                        : 320;
            },

            get offset() {
                const viewportWidth = this.$refs.viewport ? this.$refs.viewport.clientWidth : 0;
                const slot = this.cardWidth + this.gap;
                const drag = this.dragging ? this.dragDeltaX : 0;

                return (viewportWidth / 2) - (this.cardWidth / 2) - (this.active * slot) + drag;
            },

            goTo(index) {
                this.active = Math.max(0, Math.min(this.total - 1, index));
            },

            next() {
                this.goTo(this.active + 1);
            },

            prev() {
                this.goTo(this.active - 1);
            },

            dragStart(event) {
                this.dragging = true;
                this.dragStartX = event.touches[0].clientX;
                this.dragDeltaX = 0;
            },

            dragMove(event) {
                if (!this.dragging) return;
                this.dragDeltaX = event.touches[0].clientX - this.dragStartX;
            },

            dragEnd() {
                if (!this.dragging) return;

                if (Math.abs(this.dragDeltaX) > 60) {
                    this.dragDeltaX < 0 ? this.next() : this.prev();
                }

                this.dragging = false;
                this.dragDeltaX = 0;
            },
        }
    }
</script>