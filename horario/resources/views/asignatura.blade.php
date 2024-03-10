@extends('template')

@section('title', 'Asignatura')
@section('content')
    <x-wrapper>
        <x-slot name="title">Asignatura</x-slot>
        <div id="insertForm">
        <form action="{{ route('asignatura') }}" method="POST">
        @csrf
            <div>
                <x-label>Código Asignatura</x-label>
                <x-input type="text" name="codAsig" maxlength="10"/>
            </div>
            <div class="mt-4">
                <x-label>Nombre</x-label>
                <x-input type="text" name="nombre"/>
            </div>
            <div class="mt-4">
                <x-label>Horas Semanales</x-label>
                <x-input type="number" name="horasSemanales"/>
            </div>
            <div class="mt-4">
                <x-label>Horas Totales</x-label>
                <x-input type="number" name="horasTotales"/>
            </div>
            <x-button>
                Insertar
            </x-button>
            <x-menu-link href="./menu">Menú</x-menu-link>
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
                    </x-alert-danger></li>
            @endforeach
        </ul>
        @endif
        <div id="selectView" style="display: none;">
            <x-table-generic :headers="$headers" :rows="$rows" />
        </div>
    </x-wrapper>
@endsection