@extends('template')

@section('title', 'Profesores')
@section('content')
    <x-wrapper>
        <x-slot name="title">Profesores</x-slot>
        <div id="insertForm">
        <form action="{{ route('profesor') }}" method="POST">
        @csrf
            <div>
                <x-label>Código Profesor</x-label>
                <x-input type="text" name="codProf" maxlength="3"/>
            </div>
            <div class="mt-4">
                <x-label>Nombre</x-label>
                <x-input type="text" name="nombre"/>
            </div>
            <div class="mt-4">
                <x-label>Apellidos</x-label>
                <x-input type="text" name="apellidos"/>
            </div>
            <div class="mt-4">
                <x-label>Fecha de alta</x-label>
                <x-input type="date" name="fechaAlta"/>
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