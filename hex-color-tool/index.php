<?php
$plug_fl =  plugin_dir_url( __FILE__ );
$plug_dr =  plugin_dir_url( __DIR__ );
?>

<link href="<?php echo $plug_fl; ?>css/bootstrap.css" rel="stylesheet" 7>
<link href="<?php echo $plug_fl; ?>css/jquery-ui.css" rel="stylesheet">
<link href="<?php echo $plug_fl; ?>css/font-awesome.css" rel="stylesheet">
<link href='http://fonts.googleapis.com/css?family=Righteous' rel='stylesheet' type='text/css'>
<link href="<?php echo $plug_fl; ?>css/style.css" rel="stylesheet">
<style>
    ins {
        text-decoration: none;
    }

    code {
        white-space: pre-wrap;
        word-break: normal;
    }

    #social_buttons {
        position: fixed;
        z-index: 100;
        bottom: 0;
        right: 0;
        width: 80px;
        background: rgba(255, 255, 255, .65);
        -webkit-box-shadow: 0px 0px 4px 1px rgba(0, 0, 0, 0.45);
        -moz-box-shadow: 0px 0px 4px 1px rgba(0, 0, 0, 0.45);
        box-shadow: 0px 0px 4px 1px rgba(0, 0, 0, 0.45);
        padding: 15px;
    }

    #social_buttons .socialbutton {
        padding: 10px 0;
    }

</style>

<script src="<?php echo $plug_fl; ?>js/jquery.min.js"></script>
<script src="<?php echo $plug_fl; ?>js/jquery.xcolor.min.html"></script>
<link href="<?php echo $plug_fl; ?>css/hexcolortoola87f.css?4" media="screen" rel="stylesheet" type="text/css">
<div class="box">
    <div class="box-content" style="min-height: 300px; z-index:999;">
        <div class="col-md-12">
            <div id="hslpicker" style="margin-left:30px;">
                <div class="frame">
                    <div id='tiles' class='color-tiles'>
                        <div class='foreground tile selected' data-name='foreground' title='Adjust foreground tile'>
                            <div class='foreground-color tile'></div>
                        </div>
                        <div class='background tile' data-name='background' title='Adjust background tile'>
                            <div class='background-color tile'></div>
                        </div>
                        <div class='bgs'>
                            <div class='bg none' title='Transparent' data-color='[360,100,100,0]'></div>
                            <div class='bg light' title='White' data-color='[360,100,100,1]'></div>
                            <div class='bg dark' title='Black' data-color='[0,0,0,1]'></div>
                            <div class='bg random' title='Random' data-color='random'></div>
                        </div>
                        <div class='expose' title='show/hide background tile'></div>
                    </div>
                    <div id='picker' class='sliders'>
                        <div class="slider">
                            <div id='h-slider'>
                                <div class='handle'></div>
                            </div>
                        </div>
                        <input id='hv' class="form-control">
                        <div class="slider">
                            <div id='s-slider'>
                                <div class='handle'></div>
                            </div>
                        </div>
                        <input id='sv' class="form-control">
                        <div class="slider">
                            <div id='l-slider'>
                                <div class='handle'></div>
                            </div>
                        </div>
                        <input id='lv' class="form-control">
                        <div class="slider">
                            <div id='a-slider'>
                                <div class='handle'></div>
                            </div>
                        </div>
                        <input id='av' class="form-control">
                        <div class='color-inputs' style=""> <span class="text-muted">Enter a color:</span>
                            <p class="clearfix" />
                            <input id="hex" spellcheck="false" type="text" class="form-control">
                            <input id="rgba" spellcheck="false" type="text" class="form-control">
                            <input id="hsla" spellcheck="false" type="text" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="input-group">
                <div class="input-group-btn">
                    <button class="btn btn-default transform" value="lighten">Lighten</button>
                    <button class="btn btn-default transform" value="darken">Darken</button>
                    <button id="percent" type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" value="10"><span class="ddtext">10%</span> <span class="caret"></span></button>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#">1%</a></li>
                        <li><a href="#">2%</a></li>
                        <li><a href="#">3%</a></li>
                        <li><a href="#">4%</a></li>
                        <li><a href="#">5%</a></li>
                        <li><a href="#">6%</a></li>
                        <li><a href="#">7%</a></li>
                        <li><a href="#">8%</a></li>
                        <li><a href="#">9%</a></li>
                        <li><a href="#">10%</a></li>
                        <li><a href="#">11%</a></li>
                        <li><a href="#">12%</a></li>
                        <li><a href="#">13%</a></li>
                        <li><a href="#">14%</a></li>
                        <li><a href="#">15%</a></li>
                        <li><a href="#">16%</a></li>
                        <li><a href="#">17%</a></li>
                        <li><a href="#">18%</a></li>
                        <li><a href="#">19%</a></li>
                        <li><a href="#">20%</a></li>
                    </ul>
                </div>
            </div>
            <button style="margin-top:5px;" class="btn btn-default transform" value="tetrad">Complimentary</button>
            <div class="col-xs-12">
                <hr />
            </div>
            <button style="margin-top:5px;" class="btn btn-primary colorsave">Save Color</button>
        </div>
    </div>
</div>
<!-- /box -->
<div class="box">
    <div class="box-content">
        <style>
            .color {
                text-align: center;
                margin-bottom: 2px;
                margin-right: 2px;
                width: 150px;
                float: left;
            }

            .color .swatch {
                float: left;
                height: 70px;
                width: 150px;
            }

            .color .info {
                float: left;
                width: 150px;
                font-size: 0.9em;
                padding: .5em 1em;
                margin-bottom: 0;
                background: #fafafa;
            }

            .color .info .label {
                color: #000000;
                display: block;
            }

            .color .info .label strong {
                display: block;
                float: left;
                padding-right: .75em;
            }

            .color .info .label span {
                float: left;
                padding-right: .25em;
            }

            .color {
                border: 1px solid #fff;
            }

            .color:hover {
                border: 1px solid #ccc;
                transition: all 0.5s ease;
                cursor: pointer;

            }

            .fontlist ul {
                margin: 0;
                padding: 0;
                list-style-type: none;
                list-style-image: none;
            }

            .fontlist li {
                display: block;
                margin-right: 20px;
                float: left;
                width: 300px;
            }

            section {
                -moz-box-shadow: none;
                -webkit-box-shadow: none;
                box-shadow: none
            }

            .css-example {
                min-height: 12em;
                padding: 20px;
                margin: 10px;
            }

        </style>
        <script>
            $(document).ready(function() {
                //	alert($.xcolor.triad(''));
                function LightenDarkenColor(color, percent) {

                    var num = parseInt(color, 16),
                        amt = Math.round(2.55 * percent),
                        R = (num >> 16) + amt,
                        B = (num >> 8 & 0x00FF) + amt,
                        G = (num & 0x0000FF) + amt;

                    return (0x1000000 + (R < 255 ? R < 1 ? 0 : R : 255) * 0x10000 + (B < 255 ? B < 1 ? 0 : B : 255) * 0x100 + (G < 255 ? G < 1 ? 0 : G : 255)).toString(16).slice(1);

                }

                jQuery(function() {

                    var Color,
                        regColorcode,
                        el,
                        newPoint,
                        newPlace,
                        offset,
                        strLength,
                        shade,
                        range,
                        rangeLabel,
                        newColors;


                    // validate hex string on keyup
                    // resource : http://networking.mydesigntool.com/viewtopic.php?tid=415&id=31
                    $("#color").keyup(function() {

                        Color = $("#color").val();
                        regColorcode = /^([0-9a-fA-F]{6})?$/;

                        if (regColorcode.test(Color) == false) {

                            $(".error_message").text("Color code is not yet valid.");

                        } else {

                            $(".error_message").text("Color code is valid!");

                        }

                    }); // end keyup function


                    // Select all range inputs, watch for change
                    $("input[type='range']").change(function() {

                            el = $(this);
                            width = el.width();

                            el
                                .next("output")
                                .text(el.val() + '%');
                        })
                        .trigger('change');



                    // reset form and color swatches
                    $("#reset").click(function() {

                        $("#temp_colors").remove();
                        $("#new_colors").html("");

                    });

                    // prevent the submit button from reloading the page
                    $('#hexColorTool').submit(function() {

                        return false;

                    });


                    $('#color').keydown(function(event) {
                        if (event.keyCode == 13) {

                            $('#submit').trigger('click');
                        }
                    });


                    $("body").on("click", ".swatch", function() {
                        window.location.hash = $(this).attr('data-color');
                        location.reload();

                    });

                    // submit click function
                    $(".transform").click(function() {
                        $('.exampletext').empty();
                        if (!$('#palleteclear').hasClass('active')) {
                            $("#colorexamples").empty();
                        }

                        Color = $("#hex").val().replace('#', ''); // get color input value
                        strLength = Color.length; // get string length
                        shade = $(this).val(); // get lighten/darken input value
                        range = $('#percent').val().replace("%", "");
                        label = "ORIGINAL";
                        inc = "";

                        function hexToRgb(hex) {
                            var result = /^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec(hex);
                            return result ? {
                                r: parseInt(result[1], 16),
                                g: parseInt(result[2], 16),
                                b: parseInt(result[3], 16)
                            } : null;
                        }

                        function RGB2HSV(rgb) {
                            hsv = new Object();
                            max = max3(rgb.r, rgb.g, rgb.b);
                            dif = max - min3(rgb.r, rgb.g, rgb.b);
                            hsv.saturation = (max == 0.0) ? 0 : (100 * dif / max);
                            if (hsv.saturation == 0) hsv.hue = 0;
                            else if (rgb.r == max) hsv.hue = 60.0 * (rgb.g - rgb.b) / dif;
                            else if (rgb.g == max) hsv.hue = 120.0 + 60.0 * (rgb.b - rgb.r) / dif;
                            else if (rgb.b == max) hsv.hue = 240.0 + 60.0 * (rgb.r - rgb.g) / dif;
                            if (hsv.hue < 0.0) hsv.hue += 360.0;
                            hsv.value = Math.round(max * 100 / 255);
                            hsv.hue = Math.round(hsv.hue);
                            hsv.saturation = Math.round(hsv.saturation);
                            return hsv;
                        }

                        // RGB2HSV and HSV2RGB are based on Color Match Remix [http://color.twysted.net/]
                        // which is based on or copied from ColorMatch 5K [http://colormatch.dk/]
                        function HSV2RGB(hsv) {
                            var rgb = new Object();
                            if (hsv.saturation == 0) {
                                rgb.r = rgb.g = rgb.b = Math.round(hsv.value * 2.55);
                            } else {
                                hsv.hue /= 60;
                                hsv.saturation /= 100;
                                hsv.value /= 100;
                                i = Math.floor(hsv.hue);
                                f = hsv.hue - i;
                                p = hsv.value * (1 - hsv.saturation);
                                q = hsv.value * (1 - hsv.saturation * f);
                                t = hsv.value * (1 - hsv.saturation * (1 - f));
                                switch (i) {
                                    case 0:
                                        rgb.r = hsv.value;
                                        rgb.g = t;
                                        rgb.b = p;
                                        break;
                                    case 1:
                                        rgb.r = q;
                                        rgb.g = hsv.value;
                                        rgb.b = p;
                                        break;
                                    case 2:
                                        rgb.r = p;
                                        rgb.g = hsv.value;
                                        rgb.b = t;
                                        break;
                                    case 3:
                                        rgb.r = p;
                                        rgb.g = q;
                                        rgb.b = hsv.value;
                                        break;
                                    case 4:
                                        rgb.r = t;
                                        rgb.g = p;
                                        rgb.b = hsv.value;
                                        break;
                                    default:
                                        rgb.r = hsv.value;
                                        rgb.g = p;
                                        rgb.b = q;
                                }
                                rgb.r = Math.round(rgb.r * 255);
                                rgb.g = Math.round(rgb.g * 255);
                                rgb.b = Math.round(rgb.b * 255);
                            }
                            return rgb;
                        }

                        function min3(a, b, c) {
                            return (a < b) ? ((a < c) ? a : c) : ((b < c) ? b : c);
                        }

                        function max3(a, b, c) {
                            return (a > b) ? ((a > c) ? a : c) : ((b > c) ? b : c);
                        }

                        function componentToHex(c) {
                            var hex = c.toString(16);
                            return hex.length == 1 ? "0" + hex : hex;
                        }

                        function rgbToHex(r, g, b) {
                            return componentToHex(r) + componentToHex(g) + componentToHex(b);
                        }

                        function HueShift(h, s) {
                            h += s;
                            while (h >= 360.0) h -= 360.0;
                            while (h < 0.0) h += 360.0;
                            return h;
                        }


                        if (shade == 'darken') {
                            plusMinus = "-";
                        } else {
                            plusMinus = "";
                        }

                        // create the lighten array
                        if (shade == 'complimentary') {
                            hsv = RGB2HSV(hexToRgb(Color));
                            hsv.hue = HueShift(hsv.hue, 180.0);
                            rgb = HSV2RGB(hsv);
                            hex = rgbToHex(rgb.r, rgb.g, rgb.b);
                            NewColors = [hex];
                        } else if (shade == 'tetrad') {
                            hsv = RGB2HSV(hexToRgb(Color));
                            hsv.hue = HueShift(hsv.hue, 90.0);
                            rgb = HSV2RGB(hsv);
                            hex = rgbToHex(rgb.r, rgb.g, rgb.b);
                            NewColors = [hex];
                            hsv = RGB2HSV(hexToRgb(Color));
                            hsv.hue = HueShift(hsv.hue, 180.0);
                            rgb = HSV2RGB(hsv);
                            hex = rgbToHex(rgb.r, rgb.g, rgb.b);
                            NewColors.push(hex);
                            hsv = RGB2HSV(hexToRgb(Color));
                            hsv.hue = HueShift(hsv.hue, 270.0);
                            rgb = HSV2RGB(hsv);
                            hex = rgbToHex(rgb.r, rgb.g, rgb.b);
                            NewColors.push(hex);
                        } else {
                            NewColors = [
                                LightenDarkenColor(Color, 0),
                                LightenDarkenColor(Color, plusMinus + range * 1),
                                LightenDarkenColor(Color, plusMinus + range * 2),
                                LightenDarkenColor(Color, plusMinus + range * 3),
                                LightenDarkenColor(Color, plusMinus + range * 4),
                                LightenDarkenColor(Color, plusMinus + range * 5),
                                LightenDarkenColor(Color, plusMinus + range * 6),
                                LightenDarkenColor(Color, plusMinus + range * 7),
                                LightenDarkenColor(Color, plusMinus + range * 8),
                                LightenDarkenColor(Color, plusMinus + range * 9)
                            ];
                        }
                        // if hex has 6 characters
                        if ((strLength == 6)) {

                            // for each NewColors
                            $.each(NewColors, function(i, val) {

                                // create a new element
                                var div = document.createElement("div");

                                // if we hit pure white
                                if ((val == '000000') || (val == 'FFFFFF') || (val == 'ffffff')) {

                                    // add HTML, CSS and N/A swatches 
                                    $(div).addClass("clr")
                                        .appendTo("#new_colors");

                                    // otherwise carry on
                                } else {

                                    r = hexToRgb("#" + val).r;
                                    g = hexToRgb("#" + val).g;
                                    b = hexToRgb("#" + val).b;

                                    // add HTML, CSS and normal swatches 
                                    $(div).addClass("color col span_2")
                                        .append("<div class='swatch' data-color='" + val + "' style='background-color: #" + val + ";'></div>")
                                        .append("<div class='info'><span class='label'><strong>HTML:</strong>#" + val.toUpperCase() + "</span><span class='label'><strong>RGB:</strong>" + r + "&nbsp;&nbsp;" + g + "&nbsp;&nbsp;" + b + "</span><span class='label'><strong>" + label + "</strong>" + inc + "</span></div>")
                                        .prependTo("#colorexamples");

                                } // end if pure white or not

                                inc = range * (i + 1) + "%";

                                if (shade == 'darken') {
                                    label = "DARKENED:";
                                } else if (shade == 'tetrad') {
                                    label = "COMPLIMENT";
                                    inc = "";
                                } else {
                                    label = "LIGHTENED:";
                                }


                            }); // end for each NewColors

                            //				var div = document.createElement("div");
                            //				$(div).addClass("row seperator")
                            //					  .appendTo("#new_colors");

                        } // end if hex has 6 characters

                    }); // end submit click function
                    $(".dropdown-menu li a").click(function() {

                        $("#percent .ddtext").text($(this).text());
                        $("#percent").val($(this).text());

                    });

                    $(".colorsave").click(function() {
                        $('.exampletext').empty();
                        var json = [];
                        if (localStorage['saveColors']) {
                            json = JSON.parse(localStorage['saveColors']);
                        }
                        var val = $("#hex").val().replace('#', '');
                        json.push(val);

                        var div = document.createElement("div");
                        $(div).addClass("color col span_2")
                            .append("<div class='swatch' data-color='" + val + "' style='background-color: #" + val + ";'></div>")
                            .append("<div class='info'><span class='label'><strong>HTML:</strong>#" + val.toUpperCase() + "</span></div>")
                            .prependTo("#colorsaves");
                        localStorage['saveColors'] = JSON.stringify(json);
                    });
                    $("#saveReset").click(function() {
                        $("#colorsaves").empty();
                        localStorage.removeItem('saveColors');
                    });
                    $("#workingReset").click(function() {
                        $("#colorexamples").empty();
                    });

                }); // end anonymous function

                if (localStorage['saveColors']) {
                    $("#colorsaves").empty();
                    //		var json = JSON.parse(localStorage['saveColors']);
                    $.each(JSON.parse(localStorage['saveColors']), function(i, val) {
                        var div = document.createElement("div");
                        $(div).addClass("color col span_2")
                            .append("<div class='swatch' data-color='" + val + "' style='background-color: #" + val + ";'></div>")
                            .append("<div class='info'><span class='label'><strong>HTML:</strong>#" + val.toUpperCase() + "</span></div>")
                            .appendTo("#colorsaves");

                    });
                }

            });

        </script>
        <div class="row">
            <div class="col-sm-6" style="border-right: 1px solid #ddd;">
                <div style="border-bottom:1px;"> <span style="float: right;">
                        <button type="button" id="palleteclear" class="btn btn-xs btn-default active" data-toggle="button">Preserve</button>
                        <button class="btn btn-xs btn-default" id="workingReset">Clear</button>
                    </span>
                    <h3>Working Palette</h3>
                </div>
                <div id="colorexamples"> <span class="text-muted exampletext">Click the Darken, Lighten, etc buttons to see more color samples here.</span> </div>
            </div>
            <div class="col-sm-6">
                <div style="border-bottom:1px;">
                    <button class="btn btn-xs btn-default" id="saveReset" style="float: right;">Clear</button>
                    <h3>Saved Palette</h3>
                </div>
                <div id="colorsaves"> <span class="text-muted exampletext">Click Save to keep a list of colors you like and want to work with.</span> </div>
            </div>
        </div>
    </div>
</div>
<!-- /box -->

<script src="<?php echo $plug_fl; ?>js/hslpicker.js" type="text/javascript"></script>
<script stype="text/javascript">
    //alert(window.location.href);
    var url = window.location.href;
    var lastSegment = url.split('/').pop();
    var startcolor;

    if (lastSegment == "") {
        startcolor = '70abcd';
    } else {
        startcolor = lastSegment;
    }

    $(document).ready(function() {
        site = require('site')('blah')
    });

</script>
<script src="<?php echo $plug_fl; ?>js/jquery-ui.min.js"></script>
<script src="<?php echo $plug_fl; ?>js/bootstrap.min.js"></script>
<script src="<?php echo $plug_fl; ?>js/devoops.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        DashboardTabChecker();
    });

</script>
