jQuery.noConflict()(function ($) { 
	$(document).ready(function () {
		$('tr.dept').click(function(){
			$(this).nextUntil('tr.dept').closest('tr.cat').css('display', function(i,v){
			    return this.style.display === 'table-row' ? 'none' : 'table-row';
			});
			$(this).nextUntil('tr.dept').closest('tr.sub').css('display', function(i,v){
			    return 'none';
			});
			$(this).find('button span').text(function(_, value){return value=='−'?'+':'−'});
			$(this).nextUntil('tr.dept').closest('tr.cat').find('button span').text(function(_, value){return '+'});
		});

		$('tr.cat').click(function(){
			$(this).nextUntil('tr.cat').closest('tr.sub').css('display', function(i,v){
			    return this.style.display === 'table-row' ? 'none' : 'table-row';
			});
			$(this).find('span').text(function(_, value){return value=='−'?'+':'−'});
		});
	});
});