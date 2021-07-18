jQuery.noConflict()(function ($) { 
	$(document).ready(function () {
		$('tr.header').click(function(){
			//$('tr').css("display", "none");
			//$('tr.header').css("display", "table-row");
			$(this).nextUntil('tr.header').css('display', function(i,v){
			    return this.style.display === 'table-row' ? 'none' : 'table-row';
			});
			$(this).find('button span').text(function(_, value){return value=='−'?'+':'−'});
		});
	});
});