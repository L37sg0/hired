@php
    use App\Models\Globals;
    use Illuminate\Support\Facades\Auth;

    $menu = Globals::MENU_GUEST;
    if (Auth::check()) {
        $menu = Globals::MENU_AUTH;
    }
@endphp
{{--<x-jobboard::layout.navigation>--}}
    <nav class="nav nav-masthead justify-content-center float-md-end py-2">
        @foreach($menu as $item)
            <a class="nav-link fw-bold py-1 px-0" href="{{route($item['route'])}}">{{$item['label']}}</a>
        @endforeach
{{--            <a class="nav-link fw-bold py-1 px-0 active" aria-current="page" href="#">Jobs</a>--}}
{{--            <a class="nav-link fw-bold py-1 px-0" href="#">Gigs</a>--}}
{{--            <a class="nav-link fw-bold py-1 px-0" href="#">Profile</a>--}}
{{--            <a class="nav-link fw-bold py-1 px-0" href="#">Logout</a>--}}
    </nav>
{{--</x-jobboard::layout.navigation>--}}
