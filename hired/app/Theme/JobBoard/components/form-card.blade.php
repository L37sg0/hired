@props([
    'title' => ''
])

<div class="card">
    <div class="card-body text-dark">
        <h3 class="card-title">{{$title}}</h3>
        {{$slot}}
    </div>
</div>
