<table class="table-auto w-full text-center">
    <thead class="bg-blue-400">
        <tr>
            @foreach ($headers as $header)
                <th class="border border-black text-blue-800">{{ $header }}</th>
            @endforeach
        </tr>
    </thead>
    <tbody>
        @foreach ($rows as $row)
            <tr class="hover:bg-blue-200 border border-black bg-blue-100">
                @foreach ($row as $cell)
                    <td class="hover:bg-blue-200 border border-black">{{ $cell }}</td>
                @endforeach
            </tr>
        @endforeach
    </tbody>
</table>