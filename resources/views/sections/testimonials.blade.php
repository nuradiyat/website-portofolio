<section id="testimonials" class="bg-white py-24">
    <div class="container mx-auto px-6">
        <div class="grid items-center gap-12 lg:grid-cols-[320px_minmax(0,1fr)] xl:grid-cols-[360px_minmax(0,1fr)]">

            {{-- Left Content --}}
            <div class="max-w-md">
                <p class="text-sm font-semibold uppercase tracking-[0.18em] text-blue-600">
                    Testimonials
                </p>

                <h2 class="mt-4 text-3xl font-bold tracking-tight text-slate-900 sm:text-4xl">
                    Feedback & Testimonials
                </h2>

                <p class="mt-5 text-base leading-8 text-slate-600 sm:text-lg">
                    Beberapa testimoni dari rekan kerja, tim, maupun pihak yang pernah bekerja sama dengan saya.
                </p>

                @if ($testimonials->count() > 1)
                    <div class="mt-8 flex items-center gap-3">
                        <button type="button" id="testimonial-prev"
                            class="inline-flex h-11 w-11 items-center justify-center rounded-xl border border-slate-200 bg-white text-slate-700 shadow-sm transition hover:border-blue-500 hover:text-blue-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 18l-6-6 6-6" />
                            </svg>
                        </button>

                        <button type="button" id="testimonial-next"
                            class="inline-flex h-11 w-11 items-center justify-center rounded-xl bg-blue-600 text-white shadow-sm transition hover:bg-blue-700">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 6l6 6-6 6" />
                            </svg>
                        </button>
                    </div>
                @endif
            </div>

            {{-- Right Content --}}
            <div class="relative flex items-center">
                @if ($testimonials->isNotEmpty())
                    {{-- Fade kiri --}}
                    <div
                        class="pointer-events-none absolute inset-y-0 left-0 z-10 hidden w-12 bg-gradient-to-r from-white to-transparent lg:block">
                    </div>

                    {{-- Fade kanan --}}
                    <div
                        class="pointer-events-none absolute inset-y-0 right-0 z-10 hidden w-12 bg-gradient-to-l from-white to-transparent lg:block">
                    </div>

                    <div id="testimonial-slider"
                        class="flex w-full gap-6 overflow-x-auto scroll-smooth py-2 [-ms-overflow-style:none] [scrollbar-width:none] [&::-webkit-scrollbar]:hidden">
                        @foreach ($testimonials as $testimonial)
                            <x-card.testimonial-card :testimonial="$testimonial" />
                        @endforeach
                    </div>
                @else
                    <div class="w-full">
                        <x-ui.empty-state title="Belum Ada Testimoni"
                            description="Testimoni akan ditampilkan setelah ditambahkan melalui Dashboard Admin." />
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>

@if ($testimonials->count() > 1)
    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const slider = document.getElementById('testimonial-slider');
                const prevBtn = document.getElementById('testimonial-prev');
                const nextBtn = document.getElementById('testimonial-next');

                if (!slider) return;

                let autoSlide;
                let isAnimating = false;

                const getCardWidth = () => {
                    const firstCard = slider.querySelector('[data-testimonial-card]');
                    if (!firstCard) return 360;

                    const gap = 24; // gap-6 = 24px
                    return firstCard.offsetWidth + gap;
                };

                const goNext = () => {
                    if (isAnimating) return;

                    const scrollAmount = getCardWidth();
                    const maxScrollLeft = slider.scrollWidth - slider.clientWidth;

                    isAnimating = true;

                    if (slider.scrollLeft + scrollAmount >= maxScrollLeft - 10) {
                        slider.scrollTo({
                            left: 0,
                            behavior: 'smooth'
                        });
                    } else {
                        slider.scrollBy({
                            left: scrollAmount,
                            behavior: 'smooth'
                        });
                    }

                    setTimeout(() => {
                        isAnimating = false;
                    }, 700);
                };

                const goPrev = () => {
                    if (isAnimating) return;

                    const scrollAmount = getCardWidth();
                    const maxScrollLeft = slider.scrollWidth - slider.clientWidth;

                    isAnimating = true;

                    if (slider.scrollLeft <= 10) {
                        slider.scrollTo({
                            left: maxScrollLeft,
                            behavior: 'smooth'
                        });
                    } else {
                        slider.scrollBy({
                            left: -scrollAmount,
                            behavior: 'smooth'
                        });
                    }

                    setTimeout(() => {
                        isAnimating = false;
                    }, 700);
                };

                const startAutoSlide = () => {
                    stopAutoSlide();
                    autoSlide = setInterval(() => {
                        goNext();
                    }, 3500);
                };

                const stopAutoSlide = () => {
                    if (autoSlide) {
                        clearInterval(autoSlide);
                    }
                };

                nextBtn?.addEventListener('click', () => {
                    goNext();
                    startAutoSlide();
                });

                prevBtn?.addEventListener('click', () => {
                    goPrev();
                    startAutoSlide();
                });

                slider.addEventListener('mouseenter', stopAutoSlide);
                slider.addEventListener('mouseleave', startAutoSlide);
                slider.addEventListener('touchstart', stopAutoSlide, {
                    passive: true
                });
                slider.addEventListener('touchend', startAutoSlide);

                startAutoSlide();
            });
        </script>
    @endpush
@endif
