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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> 
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
    <h2 class="text-4xl font-extrabold text-gray-800 mb-6">Ndrysho emrin e qytetit: {{ $qytet->emri }}</h2>

    <div class="mb-4 flex items-center justify-between">
        <a href="{{ url('/qytetet/qytetet') }}" class="text-blue-500 hover:underline text-lg"> &larr; Kthehu tek tabela</a>
    </div>

    <form action="{{ url('/qytetet/' . $qytet->id) }}" method="POST" id="updateFrom" class="bg-white shadow-lg rounded-lg p-8">
        @csrf
        @method('PUT')
        
        <div class="mb-6">
            <label for="emri" class="block text-gray-700 font-medium mb-2">Emri: </label>
            <input type="text" name="emri" id="emri" value="{{ $qytet->emri }}" required
                class="w-full px-5 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
        </div>

        <button type="submit" class="bg-gradient-to-r from-blue-500 to-blue-700 text-white px-6 py-3 rounded-full shadow-md transform transition-transform duration-300 hover:scale-105 hover:shadow-xl w-full">
            Update
        </button>
    </form>
</main>


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

    <script>
        document.getElementById('updateFrom').addEventListener("submit", function(e){
            e.preventDefault();

            swal.fire({
                icon : 'success',
                title : 'Updated successfully',
                text : 'Qyteti u përditësua me sukses.',
                timer: 2000,
                showConfirmButton: false,
                didClose: () => {
                    this.submit();
                }
            });
        });
    </script>
</body>

</html>
