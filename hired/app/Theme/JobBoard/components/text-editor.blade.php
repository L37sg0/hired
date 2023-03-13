@props([
    'name' => '',
    'label' => '',
    'text' => '',
    'maxlength' => 50
])
<div >
    <label for="{{$name}}">{{$label}}</label>
    <textarea id="{{$name}}" name="{{$name}}" maxlength="{{$maxlength}}">
        {{$text}}
    </textarea>
</div>
<script src="{{asset('js/ckeditor.js')}}"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#{{$name}}'), {
            toolbar: ['heading', '|', 'bold', 'italic', 'link']
        })
        .then(editor => {
            window.editor = editor;
        })
        .catch(err => {
            console.error(err.stack);
        });
</script>
