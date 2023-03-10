@php use App\Models\JobBoard\Listing as Model;use App\Models\User; @endphp
@props([
    'model' => null
])

@php
    /** @var Listing $model */
@endphp

<div class="col">
    <div class="card">
        <img alt="image" src="https://www.yola.com/ws/media-library/3a75df090769446bae2d6abd655e1b23/yola-features-cover-1.png">
        <svg class="bd-placeholder-img card-img-top" width="100%" height="225"
             xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail"
             preserveAspectRatio="xMidYMid slice" focusable="false">
            <rect width="100%" height="100%" fill="#55595c"></rect>
            <text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text>
        </svg>
        <div>

            <span class="badge text-bg-primary">Primary</span>
            <span class="badge text-bg-secondary">Secondary</span>
            <span class="badge text-bg-success">Success</span>
            <span class="badge text-bg-danger">Danger</span>
            <span class="badge text-bg-warning">Warning</span>
            <span class="badge text-bg-info">Info</span>
            <span class="badge text-bg-light">Light</span>
            <span class="badge text-bg-dark">Dark</span>
        </div>
        <div class="card-body">
            <h3 class="card-title text-dark">{{$model->getAttribute(Model::FIELD_TITLE)}}</h3>
            <p class="card-text text-dark">{{substr($model->getAttribute(Model::FIELD_CONTENT), 0 , 96) . '...'}}</p>
            <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                    <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                </div>
                <p>Published by <a href="">{{$model->getAttribute(Model::$REL_USER)->getAttribute(User::FIELD_NAME)}}</a></p>
                <h3 class="text-muted">{{$model->getAttribute(Model::FIELD_PRICE_VALUE)}}$</h3>
            </div>
        </div>
    </div>
</div>
