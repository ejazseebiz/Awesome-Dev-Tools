$(document).ready(function(e) {
	$("#clear").click(function(e) {
    	e.preventDefault();
		$("#url").val("").focus();
		$("#url").focus().parents("div.form-group").removeClass("has-error");
    });
	
	$("#check").click(function(e) {
    	e.preventDefault();
		
		url = $.trim($("#url").val());
		
		if(url == "")
		{
			$("#url").focus().parents("div.form-group").addClass("has-error");
			return false;
		}else
		{
			$("#url").parents("div.form-group").removeClass("has-error");
		}
		
		$("img[alt='loader']").show();
		
		$.ajax({
			type	: "POST",
			url		: "/keyword-density.php",
			data	: {"url" : url},
			success : function(data)
			{
				$("img[alt='loader']").hide();
				density_tb = "";
				info_tb = "";
				if(data != "file_not_found")
				{
					data = $.parseJSON(data);
					total_words = data[0]['total_words'];
					total_keywords = data[0]['total_keywords'];
					num = 1;
					for(i = (data[0]['popularity'].length - 1); i >= 0; i--)
					{
						density_tb += "<tr><td>" + num + "</td><td>" + data[0]['popularity'][i]['word'] + "</td><td>" + data[0]['popularity'][i]['percent'] + "</td><td>" + data[0]['popularity'][i]['count'] + "</td></tr>";
						num++;
					}
					
					info_tb = "<tr><td>" + url + "</td><td>" + total_words + "</td><td>" + total_keywords + "</td></tr>";
				}else
				{
					density_tb = "<tr><td colspan=\"4\"><span class=\"text-danger\">No data found!</span></td></tr>";
					info_tb = "<tr><td colspan=\"3\"><span class=\"text-danger\">No data found!</span></td></tr>";
				}
				$(".info_tb").find("tbody").html(info_tb);
				$(".info_tb").show();
				$(".density_tb").find("tbody").html(density_tb);
				$(".density_tb").show();
			},
			error 	: function()
			{
				$("img[alt='loader']").hide();
			}
		});
    });
});