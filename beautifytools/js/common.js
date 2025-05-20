$(document).ready(function (e) {
    $(window).resize(function () {
        if ($(".collapse_btn_nav").is(":hidden")) {
            $("div.header_nav:not(.collapse_btn_nav)").show();
            $(".ham_icon").hide();
            $(".remove_icon").fadeIn(200);
        }
        else {
            $("div.header_nav:not(.collapse_btn_nav)").hide();
            $(".remove_icon").hide();
            $(".ham_icon").fadeIn(200);
        }
    });

    $(".collapse_btn").bind("click", function (e) {
        e.preventDefault();
        if ($("div.header_nav:not(.collapse_btn_nav)").is(":visible")) {
            $("div.header_nav:not(.collapse_btn_nav)").slideUp(200);
            $(".remove_icon").hide();
            $(".ham_icon").fadeIn(200);
        }
        else {
            $("div.header_nav:not(.collapse_btn_nav)").slideDown(200);
            $(".ham_icon").hide();
            $(".remove_icon").fadeIn(200);
        }
    });

    $("a[href='#all_tools']").bind("click", function (e) {
        e.preventDefault();
        ele = $("div.header_nav:not(.collapse_btn_nav)").is(":visible") ? $("#allToolsScrollToMobile") : $("#all_tools");
        $("html, body").animate({
            scrollTop: ele.offset().top
        }, 500);
    });

    $("#copy_data1").on("click", function () {
        var editor = ace.edit("code1");
        editor.getSession().setMode("ace/mode/html");
        // editorAce1.setReadOnly(true);
        editor.setShowPrintMargin(false);
        editor.getSession().setUseWrapMode(true);
        var sel = editor.selection.toJSON(); // save selection
        editor.selectAll();
        editor.focus();
        document.execCommand('copy');
        editor.selection.fromJSON(sel); // restore selection
    });

    $("#copy_data2").on("click", function () {
        var editor = ace.edit("code2");
        editor.getSession().setMode("ace/mode/html");
        // editorAce1.setReadOnly(true);
        editor.setShowPrintMargin(false);
        editor.getSession().setUseWrapMode(true);
        var sel = editor.selection.toJSON(); // save selection
        editor.selectAll();
        editor.focus();
        document.execCommand('copy');
        editor.selection.fromJSON(sel); // restore selection
    });
});