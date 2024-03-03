<table class="table-auto w-full">
    <thead class="bg-blue-400">
        <tr>
            <th>Hora Inicio</th>
            <th>Hora Fin</th>
            <th>Lunes</th>
            <th>Martes</th>
            <th>Miércoles</th>
            <th>Jueves</th>
            <th>Viernes</th>
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

                <tr class="hover:bg-blue-200">
                    <td>{{ $row->horaInicio }}</td>
                    <td>{{ $row->horaFin }}</td>

                    @if ($flag)
                        @php
                            $nextCodAsig = $row->codAsig;
                        @endphp
                    @else
                        @if (!empty($nextCodAsig))
                            <td>*{{ $row->codAsig }}</td>
                            @php
                                $nextCodAsig = "";
                            @endphp
                        @else
                            <td>{{ $row->codAsig }}</td>
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
                        <td>*{{ $row->codAsig }}</td>
                        @php
                            $nextCodAsig = "";
                        @endphp
                    @else
                        <td>{{ $row->codAsig }}</td>
                    @endif
                @endif
            @endif
        @endforeach
    </tbody>
</table>
