<x-app-layout>
    <style>
        @keyframes fadeInUp {
            0% {
                opacity: 0;
                transform: translateY(20px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fadeInUp {
            animation: fadeInUp 0.5s ease-out;
        }

        .card {
            transition: transform 0.3s ease;
        }

        .card:hover {
            transform: translateY(-10px);
        }

        .sidebar {
            height: 100%;
            width: 240px;
            background-color: #2d3748;
            color: white;
            overflow-y: auto;
            padding: 1rem;
            box-sizing: border-box;
            display: flex;
            flex-direction: column;
        }

        .main-content {
            flex-grow: 1;
            overflow-y: auto;
            padding: 1.5rem;
            background-color: #f7fafc;
            box-sizing: border-box;
            display: flex;
            flex-direction: column;
        }

        .dark .main-content {
            background-color: #1a202c;
        }

        .spacer {
            height: 50px;
            background-color: black;
        }

        .modal {
            background-color: rgba(0, 0, 0, 0.5);
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 50;
        }

        .modal-content {
            background-color: white;
            padding: 1.5rem;
            border-radius: 0.5rem;
            width: 90%;
            max-width: 500px;
            position: relative;
        }

        .close {
            position: absolute;
            top: 10px;
            right: 10px;
            cursor: pointer;
            color: #000;
            font-size: 20px;
        }

        .menu-bar {
            background-color: #1a202c;
            color: white;
            display: flex;
            align-items: center;
            padding: 0.5rem 1rem;
            height: 50px;
        }

        .menu-bar .menu-item {
            display: flex;
            align-items: center;
            margin-right: 1rem;
            cursor: pointer;
        }

        .menu-bar .menu-item svg {
            margin-right: 0.5rem;
        }

        .menu-bar .search-box {
            margin-left: auto;
        }

        .menu-bar .search-box input {
            padding: 0.5rem;
            border-radius: 4px;
            border: none;
            outline: none;
        }

        .entity-list {
            flex-grow: 1;
        }

        .entity-list ul {
            list-style-type: none;
            padding: 0;
        }

        .entity-list li {
            margin-bottom: 0.5rem;
        }

        .entity-list a {
            display: flex;
            align-items: center;
            padding: 0.5rem;
            border-radius: 4px;
            transition: background-color 0.2s ease;
        }

        .entity-list a:hover {
            background-color: #4a5568;
        }

        .entity-list svg {
            margin-right: 0.5rem;
        }
    </style>

    <div x-data="{ showModal: false, entityType: '', entityValue: '' }" class="flex h-screen">
        <!-- Sidebar -->
        <div class="sidebar">
            <h2 class="text-xl font-semibold mb-4">NIS-SL</h2>
            <div class="entity-list">
                <ul>
                    <li>
                        <a href="#" @click.prevent="showModal = true; entityType = 'Phonenumber'; entityValue = 'search-by-phonenumber'" class="flex items-center space-x-2 p-2 rounded transition duration-200">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h4v4H3z" />
                            </svg>
                            <span><strong>Phonenumber</strong></span>
                        </a>
                    </li>
                    <li>
                        <a href="#" @click.prevent="showModal = true; entityType = 'Fullname'; entityValue = 'search-by-fullname'" class="flex items-center space-x-2 p-2 rounded transition duration-200">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 5h14M5 12h14M5 19h14" />
                            </svg>
                            <span><strong>Fullname</strong></span>
                        </a>
                    </li>
                    <li>
                        <a href="#" @click.prevent="showModal = true; entityType = 'NIN'; entityValue = 'search-by-nin'" class="flex items-center space-x-2 p-2 rounded transition duration-200">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v8m-4-4h8" />
                            </svg>
                            <span><strong>NIN</strong> </span>
                        </a>
                    </li>
                    <li>
                        <a href="#" @click.prevent="showModal = true; entityType = 'Vehicle Number'; entityValue = 'search-by-vehicle-number'" class="flex items-center space-x-2 p-2 rounded transition duration-200">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12l2-2m0 0l7-7 7 7M13 5v6" />
                            </svg>
                            <span><strong>Vehicle Number</strong> </span>
                        </a>
                    </li>
                    <li>
                        <a href="#" @click.prevent="showModal = true; entityType = 'Passport Number'; entityValue = 'search-by-passport-number'" class="flex items-center space-x-2 p-2 rounded transition duration-200">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h4v4H3z" />
                            </svg>
                            <span><strong>Passport Number</strong></span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex flex-col flex-grow">
            <!-- Top Menu Bar -->
            <div class="menu-bar">
                <div class="menu-item">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h18M3 12h18m-9 9h9" />
                    </svg>
                    <span>Menu</span>
                </div>
                <div class="menu-item">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    <span>Data Source</span>
                </div>
                <div class="menu-item">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14m-7-7v14" />
                    </svg>
                    <span>Entity Search</span>
                </div>
                <div class="search-box">
                    <input type="text" placeholder="Search..." class="p-2 rounded bg-gray-700 text-white border border-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
            </div>

            <div class="main-content">
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-6 flex-grow">
                    @foreach($DataSource as $data)
                        <a href="" class="card bg-white dark:bg-gray-700 p-6 rounded-lg border border-gray-200 animate-fadeInUp shadow-md hover:shadow-lg">
                            <h2 class="text-2xl font-bold text-gray-900 dark:text-gray-100">{{ $data['client_name'] }}</h2>
                            <div class="mt-4 text-gray-700 dark:text-gray-300">
                                <p><strong>Service Name:</strong> {{ $data['service_name'] }}</p>
                                <p><strong>Service Description:</strong> {{ $data['service_desc'] }}</p>
                                <p><strong>Collection Point:</strong> {{ $data['collection_point'] }}</p>
                                <p><strong>Collection Time:</strong> {{ $data['collection_time'] }}</p>
                                <p><strong>Service Status:</strong> {{ $data['service_status'] }}</p>
                            </div>
                        </a>
                    @endforeach
                </div>
                <div class="spacer"></div>
            </div>
        </div>

        <!-- Modal -->
        <div x-show="showModal" @click.away="showModal = false" class="modal">
            <div class="modal-content">
                <span class="close" @click="showModal = false">&times;</span>
                <h2 class="text-xl font-semibold mb-4">Search <span x-text="entityType"></span></h2>
                <form :action="'/' + entityValue" method="GET">
                    <input type="text" :placeholder="'Enter ' + entityType + '...'" class="w-full p-2 mb-4 border rounded" name="query">
                    <button type="submit" class="w-full p-2 bg-blue-500 text-white rounded">Search</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
