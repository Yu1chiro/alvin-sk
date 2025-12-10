<!DOCTYPE html>
<html lang="id" x-data="{ darkMode: localStorage.getItem('public_theme') === 'dark' }" :class="{ 'dark': darkMode }">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $article->title }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&family=Syne:wght@700&display=swap"
        rel="stylesheet">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style>
        :root {
            --accent: {{ $setting?->theme_color ?? '#000000' }};
        }

        .text-accent {
            color: var(--accent);
        }

        .dark body {
            background-color: #0f172a;
            color: #f3f4f6;
        }

        .dark .bg-white {
            background-color: #1e293b !important;
        }

        .dark nav {
            border-color: #334155 !important;
        }
    </style>
</head>

<body class="bg-white text-gray-900 antialiased transition-colors duration-300">

    <nav
        class="p-6 sticky top-0 bg-white/90 dark:bg-slate-900/90 backdrop-blur-md z-50 border-b border-gray-100 dark:border-gray-800">
        <div class="max-w-4xl mx-auto flex justify-between items-center">
            <a href="/" class="font-bold text-lg hover:text-accent transition dark:text-white">&larr; Back to
                Home</a>
            <span class="text-sm text-gray-400">Blog Article</span>
        </div>
    </nav>

    <main class="max-w-4xl mx-auto py-12 px-6">
        <header class="mb-10 text-center md:text-left">
            <span
                class="text-sm font-medium text-gray-400 uppercase tracking-wider">{{ $article->published_at->format('d M Y') }}</span>
            <h1 class="text-4xl md:text-5xl font-bold mt-3 mb-6 leading-tight dark:text-white">{{ $article->title }}
            </h1>
        </header>

        @if (!empty($article->images) && is_array($article->images))
            @php $count = count($article->images); @endphp
            <div class="mb-12 relative group rounded-2xl overflow-hidden bg-gray-100 dark:bg-slate-800 shadow-sm"
                x-data="{ activeSlide: 0, total: {{ $count }} }">
                <div class="relative w-full aspect-[16/9]">
                    @foreach ($article->images as $index => $img)
                        <div x-show="activeSlide === {{ $index }}" class="absolute inset-0 w-full h-full">
                            <img src="{{ $img['url'] }}" class="w-full h-full object-cover">
                        </div>
                    @endforeach
                </div>
                @if ($count > 1)
                    <button @click="activeSlide = activeSlide === 0 ? total - 1 : activeSlide - 1"
                        class="absolute left-4 top-1/2 -translate-y-1/2 bg-white/80 text-black p-3 rounded-full shadow-lg">&larr;</button>
                    <button @click="activeSlide = activeSlide === total - 1 ? 0 : activeSlide + 1"
                        class="absolute right-4 top-1/2 -translate-y-1/2 bg-white/80 text-black p-3 rounded-full shadow-lg">&rarr;</button>
                @endif
            </div>
        @endif

        <article class="prose prose-lg prose-gray max-w-none dark:prose-invert">
            {!! $article->content !!}
        </article>
    </main>

    <footer class="py-12 text-center border-t mt-12 text-gray-400 text-sm dark:border-gray-800">
        &copy; {{ date('Y') }} Alvin Sk.
    </footer>
</body>

</html>
