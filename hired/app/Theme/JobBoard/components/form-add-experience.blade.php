@props([
    'route' => '#'
])

<form method="POST" action="{{$route}}">
    @csrf
    <x-jobboard::components.date-input
        :label="'From Date'"
        :name="'date-from'"
    />
    <x-jobboard::components.date-input
        :label="'To Date'"
        :name="'date-to'"
    />
    <x-jobboard::components.text-input
        :label="'Company'"
        :name="'company'"
    />
    <x-jobboard::components.text-input
        :label="'Job Title'"
        :name="'job-title'"
    />
    <x-jobboard::components.text-editor
        :name="'job-description'"
        :label="'Job Description'"
        :maxlength="100"
    />
</form>
