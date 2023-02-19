@props([
    'text' => '',
    'name' => '',
    'maxlength' => 50
])
<div >
    <textarea id="editor" name="{{$name}}" maxlength="{{$maxlength}}">
        {{$text}}
    </textarea>
</div>
<script src="{{asset('js/ckeditor.js')}}"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#editor'), {
            toolbar: ['heading', '|', 'bold', 'italic', 'link']
        })
        .then(editor => {
            window.editor = editor;
        })
        .catch(err => {
            console.error(err.stack);
        });
</script>
