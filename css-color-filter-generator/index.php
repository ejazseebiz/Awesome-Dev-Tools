<?php
$plug_fl =  plugin_dir_url( __FILE__ );
$plug_dr =  plugin_dir_url( __DIR__ );
?>

		<link rel="stylesheet" href="<?php echo $plug_fl; ?>normalize.css">
		<link rel="stylesheet" href="<?php echo $plug_fl; ?>ayman.css">
		<link rel="stylesheet" href="<?php echo $plug_fl; ?>index.css">
		
    <section class="main-content card">
      <div>
				<section class="input-section">
					<div class="material-textfield">
			      <input disabled id="color-input" class="target" type="text" placeholder="#000" type="text" maxlength="7" oninput="validateColor(this.value)">
			      <label>Desired Hex Color</label>
			    </div>
	        <a id="action-button" class="btn3d btn-default action-button disabled" onclick="compute()"><span>Get Filter!</span></a>
				</section>

				<section class="real-section">
	        <p>Real pixel:</p>

					<div class="color-wrapper">
						<div id="realPixel" class="pixel"></div>

						<div class="color-content">
							<span class="copyable" data-clipboard-text="rgb(0, 0, 0)">
								<b>RGB </b><code id="realPixelTextRGB">rgb(0, 0, 0)</code>
								<span class="copy">Copy</span>
								<span class="pos"></span>
							</span>
							<br>
							<span class="copyable" data-clipboard-text="#000">
								<b>HEX </b><code id="realPixelTextHEX">#000</code>
								<span class="copy">Copy</span>
								<span class="pos"> </span>
							</span>
						</div>
					</div>
				</section>

				<section class="filtered-section">
	        <p>Filtered pixel, style applied through CSS</p>

					<div class="color-wrapper">
						<div id="filterPixel" class="pixel"></div>

						<div class="color-content">
							<span class="copyable" data-clipboard-text="filter: brightness(0) saturate(100%)">
								<code id="filterPixelText">filter: brightness(0) saturate(100%)</code>
								<span class="copy">Copy</span>
								<span class="pos"></span>
							</span>
						</div>
					</div>
				</section>

        <span id="lossDetail">
        	Loss: 0
        </span>
      </div>

    </section>

		<script src="https://unpkg.com/clipboard@2/dist/clipboard.min.js"></script>
    <script src="<?php echo $plug_fl; ?>index.js"></script>
  </body>
</html>
