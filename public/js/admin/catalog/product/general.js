//ck classic editor
ClassicEditor
    .create( document.querySelector( '#description' ), {
        toolbar: [ 'bold', 'italic', 'bulletedList', 'numberedList', 'undo', 'redo' ]
    } )
    .then( editor => {
        editor.ui.view.editable.element.style.height = '200px';
    } )
    .catch( error => {
        console.log( error );
    } );
  
///ck decouple editor
/*
DecoupledEditor
    .create( document.querySelector( '#editor' ) )
    .then( editor => {
        const toolbarContainer = document.querySelector( '#toolbar-container' );
        toolbarContainer.appendChild( editor.ui.view.toolbar.element );
    } )
    .catch( error => {
        console.error( error );
    } );

///getting and saving data for ck decouple editor
jQuery.noConflict()(function ($) {
    $(document).ready(function() { 
        document.querySelector( '#submitBtn' ).addEventListener( 'click', () => {
            //var node = document.getElementById('editor'),
            //editorData = node.textContent;
            editorData = $("#editor").html();
            document.getElementById( 'des' ).value = editorData;
        });
    });
});  
*/ 