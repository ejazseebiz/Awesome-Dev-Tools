$(document).ready(function(e) {
	$("#clear").click(function(e) {
    	e.preventDefault();
		$("#url").val("").focus();
		$("#url").parents("div.form-group").removeClass("has-error");
    });
	
	var requests = new Array();
	
	$("#check:not(:disabled)").click(function(e) {
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
		
		$(".data_tb,.links_tb").hide();
		$("img[alt='loader']").show();
		$("#check").attr("disabled", "disabled");
		
		for(i = 0; i < requests.length; i++)
		{
			requests[i].abort();
		}
		
		requests = [];
		
		$.ajax({
			type	: "POST",
			url		: "/get-links.php",
			data	: {"url" : encodeURIComponent(url)},
			success : function(data)
			{
				$("img[alt='loader']").hide();
				$("#check").removeAttr("disabled");
				tb_data = "";
				links_tb = "";
				if(data != "")
				{
					data = $.parseJSON(data);
					total_links = data['total_links'];
					available_checks = data['available_checks'];
					tb_data = '<tr><td>' + data.total_links + '</td><td><span class="checked_links">0</span>/' + data.available_checks + '</td><td><span class="good_links text-success">0</span></td><td><span class="broken_links text-danger">0</span></td></tr>';
					i = 1;
					$.each(data['links'], function(key, value)
					{
						value = decodeURIComponent(value);
						links_tb += '<tr><td>' + i + '</td><td><a href="' + value + '" target="_blank" class="links">' + value + '</a></td><td class="text-center status_img">&nbsp;<span class="glyphicon glyphicon-minus" aria-hidden="true"></span>&nbsp;</td></tr>';
						i++;
					});
					$(".data_tb").find("tbody").html(tb_data);
					$(".links_tb").find("tbody").html(links_tb);
					$(".data_tb,.links_tb").show();
					checked = 0;
					good = 0;
					bad = 0;
					$("a.links").each(function(index, element) {
						selector = $(this);
                        url = encodeURIComponent($.trim(selector.attr("href")));
						(function(selector, url){
							selector.parents("tr").find(".status_img").html('<img src="/img/s-loading.gif"/>');
							requests.push($.ajax({
								type	: "POST",
								url		: "/get-status.php",
								data	: {"url" : url},
								success : function(data)
								{
									if(data == 404)
									{
										checked++;
										bad++;
										$(".checked_links").text(checked);
										$(".broken_links").text(bad);
										selector.parents("tr").addClass("danger");
										selector.parents("tr").find(".status_img").html('&nbsp;<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>&nbsp;');
									}else
									{
										checked++;
										good++;
										$(".checked_links").text(checked);
										$(".good_links").text(good);
										selector.parents("tr").addClass("info");
										selector.parents("tr").find(".status_img").html('&nbsp;<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>&nbsp;');
									}
								},
								error 	: function()
								{
									checked++;
									bad++;
									$(".checked_links").text(checked);
									$(".broken_links").text(bad);
									selector.parents("tr").addClass("danger");
								}
							}));
						})(selector, url);
					});
				}else
				{
					tb_data += "<tr><td colspan=\"4\"><span class=\"text-danger\">No data or links found!</span></td></tr>";
					$(".data_tb").find("tbody").html(tb_data);
					$(".data_tb").show();
					$(".links_tb").hide();
				}
			},
			error 	: function()
			{
				$("img[alt='loader']").hide();
				$("#check").removeAttr("disabled");
			}
		});
    });
});