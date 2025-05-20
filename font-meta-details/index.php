<?php
$plug_fl =  plugin_dir_url( __FILE__ );
$plug_dr =  plugin_dir_url( __DIR__ );
?>


	<link rel="stylesheet" href="<?php echo $plug_fl; ?>style.css">
	<script type="text/javascript" src="<?php echo $plug_fl; ?>index.js"></script>
	<style>
		.intro {
			margin: 1em 0 0;
			font-size: 1.75rem;
			text-align: center;
		}
		.main {
			margin:0 auto;
			max-width: 50em;
			
			padding:0.5em 2em;
			background-color: #ffffff;
		}
		#error {
			margin-top: 1em;
			text-align: center;
			color: #bd2c2c;
		}
	</style>

	<div class="card">
	<div class="main">
		<p class="intro"><b>Drag and drop a font!</b></p>
		<p id="error"></p>
		<table id="fontmeta"></table>
	</div>
	<div class="text-center" style="margin-top:16px;">
		<input type="file" id="myFile">
	</div>
	</div>
	<script>

/************************* METHOD 1 ****************************/



function readFontFile(flname) {
    var myFile = flname;
    var r = new FileReader();
    r.addEventListener('load', function (e) {
				const metaArea = document.getElementById('fontmeta');
				const error = document.getElementById('error');
				let fontMeta;
				try {
					fontMeta = FontName.parse(e.target.result)[0];
				} catch (e) {
					error.textContent = e.message;
					metaArea.innerHTML = '';
					console.error(e);
					return;
				}
				//console.log(fontMeta);
				error.textContent = '';
				metaArea.innerHTML = '';
				Object.keys(fontMeta).forEach(key => {
					const value = fontMeta[key];
					const el = document.createElement('tr');
					el.innerHTML = `<td><strong>${key}</strong></td><td>${value}</td>`;
					metaArea.appendChild(el);
				});
    });
    //r.readAsArrayBuffer(myFile);
    r.readAsDataURL(myFile);

}
//readFontFile("3PROT___.TTF");
/************************* METHOD 2 ****************************/

/************************* METHOD 2 ****************************/

var input = document.getElementById("myFile");
input.addEventListener("change",readFont, false );

function readFont() {
  if (this.files && this.files[0]) {
    var myFile = this.files[0];
	console.log(myFile);
    //var reader = new FileReader();
    var r = new FileReader();
    r.addEventListener('load', function (e) {
      //output.textContent = e.target.result;
	  				const metaArea = document.getElementById('fontmeta');
				const error = document.getElementById('error');
				let fontMeta;
				try {
					fontMeta = FontName.parse(e.target.result)[0];
				} catch (e) {
					error.textContent = e.message;
					metaArea.innerHTML = '';
					console.error(e);
					return;
				}
				//console.log(fontMeta);
				error.textContent = '';
				metaArea.innerHTML = '';
				Object.keys(fontMeta).forEach(key => {
					const value = fontMeta[key];
					const el = document.createElement('tr');
					el.innerHTML = `<td><strong>${key}</strong></td><td>${value}</td>`;
					metaArea.appendChild(el);
				});
    });
    r.readAsArrayBuffer(myFile);
  }   
}

/************************* METHOD 2 ****************************/




/************************* METHOD 3 ****************************/

		window.onload = () => {
			window.addEventListener('drop', onDrop, false);
			window.addEventListener('dragenter', cancel, false);
			window.addEventListener('dragleave', cancel, false);
			window.addEventListener('dragover',  cancel, false);
		};
		const cancel = e => {
			e.stopPropagation();
			e.preventDefault();
		};

			function onDrop(e) {
			//console.log(e);
			cancel(e);
			
			var r = new FileReader();
			r.onload = e => {
				const metaArea = document.getElementById('fontmeta');
				const error = document.getElementById('error');
				let fontMeta;
				try {
					fontMeta = FontName.parse(e.target.result)[0];
				} catch (e) {
					error.textContent = e.message;
					metaArea.innerHTML = '';
					console.error(e);
					return;
				}
				//console.log(fontMeta);
				error.textContent = '';
				metaArea.innerHTML = '';
				Object.keys(fontMeta).forEach(key => {
					const value = fontMeta[key];
					const el = document.createElement('tr');
					el.innerHTML = `<td><strong>${key}</strong></td><td>${value}</td>`;
					metaArea.appendChild(el);
				});
			};
			r.readAsArrayBuffer(e.dataTransfer.files[0]);
		};
		

/*
		const onDrop = e => {
			cancel(e);
			var r = new FileReader();
			r.onload = e => {
				const metaArea = document.getElementById('fontmeta');
				const error = document.getElementById('error');
			
				let fontMeta;
				try {
					fontMeta = FontName.parse(e.target.result)[0];
				} catch (e) {
					error.textContent = e.message;
					metaArea.innerHTML = '';
					console.error(e);
					return;
				}
				console.log(fontMeta);

				error.textContent = '';
				metaArea.innerHTML = '';
				Object.keys(fontMeta).forEach(key => {
					const value = fontMeta[key];
					const el = document.createElement('tr');
					el.innerHTML = `<td><strong>${key}</strong></td><td>${value}</td>`;
					metaArea.appendChild(el);
				});
			};
			r.readAsArrayBuffer(e.dataTransfer.files[0]);
		};
	*/
	/************************* METHOD 3 ****************************/
	</script>

