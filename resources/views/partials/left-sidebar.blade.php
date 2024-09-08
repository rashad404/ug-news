<!-- Left Sidebar -->
<div class="hidden lg:block col-span-2 bg-white p-4 shadow-md rounded">
    <!-- Featured Articles -->
    <div class="mb-6">
        <h3 class="text-xl font-semibold mb-4">Featured Articles</h3>
        @foreach ($featuredArticles as $featured)
            <div class="mb-4">
                <a href="{{ route('articles.show', ['slug' => $featured->slug]) }}" class="block text-gray-800 hover:text-blue-500">
                    <h4 class="text-md font-medium">{{ $featured->title }}</h4>
                </a>
                <p class="text-xs text-gray-500">{{ $featured->published_at->format('M d, Y') }}</p>
            </div>
        @endforeach
    </div>

    <!-- Live Updates -->
    <div class="mb-6">
        <h3 class="text-xl font-semibold mb-4">Live Updates</h3>
        <ul class="space-y-2">
            @foreach ($liveUpdates as $update)
                <li>
                    <a href="{{ route('articles.show', ['slug' => $update->slug]) }}" class="text-gray-800 hover:text-blue-500">
                        {{ Str::limit($update->title, 50) }}
                    </a>
                    <p class="text-xs text-gray-500">{{ $update->published_at->diffForHumans() }}</p>
                </li>
            @endforeach
        </ul>
    </div>

    <!-- Quick Links -->
    <div class="mb-6">
        <h3 class="text-xl font-semibold mb-4">Quick Links</h3>
        <ul class="space-y-2">
            <li><a href="{{ route('home') }}" class="text-gray-800 hover:text-blue-500">Top Stories</a></li>
            <li><a href="{{ route('categories.show', ['slug' => 'latest-news']) }}" class="text-gray-800 hover:text-blue-500">Latest News</a></li>
            <li><a href="{{ route('categories.show', ['slug' => 'opinions']) }}" class="text-gray-800 hover:text-blue-500">Opinions</a></li>
            <li><a href="{{ route('categories.show', ['slug' => 'features']) }}" class="text-gray-800 hover:text-blue-500">Features</a></li>
        </ul>
    </div>

    <!-- Most Shared Articles -->
    <div class="mb-6">
        <h3 class="text-xl font-semibold mb-4">Most Shared Articles</h3>
        @foreach ($mostSharedArticles as $article)
            <div class="mb-4">
                <a href="{{ route('articles.show', ['slug' => $article->slug]) }}" class="block text-gray-800 hover:text-blue-500">
                    <h4 class="text-md font-medium">{{ $article->title }}</h4>
                </a>
                <p class="text-xs text-gray-500">{{ $article->shared_count }} shares</p>
            </div>
        @endforeach
    </div>

    <!-- Authors Spotlight -->
    <div class="mb-6">
        <h3 class="text-xl font-semibold mb-4">Authors Spotlight</h3>
        @foreach ($authors as $author)
            <div class="flex items-center mb-4">
                <img src="{{ Storage::url($author->image) }}" alt="{{ $author->name }}" class="h-10 w-10 rounded-full object-cover mr-3">
                <div>
                    <a href="{{ route('authors.show', ['id' => $author->id]) }}" class="text-gray-800 hover:text-blue-500">
                        {{ $author->name }}
                    </a>
                    <p class="text-xs text-gray-500">{{ $author->articles_count }} articles</p>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Quote of the Day -->
    <div class="mb-6">
        <h3 class="text-xl font-semibold mb-4">Quote of the Day</h3>
        <div class="bg-gray-100 p-4 rounded text-center">
            <p class="text-lg italic font-medium">"{{ $quoteOfTheDay }}"</p>
            <p class="text-xs text-gray-500">- {{ $quoteAuthor }}</p>
        </div>
    </div>

    <!-- Poll/Survey -->
    <div class="mb-6">
        <h3 class="text-xl font-semibold mb-4">Participate in Our Poll</h3>
        <p class="text-sm text-gray-700 mb-2">{{ $pollQuestion }}</p>
        <form action="{{ route('polls.vote') }}" method="POST">
            @csrf
            @foreach ($pollOptions as $option)
                <div class="flex items-center mb-2">
                    <input type="radio" name="poll_option" value="{{ $option->id }}" class="mr-2">
                    <label class="text-sm">{{ $option->option }}</label>
                </div>
            @endforeach
            <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded">Vote</button>
        </form>
    </div>

</div>
