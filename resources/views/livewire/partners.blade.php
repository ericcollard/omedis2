@push('styles')
    <!-- Swiper's CSS -->
    <link
        rel="stylesheet"
        href="https://unpkg.com/swiper/swiper-bundle.min.css"
    />
@endpush

@push('scripts')
    <!-- Swiper JS -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script>
        var swiper = new Swiper('.mySwiper', {
            slidesPerView: 5,
            spaceBetween: 50,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
           },
            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
            },
        });
    </script>
@endpush

<div class="swiper mySwiper">
    <div class="swiper-wrapper">
        @foreach ($list as $item)
        <div class="swiper-slide">
            <img

                src="{{ asset('storage/'.$item.'.png') }}"
            />
        </div>
        @endforeach
    </div>
    <div class="swiper-pagination"></div>
</div>
