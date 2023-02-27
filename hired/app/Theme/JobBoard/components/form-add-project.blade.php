@props([
    'route' => '#'
])

<form method="POST"
      action="{{$route}}"
      enctype="multipart/form-data"
>
    @csrf
    <x-jobboard::components.file-input
        :label="'Project Image'"
        :name="'project-image'"
    />
    <x-jobboard::components.text-input
        :label="'Project Title'"
        :name="'project-title'"
    />
    <x-jobboard::components.text-editor
        :name="'project-description'"
        :label="'Project Description'"
        :maxlength="100"
    />
</form>
