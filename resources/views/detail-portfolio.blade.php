<!DOCTYPE html>
<html lang="id" x-data="{ darkMode: localStorage.getItem('public_theme') === 'dark' }" :class="{ 'dark': darkMode }">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $project->title }} - Alvin Sk</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    {{-- fix front end  --}}
    {{-- fix front end  --}}
    {{-- fix front end  --}}
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

        .dark .border-gray-100 {
            border-color: #334155 !important;
        }

        .dark .text-gray-900 {
            color: #fff !important;
        }

        .dark .text-gray-600 {
            color: #cbd5e1 !important;
        }

        .dark .bg-gray-50 {
            background-color: #0f172a !important;
        }

        .dark .bg-gray-100 {
            background-color: #334155 !important;
        }
    </style>
</head>

<body class="bg-white text-gray-900 font-sans antialiased transition-colors duration-300">

    <nav
        class="p-6 sticky top-0 bg-white/80 dark:bg-slate-900/80 backdrop-blur-md z-50 border-b border-gray-100 dark:border-gray-800">
        <div class="max-w-5xl mx-auto flex justify-between items-center">
            <a href="/" class="font-bold text-lg text-accent hover:opacity-70 transition dark:text-white">&larr;
                Back to Home</a>
        </div>
    </nav>
{{-- ok --}}
{{-- ok --}}
{{-- ok --}}
    <main class="max-w-5xl mx-auto py-12 px-6">
        <h1 class="text-4xl md:text-5xl font-serif font-bold mb-8 leading-tight dark:text-white">{{ $project->title }}
        </h1>

        @if (!empty($project->image) && is_array($project->image))
            @php $count = count($project->image); @endphp
            <div class="mb-12 relative group rounded-xl overflow-hidden bg-gray-50 dark:bg-slate-800 border border-gray-100 dark:border-gray-700 shadow-sm"
                x-data="{ activeSlide: 0, total: {{ $count }} }">

                <div class="relative w-full aspect-[4/3] md:aspect-[16/9]">
                    @foreach ($project->image as $index => $img)
                        <div x-show="activeSlide === {{ $index }}"
                            class="absolute inset-0 w-full h-full flex items-center justify-center bg-gray-100 dark:bg-slate-700">
                            <img src="{{ $img['url'] }}" class="w-full h-full object-contain" alt="Project Image">
                        </div>
                    @endforeach
                </div>
                @if ($count > 1)
                    <button @click="activeSlide = activeSlide === 0 ? total - 1 : activeSlide - 1"
                        class="absolute left-4 top-1/2 -translate-y-1/2 bg-white text-black w-10 h-10 flex items-center justify-center rounded-full shadow-md">&larr;</button>
                    <button @click="activeSlide = activeSlide === total - 1 ? 0 : activeSlide + 1"
                        class="absolute right-4 top-1/2 -translate-y-1/2 bg-white text-black w-10 h-10 flex items-center justify-center rounded-full shadow-md">&rarr;</button>
                @endif
            </div>
        @endif

        <div class="prose prose-lg max-w-none text-gray-600 dark:text-gray-300 dark:prose-invert">
            {!! $project->description !!}
        </div>
    </main>
</body>

</html>
