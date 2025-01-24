<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lista e Qyteteve</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.4.1/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-blue-100 min-h-screen flex flex-col font-sans">

    <!-- Header -->
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

    <!-- Main content -->
    <main class="container mx-auto px-6 py-12 flex-grow">
        
        <!-- Page title and add button -->
        <div class="flex justify-between items-center mb-8">
            <h2 class="text-4xl font-extrabold text-gray-800">Lista e Qyteteve</h2>
            <a href="{{ route('qytetet.create') }}" class="bg-gradient-to-r from-blue-500 to-blue-700 text-white px-5 py-2 rounded-full shadow-md transform transition-transform duration-300 hover:scale-105 hover:shadow-xl flex items-center space-x-2">
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-5 w-5">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
    </svg>
    <span class="text-lg font-semibold">Shto një Qytet</span>
</a>
        </div>

        <!-- Description -->
        <div class="max-w-4xl mx-auto mb-6 bg-white p-6 rounded-lg shadow-md">
            <p class="text-lg text-gray-700">Mund shikoni dhe menagjoni listen e qyteteve me posht. Përdorni opsionet për të shtuar, editur ose fshirë.</p>
        </div>

        <!-- Table -->
        <div class="overflow-x-auto max-w-4xl mx-auto">
    <table class="table-auto w-full bg-white shadow-lg rounded-lg overflow-hidden">
        <thead class="bg-gradient-to-r from-blue-900 to-blue-600 text-white">
            <tr>
                <th class="border-b-2 border-gray-300 px-6 py-4 text-left text-sm font-semibold">ID</th>
                <th class="border-b-2 border-gray-300 px-6 py-4 text-left text-sm font-semibold">Emri</th>
                <th class="border-b-2 border-gray-300 px-6 py-4 text-center text-sm font-semibold">Actions</th>
            </tr>
        </thead>
        <tbody class="bg-white">
            @foreach ($qytetet as $qytet)
            <tr class="border-t hover:bg-gray-200 transition duration-300 ease-in-out">
                <td class="border-b border-gray-200 px-6 py-4 text-left text-sm font-medium text-gray-800">{{ $loop->iteration }}</td>
                <td class="border-b border-gray-200 px-6 py-4 text-left text-sm font-medium text-gray-800">{{ $qytet->emri }}</td>
                <td class="border-b border-gray-200 px-6 py-4 text-center text-sm">
                    <div class="flex justify-center space-x-4">
                        <!-- Butoni Detajet -->
                        <a href="{{ url('/qytetet/' . $qytet->id) }}" class="bg-gradient-to-r from-green-600 to-green-900 text-white px-5 py-2 rounded-full shadow-md transform transition-transform duration-300 hover:scale-105 hover:shadow-xl">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-5 w-5 inline-block">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12l5 5L20 7"></path>
                            </svg>
                            Detajet
                        </a>

                        <!-- Butoni Edit -->
                        <a href="{{ url('/qytetet/' . $qytet->id . '/edit') }}" class="bg-gradient-to-r from-yellow-500 to-yellow-700 text-white px-5 py-2 rounded-full shadow-md transform transition-transform duration-300 hover:scale-105 hover:shadow-xl">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-5 w-5 inline-block">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 3l4 4m0 0L6 17l-4 4L3 16l4-4L3 8l4-4 9 9 4-4z"></path>
                            </svg>
                            Edit
                        </a>

                        <!-- Butoni Delete -->
                        <button class="bg-gradient-to-r from-red-600 to-red-700 text-white px-5 py-2 rounded-full shadow-md transform transition-transform duration-300 hover:scale-105 hover:shadow-xl" onclick="openModal('{{ $qytet->id }}', '{{ $qytet->emri }}')">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-5 w-5 inline-block">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                            Delete
                        </button>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

    </main>

    <!-- Confirmation Modal -->
    <div id="confirmationModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
        <div class="bg-white rounded-lg shadow-lg p-6 w-1/3">
            <h2 class="text-xl font-bold text-red-600 text-center mb-4">Paralajmërim!</h2>
            <p id="modalMessage" class="text-gray-800 mb-4 text-center"></p>
            <div class="flex justify-center gap-4">
                <button id="confirmYes" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Po</button>
                <button id="confirmNo" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Jo</button>
            </div>
        </div>
    </div>

    <form id="deleteForm" action="" method="POST" style="display: none;">
        @csrf
        @method('DELETE')
    </form>

    <!-- Footer -->
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
        // Modal handling for delete confirmation
        const confirmationModal = document.getElementById('confirmationModal');
        const modalMessage = document.getElementById('modalMessage');
        const confirmYes = document.getElementById('confirmYes');
        const confirmNo = document.getElementById('confirmNo');
        const deleteForm = document.getElementById('deleteForm');

        function openModal(id, emri) {
            modalMessage.textContent = `A jeni i sigurt qe doni te fshini qytetin me emrin: ${emri}?`;
            confirmationModal.classList.remove('hidden');
            deleteForm.action = '/qytetet/' + id;
        }

        confirmYes.addEventListener('click', function() {
            deleteForm.submit();
        });

        confirmNo.addEventListener('click', function() {
            confirmationModal.classList.add('hidden');
        });
    </script>

</body>
</html>
