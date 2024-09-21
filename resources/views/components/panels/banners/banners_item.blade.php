@props(['banner'])
<div class="swiper-slide banner-slide"
     style="background-image: url({{ $banner->imageUrl }})">
    <h1 class="banner-slide__title">{{ $banner->title }}</h1>
    <p class="banner-slide__description">{{ $banner->description }}</p>
    <a class="banner-slide__btn" href="{{ $banner->link }}">Узнать больше</a>
</div>
