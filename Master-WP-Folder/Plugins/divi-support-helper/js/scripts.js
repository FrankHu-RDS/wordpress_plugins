(function( $ ) {
	
	$('#dsh-clipboard').click(function(e){
		e.preventDefault();
		var clipboard = '';
		clipboard += $( "#dsh-report h3" ).text() + '\r\n';
		$('.dsh-table tr').each(function(index){
			clipboard += $( this ).find( "strong" ).text() + ' ' + $( this ).find( "span" ).text() + '\r\n';
		});
		copyToClipboard(clipboard);
	});
	
	function copyToClipboard(data){
		var $temp = $("<textarea></textarea>");
		$("body").append($temp);
		$temp.val(data).select();
		document.execCommand("copy");
		$temp.remove();
	}

	$('#dsh-screenshot').click(function(e){
		e.preventDefault();
		var canvasWidth = document.querySelector('#dsh-report').offsetWidth;
		var canvasHeight = document.querySelector('#dsh-report').offsetHeight;
		var clone = document.querySelector('#dsh-report').cloneNode(true);
		clone.style.borderColor = "transparent";
		clone.style.borderRadius = 0;
		clone.style.position = "absolute";
		clone.style.top = 0;
		clone.style.left = 0;
		clone.style.width = canvasWidth+"px";
		clone.style.height = canvasHeight+"px";
		var adminWrap = document.getElementById("wpwrap");
		adminWrap.style.display = "none";
		document.body.appendChild(clone);
		html2canvas(document.body,{width:canvasWidth,height:canvasHeight}).then(canvas => {
				var a = document.createElement('a');
				// toDataURL defaults to png, so we need to request a jpeg, then convert for file download.
				a.href = canvas.toDataURL("image/jpeg").replace("image/jpeg", "image/octet-stream");
				a.download = 'screenshot.jpg';
				a.click();
				document.body.removeChild(clone);
				adminWrap.style.display = null;
		});
	});
	
})( jQuery );