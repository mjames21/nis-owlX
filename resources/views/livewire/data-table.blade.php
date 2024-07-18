<div>
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