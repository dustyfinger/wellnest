<!-- resources/views/guest/landing.blade.php -->
<nav class="bg-white shadow-md">
  <div class="max-w-7xl mx-auto px-4 py-3 flex justify-between items-center">
    <!-- Logo -->
    <div class="text-2xl font-bold text-cyan-600">
      WellNest
    </div>

    <!-- Menu -->
    <div class="flex space-x-6 items-center">
      <a href="#" class="font-semibold text-gray-700 hover:text-cyan-600">Membership</a>
      <a href="#" class="font-semibold text-gray-700 hover:text-cyan-600">Artikel</a>

      <!-- Button -->
      <a href="{{ route('register') }}" class="bg-cyan-500 text-white px-4 py-2 rounded-md shadow hover:bg-cyan-600 transition">
        Gabung Sekarang
      </a>
    </div>
  </div>
</nav>
