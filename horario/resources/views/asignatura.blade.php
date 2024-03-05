@extends('template')

@section('title', 'Asignatura')
@section('content')
    <x-wrapper>
        <x-slot name="title">Asignatura</x-slot>
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
    </x-wrapper>
@endsection