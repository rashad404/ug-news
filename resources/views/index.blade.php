@extends('layouts.app')

@section('title', 'Home')

@section('content')
<!-- Swiper Slider -->
<div class="swiper my-8">
    <div class="swiper-wrapper">
        @foreach ($selectedArticles as $article)
            <div class="swiper-slide">
                <div class="relative w-full h-64 bg-gray-200 rounded-lg overflow-hidden">
                    <img src="{{ $article->image ? asset('storage/' . $article->image) : 'https://via.placeholder.com/800x400' }}" alt="{{ $article->title }}" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center p-4">
                        <div class="text-center">
                            <h3 class="text-white text-2xl font-semibold mb-2">
                                <a href="{{ route('articles.show', $article->slug) }}">
                                    {{ $article->title }}
                                </a>
                            </h3>
                            <p class="text-white text-sm">{{ $article->published_at->format('M d, Y') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <!-- Swiper Pagination -->
    <div class="swiper-pagination"></div>
    <!-- Swiper Navigation -->
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
</div>

<!-- Rest of the articles -->
<div class="bg-white pb-24 sm:pb-32 pt-1 sm:pt-1">
  <div class="mx-auto max-w-7xl px-6 lg:px-8">

    <div class="mx-auto mt-16 grid max-w-2xl grid-cols-1 gap-x-8 gap-y-20 lg:mx-0 lg:max-w-none lg:grid-cols-3">
      @foreach($articles as $article)
        <x-article-card :article="$article" />
      @endforeach
    </div>
  </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    var swiper = new Swiper('.swiper', {
        loop: true,
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        autoplay: {
            delay: 5000,
        },
    });
});
</script>
@endpush
