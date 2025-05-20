<div class="application-tools-wrapper">
    <div class="tool-wrapper">

        <x-form class="no-app-loader" method="post" :route="route('tool.handle', $tool->slug)">
            <div class="row mt-4 mb-4">
                <div class="col-md-12 mt-2 mb-3">
                    <div class="form-group mh-300">
                        <textarea type="text" name="string" class="editor" rows="8" :placeholder="__('common.someText')"
                            id="textarea">
                        {{ old('string') }}
                        </textarea>
                        <x-input-error :messages="$errors->get('string')" class="mt-2" />
                    </div>
                </div>
                <div class="col-md-12 text-end">
                    <x-download-form-button type="submit" :text="__('common.download')" />
                </div>
            </div>

            </form>
    </div>

    @push('page_scripts')
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script>
        document.querySelectorAll('.editor').forEach(elem => {
            ClassicEditor.create(elem, {
                    simpleUpload: {
                        uploadUrl: '{{ route('
                        uploader.upload ') }}',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        }
                    },
                })
                .then(editor => {})
                .catch(error => {
                    console.log('error', error);
                });
        });
    </script>
    @endpush
</div>