<form class="js-form" action="{{ $route }}" method="POST">
    @csrf
    @method($method)
    <div class="row">
        <div class="col-12 mb-2">
            <div class="form-group">
                <label for="image" class="form-label">@lang('global.Image') <small>(max: 2mb, recommendation: 600px X
                        600px)</small></label>
                <input type="file" class="form-control dropify" name="image" id="image" data-show-remove="false"
                    @isset($program->image)
                     data-default-file="{{ asset($program->image) }}"
                     @endisset>
                <div class="invalid-feedback" id="imageError"></div>
            </div>
        </div>
        <div class="col-6 mb-2">
            <div class="form-group">
                <label for="title[id]" class="form-label">@lang('global.Title') [id]</label>
                <input type="text" class="form-control" name="title[id]" id="title[id]"
                    @isset($program)
                         value="{{ $program->getTranslation('title', 'id') }}"
                     @endisset>
                <div class="invalid-feedback" id="title.idError"></div>
            </div>
        </div>
        <div class="col-6 mb-2">
            <div class="form-group">
                <label for="short_content[id]" class="form-label">@lang('global.Short Content') [id]</label>
                <input type="text" class="form-control" id="short_content[id]" name="short_content[id]"
                    @isset($program)
                     value="{{ $program->getTranslation('short_content', 'id') }}"
                 @endisset>

                <div class="invalid-feedback" id="short_content.idError"></div>
            </div>
        </div>
        <div class="col-12 mb-2">
            <div class="form-group">
                <label for="content-id" class="form-label">@lang('global.Content') [id]</label>
                <x-forms.tinymce-editor id="content-id" name="content[id]"
                    value="{{ isset($program) ? $program->getTranslation('content', 'id') : '' }} " />
                <div class="invalid-feedback" id="content.idError"></div>
            </div>
        </div>
    </div>
</form>
