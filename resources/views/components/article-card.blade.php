<article class="flex flex-col items-start justify-between">
    <div class="relative w-full">
        <img src="{{ $article->image ? asset('storage/' . $article->image) : 'https://via.placeholder.com/720x400' }}" alt="{{ $article->title }}" class="aspect-[16/9] w-full rounded-2xl bg-gray-100 object-cover sm:aspect-[2/1] lg:aspect-[3/2]">
        <div class="absolute inset-0 rounded-2xl ring-1 ring-inset ring-gray-900/10"></div>
    </div>
    <div class="max-w-xl">
        <div class="mt-8 flex items-center gap-x-4 text-xs">
            <time datetime="{{ $article->published_at->format('Y-m-d') }}" class="text-gray-500">{{ $article->published_at->format('M d, Y') }}</time>
            <a href="/categories/{{ $article->category->slug }}" class="relative z-10 rounded-full bg-gray-50 px-3 py-1.5 font-medium text-gray-600 hover:bg-gray-100">{{ $article->category->name }}</a>
        </div>
        <div class="group relative">
            <h3 class="mt-3 text-lg font-semibold leading-6 text-gray-900 group-hover:text-gray-600">
                <a href="{{ route('articles.show', $article->slug) }}">
                    <span class="absolute inset-0"></span>
                    {{ $article->title }}
                </a>
            </h3>
        </div>
    </div>
</article>
