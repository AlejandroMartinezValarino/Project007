@extends('template')

@section('title','Login')
@section('content')
<x-wrapperTimeTable>
<x-slot name="title">Horario</x-slot>

    <form method="POST" action="{{ route('showTable') }}">
        @csrf
        <div>
            <x-label for="codCurso">Código del Curso:</x-label>
            <x-input type="text" id="codCurso" name="codCurso" required/>
        </div>
        <div>
            <x-label for="codOe">Código Oferta Educativa:</x-label>
            <x-input type="text" id="codOe" name="codOe" required/>
        </div>
        <div>
            <x-button>Cambiar Horario</x-button>
        </div>
    </form>

    @component('components.table', ['data' => $data])
    @endcomponent
</x-wrapperTimeTable>
@endsection
