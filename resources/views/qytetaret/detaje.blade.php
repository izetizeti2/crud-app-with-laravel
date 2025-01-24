<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Detajet e Qytetareve</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.4.1/dist/tailwind.min.css" rel="stylesheet">
        <script src="https://cdn.tailwindcss.com"></script>
    <title>Detajet e qytetarit</title>
</head>
<body class="bg-blue-100 min-h-screen flex flex-col">
<header class="bg-blue-900 text-white shadow-lg">
    <div class="container mx-auto px-6 py-4 flex items-center justify-between">
        <div class="flex items-center space-x-4">
            <!-- Logo ose emri i projektit -->
            <span class="text-3xl font-bold tracking-wide text-white">Laravel Project</span>
        </div>
        <nav>
            <ul class="flex space-x-8 text-lg font-medium">
                <li><a href="/qytetet/qytetet" class="text-white hover:text-blue-300 transition duration-300 ease-in-out transform hover:scale-105">Qytetet</a></li>
                <li><a href="/" class="text-white hover:text-blue-300 transition duration-300 ease-in-out transform hover:scale-105">Qytetaret</a></li>
            </ul>
        </nav>
    </div>
</header>
<main class="container mx-auto px-6 py-8 flex-grow">
    <h1 class="text-4xl font-extrabold text-gray-800 mb-6">Detajet e qytetarit: {{ $qytetar->emri }} {{ $qytetar->mbiemri }}</h1>

    <div class="mb-4 flex items-center justify-between">
        <a href="{{url('/') }}" class="text-blue-500 hover:underline text-lg"> &larr; Kthehu tek tabela</a>
        <a href="{{ url('/qytetaret/' . $qytetar->id . '/edit') }}" class="bg-gradient-to-r from-yellow-500 to-yellow-700 text-white px-5 py-2 rounded-full shadow-md transform transition-transform duration-300 hover:scale-105 hover:shadow-xl">
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-5 w-5 inline-block">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 3l4 4m0 0L6 17l-4 4L3 16l4-4L3 8l4-4 9 9 4-4z"></path>
    </svg>
    Edit
</a>
    </div>

    <div class="bg-white shadow-lg rounded-lg p-8">
        <p class="text-lg mb-4"><strong>ID:</strong> {{ $qytetar->id }}</p>
        <p class="text-lg mb-4"><strong>Emri:</strong> {{ $qytetar->emri }}</p>
        <p class="text-lg mb-4"><strong>Mbiemri:</strong> {{ $qytetar->mbiemri }}</p>
        <p class="text-lg mb-4"><strong>Gjinia:</strong> {{ $qytetar->gjinia }}</p>
        <p class="text-lg"><strong>Viti i lindjes:</strong> {{ $qytetar->viti_i_lindjes }}</p>
    </div>
</main>
</body>
<footer class="bg-blue-900 text-white py-8 mt-8">
    <div class="container mx-auto px-6">
        <div class="flex justify-between items-center">
            <div>
                <h3 class="text-2xl font-semibold">Laravel Project</h3>
                <p class="text-sm mt-2">Menaxhoni qytetet dhe qytetarët me lehtësi. Të gjitha të drejtat e rezervuara © {{ date('Y') }}.</p>
            </div>
            <div class="flex space-x-6">
                <!-- Ikonat sociale -->
                <a href="#" class="text-white hover:text-gray-200">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" class="h-6 w-6">
                        <path d="M22 12l-6-6v5H2v2h14v5z"></path>
                    </svg>
                </a>
                <a href="#" class="text-white hover:text-gray-200">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" class="h-6 w-6">
                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z"></path>
                    </svg>
                </a>
                <a href="#" class="text-white hover:text-gray-200">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" class="h-6 w-6">
                        <path d="M20 12l-6-6v5H2v2h12v5z"></path>
                    </svg>
                </a>
            </div>
        </div>
    </div>
</footer>
</html>