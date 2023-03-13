@props([
    'title' => ''
])

<div class="modal-dialog position-static d-block" role="document">
    <div class="modal-content rounded-4 shadow">
        <div class="modal-header p-5 pb-4 border-bottom-0">
            {{$title}}
        </div>

        <div class="modal-body p-5 pt-0">
            {{$slot}}
        </div>
    </div>
</div>
