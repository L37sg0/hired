@props([
    'heroText' => $heroText ?? false,
    'sloganText' => $sloganText ?? false
])
<x-jobboard::layout.app :heroText="$heroText" :sloganText="$sloganText">
    <main class="px-3">
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                @foreach($collection as $model)
                <x-jobboard::job.element :model="$model"/>
                @endforeach
            </div>
        </div>
    </main>
</x-jobboard::layout.app>
