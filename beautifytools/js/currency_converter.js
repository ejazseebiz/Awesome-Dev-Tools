$(document).ready(function(e) {
	$("#clear").click(function(e) {
    	e.preventDefault();
		$("#from,#to").val("USD");
		$("#amount").val("");
		$("#amount").parents("div.form-group").removeClass("has-error");
    });
	
	if($("#from").attr("data_code") != "")
	{
		$("#from").val($("#from").attr("data_code"));
	}
	
	$("#convert").click(function(e) {
    	e.preventDefault();
		from = $.trim($("#from").val());
		to = $.trim($("#to").val());
		amount = $.trim($("#amount").val());
		if(!$.isNumeric(amount))
		{
			$("#amount").focus().parents("div.form-group").addClass("has-error");
			return false;
		}else
		{
			$("#amount").parents("div.form-group").removeClass("has-error");
			$("img[alt='loader']").show();
			$.getJSON("http://www.geoplugin.net/currency_converter.gp?jsoncallback=?",{
				from: from,
				to: to,
				amount: amount
			}, function(out) {
				$("img[alt='loader']").hide();
				$("div.out_div").show();
				from_c = out.from.amount;
				to_c = out.to.amount;
				from_c_code = out.from.code;
				to_c_code = out.to.code;
				from_con_c = "1.00";
				currency1 = from_c.replace(/[^0-9.]/g,'');
				currency2 = to_c.replace(/[^0-9.]/g,'');
				to_con_c = (currency2/currency1);
				to_con_c = Number(to_con_c).toFixed(3);
				from_con_c_code = out.from.code;
				to_con_c_code = out.to.code;
				$("span.from_c").text(from_c);
				$("span.to_c").text(to_c);
				$("span.from_c_code").text(from_c_code);
				$("span.to_c_code").text(to_c_code);
				$("span.from_con_c").text(from_con_c);
				$("span.to_con_c").text(to_con_c);
				$("span.from_con_c_code").text(from_con_c_code);
				$("span.to_con_c_code").text(to_con_c_code);
			});
		}
    });
});