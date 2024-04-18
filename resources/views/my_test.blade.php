<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @push('pagetitle', 'Attributes')
            @push('breadcrumb')
                @php(
                $breadcrumb_items = [
                            ['title' => 'Test', 'url' => '/test'],
                        ]
                )
                <livewire:show-breadcrumb :items="$breadcrumb_items" />
            @endpush


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
                    spaceBetween: 30,
                    centeredSlides: true,
                    autoplay: {
                        delay: 2500,
                        disableOnInteraction: false,
                    },
                    pagination: {
                        el: '.swiper-pagination',
                        clickable: true,
                    },
                    navigation: {
                        nextEl: '.swiper-button-next',
                        prevEl: '.swiper-button-prev',
                    },
                });
            </script>
            @endpush

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">


                <div class="p-6 lg:p-8 border-b border-gray-200">


                    <p class="mt-6 text-gray-500 leading-relaxed">
                        Laravel Jetstream provides a beautiful, robust starting point for your next Laravel application. Laravel is designed
                        to help you build your application using a development environment that is simple, powerful, and enjoyable. We believe
                        you should love expressing your creativity through programming, so we have spent time carefully crafting the Laravel
                        ecosystem to be a breath of fresh air. We hope you love it.
                    </p>

                    <div class="swiper mySwiper">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <img
                                    class="object-cover w-full h-96"
                                    src="https://source.unsplash.com/user/erondu/3000x900"
                                    alt="apple watch photo"
                                />
                            </div>
                            <div class="swiper-slide">
                                <img
                                    class="object-cover w-full h-96"
                                    src="https://source.unsplash.com/collection/190727/3000x900"
                                    alt="apple watch photo"
                                />
                            </div>
                            <div class="swiper-slide">
                                <img
                                    class="object-cover w-full h-96"
                                    src="https://source.unsplash.com/collection/190728/3000x900"
                                    alt="apple watch photo"
                                />
                            </div>
                        </div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-pagination"></div>
                    </div>

                </div>


            </div>
        </div>
    </div>

</x-app-layout>
