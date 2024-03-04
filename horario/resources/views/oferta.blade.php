@extends('template')
@php
    $tipos = ['CFGS' => 'CFGS', 'CFGM' => 'CFGM'];
    $opcionSeleccionada='';
@endphp

@section('title', 'Oferta Educativa')
@section('content')
    <x-wrapper>
        <x-slot name="title">Oferta Educativa</x-slot>
        <form action="{{ route('oferta') }}" method="POST">
        @csrf
            <div>
                <x-label>Código Oferta</x-label>
                <x-input type="text" name="codOe"/>
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
                Enviar
            </x-button>
            
        <x-link href="./menu">Menú</x-link>
        </form>
        @if (session('success'))
        <x-alert-info title="Inserción">
            {{ session('success') }}
        </x-alert-info>
        @endif

        @if (session('error'))
            <x-alert-danger title="Danger">
                {{ session('error') }}
            </x-alert-danger>
        @endif

    </x-wrapper>
@endsection