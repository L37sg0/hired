@php
    use App\Models\Globals;
    use Illuminate\Support\Facades\Auth;
    $auth = Auth::check();
    $menu = Globals::MENU_GUEST;
    if ($auth) {
        $menu = Globals::MENU_AUTH;
    }
@endphp
    <nav class="nav nav-masthead justify-content-center float-md-end py-2">
        @foreach($menu as $item)
            @php
                $active = (request()->url() === route($item['route'])) ? 'active' : '';
            @endphp
            <a class="nav-link fw-bold py-1 px-0 {{$active}}" href="{{route($item['route'])}}">{{$item['label']}}</a>
        @endforeach
        @if($auth)
            <form method="POST" action="{{route('logout')}}">
                @csrf
                <button class="nav-link fw-bold py-1 px-0" type="submit">{{__('Logout')}}</button>
            </form>
        @endif
    </nav>
