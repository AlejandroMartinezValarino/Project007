@extends('template')

@section('title','Login')
@section('content')
<x-wrapper>
  <x-slot name="title">Inicio de sesión</x-slot>
  <form action="">
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
</x-wrapper>
@endsection