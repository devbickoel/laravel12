<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mobile Menu</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    <!-- Content utama -->
    <div class="flex flex-col items-center justify-center h-screen">
        <h1 class="text-2xl font-bold">Selamat Datang!</h1>
        <p class="text-gray-600">Gunakan menu bawah untuk navigasi 🚀</p>
    </div>

    <!-- Bottom Navigation -->
    <nav class="fixed bottom-0 left-0 w-full bg-white shadow-md border-t flex justify-around py-3">
        <a href="#" class="flex flex-col items-center text-gray-500 hover:text-blue-500">
            <span class="text-2xl">🏠</span>
            <span class="text-sm">Home</span>
        </a>
        <a href="https://laravel12-production-7632.up.railway.app" class="flex flex-col items-center text-gray-500 hover:text-blue-500">
            <span class="text-2xl">💱</span>
            <span class="text-sm">Market</span>
        </a>
        <a href="#" class="flex flex-col items-center text-gray-500 hover:text-blue-500">
            <span class="text-2xl">👤</span>
            <span class="text-sm">Profil</span>
        </a>
    </nav>

</body>
</html>
