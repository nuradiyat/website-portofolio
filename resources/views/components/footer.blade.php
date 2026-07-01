<footer class="border-t border-slate-200 bg-slate-950">

    <div class="container mx-auto px-6 py-14">

        <div class="grid gap-10 md:grid-cols-3">

            {{-- Brand --}}
            <div>

                <h2 class="text-2xl font-bold text-white">

                    {{ $profile->full_name }}

                </h2>

                <p class="mt-3 text-slate-400">

                    {{ $profile->profession }}

                </p>

                <p class="mt-5 text-sm leading-7 text-slate-500">

                    {{ $profile->short_bio }}

                </p>

            </div>

            {{-- Navigation --}}
            <div>

                <h3 class="font-semibold text-white">

                    Navigation

                </h3>

                <ul class="mt-5 space-y-3">

                    <li><a href="#home" class="text-slate-400 hover:text-white">Home</a></li>

                    <li><a href="#about" class="text-slate-400 hover:text-white">About</a></li>

                    <li><a href="#skills" class="text-slate-400 hover:text-white">Skills</a></li>

                    <li><a href="#projects" class="text-slate-400 hover:text-white">Projects</a></li>

                    <li><a href="#contact" class="text-slate-400 hover:text-white">Contact</a></li>

                </ul>

            </div>

            {{-- Social --}}
            <div>

                <h3 class="font-semibold text-white">

                    Connect

                </h3>

                <div class="mt-5 flex flex-wrap gap-4">

                    @foreach ($socialMedia as $social)
                        <x-ui.social-link :social="$social" />
                    @endforeach

                </div>

            </div>

        </div>

        <div class="mt-12 border-t border-slate-800 pt-8 text-center">

            <p class="text-sm text-slate-500">

                © {{ now()->year }}

                {{ $profile->full_name }}

                All Rights Reserved.

            </p>

        </div>

    </div>

</footer>