"use strict";

// Class definition
var KTFormsTinyMCEHidden = function() {
    // Private functions
    var exampleHidden = function() {
        tinymce.init({
            selector: '#kt_docs_tinymce_hidden',
            menubar: false,
            plugins: [
                'advlist autolink lists link image charmap print preview anchor',
                'searchreplace visualblocks code fullscreen',
                'insertdatetime media table paste imagetools wordcount'
            ],
            toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
                content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
        });
    }

    return {
        // Public Functions
        init: function() {
            exampleHidden();
        }
    };
}();

// On document ready
KTUtil.onDOMContentLoaded(function() {
    KTFormsTinyMCEHidden.init();
});
