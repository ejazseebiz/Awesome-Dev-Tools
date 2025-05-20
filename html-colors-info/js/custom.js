$ = jQuery.noConflict(true);


function picker(col) {

	$('#picker').colpick({
		layout: 'hex',
		color: col,
		colorScheme: 'light',
		onChange: function (hsb, hex, rgb, el, bySetColor) {
			$(el).css('border-color', '#' + hex);
			// Fill the text box just if the color was set using the picker, and not the colpickSetColor function.
			if (!bySetColor) $(el).val(hex);
			$('#colorinfo .btn').prop('disabled', false);
			document.getElementById("errMess").innerHTML = "";
		}, onSubmit: function (hsb, hex, rgb, el) {
			$(el).colpickHide();
		},
	}).keyup(function () {
		$(this).colpickSetColor(this.value);
		document.getElementById("errMess").innerHTML = "";
		var hexcolor = this.value;
		if (hexcolor.match(/^([a-fA-F0-9]{6}|[a-fA-F0-9]{3})$/)) {
			//createCookie("color",hexcolor);
			document.getElementById("errMess").innerHTML = "";
			$('#colorinfo .btn').prop('disabled', false);
			return false;
		}
		else {
			document.getElementById("errMess").innerHTML = "Invalid HEX Color";
			//$("#colorinfo .btn").disabled = true;
			$('#colorinfo .btn').prop('disabled', true);
		}

	})
		.css('border-color', "#" + col);;
}

function rgb2hex(rgb) {
	var hexDigits = ["0", "1", "2", "3", "4", "5", "6", "7", "8", "9", "a", "b", "c", "d", "e", "f"];
	rgb = rgb.match(/^rgb\((\d+),\s*(\d+),\s*(\d+)\)$/);
	function hex(x) {
		return isNaN(x) ? "00" : hexDigits[(x - x % 16) / 16] + hexDigits[x % 16];
	}
	//return "#" + hex(rgb[1]) + hex(rgb[2]) + hex(rgb[3]);
	return hex(rgb[1]) + hex(rgb[2]) + hex(rgb[3]);
}


function pcpicker(a) {
	var pcolor = $(".pcview" + a).css("background-color");
	pcolor = rgb2hex(pcolor);
	$(".pcview" + a + " input").val(pcolor);
	$('.colorbox' + a).colpick({
		colorScheme: 'light',
		layout: 'hex',
		color: pcolor,
		onChange: function (hsb, hex, rgb, el) {
			$(el).css('background-color', '#' + hex);
			$(".pcview" + a).css('background-color', "#" + hex);
			$(".pcview" + a + " input").val(hex);
		}, onSubmit: function (hsb, hex, rgb, el) {
			$(el).colpickHide();
		},
	})
		.css('background-color', '#' + pcolor);
}


function checktitle() {
	if ($('.paltitle').val().length == 0) {
		$('.frmPlt .btn').prop('disabled', true);
	}
	// Attach the event handler for the keyboard keyup
	$('.paltitle').keyup(function () {
		var $th = $(this).val();
		if ($th.match(/^[a-zA-Z0-9_-\s]{3,25}$/)) {
			//if ($th.length > 0) {
			$('.frmPlt .btn').prop('disabled', false);
			return false;
		}
		else {
			$('.frmPlt .btn').prop('disabled', true);
		}
	});
};



function hexToRgbNotUsing(hex) {
	var result = /^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec(hex);
	return result ? {
		r: parseInt(result[1], 16),
		g: parseInt(result[2], 16),
		b: parseInt(result[3], 16)
	} : null;
}
	//alert( hexToRgb("#0033ff").r ); // "51";
