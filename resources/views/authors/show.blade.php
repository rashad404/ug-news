@extends('layouts.app')

@section('title', $author->name)

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-3xl font-bold mb-6">{{ $author->name }}</h1>
    <p class="text-gray-600 mb-4">{{ $author->email }}</p>
    <p class="text-gray-600 mb-8">{{ $author->bio ?? 'No bio available.' }}</p> <!-- Display author's bio if available -->

    <h2 class="text-2xl font-bold mb-4">Articles by {{ $author->name }}</h2>
    @foreach ($author->articles as $article)
        <div class="mb-4">
            <a href="{{ route('articles.show', ['slug' => $article->slug]) }}" class="block text-gray-800 hover:text-blue-500">
                <h3 class="text-xl font-medium">{{ $article->title }}</h3>
            </a>
            <p class="text-xs text-gray-500">{{ $article->published_at->format('M d, Y') }}</p>
        </div>
    @endforeach
</div>
@endsection
