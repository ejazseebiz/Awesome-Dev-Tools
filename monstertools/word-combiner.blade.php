<div class="application-tools-wrapper">
    <div class="tool-wrapper">

        <form method="post" action="">
            <div class="row mt-4 mb-2">
            </div>
            <div class="row">
                <div class="col-md-3 mt-2 mb-3">
                    <label>@lang('tools.prePhase')</label>
                    <input class="form-control" placeholder="pre-phase" name="pre-phase"
                        value="{{ $results['pre_phrase'] ?? '' }}" />
                    <x-input-error :messages="$errors->get('pre-phase')" class="mt-2" />
                </div>
                <div class="col-md-3 mt-2 mb-3">
                    <label>@lang('tools.postPhase')</label>
                    <input class="form-control" placeholder="post-phase" name="post-phase"
                        value="{{ $results['post_phrase'] ?? '' }}" />
                    <x-input-error :messages="$errors->get('post-phase')" class="mt-2" />
                </div>
                <div class="col-md-3 mt-2 mb-3">
                    <label>@lang('tools.seperator')</label>
                    <select class="form-control form-select" name="seperator">
                        <option value="" @if (isset($results) && $results['seperator']=='' ) selected @endif>Nothing</option>
                        <option value=" " @if (isset($results) && $results['seperator']==' ' ) selected @endif>Space</option>
                        <option value="." @if (isset($results) && $results['seperator']=='.' ) selected @endif>.</option>
                        <option value="," @if (isset($results) && $results['seperator']==',' ) selected @endif>,</option>
                        <option value="+" @if (isset($results) && $results['seperator']=='+' ) selected @endif>+</option>
                        <option value="-" @if (isset($results) && $results['seperator']=='-' ) selected @endif>-</option>
                    </select>
                    <x-input-error :messages="$errors->get('seperator')" class="mt-2" />
                </div>
                <div class="col-md-3 mt-2 mb-3">
                    <label>@lang('tools.wrapIn')</label>
                    <select class="form-control form-select" name="wrap-in">
                        <option value="1" @if (isset($results) && $results['wrap_in']=='1' ) selected @endif>Nothing</option>
                        <option value="2" @if (isset($results) && $results['wrap_in']=='2' ) selected @endif>()</option>
                        <option value="3" @if (isset($results) && $results['wrap_in']=='3' ) selected @endif>" "</option>
                        <option value="4" @if (isset($results) && $results['wrap_in']=='4' ) selected @endif>' '</option>
                        <option value="5" @if (isset($results) && $results['wrap_in']=='5' ) selected @endif>[]</option>
                    </select>
                    <x-input-error :messages="$errors->get('post-phase')" class="mt-2" />
                </div>
                <div class="col-md-4 mt-2 mb-3">
                    <div class="form-group">
                        <textarea type="text" name="string_first" class="form-control" rows="8"
                            :placeholder="__('common.someText')" id="textarea" required autofocus contenteditable="true">
                            <?php if (isset($results)): ?>
                            {{ $results['string_first'] }}
                            @endif
                        </textarea>
                        <x-input-error :messages="$errors->get('string_first')" class="mt-2" />
                    </div>
                </div>
                <div class="col-md-4 mt-2 mb-3">
                    <div class="form-group">
                        <textarea type="text" name="string_second" class="form-control" rows="8"
                            :placeholder="__('common.someText')" id="textarea" autofocus contenteditable="true">
                            <?php if (isset($results)): ?>
                            {{ $results['string_second'] }}
                            @endif
                        </textarea>
                        <x-input-error :messages="$errors->get('string_second')" class="mt-2" />
                    </div>
                </div>
                <div class="col-md-4 mt-2 mb-3">
                    <div class="form-group">
                        <textarea type="text" name="string_third" class="form-control" rows="8"
                            :placeholder="__('common.someText')" id="textarea" autofocus contenteditable="true">
                            <?php if (isset($results)): ?>
                            {{ $results['string_third'] }}
                            @endif
                        </textarea>
                        <x-input-error :messages="$errors->get('string_third')" class="mt-2" />
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-12 text-end">
                    <button type="submit" class="btn btn-outline-primary rounded-pill">
                        @lang('tools.combineWords')
                    </button>
                </div>
            </div>
        </form>
    </div>
    <?php if (isset($results)): ?>
    <div class="tool-results-wrapper">

        <x-page-wrapper :title="__('common.result')" :sub-title="trans_choice('tools.countCombinationMerged', $results['merged_total'])">
            <div class="result mt-4">
                <div class="row">
                    <div class="col-md-12">
                        <div class="box-shadow tabbar mb-3 custom-textarea">
                            <textarea type="text" id="word-combiner-result"
                                class="form-control transparent" rows="8">
                                {{ $results['converted_text'] }}
                            </textarea>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <x-copy-target target="word-combiner-result" />
                                <x-download-form-button type="button"
                                    onclick="ArtisanApp.downloadAsTxt('#rword-combiner-result', {filename: '{{ $tool->slug . '.txt' }}'})"
                                    :tooltip="__('tools.saveAsTxt')" />
                                <x-print-button
                                    onclick="ArtisanApp.printResult(document.querySelector('#rword-combiner-result'), {title: '{{ $tool->name }}'})"
                                    :tooltip="__('tools.printResult')" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php endif; ?>

</div>