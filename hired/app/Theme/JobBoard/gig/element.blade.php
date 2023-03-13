@php
    use App\Models\JobBoard\Gig\Gig as Model;
    use App\Models\JobBoard\Portfolio\Portfolio;
    use App\Models\JobBoard\Gig\GigPrice;
    use App\Models\JobBoard\Tag;
    use App\Models\User;
    /** @var Model $model */
    /** @var Tag $tag */
    /** @var GigPrice $price */
    $price = $model->getAttribute(Model::$REL_PRICES)->first();
    /** @var Portfolio $portfolio */
    $portfolio = $model->getAttribute(Model::$REL_USER)->getAttribute(User::$REL_PORTFOLIO);

@endphp

@props([
    'model' => null,
    'path'  => ''
])

<div class="col">
    <div class="card">
        <div class="card-body text-dark">
            <h3 class="card-title">{{$model->getAttribute(Model::FIELD_TITLE)}}</h3>
            <div>
                @foreach($model->getAttribute(Model::$REL_TAGS) as $tag)
                    <span class="badge text-bg-dark text-light">{{$tag->getAttribute(Tag::FIELD_SLUG)}}</span>
                @endforeach
            </div>
            <p class="card-text">{{substr($model->getAttribute(Model::FIELD_CONTENT), 0 , 96) . '...'}}</p>
            <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                    <a href="{{route("$path.preview", $model)}}" type="button" class="btn btn-sm btn-outline-secondary">{{__('View')}}</a>
                </div>
                <p>{{__('Published by')}}: <a
                        href="{{route("portfolio.preview", $portfolio)}}">{{$model->getAttribute(Model::$REL_USER)->getAttribute(User::FIELD_NAME)}}</a></p>
                <h3 class="text-muted">{{$price->getAttribute(GigPrice::FIELD_VALUE)}}$</h3>
            </div>
        </div>
    </div>
</div>
