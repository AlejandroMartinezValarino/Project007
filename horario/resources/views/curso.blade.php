@extends('template')

@section('title', 'Curso')
@section('content')
    <x-wrapper>
        <x-slot name="title">Curso</x-slot>
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