<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                 @if($DataSet->isEmpty())
        <p>No data available.</p>
    @else
        <table>
            <thead>
                <tr>
                    @foreach($DataSet->first()->toArray() as $key => $value)
                        <th>{{ $key }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach($DataSet as $data)
                    <tr>
                        @foreach($data->toArray() as $key => $value)
                            <td>{{ $value }}</td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
            </div>
        </div>
    </div>
</x-app-layout>