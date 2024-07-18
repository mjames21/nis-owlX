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

        .sidebar, .right-sidebar {
            background-color: #2d3748;
            color: white;
            overflow-y: auto;
            padding: 1rem;
            box-sizing: border-box;
            display: flex;
            flex-direction: column;
            font-family: Arial, sans-serif;
        }

        .sidebar {
            height: 100%;
            width: 240px;
        }

        .right-sidebar {
            width: 300px;
            background-color: #2d3748;
            color: white;
        }

        .sidebar h2, .right-sidebar h2 {
            font-size: 16px;
            font-weight: normal;
            margin-bottom: 1rem;
            padding-bottom: 0.5rem;
            border-bottom: 1px solid #4a5568;
        }

        .sidebar .entity-list ul, .right-sidebar .entity-list ul {
            list-style-type: none;
            padding: 0;
        }

        .sidebar .entity-list li, .right-sidebar .entity-list li {
            margin-bottom: 0.5rem;
        }

        .sidebar .entity-list a, .right-sidebar .entity-list a {
            display: flex;
            align-items: center;
            padding: 0.5rem;
            border-radius: 4px;
            transition: background-color 0.2s ease;
            color: white;
            text-decoration: none;
        }

        .sidebar .entity-list a:hover, .right-sidebar .entity-list a:hover {
            background-color: #4a5568;
        }

        .sidebar .entity-list svg, .right-sidebar .entity-list svg {
            margin-right: 0.5rem;
        }

        .main-content {
            flex-grow: 1;
            overflow-y: auto;
            padding: 1.5rem;
            background-color: #f7fafc;
            box-sizing: border-box;
            display: flex;
            flex-direction: column;
            height: 100vh;
        }

        .dark .main-content {
            background-color: #1a202c;
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

        #graph {
            width: calc(100% - 300px);
            height: calc(100vh - 50px);
        }

        .link {
            fill: none;
            stroke: #9ecae1;
            stroke-width: 2.5px;
        }

        .node {
            cursor: pointer;
            stroke: #3182bd;
            stroke-width: 2.5px;
        }

        .node text {
            font-size: 12px;
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

        .modal-content .close {
            position: absolute;
            top: 10px;
            right: 10px;
            cursor: pointer;
            color: #000;
        }
    </style>

    <div x-data="{ showModal: false, entityType: '', entityValue: '' }" @load.window="showModal = false">
        <div class="flex h-screen">
            <!-- Sidebar -->
            <div class="sidebar">
                <h2>Entities for Persons of Interest</h2>
                <div class="entity-list">
                    <ul>
                        <li>
                            <a href="#" @click.prevent="showModal = true; entityType = 'Phonenumber'; entityValue = 'search-by-phonenumber'" class="flex items-center space-x-2 p-2 rounded transition duration-200">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 21V19a4 4 0 014-4h10a4 4 0 014 4v2M8 7a4 4 0 110-8 4 4 0 010 8z" />
                                </svg>
                                <span><strong>Phonenumber</strong></span>
                            </a>
                        </li>
                        <li>
                            <a href="#" @click.prevent="showModal = true; entityType = 'Fullname'; entityValue = 'search-by-fullname'" class="flex items-center space-x-2 p-2 rounded transition duration-200">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                                <span><strong>Fullname</strong></span>
                            </a>
                        </li>
                        <li>
                            <a href="#" @click.prevent="showModal = true; entityType = 'NIN'; entityValue = 'search-by-nin'" class="flex items-center space-x-2 p-2 rounded transition duration-200">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 11h14M5 15h14M5 19h14M5 7h14M5 3h14" />
                                </svg>
                                <span><strong>NIN</strong> </span>
                            </a>
                        </li>
                        <li>
                            <a href="#" @click.prevent="showModal = true; entityType = 'Vehicle Number'; entityValue = 'search-by-vehicle-number'" class="flex items-center space-x-2 p-2 rounded transition duration-200">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                <span><strong>Vehicle Number</strong> </span>
                            </a>
                        </li>
                        <li>
                            <a href="#" @click.prevent="showModal = true; entityType = 'Passport Number'; entityValue = 'search-by-passport-number'" class="flex items-center space-x-2 p-2 rounded transition duration-200">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11c.63 0 1.254-.087 1.857-.253M9 12.15a4 4 0 116 0M15 7a4 4 0 10-8 0 4 4 0 008 0zM12 15.7v4.3m-6 0h12" />
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
                    <h1 class="text-2xl font-light text-center mb-4" style="color: #007b3e;">Search Results for Vehicle Number: {{ $vehicle_number }}</h1>
                    <div class="flex">
                        <div id="graph" class="flex-1"></div>
                        <div class="right-sidebar">
                            <h2 class="text-xl font-semibold mb-2" style="color: #1eb53a;">Vehicle Registration Data</h2>
                            @foreach($vehicleRegistration as $vehicle_reg)
                                <div class="border rounded p-2 mb-2">
                                    @foreach($vehicle_reg->toArray() as $key => $value)
                                        @if($key !== 'created_at' && $key !== 'updated_at')
                                            <p class="text-sm"><strong>{{ ucwords(str_replace('_', ' ', $key)) }}:</strong> {{ $value }}</p>
                                        @endif
                                    @endforeach
                                </div>
                            @endforeach
                            <h2 class="text-xl font-semibold mb-2" style="color: #007b3e;">Tollgate Data</h2>
                            @foreach($Tollgate as $record)
                                <div class="border rounded p-2 mb-2">
                                    @foreach($record->toArray() as $key => $value)
                                        @if($key !== 'created_at' && $key !== 'updated_at')
                                            <p class="text-sm"><strong>{{ ucwords(str_replace('_', ' ', $key)) }}:</strong> {{ $value }}</p>
                                        @endif
                                    @endforeach
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div x-show="showModal" @click.away="showModal = false" class="modal">
            <div class="modal-content">
                <span @click="showModal = false" class="close">&times;</span>
                <h2 class="text-xl font-semibold mb-4">Search <span x-text="entityType"></span></h2>
                <form :action="'/' + entityValue" method="GET">
                    <input type="text" :placeholder="'Enter ' + entityType + '...'" class="w-full p-2 mb-4 border rounded" name="query">
                    <button type="submit" class="w-full p-2 bg-blue-500 text-white rounded">Search</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const data = {
                nodes: [
                    { id: '{{ $vehicle_number }}', group: 1 },
                    @foreach($Tollgate as $record)
                        { 
                            id: 'Tollgate: {{ $record->id }}', 
                            group: 2,
                            details: {!! json_encode(array_diff_key($record->toArray(), ['created_at' => '', 'updated_at' => ''])) !!}
                        },
                    @endforeach
                    @foreach($vehicleRegistration as $vehicle_reg)
                        { 
                            id: 'Vehicle Registration: {{ $vehicle_reg->id }}', 
                            group: 3,
                            details: {!! json_encode(array_diff_key($vehicle_reg->toArray(), ['created_at' => '', 'updated_at' => ''])) !!}
                        },
                    @endforeach
                ],
                links: [
                    @foreach($Tollgate as $record)
                        { source: '{{ $vehicle_number }}', target: 'Tollgate: {{ $record->id }}', value: 1 },
                    @endforeach
                    @foreach($vehicleRegistration as $vehicle_reg)
                        { source: '{{ $vehicle_number }}', target: 'Vehicle Registration: {{ $vehicle_reg->id }}', value: 1 },
                    @endforeach
                ]
            };

            const width = document.getElementById('graph').clientWidth;
            const height = document.getElementById('graph').clientHeight;

            const svg = d3.select("#graph")
                .append("svg")
                .attr("width", width)
                .attr("height", height);

            const simulation = d3.forceSimulation(data.nodes)
                .force("link", d3.forceLink(data.links).id(d => d.id).distance(200))
                .force("charge", d3.forceManyBody().strength(-1000))
                .force("center", d3.forceCenter(width / 2, height / 2))
                .force("y", d3.forceY().strength(0.1))
                .force("x", d3.forceX().strength(0.1));

            const link = svg.append("g")
                .attr("class", "links")
                .selectAll("line")
                .data(data.links)
                .enter().append("line")
                .attr("class", "link");

            const node = svg.append("g")
                .attr("class", "nodes")
                .selectAll("g")
                .data(data.nodes)
                .enter().append("g");

            node.append("circle")
                .attr("class", "node")
                .attr("r", 15)
                .call(d3.drag()
                    .on("start", dragstarted)
                    .on("drag", dragged)
                    .on("end", dragended));

            node.append("text")
                .attr("dx", 18)
                .attr("dy", ".35em")
                .text(d => d.id)
                .on("mouseover", function(event, d) {
                    if (d.details) {
                        d3.select(this).append("title").text(JSON.stringify(d.details, null, 2));
                    }
                });

            simulation.on("tick", () => {
                link
                    .attr("x1", d => d.source.x)
                    .attr("y1", d => d.source.y)
                    .attr("x2", d => d.target.x)
                    .attr("y2", d => d.target.y);

                node
                   .attr("transform", d => `translate(${d.x},${d.y})`);
            });

            function dragstarted(event, d) {
                if (!event.active) simulation.alphaTarget(0.3).restart();
                d.fx = d.x;
                d.fy = d.y;
            }

            function dragged(event, d) {
                d.fx = event.x;
                d.fy = event.y;
            }

            function dragended(event, d) {
                if (!event.active) simulation.alphaTarget(0);
                d.fx = null;
                d.fy = null;
            }
        });
    </script>
</x-app-layout>
