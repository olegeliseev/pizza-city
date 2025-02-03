@props(['banners'])
<section class="banners-section">
    <!-- Swiper -->
    <div class="container">
        <div class="swiper swiper_main">
            <div class="swiper-wrapper">
                @foreach ($banners as $banner)
                    <x-panels.banners.banners_item :banner="$banner" />
                @endforeach
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>

</section>
