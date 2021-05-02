<!DOCTYPE html>
<html>
<script src="https://cdn.ckeditor.com/ckeditor5/27.1.0/decoupled-document/ckeditor.js"></script>
<style>
.buttons a {
  font-size: 16px;
}
.buttons a:hover {
  cursor:pointer; 
  font-size: 16px;
}
</style>
<script>
  var divs = ["general", "data", "image"];
    var visibleDivId = null;
    function divVisibility(divId) {
      if(visibleDivId === divId) {
        visibleDivId = null;
      } else {
        visibleDivId = divId;
      }
      hideNonVisibleDivs();
    }
    
    function hideNonVisibleDivs() {
      var i, divId, div;
      for(i = 0; i < divs.length; i++) {
        divId = divs[i];
        div = document.getElementById(divId);
        if(visibleDivId === divId) {
          div.style.display = "block";
        } else {
          div.style.display = "none";
        }
      }
    }
</script>
<body>
<div class="main_div">
<div class="buttons">
<a href="#" onclick="divVisibility('general');">General</a> | 
<a href="#" onclick="divVisibility('data');">Data</a> | 
<a href="#" onclick="divVisibility('image');">Image</a> | 
</div>
<div class="inner_div">
<div id="general">
  <table>
      <tr>
          <td>Product Name</td>
            <td><input type="text"><td>
        </tr>
        <tr>
          <td>Description</td>
            <td>
              <div id="toolbar-container">
                  <div id="editor">
            </div>
                </div>
            <td>
        </tr>
    </table>
</div>
<div id="data" style="display: none;">
  <table>
      <tr>
          <td>Product Name</td>
            <td><input type="text"><td>
        </tr>
    </table>
</div>
<div id="image" style="display: none;">Image</div>
</div>
</div>
<script>
    DecoupledEditor
        .create( document.querySelector( '#editor' ) )
        .then( editor => {
            const toolbarContainer = document.querySelector( '#toolbar-container' );

            toolbarContainer.appendChild( editor.ui.view.toolbar.element );
        } )
        .catch( error => {
            console.error( error );
        } );
</script>
</body>
</html>
