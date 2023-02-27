@props([
    'route' => '#',
    'image' => ''
])

{{--<div class="avatar-container">--}}
{{--    <img class="avatar-image rounded mx-auto d-block my-2"--}}
{{--         src="{{$image}}"--}}
{{--         width="150" height="150">--}}
{{--    <div class="middle">--}}
{{--        <form method="POST" action="{{$route}}"--}}
{{--              enctype="multipart/form-data">--}}
{{--            @csrf--}}
{{--            <x-jobboard::components.file-input :name="'avatar'"/>--}}
{{--            <button type="submit" class="btn btn-dark">Update Avatar</button>--}}
{{--        </form>--}}
{{--    </div>--}}
{{--</div>--}}

<form id="file-upload-form"
      class="uploader"
      method="POST"
      action="{{$route}}"
      enctype="multipart/form-data">
    @csrf
    <div class="avatar-container">
        <input id="file-upload" type="file" name="fileUpload" accept="image/*" hidden="hidden" style="display: none;"/>
{{--        <input type="file" id="selectedFile" style="display: none;"/>--}}
{{--        <input type="button" value="Browse..." onclick="document.getElementById('selectedFile').click();"/>--}}
        <label for="file-upload" id="file-drag">
            <img id="file-image"
                src="{{$image}}"
                alt="Preview"
                class="hidden avatar-image rounded mx-auto d-block my-2"
                width="150"
                height="150">

            <div class="middle">
                <div id="start">
                    <div id="notimage" class="hidden"></div>
                    <span id="file-upload-btn" class="btn btn-outline-dark">Select a file</span>
                </div>
                <div id="response" class="hidden">
                    <div id="messages"></div>
{{--                <progress class="progress" id="file-progress" value="0">--}}
{{--                    <span>0</span>%--}}
{{--                </progress>--}}
                </div>
            </div>
        </label>
        <button type="submit" class="middle btn btn-dark">Update</button>
    </div>
</form>
<style>
    .middle {
        transition: .5s ease;
        opacity: 0;
        position: absolute;
        top: 20%;
        left: 50%;
        transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        text-align: center;
    }

    .avatar-container:hover .avatar-image {
        opacity: 0.3;
    }

    .avatar-container:hover .middle {
        opacity: 1;
    }
</style>
<script>
    // File Upload
    //
    function ekUpload() {
        function Init() {

            console.log("Upload Initialised");

            var fileSelect = document.getElementById('file-upload'),
                fileDrag = document.getElementById('file-drag'),
                submitButton = document.getElementById('submit-button');

            fileSelect.addEventListener('change', fileSelectHandler, false);

            // Is XHR2 available?
            var xhr = new XMLHttpRequest();
            if (xhr.upload) {
                // File Drop
                fileDrag.addEventListener('dragover', fileDragHover, false);
                fileDrag.addEventListener('dragleave', fileDragHover, false);
                fileDrag.addEventListener('drop', fileSelectHandler, false);
            }
        }

        function fileDragHover(e) {
            var fileDrag = document.getElementById('file-drag');

            e.stopPropagation();
            e.preventDefault();

            fileDrag.className = (e.type === 'dragover' ? 'hover' : 'modal-body file-upload');
        }

        function fileSelectHandler(e) {
            // Fetch FileList object
            var files = e.target.files || e.dataTransfer.files;

            // Cancel event and hover styling
            fileDragHover(e);

            // Process all File objects
            for (var i = 0, f; f = files[i]; i++) {
                parseFile(f);
                uploadFile(f);
            }
        }

        // Output
        function output(msg) {
            // Response
            var m = document.getElementById('messages');
            m.innerHTML = msg;
        }

        function parseFile(file) {

            console.log(file.name);
            output(
                '<strong>' + encodeURI(file.name) + '</strong>'
            );

            // var fileType = file.type;
            // console.log(fileType);
            var imageName = file.name;

            var isGood = (/\.(?=gif|jpg|png|jpeg)/gi).test(imageName);
            if (isGood) {
                document.getElementById('start').classList.add("hidden");
                document.getElementById('response').classList.remove("hidden");
                document.getElementById('notimage').classList.add("hidden");
                // Thumbnail Preview
                document.getElementById('file-image').classList.remove("hidden");
                document.getElementById('file-image').src = URL.createObjectURL(file);
            } else {
                document.getElementById('file-image').classList.add("hidden");
                document.getElementById('notimage').classList.remove("hidden");
                document.getElementById('start').classList.remove("hidden");
                document.getElementById('response').classList.add("hidden");
                document.getElementById("file-upload-form").reset();
            }
        }

        function setProgressMaxValue(e) {
            var pBar = document.getElementById('file-progress');

            if (e.lengthComputable) {
                pBar.max = e.total;
            }
        }

        function updateFileProgress(e) {
            var pBar = document.getElementById('file-progress');

            if (e.lengthComputable) {
                pBar.value = e.loaded;
            }
        }

        function uploadFile(file) {

            var xhr = new XMLHttpRequest(),
                fileInput = document.getElementById('class-roster-file'),
                pBar = document.getElementById('file-progress'),
                fileSizeLimit = 1024; // In MB
            if (xhr.upload) {
                // Check if file is less than x MB
                if (file.size <= fileSizeLimit * 1024 * 1024) {
                    // Progress bar
                    pBar.style.display = 'inline';
                    xhr.upload.addEventListener('loadstart', setProgressMaxValue, false);
                    xhr.upload.addEventListener('progress', updateFileProgress, false);

                    // File received / failed
                    xhr.onreadystatechange = function (e) {
                        if (xhr.readyState == 4) {
                            // Everything is good!

                            // progress.className = (xhr.status == 200 ? "success" : "failure");
                            // document.location.reload(true);
                        }
                    };

                    // Start upload
                    xhr.open('POST', document.getElementById('file-upload-form').action, true);
                    xhr.setRequestHeader('X-File-Name', file.name);
                    xhr.setRequestHeader('X-File-Size', file.size);
                    xhr.setRequestHeader('Content-Type', 'multipart/form-data');
                    xhr.send(file);
                } else {
                    output('Please upload a smaller file (< ' + fileSizeLimit + ' MB).');
                }
            }
        }

        // Check for the various File API support.
        if (window.File && window.FileList && window.FileReader) {
            Init();
        } else {
            document.getElementById('file-drag').style.display = 'none';
        }
    }

    ekUpload();
</script>
