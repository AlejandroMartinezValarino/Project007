<form method="POST" action="{{ route('logout') }}">
    @csrf
    <x-button>Cerrar sesión</x-button>
</form>
