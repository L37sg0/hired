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
{{--        @if($auth)--}}
{{--            @php--}}
{{--                $active = (request()->url() === route('user.portfolio.preview') . "/" . Auth::id()) ? 'active' : '';--}}
{{--            @endphp--}}
{{--            <a href="{{route('user.portfolio.preview') . "/" . Auth::id()}}"--}}
{{--               class="nav-link fw-bold py-1 px-0 {{$active}}">{{__('My Portfolio')}}</a>--}}
{{--        @endif--}}
        @if($auth)
            <form method="POST" action="{{route('logout')}}">
                @csrf
                <a onclick="this.closest('form').submit();return false;"
                   class="nav-link fw-bold py-1 px-3" role="button" type="submit">{{__('Logout')}}</a>
            </form>
        @endif
    </nav>
