<header>
    <div class="mb-auto">
        <x-jobboard::application-logo class="w-20 h-20 fill-current text-gray-500"/>
        <x-jobboard::layout.navigation-authenticated/>
        <x-jobboard::form-search/>
    </div>
    <div class="b-example-divider"></div>
    @if ($heroText) {
    <div class="py-2">
        <h1>{{$heroText}}</h1>
        <p class="lead">{{$sloganText}}</p>
    </div>
    }
    @endif
</header>
