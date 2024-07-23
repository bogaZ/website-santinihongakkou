<textarea class="tiny-default form-control {{ $id }}" name="{{ $name }}" id="{{ $id }}"
    data-uploadurl="{{ route('rgpanel.tinymce.upload', ['locale' => app()->getLocale()]) }}">{!! $value !!}</textarea>
