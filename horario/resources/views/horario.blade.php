@extends('template')

@section('title','Login')
@section('content')
<x-wrapperTimeTable>
<x-slot name="title">Horario</x-slot>

    <form method="POST" action="{{ route('showTable') }}">
        @csrf
            <x-label for="codCurso">Código del Curso:</x-label>
            <x-input type="text" id="codCurso" name="codCurso" required/>
            <x-label for="codOe">Código Oferta Educativa:</x-label>
            <x-input type="text" id="codOe" name="codOe" required/>
            <x-link href="./menu">Menú</x-link>
            <x-button>Cambiar Horario</x-button>
    </form>

    @component('components.table', ['data' => $data])
    @endcomponent
</x-wrapperTimeTable>
@endsection
