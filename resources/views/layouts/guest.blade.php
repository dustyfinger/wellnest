<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Custom Styles -->
        <style>
            body {
                font-family: 'Inter', sans-serif;
            }

            .gradient-bg {
                background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                background-size: 400% 400%;
                animation: gradientShift 15s ease infinite;
            }

            @keyframes gradientShift {
                0% { background-position: 0% 50%; }
                50% { background-position: 100% 50%; }
                100% { background-position: 0% 50%; }
            }

            .floating-shapes {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                overflow: hidden;
                pointer-events: none;
            }

            .shape {
                position: absolute;
                opacity: 0.1;
                animation: float 20s infinite ease-in-out;
            }

            .shape:nth-child(1) {
                top: 20%;
                left: 20%;
                width: 60px;
                height: 60px;
                background: white;
                border-radius: 50%;
                animation-delay: 0s;
            }

            .shape:nth-child(2) {
                top: 60%;
                right: 20%;
                width: 80px;
                height: 80px;
                background: white;
                border-radius: 30%;
                animation-delay: 5s;
            }

            .shape:nth-child(3) {
                bottom: 20%;
                left: 30%;
                width: 40px;
                height: 40px;
                background: white;
                border-radius: 50%;
                animation-delay: 10s;
            }

            @keyframes float {
                0%, 100% { transform: translateY(0px) rotate(0deg); }
                33% { transform: translateY(-30px) rotate(120deg); }
                66% { transform: translateY(30px) rotate(240deg); }
            }

            .glass-effect {
                background: rgba(255, 255, 255, 0.95);
                backdrop-filter: blur(20px);
                border: 1px solid rgba(255, 255, 255, 0.2);
            }

            .card-hover {
                transition: all 0.3s ease;
            }

            .card-hover:hover {
                transform: translateY(-5px);
                box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            }

            .pulse-glow {
                animation: pulseGlow 2s infinite;
            }

            @keyframes pulseGlow {
                0%, 100% { box-shadow: 0 0 20px rgba(102, 126, 234, 0.3); }
                50% { box-shadow: 0 0 30px rgba(102, 126, 234, 0.5); }
            }
        </style>
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <!-- Main Container -->
        <div class="min-h-screen gradient-bg flex flex-col justify-center items-center p-4 relative">
            <!-- Floating Background Shapes -->
            {{-- <div class="floating-shapes">
                <div class="shape"></div>
                <div class="shape"></div>
                <div class="shape"></div>
            </div> --}}

            <!-- Logo Section -->
            <div class="mb-8 relative z-10">
                <a href="/" class="block transform hover:scale-105 transition-transform duration-300">
                    <!-- Enhanced Logo Container -->
                    <div class="flex flex-col items-center space-y-4">
                        <!-- Logo Circle -->
                        {{-- <div class="w-24 h-24 bg-white rounded-2xl shadow-2xl flex items-center justify-center pulse-glow">
                            <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-purple-600 rounded-xl flex items-center justify-center">
                                <!-- Logo Icon (Gym/Wellness themed) -->
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                                </svg>
                            </div>
                        </div> --}}

                        <!-- Brand Name -->
                        <div class="text-center">
                            <h1 class="text-3xl font-bold text-white drop-shadow-lg">WellNest</h1>
                            <p class="text-white/80 text-sm font-medium">Your Wellness Journey</p>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Main Card -->
            <div class="w-full max-w-xl lg:max-w-2xl relative z-10">
                <div class="glass-effect rounded-2xl shadow-2xl card-hover overflow-hidden">
                    <!-- Card Header -->
                    <div class="px-12 pt-12 pb-4">
                        <div class="text-center">
                            <div class="w-16 h-1 bg-gradient-to-r from-blue-500 to-purple-600 rounded-full mx-auto mb-8"></div>
                        </div>
                    </div>

                    <!-- Card Content -->
                    <div class="px-12 pb-12">
                        {{ $slot }}
                    </div>

                    <!-- Card Footer Decoration -->
                    <div class="h-2 bg-gradient-to-r from-blue-500 via-purple-500 to-blue-500 bg-size-200 animate-pulse"></div>
                </div>

                <!-- Bottom decoration -->
                <div class="mt-6 text-center">
                    <p class="text-white/70 text-sm">
                        Bergabunglah dengan ratusan member yang telah merasakan manfaatnya
                    </p>
                </div>
            </div>

            <!-- Footer -->
            <div class="mt-12 text-center text-white/60 text-sm relative z-10">
                <p>&copy; 2025 WellNest. All rights reserved.</p>
            </div>
        </div>
    </body>
</html>
