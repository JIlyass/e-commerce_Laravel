<form class="dropdown-item" action="{{route('auth.logout')}}" method="POST">
    @csrf
    @method('delete')
    <input type="submit" value="Sign out">
    </form>