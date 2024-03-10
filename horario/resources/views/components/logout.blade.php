<form method="POST" action="{{ route('logout') }}">
    @csrf
    <x-button><i class="fa-solid fa-power-off fa-2x"></i></x-button>
</form>
