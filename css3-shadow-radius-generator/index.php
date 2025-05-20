<?php
$plug_fl =  plugin_dir_url( __FILE__ );
$plug_dr =  plugin_dir_url( __DIR__ );
?>

<link rel="stylesheet" href="<?php echo $plug_fl; ?>css/css3.css" />
<!--[if IE]>
<style>
	/*By default unknown elements are display:inline*/
	header, footer, article, section, nav, menu, hgroup {display: block;}
</style>
<script>
	/*This script must run before the elements are created.
	  Each element must specifically be created.*/
	document.createElement("article");
	document.createElement("aside");
	document.createElement("footer");
	document.createElement("header");
	document.createElement("hgroup");
	document.createElement("menu");
	document.createElement("nav");
	document.createElement("section");
</script>
<![endif]-->
<div class="card">
<div class="topStrip">
    <div class="madeBy" style="display:none;">
        <div class="twitterLink">
            <div class="twitterLinksWrpr">
                <div class="twitterLinks">
                    <ul>
                        <li><a href="http://twitter.com/#!/designdazzling" class="peter" target="_blank">Follow DesignDazzling on Twitter</a></li>
                        <li><a href="http://twitter.com/#!/tutorialspalace" class="eric" target="_blank">Follow TutorialsPalace on Twitter</a></li>
                        <li><a href="http://twitter.com/#!/hypesol" class="anthony" target="_blank">Follow Hypesol on Twitter</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="wrppr clearfix">
    <div class="leftSide">
        <div class="defaultPanel"> <a id="openDefault" href="javascript:void(0);" onclick="document.getElementById('defaultPanelContent').style.display='block';this.style.display='none';"><span class="cog"></span><span class="basicsText">edit the basics</span></a>
            <div id="defaultPanelContent">
                <table>
                    <tr>
                        <td>
                            <div class="panelTitle">
                                <p>basics:</p>
                            </div>
                        </td>
                        <td>
                            <div class="largeInputContainer">
                                <input id="bwInput" class="largeInput" maxlength=1 value=2 onFocus="this.select();" onKeyUp="changeInputValue(event,this,0,9);CSS3ME.setBasics();" autocomplete="off" />
                            </div>
                        </td>
                        <td>
                            <div class="colorInputContainer bcInputContainer">
                                <div class="colorInputDiv">
                                    <input id="bcInput" class="colorInput" value="border:" readonly />
                                    <div id="bcInputCP" class="colorPickerBox" onClick="createPicker('borderColor')"> </div>
                                </div>
                                <input id="bcHiddenInput" type="hidden" value="#999999" />
                            </div>
                        </td>
                        <td>
                            <div class="colorInputContainer bgInputContainer">
                                <div class="colorInputDiv">
                                    <input id="bgInput" class="colorInput" value="background:" readonly />
                                    <div id="bgInputCP" class="colorPickerBox" onClick="createPicker('backgroundColor')"> </div>
                                </div>
                                <input id="bgHiddenInput" type="hidden" value="#ffffff" />
                            </div>
                        </td>
                    </tr>
                </table>
                <a class="closeDefault" href="javascript:void(0);" onclick="document.getElementById('defaultPanelContent').style.display='none';document.getElementById('openDefault').style.display='inline-block';" onmouseout="document.getElementById('basicsCodeTT').style.display='none';" onmouseover="document.getElementById('basicsCodeTT').style.display='block';"> </a>
                <div id="basicsCodeTT" class="openMore">
                    <div class="moreTT">
                        <p>Closing this will remove the basics from the generated code</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel one">
            <div class="icon radius"> </div>
            <div class="panelContent">
                <div class="openMore" onMouseOver="this.className='openMore ttOn';" onMouseOut="this.className='openMore';" onClick="this.parentNode.parentNode.className='panel one morePanel';">
                    <span class="openMoreText">+</span>
                    <div class="moreTT">
                        <p>Open this panel to edit specific values for this property</p>
                    </div>
                </div>
                <div class="closeMore" onClick="this.parentNode.parentNode.className='panel one morePanelOff';">
                    <span class="closeMoreText">&ndash;</span>
                </div>
                <table>
                    <tr>
                        <td>
                            <div class="panelTitle">
                                <p>border-radius:</p>
                            </div>
                        </td>
                        <td>
                            <div class="sliderMinus">&#45;</div>
                        </td>
                        <td>
                            <div class="sliderContainer">
                                <div id="brSlider" class="slider">
                                    <div id="brThumb" class="sliderThumb"> </div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="sliderPlus">&#43;</div>
                        </td>
                        <td>
                            <div class="largeInputContainer">
                                <input id="brInput" class="largeInput" onKeyUp="changeInputValue(event,this,0,50);CSS3ME.updateBorderRadius(Math.round(sliderBR.posPercToPx(Number(this.value))));CSS3ME.sliderBR.moveThumb(sliderBR.posPercToPx((this.value*2)+'%'))" maxlength=2 value=0 onFocus="this.select();" autocomplete="off" />
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="moreContent panelContent">
                <table>
                    <tr>
                        <td>
                            <div class="brMoreInputs">
                                <div class="smallInputContainer brTLInputContainer">
                                    <input id="brTLInput" class="smallInput" maxlength=2 value=0 onFocus="this.select();" onKeyUp="changeInputValue(event,this,0,50);CSS3ME.setBorderRadii();" autocomplete="off" />
                                </div>
                                <div class="smallInputContainer brTRInputContainer">
                                    <input id="brTRInput" class="smallInput" maxlength=2 value=0 onFocus="this.select();" onKeyUp="changeInputValue(event,this,0,50);CSS3ME.setBorderRadii();" autocomplete="off" />
                                </div>
                                <div class="smallInputContainer brBRInputContainer">
                                    <input id="brBRInput" class="smallInput" maxlength=2 value=0 onFocus="this.select();" onKeyUp="changeInputValue(event,this,0,50);CSS3ME.setBorderRadii();" autocomplete="off" />
                                </div>
                                <div class="smallInputContainer brBLInputContainer">
                                    <input id="brBLInput" class="smallInput" maxlength=2 value=0 onFocus="this.select();" onKeyUp="changeInputValue(event,this,0,50);CSS3ME.setBorderRadii();" autocomplete="off" />
                                </div>
                                <div class="brBGBox"> </div>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="panel two">
            <div class="icon shadow"> </div>
            <div class="panelContent">
                <div class="openMore" onMouseOver="this.className='openMore ttOn';" onMouseOut="this.className='openMore';" onClick="this.parentNode.parentNode.className='panel two morePanel';">
                    <span class="openMoreText">+</span>
                    <div class="moreTT">
                        <p>Open this panel to edit specific values for this property</p>
                    </div>
                </div>
                <div class="closeMore" onClick="this.parentNode.parentNode.className='panel two morePanelOff';">
                    <span class="closeMoreText">&ndash;</span>
                </div>
                <table>
                    <tr>
                        <td>
                            <div class="panelTitle">
                                <p>box-shadow:</p>
                            </div>
                        </td>
                        <td>
                            <div class="sliderMinus">&#45;</div>
                        </td>
                        <td>
                            <div class="sliderContainer">
                                <div id="bsSlider" class="slider">
                                    <div id="bsThumb" class="sliderThumb"> </div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="sliderPlus">&#43;</div>
                        </td>
                        <td>
                            <div class="largeInputContainer">
                                <input id="bsInput" class="largeInput" onKeyUp="changeInputValue(event,this,0,20);CSS3ME.updateBoxShadow(Math.round(sliderBS.posPercToPx(Number(this.value))));CSS3ME.sliderBS.moveThumb(sliderBS.posPercToPx((this.value*5)+'%'))" maxlength=2 value=0 onFocus="this.select();" autocomplete="off" />
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="moreContent panelContent">
                <table>
                    <tr>
                        <td>
                            <div class="bsMoreInputs">
                                <table>
                                    <tr>
                                        <td><label for="bsHorzInput">horizontal</label>
                                            <span class="smallInputContainer bsHorzInputContainer">
                                                <input id="bsHorzInput" class="smallInput" maxlength=3 value=0 onFocus="this.select();" onKeyUp="changeInputValue(event,this,-99,99);CSS3ME.setBoxShadow();" autocomplete="off" />
                                            </span>
                                        </td>
                                        <td><label for="bsVertInput">vertical</label>
                                            <span class="smallInputContainer bsVertInputContainer">
                                                <input id="bsVertInput" class="smallInput" maxlength=3 value=0 onFocus="this.select();" onKeyUp="changeInputValue(event,this,-99,99);CSS3ME.setBoxShadow();" autocomplete="off" />
                                            </span>
                                        </td>
                                        <td>
                                            <div class="colorInputContainer">
                                                <div class="colorInputDiv">
                                                    <input id="bsColorInput" class="colorInput" value="shadow:" readonly />
                                                    <div id="bsInputCP" class="colorPickerBox" onClick="createPicker('boxShadowColor')"> </div>
                                                </div>
                                                <input id="bsColorHiddenInput" type="hidden" value="#000000" />
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><label for="bsBlurInput">blur</label>
                                            <span class="smallInputContainer bsBlurInputContainer">
                                                <input id="bsBlurInput" class="smallInput" maxlength=2 value=0 onFocus="this.select();" onKeyUp="changeInputValue(event,this,0,99);CSS3ME.setBoxShadow();" autocomplete="off" />
                                            </span>
                                        </td>
                                        <td><label for="bsSpreadInput">spread</label>
                                            <span class="smallInputContainer bsSpreadInputContainer">
                                                <input id="bsSpreadInput" class="smallInput" maxlength=3 value=0 onFocus="this.select();" onKeyUp="changeInputValue(event,this,-99,99);CSS3ME.setBoxShadow();" autocomplete="off" />
                                            </span>
                                        </td>
                                        <td>
                                            <div id="insetShadowBtn" class="insetBtn" onClick="if(this.className=='insetBtn'){this.className='outsetBtn';}else{this.className='insetBtn';}CSS3ME.setBoxShadow();"><span class="insetBtnOff">Inset Shadow?</span><span class="insetBtnOn">Outset Shadow?</span></div>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="panel three">
            <div class="icon gradient"> </div>
            <div class="panelContent">
                <div class="openMore" onMouseOver="this.className='openMore ttOn';" onMouseOut="this.className='openMore';" onClick="this.parentNode.parentNode.className='panel three morePanel';">
                    <span class="openMoreText">+</span>
                    <div class="moreTT">
                        <p>Open this panel to edit specific values for this property</p>
                    </div>
                </div>
                <div class="closeMore" onClick="this.parentNode.parentNode.className='panel three morePanelOff';">
                    <span class="closeMoreText">&ndash;</span>
                </div>
                <table>
                    <tr>
                        <td>
                            <div class="panelTitle">
                                <p>background gradient:</p>
                            </div>
                        </td>
                        <td><span class="gradTextOff">OFF</span><span id="gradientSwitch" class="gradSwitch" onclick="if(this.className!='gradSwitch gradOn'){this.className='gradSwitch gradOn';}else{this.className='gradSwitch';}CSS3ME.updateGradient();"> </span><span class="gradTextOn">ON</span></td>
                        <td>
                            <div class="colorInputContainer bgFromContainer">
                                <div class="colorInputDiv">
                                    <input id="bgFromInput" class="colorInput" value="from:" readonly />
                                    <div id="bgFromInputCP" class="colorPickerBox" onClick="createPicker('backgroundFromColor')"> </div>
                                </div>
                                <input id="bgFromHiddenInput" type="hidden" value="#ffffff" />
                            </div>
                        </td>
                        <td>
                            <div class="gradientArrow"> </div>
                        </td>
                        <td>
                            <div class="colorInputContainer bgToContainer">
                                <div class="colorInputDiv">
                                    <input id="bgToInput" class="colorInput" value="to:" readonly />
                                    <div id="bgToInputCP" class="colorPickerBox" onClick="createPicker('backgroundToColor')"> </div>
                                </div>
                                <input id="bgToHiddenInput" type="hidden" value="#000000" />
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="panelContent moreContent">
                <table>
                    <tr>
                        <td>
                            <div class="radioWrp">
                                <div id="bgT2B" class="radioBtn radioChecked" onClick="CSS3ME.bgRadioChecked(this.id)"> </div>
                                <p onClick="CSS3ME.bgRadioChecked('bgT2B')">top to bottom</p>
                            </div>
                        </td>
                        <td>
                            <div class="radioWrp">
                                <div id="bgL2R" class="radioBtn" onClick="CSS3ME.bgRadioChecked(this.id)"> </div>
                                <p onClick="CSS3ME.bgRadioChecked('bgL2R')">left to right</p>
                            </div>
                        </td>
                        <td>
                            <div class="radioWrp">
                                <div id="bgR2L" class="radioBtn" onClick="CSS3ME.bgRadioChecked(this.id)"> </div>
                                <p onClick="CSS3ME.bgRadioChecked('bgR2L')">right to left</p>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="panel four">
            <div class="icon opacity"> </div>
            <div class="panelContent">
                <table>
                    <tr>
                        <td>
                            <div class="panelTitle">
                                <p>opacity:</p>
                            </div>
                        </td>
                        <td>
                            <div class="sliderMinus">&#45;</div>
                        </td>
                        <td>
                            <div class="sliderContainer">
                                <div id="oSlider" class="slider">
                                    <div id="oThumb" class="sliderThumb"> </div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="sliderPlus">&#43;</div>
                        </td>
                        <td>
                            <div class="largeInputContainer">
                                <input id="oInput" class="largeInput" maxlength=3 value=100 onFocus="this.select();" onKeyUp="changeInputValue(event,this,0,100);CSS3ME.updateOpacity(Math.round(sliderO.posPercToPx(Number(this.value))));CSS3ME.sliderO.moveThumb(sliderO.posPercToPx((this.value)+'%'));" autocomplete="off" />
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div class="rightSide">
        <div class="ribbon"> </div>
        <div id="ieSuppError"> Only one filter will be previewed at a time </div>
        <div class="preview">
            <div id="changeDivBG">Creativesss CSS</div>
            <div id="changedDiv"> </div>
        </div>
        <div class="versionWrpr">
            <div class="versionTip">
                <ul class="versionUL">
                    <li><strong>Version 2.3 update:</strong> - <em>8 Apr 2013</em></li>
                    <li>1. "Responsivized" modal.</li>
                    <li><br /></li>
                    <li><strong>Version 2.2 update:</strong> - <em>3 May 2012</em></li>
                    <li>1. Added cookie for code selection checkboxes.</li>
                    <li><br /></li>
                    <li><strong>Version 2.1 updates:</strong> - <em>2 Mar 2012</em></li>
                    <li>1. Changed most images to CSS3.</li>
                    <li>2. Compressed existing images.</li>
                    <li><br /></li>
                    <li><strong>Version 2.0 updates:</strong> - <em>10 Jan 2012</em></li>
                    <li>1. Added comment removal checkbox.</li>
                    <li>2. Added browser selection checkboxes.</li>
                    <li>3. Added watermark behind preview.</li>
                    <li>4. Changed many images to CSS3.</li>
                    <li>5. Added some HTML5 elements.</li>
                    <li>6. Changed to unobtrusive JavaScript.</li>
                    <li><em>7. Made a mess of things :(</em></li>
                    <li><br /></li>
                    <li><strong>Version 1.2 updates:</strong> - <em>16 May 2011</em></li>
                    <li>1. Changed &ldquo;background&rdquo; to &ldquo;background-image&rdquo; when using linear-gradient.</li>
                    <li>2. Added &ldquo;background-clip&rdquo; when using gradient and border-radius.</li>
                    <li>3. Allow for hex codes to be inserted/edited in the color picker.</li>
                    <li>4. Changed some comments in generated code to reflect correct behavior.</li>
                    <li>5. Created version notes.</li>
                    <li><br />
                        <em>*Minor, internal, and previous changes not listed.</em>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="codeActions">
    <a class="getCode" href="javascript:void(0);" onclick="document.getElementById('mask').style.display='block';CSS3ME.centerModal('code');CSS3ME.updateShowCode();">Get the code!</a>

</div>
<div id="mask" onClick="this.style.display='none';document.getElementById('code').style.display='none';"> </div>
<div id="code">
    <header class="codeHead">
        <h2>Your CSS Generated Code!</h2>
        <div class="closeOverlay" onClick="document.getElementById('mask').style.display='none';document.getElementById('code').style.display='none';">&times;</div>
    </header>
    <section class="codeWrpr">
        <table>
            <tr>
                <td>
                    <input id="oldMSCheck" class="browserCheck" type="checkbox" onChange="CSS3ME.updateShowCode()" /><label class="browserLabel" for="oldMSCheck">Old Microsoft</label>
                </td>
                <td colspan="2">
                    <input id="oldMozCheck" class="browserCheck" type="checkbox" onChange="CSS3ME.updateShowCode()" /><label class="browserLabel" for="oldMozCheck">Old Mozilla</label>
                </td>
                <td>
                    <input id="oldWebkitCheck" class="browserCheck" type="checkbox" onChange="CSS3ME.updateShowCode()" /><label class="browserLabel" for="oldWebkitCheck">Old Webkit</label>
                </td>
                <td>
                    <input id="commentsCheck" class="browserCheck" type="checkbox" onChange="CSS3ME.updateShowCode()" /><label class="browserLabel" for="commentsCheck">/*COMMENTS*/</label>
                </td>
            </tr>
            <tr>
                <td>
                    <input id="msCheck" class="browserCheck" type="checkbox" onChange="CSS3ME.updateShowCode()" /><label class="browserLabel" for="msCheck">Microsoft</label>
                </td>
                <td>
                    <input id="mozCheck" class="browserCheck" type="checkbox" onChange="CSS3ME.updateShowCode()" /><label class="browserLabel" for="mozCheck">Mozilla</label>
                </td>
                <td>
                    <input id="operaCheck" class="browserCheck" type="checkbox" onChange="CSS3ME.updateShowCode()" /><label class="browserLabel" for="operaCheck">Opera</label>
                </td>
                <td>
                    <input id="webkitCheck" class="browserCheck" type="checkbox" onChange="CSS3ME.updateShowCode()" /><label class="browserLabel" for="webkitCheck">Webkit</label>
                </td>
                <td>
                    <input checked id="defaultCheck" class="browserCheck" type="checkbox" onChange="CSS3ME.updateShowCode()" disabled="disabled" /><label class="browserLabel defaultBrowserLabel" for="defaultCheck">Default</label>
                </td>
            </tr>
        </table>
        <textarea id="codeToCopy" onFocus="this.select()" readonly></textarea>
    </section>
    <footer class="codeFoot">
        <form action="https://www.paypal.com/cgi-bin/webscr" id="donateForm" method="post" name="donateForm">
            <input type="hidden" name="cmd" value="_s-xclick">
            <input type="hidden" name="encrypted" value="-----BEGIN PKCS7-----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-----END PKCS7-----">
            <span style="display:none;">
                <input class="donate" name="formSubmit" type="submit" value="Donate">
                <span class="heart" onclick="javascript:document.getElementById('donateForm').submit()"></span>
            </span>
        </form>
    
        
        <div class="selectCode" onClick="document.getElementById('codeToCopy').focus();document.getElementById('codeToCopy').select();">Select Code</div>
    </footer>
</div>
        </div>
<script src="<?php echo $plug_fl; ?>js/slider.js">
</script>
<script src="<?php echo $plug_fl; ?>js/css3.js">
</script>
<script src="<?php echo $plug_fl; ?>js/picker.js">
</script>
<script>
    var cpm = false;
    var currOpenCPMElmId = false;

    function isMouseOut(e, handler) {
        if (e.type !== 'mouseout') {
            return false;
        }
        var reltg = e.relatedTarget ? e.relatedTarget : e.type === 'mouseout' ? e.toElement : e.fromElement;
        while (reltg && reltg !== handler) {
            reltg = reltg.parentNode;
        }
        return (reltg !== handler);
    }
    var listOfColorItemInfo = {
        'borderColor': {
            'elmId': 'bcInputCP',
            'hiddenInputId': 'bcHiddenInput',
            'textInputId': 'bcInput'
        },
        'backgroundColor': {
            'elmId': 'bgInputCP',
            'hiddenInputId': 'bgHiddenInput',
            'textInputId': 'bgInput'
        },
        'boxShadowColor': {
            'elmId': 'bsInputCP',
            'hiddenInputId': 'bsColorHiddenInput',
            'textInputId': 'bsColorInput'
        },
        'backgroundFromColor': {
            'elmId': 'bgFromInputCP',
            'hiddenInputId': 'bgFromHiddenInput',
            'textInputId': 'bgFromInput'
        },
        'backgroundToColor': {
            'elmId': 'bgToInputCP',
            'hiddenInputId': 'bgToHiddenInput',
            'textInputId': 'bgToInput'
        }
    };

    function createPicker(colorItem) {
        var thisElm = false,
            thisItem = listOfColorItemInfo[colorItem],
            currColor = '';
        if (currOpenCPMElmId) {
            if (currOpenCPMElmId !== thisItem.elmId) {
                document.getElementById(currOpenCPMElmId).innerHTML = '';
                cpm.decontructor();
                cpm = null;
                currOpenCPMElmId = false;
            } else {
                return;
            }
        }
        currOpenCPMElmId = thisItem.elmId;
        currColor = document.getElementById(thisItem.hiddenInputId).value;
        document.getElementById(thisItem.elmId).innerHTML = '<div id="colorPickerWrp">\
		<div class="safeArea" onmouseout="if(isMouseOut(event,this)){document.getElementById(\'' + thisItem.elmId + '\').innerHTML=\'\';currOpenCPMElmId=false;}">\
			<div class="colorPicker">\
				<div class="pickerColorWrpr">\
					<div id="pickerColor" class="pickerColor" onmousemove="cpm.changeColor(event,this,-1,-1)" onclick="cpm.setColor(event,this,-1,-1)" onmouseover="cpm.hasColorClicked=false;" onmouseout="cpm.resetColor();">\
						<input type="hidden" id="hiddenColor" value="' + currColor + '" />\
					</div>\
				</div>\
				<div id="pickerHueWrpr" class="pickerHueWrpr">\
					<div id="pickerHue" class="pickerHue">\
						<div id="hueColor" class="hueColor" onclick="cpm.setHue(event,this)"></div>\
						<div id="hueLine" class="hueLine"></div>\
						<input type="hidden" id="hiddenHue" value="0" />\
						<div id="hueArrow" class="hueArrow" onmousedown="cpm.startHueChange(event,this)"></div>\
					</div>\
				</div>\
			</div>\
			<div id="pickerColorTrans" onmouseover="cpm.changeTransparentElms(true)" onmouseout="cpm.changeTransparentElms(false)" onclick="if(!cpm.isTransparent){cpm.toggleTransparent();}">transparent</div>\
			<input id="pickerColorInput" value="' + currColor + '" onfocus="this.select()" onkeyup="cpm.setColorFromInput(event,this)" maxlength=7 />\
		</div>\
	</div>';
        cpm = new ColorPickerModal({
            'inputElmId': thisItem.hiddenInputId,
            'coloredElmId': thisItem.textInputId,
            'startColor': currColor
        });
    }

    function initPage() {
        document.getElementById('bwInput').value = 2;
        document.getElementById('bcHiddenInput').value = "#999999";
        document.getElementById('bgHiddenInput').value = "#ffffff";
        document.getElementById('brInput').value = 0;
        document.getElementById('brTLInput').value = 0;
        document.getElementById('brTRInput').value = 0;
        document.getElementById('brBRInput').value = 0;
        document.getElementById('brBLInput').value = 0;
        document.getElementById('bsInput').value = 0;
        document.getElementById('bsHorzInput').value = 0;
        document.getElementById('bsVertInput').value = 0;
        document.getElementById('bsColorHiddenInput').value = "#000000";
        document.getElementById('bsBlurInput').value = 0;
        document.getElementById('bsSpreadInput').value = 0;
        document.getElementById('oInput').value = 100;
        document.getElementById('bgFromHiddenInput').value = "#ffffff";
        document.getElementById('bgToHiddenInput').value = "#000000";
    }
    initPage();

    function changeInputValue(e, elmToChange, minNum, maxNum) {
        var currNumber = Number(elmToChange.value);
        if (e.keyCode === 38) {
            elmToChange.value = Math.min(currNumber + 1, maxNum);
        } else if (e.keyCode === 40) {
            elmToChange.value = Math.max(currNumber - 1, minNum);
        } else if (e.keyCode === 33) {
            elmToChange.value = Math.min(currNumber + 10, maxNum);
        } else if (e.keyCode === 34) {
            elmToChange.value = Math.max(currNumber - 10, minNum);
        }
    }

    function tweetIt() {
        var newStatus = "Check out this CSS3 Generator http://creativesss.com/css3generator #CSS3Generator";
        window.open('http://twitter.com/home?status=' + escape(newStatus));
    }
    if (navigator.userAgent.indexOf('MSIE') !== -1) {
        document.getElementById('ieSuppError').style.display = 'inline-block';
    }

</script>
