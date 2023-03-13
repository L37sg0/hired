@props([
    'model' => null
])

@php
    use App\Models\JobBoard\Listing as Model;use App\Models\JobBoard\Portfolio\Portfolio;use App\Models\JobBoard\Tag;use App\Models\User;
    /** @var Model $model */
    /** @var Portfolio $portfolio */
    $portfolio = $model->getAttribute(Model::$REL_USER)->getAttribute(User::$REL_PORTFOLIO);
@endphp

<x-jobboard::layout.app>
    <main class="px-3">
        <div class="container">
            <div class="row row-cols-12 row-cols-sm-12 row-cols-md-12 g-3">

                @if($imageUrl = $model->getAttribute(Model::FIELD_IMAGE_URL))
                    <!-- Job Image   -->
                    <div class="col-12 col-sm-12">
                        <div class="card">
                            <img alt="job-image"
                                src="{{$imageUrl}}">
                        </div>
                    </div>
                @endif


                <!-- Job / Gig title and description -->
                <div class="col-12 col-sm-8">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title text-dark">{{$model->getAttribute(Model::FIELD_TITLE)}}</h3>
                            <div class="card-text text-dark">
                                {{$model->getAttribute(Model::FIELD_CONTENT)}}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-4">
                    <!-- Job Details -->
                    <div class="card mb-3 text-dark">
                        <div>
                            <h5>Tags:</h5>
                            @foreach($model->getAttribute(Model::$REL_TAGS) as $tag)
                                <span class="badge text-bg-dark">{{$tag->getAttribute(Tag::FIELD_SLUG)}}</span>
                            @endforeach
                        </div>
                        <div>
                            <h5>Payment: {{$model->getAttribute(Model::FIELD_PRICE_VALUE)}} $</h5>
                        </div>
                        <a type="button" class="w-100 mb-2 btn btn-lg rounded-3 btn-dark"
                           href="">Apply Now
                        </a>
                        <a type="button" class="w-100 mb-2 btn btn-lg rounded-3 btn-outline-dark"
                           href="">Add to Favorites
                        </a>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                            </div>
                        </div>
                    </div>

                    <!-- Publisher -->
                    <div class="card mb-3 text-dark">

                        <!-- Publisher Logo / Avatar-->
                        <img alt="publisher-avatar"
                            src="{{$portfolio->getAttribute(Portfolio::FIELD_AVATAR_URL)}}">

                        <!-- Publisher info -->
                        <div class="card-body">
                            <h3 class="card-title">{{$portfolio->getAttribute(Model::$REL_USER)
                            ->getAttribute(User::FIELD_NAME)}}</h3>

                            <ul class="card-text">
                                <li><span>Phone: </span>000 000 000</li>
                                <li><span>Email: </span><a href="#">email@example.com</a></li>

                            </ul>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a type="button" class="btn btn-sm btn-outline-secondary"
                                    href="{{route('portfolio.preview', $portfolio)}}">View Portfolio
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-jobboard::layout.app>
