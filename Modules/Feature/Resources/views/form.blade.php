<form class="js-form" action="{{ $route }}" method="POST">
    @csrf
    @method($method)
    <div class="row">
        <div class="col-12 mb-2">
            <div class="form-group">
                <label for="title[id]" class="form-label">@lang('global.Title') [id]</label>
                <input type="text" class="form-control" name="title[id]" id="title[id]"
                    @isset($feature)
                         value="{{ $feature->getTranslation('title', 'id') }}"
                     @endisset>
                <div class="invalid-feedback" id="title.idError"></div>
            </div>
        </div>
        <div class="col-12 mb-2">
            <div class="form-group">
                <label for="icon" class="form-label">@lang('global.Icon') <a
                        href="https://themes-pixeden.com/font-demos/7-stroke/" target="_blank"
                        rel="noopener noreferrer"><small>(Lihat Icon?)</small></a></label>
                <input type="text" class="form-control" placeholder="example: pe-7s-album" name="icon"
                    id="icon"
                    @isset($feature)
                         value="{{ $feature->icon }}"
                     @endisset>
                <div class="invalid-feedback" id="icon.idError"></div>
            </div>
        </div>
        <div class="col-12 mb-2">
            <div class="form-group">
                <label for="short_content[id]" class="form-label">@lang('global.Short Content') [id]</label>
                <input type="text" class="form-control" id="short_content[id]" name="short_content[id]"
                    @isset($feature)
                     value="{{ $feature->getTranslation('short_content', 'id') }}"
                 @endisset>

                <div class="invalid-feedback" id="short_content.idError"></div>
            </div>
        </div>
    </div>
</form>
