<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('CDR Detail') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6">
                <h3 class="text-2xl">{{ $cdr->CalledNumber }}</h3>
                <p><strong>Calling Number:</strong> {{ $cdr->callingnumber }}</p>
                <!-- Add more details as needed -->
            </div>
        </div>
    </div>
</x-app-layout>
