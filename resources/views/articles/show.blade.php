@extends('layouts.app')

@section('title', $article->title)

@section('content')
<div class="container mx-auto px-4 py-6">
    <article class="bg-white shadow-md rounded p-6">
        <h1 class="text-3xl font-bold mb-4">{{ $article->title }}</h1>
        <div class="flex items-center text-gray-500 mb-6">
            <p>By {{ $article->user->name }} | Published on {{ $article->published_at->format('F j, Y') }}</p>
        </div>
        @if ($article->image)
            <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }}" class="w-full h-auto mb-6 rounded">
        @endif
        <div class="text-gray-800 leading-relaxed">
            {!! nl2br(e($article->body)) !!}
        </div>
    </article>

    <!-- Related Articles Section -->
    <section class="mt-10">
        <h2 class="text-2xl font-bold mb-4">Related Articles</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($article->category->articles->where('id', '!=', $article->id)->take(3) as $relatedArticle)
                <x-article-card :article="$relatedArticle" />
            @endforeach
        </div>
    </section>

</div>
@endsection
