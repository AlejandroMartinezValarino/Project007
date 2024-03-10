@extends('template')

@section('title','Menu')
@section('content')
<script src="https://kit.fontawesome.com/d0bc4cd1c3.js" crossorigin="anonymous"></script>
  <x-wrapper>
  <x-logout/>
  <x-slot name="title">GESTOR DE HORARIO</x-slot>
    <x-grid>
      <x-link href="./oferta">Oferta<br><i class="fa-solid fa-certificate fa-5x my-7"></i></x-link>
      <x-link href="./curso">Curso<br><i class="fa-solid fa-user-graduate fa-5x my-7"></i></x-link>
      <x-link href="./profesor">Profesor<br><i class="fa-solid fa-user fa-5x my-7"></i></x-link>
      <x-link href="./tramo">Tramo Horario<br><i class="fa-solid fa-clock fa-5x my-7"></i></x-link>
      <x-link href="./asignatura">Asignatura<br><i class="fa-solid fa-book fa-5x my-7"></i></x-link>
      <x-link href="./horario">Horario<br><i class="fa-regular fa-calendar-days fa-5x my-7"></i></x-link>
    </x-grid>
  </x-wrapper>
@endsection