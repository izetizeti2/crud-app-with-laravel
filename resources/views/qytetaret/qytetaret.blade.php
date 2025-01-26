<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lista e Qyteteve</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.4.1/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>

    <script>
    function changeLanguage(language) {
        const translations = {
            "en": {
                "projectName": "Laravel Project",
                "cities": "Cities",
                "citizens": "Citizens",
                "titledetails": "List of Citizens",
                "add": "Add a citizen",
                "textDetalis": "You can view and manage the list of citizens below. Use the options to add, edit or delete.",
                "update": "Update",
                "details": "Details",
                "delete": "Delete",
                "id": "ID:",
                "name": "Name:",
                "surname": "Surname:",
                "gender": "Gender:",
                "birthYear": "Year of Birth:",
                "actions": "Actions",
                "footerTitle": "Laravel Project",
                "footerText": "Manage cities and citizens with ease. All rights reserved ©",
            },
            "sq": {
                "projectName": "Laravel Projekt",
                "cities": "Qytetet",
                "citizens": "Qytetarët",
                "titledetails": "Lista e qytetareve",
                "add": "Shto një Qytetar",
                "textDetalis": "Mund shikoni dhe menaxhoni listën e qytetareve më poshtë. Përdorni opsionet për të shtuar, editur ose fshirë.",
                "update": "Përditso",
                "details": "Detajet",
                "delete": "Fshi",
                "id": "ID:",
                "name": "Emri:",
                "surname": "Mbiemri:",
                "gender": "Gjinia:",
                "birthYear": "Viti i lindjes:",
                "actions": "Aksionet",
                "footerTitle": "Laravel Projekt",
                "footerText": "Menaxhoni qytetet dhe qytetarët me lehtësi. Të gjitha të drejtat e rezervuara ©",  
            }
        };

        const selectedLanguage = translations[language];

        document.getElementById("projectName").textContent = selectedLanguage.projectName;
        document.getElementById("navCities").textContent = selectedLanguage.cities;
        document.getElementById("navCitizens").textContent = selectedLanguage.citizens;
        document.getElementById("titledetails").textContent = selectedLanguage.titledetails;
        document.getElementById("textDetalis").textContent = selectedLanguage.textDetalis;
        document.getElementById("add").textContent = selectedLanguage.add;
        document.getElementById("idLabel").textContent = selectedLanguage.id;
        document.getElementById("nameLabel").textContent = selectedLanguage.name;
        document.getElementById("surnameLabel").textContent = selectedLanguage.surname;
        document.getElementById("genderLabel").textContent = selectedLanguage.gender;
        document.getElementById("birthYearLabel").textContent = selectedLanguage.birthYear;
        document.getElementById("actionsLabel").textContent = selectedLanguage.actions;
        document.getElementById("footerTitle").textContent = selectedLanguage.footerTitle;
        document.getElementById("footerText").textContent = selectedLanguage.footerText + " " + new Date().getFullYear() + ".";

        // Përditëso butonat për 'Përditso', 'Detajet' dhe 'Fshi'
        const updateButtons = document.querySelectorAll('.btn-edit-text');
        const detailsButtons = document.querySelectorAll('.btn-details-text');
        const deleteButtons = document.querySelectorAll('.btn-delete-text');

        updateButtons.forEach(button => {
            button.textContent = selectedLanguage.update;
        });

        detailsButtons.forEach(button => {
            button.textContent = selectedLanguage.details;
        });

        deleteButtons.forEach(button => {
            button.textContent = selectedLanguage.delete;
        });

        // Ruaj gjuhën e zgjedhur në localStorage
        localStorage.setItem("selectedLanguage", language);
    }

    // On page load, apply the stored language if available
    window.addEventListener("DOMContentLoaded", () => {
        const storedLanguage = localStorage.getItem("selectedLanguage") || "en";
        document.getElementById("languageSelect").value = storedLanguage;
        changeLanguage(storedLanguage);
    });
</script>


</head>
<body class="bg-blue-100 min-h-screen flex flex-col font-sans">

<header class="bg-blue-900 text-white shadow-lg">
    <div class="container mx-auto px-6 py-4 flex items-center justify-between">
        <!-- Project Name -->
        <div class="flex items-center space-x-4">
            <span id="projectName" class="text-3xl font-bold tracking-wide text-white">Laravel Project</span>
        </div>

        <!-- Navigation Links -->
        <nav class="flex-1 flex justify-center">
            <ul class="flex space-x-8 text-lg font-medium">
                <li><a id="navCities" href="/qytetet/qytetet" class="text-white hover:text-blue-300 transition duration-300 ease-in-out transform hover:scale-105">Qytetet</a></li>
                <li><a id="navCitizens" href="/" class="text-white hover:text-blue-300 transition duration-300 ease-in-out transform hover:scale-105">Qytetarët</a></li>
            </ul>
        </nav>

        <!-- Language Selector -->
        <div class="relative">
            <select id="languageSelect" class="bg-white text-blue-900 px-4 py-2 rounded-full shadow-md border border-blue-400 focus:ring focus:ring-blue-300 focus:outline-none transition duration-300" onchange="changeLanguage(this.value)">
                <option value="en">English</option>
                <option value="sq">Shqip</option>
            </select>
        </div>
    </div>
</header>

<main class="container mx-auto px-4 py-8 flex-grow">
<div class="mb-6">
    <div class="mb-4 flex items-center justify-between">
        <h2 id="titledetails" class="text-4xl font-extrabold text-gray-800">Lista e Qytetareve</h2>
        <a href="{{ route('qytetaret.create') }}" class="bg-gradient-to-r from-blue-500 to-blue-700 text-white px-5 py-2 rounded-full shadow-md transform transition-transform duration-300 hover:scale-105 hover:shadow-xl flex items-center space-x-2">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-5 w-5">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
            </svg>
            <span id="add" class="text-lg font-semibold">Shto një Qytetar</span>
        </a>
    </div>
</div>

<!-- Description -->
<div class="max-w-full w-full mx-auto mb-6 bg-white p-6 rounded-lg shadow-md">
    <p id="textDetalis" class="text-lg text-gray-700">Mund shikoni dhe menagjoni listen e qytetareve me posht. Përdorni opsionet për të shtuar, editur ose fshirë qytetare.</p>
</div>


<!-- Description -->


        <div class="overflow-x-auto max-w-full mx-auto">
    <table class="table-auto w-full bg-white shadow-lg rounded-lg overflow-hidden">
        <thead class="bg-gradient-to-r from-blue-900 to-blue-600 text-white">
            <tr>
                <th id="idLabel" class="border-b-2 border-gray-300 px-6 py-4 text-left text-sm font-semibold">ID</th>
                <th id="nameLabel"class="border-b-2 border-gray-300 px-6 py-4 text-left text-sm font-semibold">Emri</th>
                <th id="surnameLabel" class="border-b-2 border-gray-300 px-6 py-4 text-left text-sm font-semibold">Mbiemri</th>
                <th id="genderLabel" class="border-b-2 border-gray-300 px-6 py-4 text-left text-sm font-semibold">Gjinia</th>
                <th id="birthYearLabel" class="border-b-2 border-gray-300 px-6 py-4 text-center text-sm font-semibold">Viti i lindjes</th>
                <th id="actionsLabel" class="border-b-2 border-gray-300 px-6 py-4 text-center text-sm font-semibold">Actionet</th>
            </tr>
        </thead>
        <tbody class="bg-white">
            @foreach ($qytetaret as $qytetar)
            <tr class="border-t hover:bg-gray-200 transition duration-300 ease-in-out">
                <td class="border-b border-gray-200 px-6 py-4 text-center text-sm font-medium text-gray-800">{{ $qytetar->id }}</td>
                <td class="border-b border-gray-200 px-6 py-4 text-left text-sm font-medium text-gray-800">{{ $qytetar->emri }}</td>
                <td class="border-b border-gray-200 px-6 py-4 text-left text-sm font-medium text-gray-800">{{ $qytetar->mbiemri }}</td>
                <td class="border-b border-gray-200 px-6 py-4 text-center text-sm font-medium text-gray-800">{{ $qytetar->gjinia }}</td>
                <td class="border-b border-gray-200 px-6 py-4 text-center text-sm font-medium text-gray-800">{{ $qytetar->viti_i_lindjes }}</td>
                <td class="border-b border-gray-200 px-6 py-4 text-center text-sm">
                    <div class="flex justify-center space-x-4">
                        <!-- Butoni Detajet -->
                        <a href="{{ url('/qytetaret/' . $qytetar->id) }}" class="bg-gradient-to-r from-green-600 to-green-900 text-white px-5 py-2 rounded-full shadow-md transform transition-transform duration-300 hover:scale-105 hover:shadow-xl">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-5 w-5 inline-block">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12l5 5L20 7"></path>
                            </svg>
                            <span class="btn-details-text"></span>
                        </a>

                        <!-- Butoni Edit -->
                        <a href="{{ url('/qytetaret/' . $qytetar->id . '/edit') }}" class="bg-gradient-to-r from-yellow-500 to-yellow-700 text-white px-5 py-2 rounded-full shadow-md transform transition-transform duration-300 hover:scale-105 hover:shadow-xl">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-5 w-5 inline-block">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 3l4 4m0 0L6 17l-4 4L3 16l4-4L3 8l4-4 9 9 4-4z"></path>
                            </svg>
                            <span class="btn-edit-text"></span>
                        </a>

                        <!-- Butoni Delete -->
                        <button class="bg-gradient-to-r from-red-600 to-red-700 text-white px-5 py-2 rounded-full shadow-md transform transition-transform duration-300 hover:scale-105 hover:shadow-xl" onclick="openModal('{{ $qytetar->id }}', '{{ $qytetar->emri }}', '{{ $qytetar->mbiemri }}')">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-5 w-5 inline-block">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                            <span class="btn-delete-text"></span>
                        </button>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>


    </div>
</main>

<!-- Modal për konfirmimin -->
<div id="confirmationModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
    <div class="bg-white rounded-lg shadow-lg p-6 w-1/3">
        <h2 id="modalTitle" class="text-xl font-bold text-red-600 text-center mb-4">Paralajmërim!</h2>
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

<footer class="bg-blue-900 text-white py-8 mt-8">
    <div class="container mx-auto px-6">
        <div class="flex justify-between items-center">
            <div>
                <h3 id="footerTitle" class="text-2xl font-semibold">Laravel Project</h3>
                <p id="footerText" class="text-sm mt-2">Menaxhoni qytetet dhe qytetarët me lehtësi. Të gjitha të drejtat e rezervuara © {{ date('Y') }}.</p>
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
    const modalTitle = document.getElementById('modalTitle');
    const modalMessage = document.getElementById('modalMessage');
    const confirmYes = document.getElementById('confirmYes');
    const confirmNo = document.getElementById('confirmNo');
    const deleteForm = document.getElementById('deleteForm');

    function getSelectedLanguage() {
        return localStorage.getItem("selectedLanguage") || "en"; // default to English if not set
    }

    function openModal(id, emri, mbiemri) {
        const language = getSelectedLanguage();
        
        if (language === "en") {
            modalTitle.textContent = "Warning!";
            modalMessage.textContent = `Are you sure you want to delete the citizen named: ${emri} ${mbiemri}?`;
            confirmYes.textContent = "Yes";
            confirmNo.textContent = "No";
        } else {
            modalTitle.textContent = "Paralajmërim!";
            modalMessage.textContent = `A jeni i sigurt qe doni te fshini qytetarin me emrin: ${emri} ${mbiemri}?`;
            confirmYes.textContent = "Po";
            confirmNo.textContent = "Jo";
        }

        confirmationModal.classList.remove('hidden');
        deleteForm.action = '/qytetaret/' + id;
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
