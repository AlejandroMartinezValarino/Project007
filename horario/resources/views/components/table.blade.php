<table class="table-auto w-full text-center">
    <thead class="bg-blue-400 text-blue-800">
        <tr>
            <x-th>Hora Inicio</x-th>
            <x-th>Hora Fin</x-th>
            <x-th>Lunes</x-th>
            <x-th>Martes</x-th>
            <x-th>Miércoles</x-th>
            <x-th>Jueves</x-th>
            <x-th>Viernes</x-th>
        </tr>
    </thead>
    <tbody>
        @php
            $ini = "";
            $nextCodAsig = "";
        @endphp

        @foreach ($data as $row)
            @php
                $flag = strpos($row->codAsig, '@') !== false;
            @endphp
            
            @if ($row->horaInicio != $ini)
                @if (!$loop->first)
                    </tr> <!-- Cerrar la fila anterior -->
                @endif

                <tr class="hover:bg-blue-200 bg-blue-100">
                    <x-td>{{ $row->horaInicio }}</x-td>
                    <x-td>{{ $row->horaFin }}</x-td>

                    @if ($flag)
                        @php
                            $nextCodAsig = $row->codAsig;
                        @endphp
                    @else
                        @if (!empty($nextCodAsig))
                            <x-td>*{{ $row->codAsig }}</x-td>
                            @php
                                $nextCodAsig = "";
                            @endphp
                        @else
                            <x-td>{{ $row->codAsig }}</x-td>
                        @endif
                    @endif

                    @php
                        $ini = $row->horaInicio;
                    @endphp
            @else
                @if ($flag)
                    @php
                        $nextCodAsig = $row->codAsig;
                    @endphp
                @else
                    @if (!empty($nextCodAsig))
                        <x-td>*{{ $row->codAsig }}</x-td>
                        @php
                            $nextCodAsig = "";
                        @endphp
                    @else
                        <x-td>{{ $row->codAsig }}</x-td>
                    @endif
                @endif
            @endif
        @endforeach
    </tbody>
</table>
