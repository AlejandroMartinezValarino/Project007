@extends('template')

@section('title', 'Tramo Horario')

@php
    $dias = ['LUNES' => 'LUNES',
     'MARTES' => 'MARTES',
     'MIERCOLES' => 'MIERCOLES',
     'JUEVES'=>'JUEVES',
     'VIERNES'=>'VIERNES'];
    $diaSeleccionado='';
@endphp

@section('content')
    <x-wrapper>
            <x-slot name="title">Tramo Horario</x-slot>
            <div id="insertForm">
            <form action="{{ route('tramo') }}" method="POST">
                @csrf
                <div>
                    <x-label>Código Tramo</x-label>
                    <x-input type="text" name="codTramo" maxlength="3"/>
                </div>
                <div class="mt-4">
                    <x-label>Hora inicio</x-label>
                    <x-input type="time" name="horaInicio"/>
                </div>
                <div class="mt-4">
                    <x-label>Hora fin</x-label>
                    <x-input type="time" name="horaFin"/>
                </div>
                <div class="mt-4">
                    <x-label>Día</x-label>
                    <x-select name="dia" id="dia" 
                              :options="$dias" :selected="$diaSeleccionado" />
                </div>
                <x-button>
                    Enviar
                </x-button>
                <x-link href="./menu">Menú</x-link>
            </form>
            </div>
            <button class="mt-2 mb-2 px-4 py-2 bg-blue-800 rounded text-xs text-white uppercase hover:bg-blue-700" id="toggleButton">Alternar vista</button>
            
            @if (session('success'))
                <x-alert-info title="Inserción">
                    {{ session('success') }}
                </x-alert-info>
            @endif

            @if ($errors->any())
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>
                            <x-alert-danger title="Danger">
                                {{ $error }}
                            </x-alert-danger>
                        </li>
                    @endforeach
                </ul>
            @endif
            
            <div id="selectView" style="display: none;">
                <x-table-generic :headers="$headers" :rows="$rows" />
            </div>
    </x-wrapper>
@endsection
