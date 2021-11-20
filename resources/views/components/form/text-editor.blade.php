@props([
'name' => '',
'label' => $label ?? ucwords(str_replace("_", " ",$name))
])

{{ html()->label($label)
    ->class('form-label fs-6 fw-bolder text-dark')
    ->for($name)
}}
{{ html()->textarea($name)
    ->class('form-control form-control-lg form-control-solid tox-target')
    ->classIf($errors->has($name), 'is-invalid')
    ->attributes($attributes)
    
    ->attributes([
        'id' => 'editor'
    ])
}}
@error($name)
{{ html()->span()->text($message)
        ->class('invalid-feedback font-weight-bold')
        ->attribute('role', 'alert')
    }}
@enderror

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/tinymce@5.10.0/tinymce.min.js" integrity="sha256-GSafsFbcBNGF6dBnveIFrHL/zjqV7TX8AQeQHJRpOe0=" crossorigin="anonymous"></script>
<script>
    function elFinderBrowser(callback, value, meta) {
        tinymce.activeEditor.windowManager.openUrl({
            title: 'File Manager',
            url: "{{ route('elfinder.tinymce5') }}",
            /**
             * On message will be triggered by the child window
             * 
             * @param dialogApi
             * @param details
             * @see https://www.tiny.cloud/docs/ui-components/urldialog/#configurationoptions
             */
            onMessage: function(dialogApi, details) {
                if (details.mceAction === 'fileSelected') {
                    const file = details.data.file;

                    // Make file info
                    const info = file.name;

                    // Provide file and text for the link dialog
                    if (meta.filetype === 'file') {
                        callback(file.url, {
                            text: info,
                            title: info
                        });
                    }

                    // Provide image and alt text for the image dialog
                    if (meta.filetype === 'image') {
                        callback(file.url, {
                            alt: info
                        });
                    }

                    // Provide alternative source and posted for the media dialog
                    if (meta.filetype === 'media') {
                        callback(file.url);
                    }

                    dialogApi.close();
                }
            }
        });
    }
    var options = {
        selector: "#editor",
        plugins: [
            'advlist autolink lists link image charmap print preview anchor',
            'searchreplace visualblocks code fullscreen',
            'insertdatetime media table paste imagetools wordcount'
        ],
        toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
        min_height: 900,
        file_picker_callback: elFinderBrowser

    };

    if (KTApp.isDarkMode()) {
        options["skin"] = "oxide-dark";
        options["content_css"] = "dark";
    }

    tinymce.init(options);

    document.addEventListener('turbo:load', function() {
        tinymce.remove();
        tinymce.init(options);
    });
</script>
@endpush