<div class="application-tools-wrapper">
    <x-ad-slot :advertisement="get_advert_model('above-tool')" />
    <div class="tool-wrapper">

        <form method="post" action="">
            <div class="box-shadow py-5">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group mb-3">
                            <label>@lang('tools.type')</label>
                            <select class="form-control form-select" id="type" name="type">
                                <option value="app">App</option>
                                <option value="player">Player</option>
                                <option value="product">Product</option>
                                <option value="summary">Summary</option>
                                <option value="summary_large_image">Summary with Large image</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group mb-3">
                            <label>@lang('tools.siteUsername')</label>
                            <input class="form-control text-content" placeholder="@" name="site_user_name"
                                id="site_user_name" required />
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group mb-3">
                            <label>@lang('tools.appName')</label>
                            <input class="form-control text-content" placeholder="App Name" name="app_name"
                                id="app_name" required />
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group mb-3">
                            <label>@lang('tools.iphoneAppId')</label>
                            <input class="form-control text-content" name="iphone_app_id" id="iphone_app_id"
                                required />
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group mb-3">
                            <label>@lang('tools.ipadAppId')</label>
                            <input class="form-control text-content" name="ipad_app_id" id="ipad_app_id"
                                required />
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group mb-3">
                            <label>@lang('tools.googlePlayId')</label>
                            <input class="form-control text-content" name="google_play_id" id="google_play_id"
                                required />
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group mb-3">
                            <label>@lang('tools.appCountry')</label>
                            <input class="form-control text-content" name="app_country" id="app_country"
                                required />
                        </div>
                    </div>
                    <div class="col-md-12 d-none" id="twitterImage">
                        <div class="form-group mb-3">
                            <label>@lang('tools.imageUrl')</label>
                            <input class="form-control text-content" name="image_url" id="image_url" />
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group mb-3">
                            <label>@lang('common.description')</label>
                            <textarea type="text" name="description" class="form-control text-content"
                                rows="8" :placeholder="__('common.someText')" id="description" required>
                            </textarea>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <div class="page-wrapper">
        <div class="result mt-4">
            <div class="row">
                <div class="col-md-12">
                    <div class="box-shadow tabbar mb-3">
                        <div class="large-text-scroller printable-result html-entities" id="cardResults"></div>
                    </div>
                    <div class="result-copy mt-3 text-end">
                        <x-copy-target target="cardResults" :text="__('common.copyToClipboard')" :svg="false" />
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const APP = function() {
            const items = document.querySelectorAll('.text-content');
            const imageCL = document.getElementById('twitterImage').classList;
            const attachEvents = function() {
                    document.getElementById('type').addEventListener('change', (e) => {
                        isImage()
                        setTag();
                    });
                    items.forEach(element => {
                        element.addEventListener('change', () => {
                            setTag();
                        });
                    });

                    setTag()
                    isImage()
                },
                isImage = function() {
                    const type = document.getElementById("type").value;
                    (type == 'summary' || type ==
                        'summary_large_image' || type == 'player') ? imageCL.remove('d-none'): imageCL.add(
                        'd-none')
                },
                setTag = function() {
                    let html = '';
                    const type = document.getElementById("type").value
                    html +=
                        '&lt;<span class="tag_name">meta</span> <span class="tag_attr">name=</span><span class="tag_attr_value">"twitter:card"</span> <span class="tag_attr">content=</span><span class="tag_attr_value">"' +
                        type + '"</span>&gt;<br>'

                    if (type == 'summary' || type == 'summary_large_image' || type == 'player') {
                        html +=
                            '&lt;<span class="tag_name">meta</span> <span class="tag_attr">name=</span><span class="tag_attr_value">"twitter:image"</span> <span class="tag_attr">content=</span><span class="tag_attr_value">"' +
                            document.getElementById('image_url').value + '"</span>&gt;<br>'
                    }
                    html +=
                        '&lt;<span class="tag_name">meta</span> <span class="tag_attr">name=</span><span class="tag_attr_value">"twitter:site"</span> <span class="tag_attr">content=</span><span class="tag_attr_value">"@' +
                        document.getElementById("site_user_name").value + '"</span>&gt;<br>'
                    html +=
                        '&lt;<span class="tag_name">meta</span> <span class="tag_attr">name=</span><span class="tag_attr_value">"twitter:description"</span> <span class="tag_attr">content=</span><span class="tag_attr_value">"' +
                        document.getElementById("description").value + '"</span>&gt;<br>'
                    html +=
                        '&lt;<span class="tag_name">meta</span> <span class="tag_attr">name=</span><span class="tag_attr_value">"twitter:app:name:iphone"</span> <span class="tag_attr">content=</span><span class="tag_attr_value">"' +
                        document.getElementById("app_name").value + '"</span>&gt;<br>'
                    html +=
                        '&lt;<span class="tag_name">meta</span> <span class="tag_attr">name=</span><span class="tag_attr_value">"twitter:app:id:iphone"</span> <span class="tag_attr">content=</span><span class="tag_attr_value">"' +
                        document.getElementById("iphone_app_id").value + '"</span>&gt;<br>'
                    html +=
                        '&lt;<span class="tag_name">meta</span> <span class="tag_attr">name=</span><span class="tag_attr_value">"twitter:app:name:ipad"</span> <span class="tag_attr">content=</span><span class="tag_attr_value">"' +
                        document.getElementById("app_name").value + '"</span>&gt;<br>'
                    html +=
                        '&lt;<span class="tag_name">meta</span> <span class="tag_attr">name=</span><span class="tag_attr_value">"twitter:app:id:ipad"</span> <span class="tag_attr">content=</span><span class="tag_attr_value">"' +
                        document.getElementById("ipad_app_id").value + '"</span>&gt;<br>'
                    html +=
                        '&lt;<span class="tag_name">meta</span> <span class="tag_attr">name=</span><span class="tag_attr_value">"twitter:app:name:googleplay"</span> <span class="tag_attr">content=</span><span class="tag_attr_value">"' +
                        document.getElementById("app_name").value + '"</span>&gt;<br>'
                    html +=
                        '&lt;<span class="tag_name">meta</span> <span class="tag_attr">name=</span><span class="tag_attr_value">"twitter:app:id:googleplay"</span> <span class="tag_attr">content=</span><span class="tag_attr_value">"' +
                        document.getElementById("google_play_id").value + '"</span>&gt;<br>'
                    html +=
                        '&lt;<span class="tag_name">meta</span> <span class="tag_attr">name=</span><span class="tag_attr_value">"twitter:app:country"</span> <span class="tag_attr">content=</span><span class="tag_attr_value">"' +
                        document.getElementById("app_country").value + '"</span>&gt;'

                    document.getElementById('cardResults').innerHTML = html
                };

            return {
                init: function() {
                    attachEvents()
                }
            };
        }();
        document.addEventListener("DOMContentLoaded", function(event) {
            APP.init();
        });
    </script>
</div>