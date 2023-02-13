@aware([
    'heroText' => $heroText ?? false,
    'sloganText' => $sloganText ?? false,
])
<header>
    <div class="mb-auto">
        <x-jobboard::components.application-logo class="w-20 h-20 fill-current text-gray-500"/>
        <x-jobboard::layout.navigation/>
        <x-jobboard::components.form-search/>
    </div>
    @if ($heroText)
    <div class="py-2">
        <h1>{{$heroText}}</h1>
        <p class="lead">{{$sloganText}}</p>
    </div>
    @endif
</header>
