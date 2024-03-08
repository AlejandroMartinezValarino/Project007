@extends('template')

@section('title', 'Curso')
@section('content')
    <x-wrapper>
        <x-slot name="title">Curso</x-slot>
        <div id="insertForm">
        <form action="{{ route('curso') }}" method="POST">
        @csrf
            <div>
                <x-label>Código Oferta</x-label>
                <x-input type="text" name="codOe" maxlength="3"/>
            </div>
            <div class="mt-4">
                <x-label>Código de Curso</x-label>
                <x-input type="text" name="codCurso" maxlength="2"/>
            </div>
            <div class="mt-4">
                <x-label>Código de Tutor</x-label>
                <x-input type="text" name="codTutor" maxlength="3"/>
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
                    </x-alert-danger></li>
            @endforeach
        </ul>
        @endif
        <div id="selectView" style="display: none;">
            <x-table-generic :headers="$headers" :rows="$rows" />
        </div>
    </x-wrapper>
@endsection