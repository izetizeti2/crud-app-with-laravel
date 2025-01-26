<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Qytetet</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.4.1/dist/tailwind.min.css" rel="stylesheet">
        <script src="https://cdn.tailwindcss.com"></script>
    <title>Detajet e qytetarit</title>
    <script>
        function changeLanguage(language) {
    const translations = {
        "en": {
            "projectName": "Laravel Project",
            "cities": "Cities",
            "citizens": "Citizens",
            "details": "Add a City ",
            "backToTable": "Back to Table",
            "name": "Name:",
            "create": "Create",
            "footerTitle" : "Laravel Project",
            "footerText": "Manage cities and citizens with ease. All rights reserved © ",
        },
        "sq": {
            "projectName": "Laravel Projekt",
            "cities": "Qytetet",
            "citizens": "Qytetarët",
            "details": "Shto nje qytet ",
            "backToTable": "Kthehu tek tabela",
            "name": "Emri:",
            "create": "Shto",
            "footerTitle" : "Laravel Projekt",
            "footerText": "Menaxhoni qytetet dhe qytetarët me lehtësi. Të gjitha të drejtat e rezervuara © ",
        }
    };
    const selectedLanguage = translations[language];

    document.getElementById("projectName").textContent = selectedLanguage.projectName;
    document.getElementById("navCities").textContent = selectedLanguage.cities;
    document.getElementById("navCitizens").textContent = selectedLanguage.citizens;
    document.getElementById("details").textContent = selectedLanguage.details;
    
    document.getElementById("backToTable").textContent = selectedLanguage.backToTable;
    document.getElementById("updateButtonCreate").textContent = selectedLanguage.create;
    document.getElementById("nameLabel").textContent = selectedLanguage.name;
    document.getElementById("footerTitle").textContent = selectedLanguage.footerTitle;
    document.getElementById("footerText").textContent = selectedLanguage.footerText + new Date().getFullYear() + ".";

    // Store selected language in localStorage
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
<body class="bg-blue-100 min-h-screen flex flex-col">
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
                <li><a id="navCitizens" href="/" class="text-white hover:text-blue-300 transition duration-300 ease-in-out transform hover:scale-105">Qytetaret</a></li>
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

<main class="container mx-auto px-6 py-8 flex-grow">
    <div class="mb-4 flex items-start flex-col">
        <h1 id="details" class="text-4xl font-extrabold text-gray-800 mb-6">Shto një qytet të ri</h1>

        <a href="{{ url('/qytetet/qytetet') }}"  id="backToTable" class="text-blue-500 hover:underline text-lg mt-4"> &larr; Kthehu tek tabela</a>
    </div>

    <form action="{{ route('qytetet.store') }}" method="POST" id="createForm" class="bg-white shadow-lg rounded-lg p-8">
    @csrf
    <div class="mb-6">
        <label id="nameLabel" for="emri" class="block text-gray-700 font-medium mb-2">Emri: </label>
        <input type="text" name="emri" id="emri" required
               class="w-full px-5 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
    </div>

    <button type="submit" class="bg-gradient-to-r from-blue-500 to-blue-700 text-white px-6 py-3 rounded-full shadow-md transform transition-transform duration-300 hover:scale-105 hover:shadow-xl w-full">
        <span>Create</span>
    </button>
</form>

</main>

<div id="confirmationModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
    <div class="bg-white rounded-lg shadow-lg p-6 w-1/3">
        <h2 id="modalTitle" class="text-xl font-bold text-green-600 text-center mb-4">Lajmërim!</h2>
        <p id="modalMessage" class="text-gray-800 mb-4 text-center"></p>
    </div>
</div>


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
</body>

<script>
    // Referencat e formës dhe modalit
    const createForm = document.getElementById('createForm');
    const confirmationModal = document.getElementById('confirmationModal');
    const modalTitle = document.getElementById('modalTitle');
    const modalMessage = document.getElementById('modalMessage');

    // Funksioni për të hapur modalin
    function openModal(emri) {
        const language = getSelectedLanguage(); // Gjejmë gjuhën
        if (language === "en") {
            modalTitle.textContent = "Announcement!";
            modalMessage.textContent = `You have added the city with the name: ${emri}.`;
        } else {
            modalTitle.textContent = "Lajmërim!";
            modalMessage.textContent = `Ju keni shtuar qytetin me emrin: ${emri}.`;
        }
        confirmationModal.classList.remove('hidden'); // Shfaq modalin

        // Mbyll modalin automatikisht pas 3 sekondash
        setTimeout(() => {
            confirmationModal.classList.add('hidden');
        }, 3000); // 3 sekonda
    }

    // Event listener për dërgimin e formës
    createForm.addEventListener('submit', function (event) {
        event.preventDefault(); // Parandalojmë dërgimin e formës automatikisht

        // Marrim vlerën e inputit 'emri'
        const emri = document.getElementById('emri').value.trim();

        // Kontrollojmë nëse të gjithë inputat janë plotësuar
        if (emri) {
            // Hap modalin dhe tregoj të dhënat
            openModal(emri);

            // Pas mbylljes së modalit, mund të dërgojmë formën
            setTimeout(() => {
                createForm.submit(); // Dërgon formën automatikisht pas modalit
            }, 3000); // Forma dërgohet pas 3 sekondash
        } else {
            alert("Ju lutemi plotësoni fushën 'Emri'!"); // Nëse mungon fushë
        }
    });

    // Funksioni për të marrë gjuhën nga localStorage
    function getSelectedLanguage() {
        return localStorage.getItem("selectedLanguage") || "en"; // Default është Anglishtja
    }
</script>

</html>