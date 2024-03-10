@extends('template')
@php
    $tipos = ['CFGS' => 'CFGS', 'CFGM' => 'CFGM'];
    $opcionSeleccionada='';
@endphp

@section('title', 'Oferta Educativa')
@section('content')
    <x-wrapper>
        <x-slot name="title">Oferta Educativa</x-slot>
        <div id="insertForm">
        <form action="{{ route('oferta') }}" method="POST">
        @csrf
            <div>
                <x-label>Código Oferta</x-label>
                <x-input type="text" name="codOe" maxlength="6"/>
            </div>
            <div class="mt-4">
                <x-label>Nombre</x-label>
                <x-input type="text" name="nombre"/>
            </div>
            <div class="mt-4">
                <x-label>Año de inicio</x-label>
                <x-input type="date" name="inicio"/>
            </div>
            <div class="mt-4">
                <x-label>Descripcion</x-label>
                <x-input type="text" name="descripcion"/>
            </div>
            <div class="mt-4">
                <x-label for="tipo">Tipo</x-label>
                <x-select name="tipo" id="tipo" 
                :options="$tipos" :selected="$opcionSeleccionada" />
            </div>
            <x-button>
                Insertar
            </x-button>
            
        <x-menu-link href="./menu">Menú</x-menu-link>
        </form>
        </div>
        <button class="mt-2 mb-2 px-4 py-2 bg-blue-800 rounded text-xs text-white uppercase hover:bg-blue-700" id="toggleButton">Mostrar Tabla</button>
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
                    </x-alert-danger></li>
            @endforeach
        </ul>
        @endif
        <div id="selectView" style="display: none;">
            <x-table-generic :headers="$headers" :rows="$rows" />
        </div>
    </x-wrapper>
@endsection