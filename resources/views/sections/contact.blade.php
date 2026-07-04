<section id="contact" class="bg-white py-24">
    <div class="container mx-auto px-6">

        {{-- Section Title --}}
        <div data-aos="fade-up" data-aos-duration="800">
            <x-section-title
                title="Contact"
                subtitle="Let’s Build Something Together"
                description="Silakan hubungi saya untuk diskusi proyek, kolaborasi, peluang kerja, atau pertanyaan lainnya." />
        </div>

        <div class="mt-14 grid gap-8 lg:grid-cols-12 lg:items-start">

            {{-- Left Side --}}
            <div class="lg:col-span-5" data-aos="fade-right" data-aos-delay="100" data-aos-duration="900">
                <div class="rounded-3xl border border-slate-200 bg-slate-50 p-6 sm:p-8 shadow-sm">
                    <div>
                        <span
                            class="inline-flex items-center rounded-full bg-blue-50 px-3 py-1 text-xs font-semibold text-blue-600">
                            Get in Touch
                        </span>

                        <h3 class="mt-4 text-2xl font-bold tracking-tight text-slate-900 sm:text-3xl">
                            Mari diskusikan ide, proyek, atau peluang kolaborasi.
                        </h3>

                        <p class="mt-4 text-sm leading-7 text-slate-600 sm:text-base">
                            Saya terbuka untuk kerja sama pengembangan website, project freelance, diskusi teknologi,
                            maupun peluang magang dan kerja profesional.
                        </p>
                    </div>

                    <div class="mt-8 space-y-4">
                        <div class="rounded-2xl border border-slate-200 bg-white p-4">
                            <p class="text-xs font-semibold uppercase tracking-[0.2em] text-slate-500">Email</p>
                            <p class="mt-2 text-sm font-medium text-slate-800 sm:text-base">
                                {{ $profile->email ?? 'email@example.com' }}
                            </p>
                        </div>

                        @if (!empty($profile?->phone))
                            <div class="rounded-2xl border border-slate-200 bg-white p-4">
                                <p class="text-xs font-semibold uppercase tracking-[0.2em] text-slate-500">Phone</p>
                                <p class="mt-2 text-sm font-medium text-slate-800 sm:text-base">
                                    {{ $profile->phone }}
                                </p>
                            </div>
                        @endif

                        @if ($socialMedia->isNotEmpty())
                            <div class="rounded-2xl border border-slate-200 bg-white p-4">
                                <p class="text-xs font-semibold uppercase tracking-[0.2em] text-slate-500">Social Media</p>

                                <div class="mt-4 flex flex-wrap gap-3">
                                    @foreach ($socialMedia as $item)
                                        <x-ui.social-link :item="$item" />
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            {{-- Right Side --}}
            <div class="lg:col-span-7" data-aos="fade-left" data-aos-delay="150" data-aos-duration="900">
                <div class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm sm:p-8">
                    <div class="mb-6">
                        <h3 class="text-2xl font-bold text-slate-900">
                            Kirim Pesan
                        </h3>
                        <p class="mt-2 text-sm leading-7 text-slate-600">
                            Isi form berikut dan pesan Anda akan langsung tersimpan ke sistem.
                        </p>
                    </div>

                    @if (session('success'))
                        <div
                            class="mb-6 rounded-2xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm font-medium text-emerald-700">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('contact.store') }}" method="POST" class="space-y-5">
                        @csrf

                        <div class="grid gap-5 md:grid-cols-2">
                            <div>
                                <x-forms.label for="name" value="Nama Lengkap" />
                                <x-forms.input
                                    id="name"
                                    name="name"
                                    type="text"
                                    :value="old('name')"
                                    placeholder="Masukkan nama lengkap" />
                                @error('name')
                                    <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <x-forms.label for="email" value="Email" />
                                <x-forms.input
                                    id="email"
                                    name="email"
                                    type="email"
                                    :value="old('email')"
                                    placeholder="Masukkan alamat email" />
                                @error('email')
                                    <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <x-forms.label for="subject" value="Subjek" />
                            <x-forms.input
                                id="subject"
                                name="subject"
                                type="text"
                                :value="old('subject')"
                                placeholder="Masukkan subjek pesan" />
                            @error('subject')
                                <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <x-forms.label for="message" value="Pesan" />
                            <x-forms.textarea
                                id="message"
                                name="message"
                                rows="6"
                                placeholder="Tulis pesan Anda di sini...">{{ old('message') }}</x-forms.textarea>
                            @error('message')
                                <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="pt-2">
                            <x-button type="submit" class="w-full justify-center sm:w-auto">
                                Kirim Pesan
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>