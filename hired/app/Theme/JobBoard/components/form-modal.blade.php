@props([
    'title' => ''
])

<div class="modal-dialog position-static d-block" role="document">
    <div class="modal-content rounded-4 shadow">
        <div class="modal-header p-5 pb-4 border-bottom-0">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            {{$title}}
        </div>

        <div class="modal-body p-5 pt-0">
            {{$slot}}
        </div>
    </div>
</div>
