<div class="application-tools-wrapper">
    <div class="tool-wrapper">

        <form method="post" action="">
            <div class="row">
                <div class="col-md-12 mb-3">
                    <div id="imageUploader" class="form-group">
                        <x-upload-wrapper max-files="1" :max-size="$tool->fs_tool" accept=".png,.jpg,jpeg" input-name="image"
                            :file-title="__('tools.dropImageHereTitle')" :file-label="false" on-select-file="onFileSelect" />
                    </div>
                    <div id="imgEditable" class="d-none"></div>
                </div>
            </div>
        </form>
        
    </div>
    <?php if (isset($results)): ?>
    <div class="tool-results-wrapper">

        <div class="page-wrapper">
            <div class="result mt-4">

            </div>
        </div>
    </div>
    @endif

    @push('page_scripts')
    <script>
        const APP = function() {
            let isSelected = false;
            const app = document.querySelector('body')

            return {
                init: function() {
                    app.classList.add('tool-initialized')
                },
                onFileSelect: function(event) {
                    console.log(event)
                    if (isSelected) {
                        return;
                    }
                    const file = event[0];
                    const src = URL.createObjectURL(file)
                    var image = new Image();
                    image.src = src;
                    image.id = 'image-editable';
                    image.className = 'img-fluid';
                    image.onload = function() {

                    };

                    document.getElementById('imgEditable').appendChild(image)
                    document.getElementById('imageUploader').classList.add('d-none')
                    document.getElementById('imgEditable').classList.remove('d-none')
                    isSelected = true
                }
            }
        }();
        document.addEventListener("DOMContentLoaded", function(event) {
            APP.init();
        });
        window.onFileSelect = APP.onFileSelect
    </script>
    @endpush
</div>