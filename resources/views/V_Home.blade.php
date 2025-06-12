@extends('master.public') {{-- Sesuaikan dengan nama layout kamu --}}

@include('master.navbar')
<title>@yield('title', 'WellNest')</title>
@section('content')
<div class="relative w-full h-[500px] overflow-hidden">
    <img src="{{ asset('images/barbel_landing.jpg') }}" alt="Barbell Image"
         class="w-full h-full object-cover brightness-75">
    <div class="absolute top-1/4 left-12 text-white">
        <h1 class="text-4xl md:text-5xl font-extrabold">Elevate your<br>workout</h1>
        <p class="mt-4 max-w-md text-sm md:text-base">
            Bentuk gaya hidup sehatmu dengan WellNest. Bergabunglah dengan komunitas kami dan nikmati berbagai
            fasilitas gym terbaik, program latihan yang disesuaikan, dan dukungan dari pelatih profesional.
        </p>
        <a href="{{route('register')}}" class="inline-block mt-4 bg-cyan-500 text-white px-4 py-2 rounded shadow">
            Gabung Membership
        </a>
    </div>
</div>

{{-- Why Choose Us Section --}}
<section class="py-16 bg-white">
    <div class="max-w-6xl mx-auto px-4 grid md:grid-cols-2 gap-10 items-center">
        <div>
            <h2 class="text-3xl md:text-4xl font-bold mb-4">Why Choose Us</h2>
            <p class="text-gray-600 mb-8">
                WellNest adalah tempat yang tepat untuk memulai perjalanan kebugaranmu. Dengan fasilitas modern, pelatih
                profesional, dan komunitas yang mendukung, kami siap membantumu mencapai tujuan kebugaranmu.
            </p>
            <div class="space-y-6">
                @for ($i = 0; $i < 4; $i++)
                    <div class="flex items-start space-x-4">
                        <div class="text-2xl">🏋️</div>
                        <div>
                            <h4 class="text-lg font-semibold">Bugar dan sehat</h4>
                            <p class="text-gray-500 text-sm">
                                Kami menyediakan berbagai program latihan yang dirancang untuk membantumu mencapai
                                kebugaran optimal.
                            </p>
                        </div>
                    </div>
                @endfor
            </div>
        </div>

            <div class="grid grid-cols-2 gap-4">
            <img src="{{ asset('images/barbel_landing.jpg') }}" class="rounded-lg object-cover w-full h-40 md:h-48" alt="Image 1">
            <img src="{{ asset('images/img_gym.jpg') }}" class="rounded-lg object-cover w-full h-40 md:h-48" alt="Image 2">
            <img src="{{ asset('images/img_gym1.jpg') }}" class="rounded-lg object-cover w-full h-40 md:h-48" alt="Image 3">
            <img src="{{ asset('images/img_gym2.jpg') }}" class="rounded-lg object-cover w-full h-40 md:h-48" alt="Image 4">
        </div>
    </div>
</section>

{{-- Contact Section --}}
<section class="relative h-48 md:h-64">
    <img src="{{ asset('images/img_gym.jpg') }}" alt="Contact Background"
         class="w-full h-full object-cover brightness-50">
    <div class="absolute inset-0 flex items-center justify-center text-white text-center">
        <div>
            <p class="text-sm">Hubungi Kami</p>
            <p class="text-2xl md:text-3xl font-bold mt-1">+62 82000-60000</p>
        </div>
    </div>
</section>

@include('master.footer')
@endsection
