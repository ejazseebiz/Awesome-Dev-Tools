$(document).ready(function(e) {
	$("#getpr").click(function(e) {
    	e.preventDefault();
		
		val = $.trim($("#url").val());
		prselect = $.trim($("#prselect").val());
		order = $.trim($("input[name='order']:checked").val());
		
		if(val == "")
		{
			$("#url").focus().parents("div.form-group").addClass("has-error");
			return false;
		}else
		{
			$("#url").parents("div.form-group").removeClass("has-error");
			$(".l_img").fadeIn(300);
		}
		
		$.ajax({
			type	: "POST",
  			url		: "getbpr.php",
  			data	: {"url" : val, "prselect" : prselect, "order" : order},
  			success : function(data)
			{
				$(".l_img").hide();
				data = $.parseJSON(data);
				tb_data = "";
				count = 0;
				for(i = 0; i < data.length; i++)
				{
					tb_data += "<tr><td>" + data[i].url + "</td><td>" + data[i].pr + "</td></tr>";
					count++;
				}
				if(count == 0)
				{
					tb_data += "<tr><td>No url</td><td>N/A</td></tr>";
				}
				$(".pr_tb").find("tbody").prepend(tb_data);
				$(".pr_tb").fadeIn("500");
			},
			error 	: function()
			{
				$(".l_img").hide();
			}
		});
    });
});