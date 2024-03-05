@extends('template')

@section('title', 'Profesores')
@section('content')
    <x-wrapper>
        <x-slot name="title">Profesores</x-slot>
        <form action="{{ route('oferta') }}" method="POST">
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