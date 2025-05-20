<?php
$plug_fl =  plugin_dir_url( __FILE__ );
$plug_dr =  plugin_dir_url( __DIR__ );
?>
    <!-- <script src="https://cdn.tailwindcss.com"></script> -->
    

    <div class="card">
      <div class="row">
       
        <div class="col-md-6">

          <label for="file" class="mt-3 text-sm font-bold text-gray-500"
            >Select a file</label
          >
          <input
            type="file"
            id="file"
            onchange="handleFileSelect()"
            class="bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent border-2 border-gray-200 rounded-lg p-2"
          />
          <p class="text-xs text-gray-500">
            Supported Formats: JPG, PNG, GIF, JPEG, BMP, WEBP
          </p>
          <label for="width" class="mt-3 text-sm font-bold text-gray-500"
            >Width</label
          >
          <input
            type="number"
            id="width"
            class="bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent border-2 border-gray-200 rounded-lg p-2"
          />
          <p class="text-xs text-gray-500">width in pixels</p>
          <label for="height" class="mt-3 text-sm font-bold text-gray-500"
            >Height</label
          >
          <input
            type="number"
            id="height"
            class="bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent border-2 border-gray-200 rounded-lg p-2"
          />
          <p class="text-xs text-gray-500">height in pixels</p>
          <label for="quality" class="mt-3 text-sm font-bold text-gray-500"
            >Quality</label
          >
          <input
            type="number"
            id="quality"
            value="90"
            class="bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent border-2 border-gray-200 rounded-lg p-2"
          />
          <p class="text-xs text-gray-500">quality in percentage</p>
          <button
            id="resize"
            class="bg-blue-500 text-white rounded-lg px-4 py-2 mt-4 btn btn-success btn-large"
          >
            Resize
          </button>
          
        </div>

        <div id="photoDetails" class="col-md-6">
            <img
              id="image"
              class="mb-4 max-w-xs object-cover p-1 border-2 border-blue-500 rounded-lg"
              src="https://via.placeholder.com/150"
              alt="image"
            />
            <p id="selectedFile" class="text-sm text-gray-500 mb-4 w-7/12"></p>
            <p id="dimensions" class="text-sm text-gray-500 mb-4"></p>
            <p id="size" class="text-sm text-gray-500 mb-4"></p>
          </div>

          <div class="col-md-12">
          <div class="result flex-col items-center">
          </div>
          </div>
      </div>

      
    </div>
  </body>
  <script src="<?php echo $plug_fl; ?>script.js"></script>

  