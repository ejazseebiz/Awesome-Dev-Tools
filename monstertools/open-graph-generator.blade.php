<div class="application-tools-wrapper">
    <div class="tool-wrapper">

        <form method="post" action="">
            <div class="box-shadow my-3 py-5">
                <div class="row">
                    <div class="col-md-12">
                        <label for="title">@lang('tools.title')</label>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <input class="form-control text-content" placeholder="Title" data-content="title"
                                name="title" id="title" required />
                        </div>
                        <div class="form-group mb-3">
                            <label for="site_name">@lang('tools.siteName')</label>
                            <input class="form-control text-content" placeholder="Site Name"
                                data-content="site_name" name="site_name" id="site_name" required />
                        </div>
                        <div class="form-group mb-3">
                            <label for="url">@lang('tools.siteUrl')</label>
                            <input class="form-control text-content" placeholder="Site Url" data-content="url"
                                name="url" id="url" required />
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-group h-100">
                            <textarea type="text" name="description" id="description"
                                data-content="description" class="form-control text-content h-100" :placeholder="__('common.description')"
                                id="description" required autofocus contenteditable="true">
                            </textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="type">@lang('tools.type')</label>
                            <select class="form-control text-content form-select" name="type" id="type" required
                                data-content="type">
                                <option value="book">Book</option>
                                <option value="books.author">Book Author</option>
                                <option value="books.genre">Book Genre</option>
                                <option value="business.business">Business</option>
                                <option value="fitness.course">Fitness Course</option>
                                <option value="music.album">Music Album</option>
                                <option value="music.musician">Music Musician</option>
                                <option value="music.playlist">Music Playlist</option>
                                <option value="music.radio_station">Music Radio Station</option>
                                <option value="music.song">Music Song</option>
                                <option value="object">Object (Generic Object)</option>
                                <option value="place">Place</option>
                                <option value="product">Product</option>
                                <option value="product.group">Product Group</option>
                                <option value="product.item">Product Item</option>
                                <option value="profile">Profile</option>
                                <option value="quick_election.election">Election</option>
                                <option value="restaurant">Restaurant</option>
                                <option value="restaurant.menu">Restaurant Menu</option>
                                <option value="restaurant.menu_item">Restaurant Menu Item</option>
                                <option value="restaurant.menu_section">Restaurant Menu Section</option>
                                <option value="video.episode">Video Episode</option>
                                <option value="video.movie">Video Movie</option>
                                <option value="video.tv_show">Video TV Show</option>
                                <option value="video.other">Video Other</option>
                                <option value="website">Website</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="no_image">@lang('tools.noOfImage')</label>
                            <select class="form-control form-select" name="no_image" id="no_image" required
                                data-content="no_image">
                                @for ($i = 1; $i < 11; $i++)
                                    <option value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="row" id="video-html"></div>
                    </div>
                    <div class="col-md-12">
                        <div class="row" id="img-html"></div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <div class="page-wrapper">
        <div class="result tool-results mt-4">
            <div class="row">
                <div class="col-md-12">
                    <div class="box-shadow tabbar mb-3">
                        <div class="large-text-scroller printable-result html-entities" id="ogResults"></div>
                    </div>
                    <div class="result-copy mt-3 text-end">
                        <x-copy-target target="ogResults" :text="__('common.copyToClipboard')" :svg="false" />
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('page_scripts')
    <script>
        const APP = function() {
            let item = document.querySelectorAll('.text-content');
            const attachEvents = function() {
                    item.forEach(element => {
                        element.addEventListener('keyup', () => {
                            APP.setTag();
                        });
                    });

                    document.getElementById("no_image").addEventListener('change', () => {
                        imgAppend()
                    })

                    imgAppend()
                    appendVideoMeta()
                    addVideoMeta()
                    APP.setTag()
                },
                addVideoMeta = function() {
                    document.getElementById('type').addEventListener('change', () => {
                        appendVideoMeta()
                        APP.setTag();
                    });
                },
                appendVideoMeta = function() {
                    const type_value = document.getElementById('type').value;
                    if (type_value.includes('video')) {
                        document.getElementById("video-html").innerHTML =
                            '<div class="col-md-6 mt-2 mb-3">' +
                            '<label class="form-label" for="video_url">{{ __('
                        tools.videoUrl ') }}</label>' +
                            '<input class="form-control text-content" placeholder="{{ __('
                        tools.videoUrl ') }}" data-content="video:url"' +
                            'name="video_url" id="video_url" required onkeyup="APP.setTag()"/></div>' +
                            '<div class="col-md-6 mt-2 mb-3">' +
                            '<label class="form-label" for="secure_url">{{ __('
                        tools.videoSecureUrl ') }}</label>' +
                            '<input class="form-control text-content" placeholder="{{ __('
                        tools.videoSecureUrl ') }}" data-content="video:secure_url"' +
                            'name="secure_url" id="secure_url" required onkeyup="APP.setTag()"/></div>' +
                            '<div class="col-md-12 mt-2 mb-3">' +
                            '<label class="form-label" for="video_type">{{ __('
                        tools.videoMime ') }}</label>' +
                            '<input class="form-control text-content" placeholder="{{ __('
                        tools.videoMime ') }}" data-content="video:type"' +
                            'name="video_type" id="video_type" required onkeyup="APP.setTag()"/></div>' +
                            '<div class="col-md-6 mt-2 mb-3">' +
                            '<label class="form-label" for="width">{{ __('
                        tools.videoWidth ') }}</label>' +
                            '<input class="form-control text-content" placeholder="{{ __('
                        tools.videoWidth ') }}" data-content="video:width"' +
                            'name="width" id="width" required onkeyup="APP.setTag()"/></div>' +
                            '<div class="col-md-6 mt-2 mb-3">' +
                            '<label class="form-label" for="height">{{ __('
                        tools.videoHeight ') }}</label>' +
                            '<input class="form-control text-content" placeholder="{{ __('
                        tools.videoHeight ') }}" data-content="video:height"' +
                            'name="height" id="height" required onkeyup="APP.setTag()"/></div>';
                    } else {
                        document.getElementById("video-html").innerHTML = "";
                    }
                },
                imgAppend = function() {
                    var count = document.getElementById("no_image").value;
                    document.getElementById("img-html").innerHTML = "";
                    for (let y = 0; y < count; y += 1) {
                        var no = y + 1;
                        var html = '<div class="col-md-6 mt-2 mb-3">' +
                            '<label class="form-label" for="image_url_' + no + '">{{ __('
                        tools.imageUrl ') }} ' + no +
                            '</label>' +
                            '<input class="form-control text-content" placeholder="{{ __('
                        tools.imageUrl ') }}" data-content="image"' +
                            'name="image_url" id="image_url_' + no + '" required onkeyup="APP.setTag()"/></div>';
                        document.getElementById("img-html").innerHTML += html;
                    }
                    APP.setTag();
                };

            return {
                init: function() {
                    attachEvents()
                },
                setTag: function() {
                    let items = document.querySelectorAll('.text-content');
                    var data = "";
                    for (let x = 0; x < items.length; x += 1) {
                        var name = items[x].dataset.content;
                        data = data +
                            '&lt;<span class="tag_name">meta</span> <span class="tag_attr">property=</span><span class="tag_attr_value">"og:' +
                            name + '"</span> <span class="tag_attr">content=</span><span class="tag_attr_value">"' +
                            items[x]
                            .value +
                            '"</span>&gt;<br>\n';
                    }
                    document.getElementById('ogResults').innerHTML = data;
                },
            };
        }();
        document.addEventListener("DOMContentLoaded", function(event) {
            APP.init();
        });
    </script>
    @endpush
</div>