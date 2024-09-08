@extends('layouts.app')

@section('title', $category->name)

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-3xl font-bold mb-6">{{ $category->name }}</h1>

    @if ($articles->count())
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($articles as $article)
                <x-article-card :article="$article" />
            @endforeach
        </div>

        <div class="mt-6">
            {{ $articles->links() }}
        </div>
    @else
        <p class="text-gray-600">No articles found for this category.</p>
    @endif
</div>
@endsection
