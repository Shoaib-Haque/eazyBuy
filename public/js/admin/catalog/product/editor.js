DecoupledEditor
    .create( document.querySelector( '#editor' ) )
    .then( editor => {
        const toolbarContainer = document.querySelector( '#toolbar-container' );
        toolbarContainer.appendChild( editor.ui.view.toolbar.element );
    } )
    .catch( error => {
        console.error( error );
    } );

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
