@php
    use App\Models\JobBoard\Portfolio\Experience;use App\Models\JobBoard\Portfolio\Portfolio as Model;use App\Models\JobBoard\Portfolio\Project;use App\Models\User;

    /** @var Model $model */
@endphp

@props([
    'model' => null
])

<x-jobboard::layout.app>
    <main class="px-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="card mt-3 text-dark">
                        <x-jobboard::components.form-add-avatar
                            :image="$model->getAttribute(Model::FIELD_AVATAR_URL)"
                            :route="route('user.portfolio.update.avatar')"
                        />
                        <h3 class="card-title text-dark">{{$model->getAttribute(Model::$REL_USER)->getAttribute(User::FIELD_NAME)}}</h3>
                        <p>Location: City / Country</p>
                        <p>Email: <a href="#">email@example.com</a></p>
                        <p>Phone: 000 000 000</p>
                        <p>Website: <a href="#">examplesite.com</a></p>
                        <p>Github: <a href="https://github.com">Github</a></p>
                        <p>LinkedIn: <a href="https://linkedin.com">LinkedIn</a></p>
                    </div>
                    <div class="card mt-3 text-dark">
                        <h3 class="card-title">About:</h3>
                        <div class="card-text">
                            <form method="POST" action="{{route('user.portfolio.update.about')}}">
                                @csrf
                                <x-jobboard::components.text-editor
                                    :text="$model->getAttribute(Model::FIELD_ABOUT)"
                                    :name="'about'"
                                    :maxlength="1000"
                                />
                                <button type="submit" class="w-100 mb-2 btn btn-lg rounded-3 btn-outline-dark">Save</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 gap-3">
                    <div class="card mt-3 text-dark">
                        <h3 class="card-title">Work Experience:</h3>
                        <div class="card-text">
                            @foreach($model->getAttribute(Model::$REL_EXPERIENCES) as $experience)
                                <h5>
                                    from {{$experience->getAttribute(Experience::FIELD_START_DATE)}}
                                    to {{$experience->getAttribute(Experience::FIELD_END_DATE)}}
                                </h5>
                                <p>{{$experience->getAttribute(Experience::FIELD_COMPANY)}}</p>
                                <p>{{$experience->getAttribute(Experience::FIELD_DESCRIPTION)}}</p>
                                <br>
                            @endforeach
                        </div>
                        <div class="card-footer">
                            <div class="d-flex justify-content-between align-items-center">
                                <button class="w-100 mb-2 btn btn-lg rounded-3 btn-outline-dark"
                                        data-bs-toggle="modal"
                                        data-bs-target="#add-project-form"
                                        type="button">
                                    Add New
                                </button>
                                <div class="modal fade" id="add-project-form" tabindex="-1"
                                     aria-labelledby="add-project-form"
                                     aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="add-project-form-title">Add Experience</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <x-jobboard::components.form-add-experience/>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                    Close
                                                </button>
                                                <button type="button" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Modal -->

                        </div>
                    </div>
                    <div class="card mt-3 text-dark">
                        <div class="card-body">
                            <h3 class="card-title">Finished Projects:</h3>
                            <div id="finishedProjectsCaptions" class="carousel slide">
                                <div class="carousel-inner">
                                    @foreach($model->getAttribute(Model::$REL_PROJECTS) as $project)
                                        @php
                                            $active = '';
                                            if($project === $model->getAttribute(Model::$REL_PROJECTS)->first()) {
                                                $active = 'active';
                                            }
                                        @endphp
                                        <div class="carousel-item {{$active}}">
                                            <img
                                                src="{{$project->getAttribute(Project::FIELD_IMAGE_URL)}}"
                                                class="d-block w-100" alt="...">
                                            <div class="card-text text-dark my-2">
                                                <h5>{{$project->getAttribute(Project::FIELD_TITLE)}}</h5>
                                                <p>{{$project->getAttribute(Project::FIELD_DESCRIPTION)}}</p>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <button class="carousel-control-prev" type="button"
                                        data-bs-target="#finishedProjectsCaptions"
                                        data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button"
                                        data-bs-target="#finishedProjectsCaptions"
                                        data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="d-flex justify-content-between align-items-center">
                                <button class="w-100 mb-2 btn btn-lg rounded-3 btn-outline-dark"
                                        data-bs-toggle="modal"
                                        data-bs-target="#add-experience-form"
                                        type="button">
                                    Add New
                                </button>
                                <div class="modal fade" id="add-experience-form" tabindex="-1"
                                     aria-labelledby="exampleModalLabel"
                                     aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="add-experience-form-title">Add Experience</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <x-jobboard::components.form-add-project/>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                    Close
                                                </button>
                                                <button type="button" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Modal -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-jobboard::layout.app>
