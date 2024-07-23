<form class="js-form" action="{{ $route }}" method="POST">
    @csrf
    @method($method)
    <div class="row">
        <div class="col-12 mb-2">
            <div class="form-group">
                <label for="image" class="form-label">@lang('global.Image') <small>(max: 2mb, recommendation: 600px X
                        600px)</small></label>
                <input type="file" class="form-control dropify" name="image" id="image" data-show-remove="false"
                    @isset($gallery->image)
                data-default-file="{{ asset($gallery->image) }}"
                @endisset>
                <div class="invalid-feedback" id="imageError"></div>
            </div>
        </div>
        <div class="col-12 mb-2">
            <div class="form-group">
                <label for="title[id]" class="form-label">@lang('global.Title') [id]</label>
                <input type="text" class="form-control" name="title[id]" id="title[id]"
                    @isset($gallery)
                    value="{{ $gallery->getTranslation('title', 'id') }}"
                @endisset>
                <div class="invalid-feedback" id="title.idError"></div>
            </div>
        </div>
    </div>
</form>
