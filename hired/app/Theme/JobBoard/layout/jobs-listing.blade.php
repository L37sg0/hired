<x-jobboard::layout.app>
<main class="px-3">
    <div class="container">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            @php
                for($i=0; $i<15; $i++) {
            @endphp
                <x-jobboard::job-gig-element/>
            @php
                }
            @endphp
        </div>
    </div>
</main>
</x-jobboard::layout.app>
