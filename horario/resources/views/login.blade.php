@extends('template')

@section('title','Login')
@section('content')
<x-wrapper>
  <x-slot name="title">Inicio de sesión</x-slot>
  <form method="POST" action="{{ route('doLogin') }}">
  @csrf
        <div>
          <x-label>Usuario</x-label>
          <x-input type="text" name="usuario" />
        </div>
        <div class="mt-4">
          <x-label>Contraseña</x-label>
          <x-input type="password" name="password" />
        </div>
        <div class="flex items-center gap-4 justify-end mt-8">
          <x-button>Login</x-button>
        </div>
      </form>
      @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>
                    <x-alert-danger title="Danger">
                        {{ $error }}
                    </x-alert-danger>
                </li>
            @endforeach
        </ul>
      @endif
</x-wrapper>
@endsection