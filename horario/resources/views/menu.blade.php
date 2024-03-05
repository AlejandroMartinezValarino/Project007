@extends('template')

@section('title','Menu')
@section('content')
  <x-wrapper>
  <x-slot name="title">Menú</x-slot>
    <x-grid>
      <x-link href="./oferta">Oferta</x-link>
      <x-link href="#">Curso</x-link>
      <x-link href="./profesor">Profesor</x-link>
      <x-link href="#">Tramo Horario</x-link>
      <x-link href="#">Asignatura</x-link>
      <x-link href="./horario">Horario</x-link>
    </x-grid>
    <x-logout/>
  </x-wrapper>
@endsection