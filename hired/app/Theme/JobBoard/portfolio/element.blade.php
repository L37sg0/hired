@php
    use App\Models\JobBoard\Portfolio\Portfolio as Model;use App\Models\User;
//    use App\Models\JobBoard\Portfolio\Portfolio;
//    use App\Models\JobBoard\Tag;
//    use App\Models\User;
    /** @var Model $model */
//    /** @var Tag $tag */
//    /** @var Portfolio $portfolio */
//    $portfolio = $model->getAttribute(Model::$REL_USER)->getAttribute(User::$REL_PORTFOLIO);
@endphp

@props([
    'model' => null,
    'path'  => ''
])

<div class="col">
    <div class="card mt-3 text-dark">
        <img class="rounded mx-auto d-block my-2"
             src="{{$model->getAttribute(Model::FIELD_AVATAR_URL)}}"
             width="150" height="150">
        <h3 class="card-title text-dark">{{$model->getAttribute(Model::$REL_USER)->getAttribute(User::FIELD_NAME)}}</h3>
        <p>Location: City / Country</p>
        <p>Email: <a href="#">email@example.com</a></p>
        <p>Phone: 000 000 000</p>
        <p>Website: <a href="#">examplesite.com</a></p>
        <p>Github: <a href="https://github.com">Github</a></p>
        <p>LinkedIn: <a href="https://linkedin.com">LinkedIn</a></p>

        <div class="d-flex justify-content-between align-items-center">
            <div class="btn-group">
                <a href="{{route("$path.preview", $model)}}" type="button"
                   class="btn btn-sm btn-outline-secondary">{{__('View')}}</a>
            </div>
        </div>
    </div>
</div>
