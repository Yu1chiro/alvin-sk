<!DOCTYPE html>
<html lang="id" class="scroll-smooth" x-data="{
    darkMode: localStorage.getItem('public_theme') === 'dark' ||
        (!('public_theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)
}" :class="{ 'dark': darkMode }" x-init="$watch('darkMode', val => localStorage.setItem('public_theme', val ? 'dark' : 'light'))">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $setting?->hero_title ?? 'Alvin Sk' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="icon" href="{{ $setting?->about_image ?? asset('images/favicon.png') }}" type="image/png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&family=Syne:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style>
        :root {
            --accent: {{ $setting?->theme_color ?? '#000000' }};
            --bg-light: {{ $setting?->background_color ?? '#ffffff' }};
            --bg-dark: #0f172a;
            /* Slate 900 */
            --text-light: #1f2937;
            --text-dark: #f3f4f6;
        }

        /* Light Mode Default */
        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--bg-light);
            color: var(--text-light);
            transition: background-color 0.3s, color 0.3s;
        }

        /* Dark Mode Overrides */
        .dark body {
            background-color: var(--bg-dark);
            color: var(--text-dark);
        }

        .dark .bg-white {
            background-color: #1e293b !important;
        }

        /* Slate 800 */
        .dark .bg-gray-50 {
            background-color: #0f172a !important;
        }

        /* Slate 900 */
        .dark .bg-gray-100 {
            background-color: #334155 !important;
        }

        /* Slate 700 */
        .dark .text-gray-900 {
            color: #f8fafc !important;
        }

        .dark .text-gray-600,
        .dark .text-gray-500,
        .dark .text-gray-400 {
            color: #94a3b8 !important;
        }

        .dark .border-gray-100,
        .dark .border-gray-200,
        .dark .border-gray-300 {
            border-color: #334155 !important;
        }

        .dark nav {
            background-color: rgba(15, 23, 42, 0.8);
            border-color: #334155;
        }

        h1,
        h2,
        h3,
        .font-display {
            font-family: 'Syne', sans-serif;
        }

        .text-accent {
            color: var(--accent);
        }

        .bg-accent {
            background-color: var(--accent);
        }

        .border-accent {
            border-color: var(--accent);
        }

        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: transparent;
        }

        ::-webkit-scrollbar-thumb {
            background: #d1d5db;
            border-radius: 4px;
        }

        .reveal-text {
            animation: fadeInUp 0.8s ease-out forwards;
            opacity: 0;
            transform: translateY(20px);
        }

        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>

<body class="antialiased selection:bg-black selection:text-white dark:selection:bg-white dark:selection:text-black">

    <nav class="fixed w-full z-50 top-0 backdrop-blur-lg border-b border-gray-100/50 dark:border-gray-800">
        <div class="max-w-7xl mx-auto px-6 h-20 flex justify-between items-center">
            <a href=""
                class="text-2xl font-display font-bold tracking-tighter hover:opacity-70 transition dark:text-white">
               Alvin sk
            </a>

            <div class="flex items-center gap-6">
                <div
                    class="hidden md:flex items-center gap-8 text-sm font-medium uppercase tracking-wide text-gray-500 dark:text-gray-400">
                    <a href="#home" class="hover:text-accent transition-colors">Home</a>
                    <a href="#about" class="hover:text-accent transition-colors">About</a>
                    <a href="#works" class="hover:text-accent transition-colors">Works</a>
                    <a href="#blog" class="hover:text-accent transition-colors">Blog</a>
                    <a href="#contact"
                        class="px-5 py-2 rounded-full border border-gray-300 dark:border-gray-600 hover:bg-black hover:text-white dark:hover:bg-white dark:hover:text-black transition-all">Contact</a>
                </div>

                <button @click="darkMode = !darkMode"
                    class="p-2 rounded-full hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors focus:outline-none"
                    title="Toggle Dark Mode">
                    <svg x-show="darkMode" class="w-5 h-5 text-yellow-400" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z">
                        </path>
                    </svg>
                    <svg x-show="!darkMode" class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z">
                        </path>
                    </svg>
                </button>
            </div>
        </div>
    </nav>

    <section id="home" class="min-h-screen flex items-center justify-center pt-20 px-6 relative overflow-hidden">
        <div class="text-center max-w-4xl z-10">
            <p class="text-sm md:text-base font-medium tracking-[0.2em] uppercase text-gray-400 mb-6 reveal-text"
                style="animation-delay: 0.1s;">
                Welcome to my life
            </p>
            <h1 class="text-6xl font-display font-extrabold leading-[0.9] mb-8 text-gray-900 dark:text-white reveal-text"
                style="animation-delay: 0.2s;">
                {{ $setting?->hero_title ?? 'Alvin Sk.' }}
            </h1>
            <p class="text-3xl text-gray-500 dark:text-gray-400 font-display font-medium max-w-2xl mx-auto leading-tight reveal-text"
                style="animation-delay: 0.3s;">
                {{ $setting?->hero_subtitle ?? 'Illustrator, Character Designer & Visual Storyteller.' }}
            </p>

            <div class="mt-12 reveal-text" style="animation-delay: 0.4s;">
                <a href="#works"
                    class="inline-flex items-center gap-3 animate-bounce text-lg font-medium border-b-2 border-black dark:border-white pb-1 hover:gap-5 transition-all dark:text-white">
                    Explore my works<span>&darr;</span>
                </a>
            </div>
        </div>
        <div
            class="absolute -top-20 -right-20 w-96 h-96 bg-purple-200 dark:bg-purple-900/30 rounded-full blur-3xl opacity-20 animate-pulse">
        </div>
        <div
            class="absolute bottom-0 left-0 w-72 h-72 bg-blue-200 dark:bg-blue-900/30 rounded-full blur-3xl opacity-20">
        </div>
    </section>

    <section id="about" class="py-32 px-6 bg-gray-50 dark:bg-slate-900 relative transition-colors duration-300">
        <div class="max-w-6xl mx-auto grid md:grid-cols-2 gap-16 items-center">

            <div class="relative flex justify-center md:justify-start group">
                <div
                    class="w-72 h-72 md:w-96 md:h-96 rounded-full overflow-hidden border-[6px] border-white dark:border-slate-800 shadow-2xl relative z-10">
                    <img src="{{ $setting?->about_image ?? 'https://via.placeholder.com/600x600?text=Profile' }}"
                        alt="Profile"
                        class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                </div>
                <div
                    class="absolute top-10 -left-10 w-full h-full rounded-full border border-gray-300 dark:border-gray-700 -z-0">
                </div>
            </div>

            <div>
                <h2 class="text-5xl font-display font-bold mb-8 dark:text-white">About Me</h2>

                @if ($setting?->skills)
                    <div class="flex flex-wrap gap-3 mb-8">
                        @foreach ($setting->skills as $skill)
                            <span
                                class="px-4 py-1.5 bg-white dark:bg-slate-800 border border-gray-200 dark:border-gray-700 rounded-full text-sm font-medium shadow-sm hover:border-gray-900 dark:hover:border-white transition-colors cursor-default dark:text-gray-300">
                                ✨ {{ $skill }}
                            </span>
                        @endforeach
                    </div>
                @endif

                <div class="prose prose-lg text-gray-600 dark:text-gray-300 mb-8 leading-relaxed">
                    {!! $setting?->about_description ?? '<p>Hello! I am a visual designer.</p>' !!}
                </div>

                <div class="flex gap-6">
                    <div class="text-center dark:text-white">
                        <span class="block text-3xl font-display font-bold">{{ $projects->count() }}+</span>
                        <span class="text-sm text-gray-400 uppercase tracking-wider">Projects</span>
                    </div>
                    <div class="w-px bg-gray-300 dark:bg-gray-700"></div>
                    <div class="text-center dark:text-white">
                        <span class="block text-3xl font-display font-bold">{{ date('Y') - 2022 }}+</span>
                        <span class="text-sm text-gray-400 uppercase tracking-wider">Years Exp.</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section
        class="py-20 border-t border-gray-100 dark:border-gray-800 bg-white dark:bg-slate-900 transition-colors duration-300">
        <div class="max-w-7xl mx-auto px-6 text-center">
            <p class="text-sm font-bold tracking-widest text-gray-400 uppercase mb-8">Software & Tools I Use</p>

            @if (isset($tools) && $tools->count() > 0)
                <div
                    class="flex flex-wrap justify-center gap-8 md:gap-12 grayscale hover:grayscale-0 transition-all duration-500">
                    @foreach ($tools as $tool)
                        <div class="group flex flex-col items-center gap-3">
                            <div
                                class="w-24 h-24 p-4 bg-gray-50 dark:bg-slate-800 rounded-2xl flex items-center justify-center border border-gray-100 dark:border-gray-700 shadow-sm group-hover:scale-110 transition-transform duration-300">
                                <img src="{{ $tool->image }}" alt="{{ $tool->name }}"
                                    class="w-full animate-pulse h-full object-contain">
                            </div>
                            <span
                                class="text-xs font-medium text-gray-400 group-hover:text-accent opacity-0 group-hover:opacity-100 transition-all transform translate-y-2 group-hover:translate-y-0">
                                {{ $tool->name }}
                            </span>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-gray-300 text-sm italic">Tools list empty.</p>
            @endif
        </div>
    </section>
    <section id="works" class="py-32 px-6 max-w-7xl mx-auto">
        <div class="flex justify-between items-end mb-20">
            <div>
                <span class="text-accent font-medium tracking-widest dark:text-white uppercase text-sm mb-2 block">My Portfolio</span>
                <h2 class="text-5xl md:text-6xl font-display font-bold dark:text-white">Latest Works</h2>
            </div>
           
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-x-12 gap-y-20">
            @foreach ($projects as $project)
                <a href="{{ route('project.detail', $project->slug) }}" class="group block">
                    <div
                        class="relative overflow-hidden rounded-2xl bg-gray-100 dark:bg-slate-800 aspect-[4/3] mb-6 shadow-sm">
                        @if (!empty($project->image) && is_array($project->image) && isset($project->image[0]['url']))
                            <img src="{{ $project->image[0]['url'] }}"
                                class="object-cover w-full h-full transition-transform duration-700 group-hover:scale-105 filter grayscale group-hover:grayscale-0">
                        @else
                            <div class="w-full h-full flex items-center justify-center text-gray-300">No Preview</div>
                        @endif
                        <div
                            class="absolute top-4 right-4 bg-white/90 backdrop-blur px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider opacity-0 group-hover:opacity-100 transition-all translate-y-2 group-hover:translate-y-0 text-black">
                            View Case
                        </div>
                    </div>

                    <div class="flex justify-between items-start border-t border-gray-100 dark:border-gray-800 pt-6">
                        <div>
                            <h3
                                class="text-2xl font-display font-bold group-hover:text-accent transition-colors dark:text-white">
                                {{ $project->title }}</h3>
                            <p class="text-gray-400 text-sm mt-1">Illustration / Design</p>
                        </div>
                        <span
                            class="w-10 h-10 rounded-full border border-gray-200 dark:border-gray-700 flex items-center justify-center group-hover:bg-black group-hover:text-white dark:group-hover:bg-white dark:group-hover:text-black transition-all dark:text-gray-400">
                            &nearr;
                        </span>
                    </div>
                </a>
            @endforeach
        </div>
    </section>

    <section id="blog"
        class="py-32 px-6 bg-gray-50 dark:bg-slate-900 border-t border-gray-100 dark:border-gray-800 transition-colors duration-300">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-20">
                <span
                    class="text-accent dark:text-white font-medium tracking-widest uppercase text-sm mb-2 block">Writing</span>
                <h2 class="text-5xl md:text-6xl font-display font-bold dark:text-white">Latest Articles</h2>
            </div>

            @if (isset($articles) && $articles->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    @foreach ($articles as $article)
                        <a href="{{ route('blog.read', $article->slug) }}"
                            class="group bg-white dark:bg-slate-800 rounded-2xl p-4 hover:shadow-xl transition-all duration-300 border border-gray-100 dark:border-gray-700 flex flex-col h-full">
                            <div
                                class="rounded-xl overflow-hidden aspect-[16/10] mb-6 relative bg-gray-100 dark:bg-slate-700">
                                @if (!empty($article->images) && is_array($article->images) && isset($article->images[0]['url']))
                                    <img src="{{ $article->images[0]['url'] }}"
                                        class="w-full h-full object-cover transform group-hover:scale-105 transition duration-500">
                                @else
                                    <div class="w-full h-full flex items-center justify-center text-gray-400">No Image
                                    </div>
                                @endif
                                <div
                                    class="absolute top-3 left-3 bg-white/90 backdrop-blur px-3 py-1 rounded-lg text-xs font-bold uppercase tracking-wider text-black">
                                    {{ $article->published_at->format('d M') }}
                                </div>
                            </div>

                            <div class="flex-1 flex flex-col">
                                <h3
                                    class="text-xl font-display font-bold mb-3 leading-snug group-hover:text-accent transition-colors dark:text-white">
                                    {{ $article->title }}
                                </h3>
                                <div
                                    class="mt-auto pt-4 border-t border-gray-50 dark:border-gray-700 flex justify-between items-center text-sm text-gray-500 dark:text-gray-400">
                                    <span>Read Article</span>
                                    <span class="group-hover:translate-x-1 transition-transform">&rarr;</span>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            @else
                <div class="text-center py-12 border-2 border-dashed border-gray-200 dark:border-gray-700 rounded-xl">
                    <p class="text-gray-400 font-display">Belum ada artikel yang dipublish.</p>
                </div>
            @endif
        </div>
    </section>

    <section id="contact"
        class="py-24 px-6 bg-black dark:bg-black text-white text-center border-t dark:border-gray-800">
        <div class="max-w-3xl mx-auto">
            <h2 class="text-4xl md:text-6xl font-display font-bold mb-8">Have an idea?</h2>
            <p class="text-gray-400 text-lg mb-10 max-w-xl mx-auto">I'm currently open for commissions and
                collaborations.</p>
            <a href="https://ig.me/m/alvinsk_21"
                class="inline-block px-10 py-4 bg-white dark:bg-blue-500 dark:text-white text-black font-bold rounded-full text-lg hover:scale-105 transition-transform">
                Talk me on Instagram
            </a>

            <div
                class="mt-20 pt-10 border-t border-gray-800 flex flex-col md:flex-row justify-between items-center text-sm text-gray-500">
                <p>&copy; {{ date('Y') }} Alvin Sk. All Rights Reserved.</p>
                <div class="flex gap-6 mt-4 md:mt-0">
                    <a href="#" class="hover:text-white transition-colors">Instagram</a>
                </div>
            </div>
        </div>
    </section>

    <script>
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const targetId = this.getAttribute('href');
                const targetElement = document.querySelector(targetId);
                if (targetElement) {
                    targetElement.scrollIntoView({
                        behavior: 'smooth'
                    });
                }
            });
        });
    </script>
</body>

</html>
