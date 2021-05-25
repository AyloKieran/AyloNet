<x-slot name="scripts">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/5.7.1/tinymce.min.js" integrity="sha512-RnlQJaTEHoOCt5dUTV0Oi0vOBMI9PjCU7m+VHoJ4xmhuUNcwnB5Iox1es+skLril1C3gHTLbeRepHs1RpSCLoQ==" crossorigin="anonymous"></script>
</x-slot>

<script>
    var editor_config = {
        path_absolute: "{{URL::to('/')}}",
        height: 500,
        selector: "textarea",
        plugins: [
            "autolink lists link image charmap preview hr anchor searchreplace", 
            "wordcount visualblocks code fullscreen insertdatetime media table",
            "contextmenu directionality emoticons paste textcolor colorpicker textpattern"],
        toolbar: "undo redo | fontsizeselect bold italic underline superscript subscript code lineheight clearformatting | alignleft aligncenter alignright alignjustify | forecolor backcolor | bulllist unlist | outdent indent | link | preview fullscreen",
        branding: false,
        draggable_modal: true,
        menubar: 'edit view insert table tools',
        menu: {
            edit: {title: 'Edit', items: 'cut copy paste pastetext | selectall searchreplace'},
            insert: {title: 'Insert', items: 'image link | charmap emoticons hr | anchor | insertdatetime'},
        }
    }

    tinymce.init(editor_config);
</script>