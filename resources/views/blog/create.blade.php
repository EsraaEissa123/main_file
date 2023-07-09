{{Form::open(array('url'=>'blog','method'=>'post','enctype'=>'multipart/form-data'))}}
<div class="d-flex justify-content-end">
    @php
        $plan = \App\Models\Plan::find(\Auth::user()->plan);
    @endphp
    @if($plan->enable_chatgpt == 'on')
        <a href="#" class="btn btn-primary btn-sm" data-size="lg" data-ajax-popup-over="true" data-url="{{ route('generate',['blog']) }}" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ __('Generate') }}" data-title="{{ __('Generate Content With AI') }}">
            <i class="fas fa-robot"></i> {{ __('Generate with AI') }}
        </a>
    @endif
</div>
<div class="row">
    <div class="col-12">
        <div class="form-group">
            {{Form::label('title',__('Title'),array('class'=>'form-label'))}}
            {{Form::text('title',null,array('class'=>'form-control','placeholder'=>__('Enter Title'),'required'=>'required'))}}
        </div>
    </div>
    <div class="col-12">
        <div class="form-group">
            <label for="blog_cover_image" class="col-form-label">{{ __('Blog Cover image') }}</label>
            {{-- <input type="file" name="blog_cover_image" id="blog_cover_image"  class="form-control"> --}}
            <input type="file" name="blog_cover_image" id="blog_cover_image" class="form-control" onchange="document.getElementById('blogImg').src = window.URL.createObjectURL(this.files[0])" >
            <img id="blogImg" src="" width="20%" class="mt-2"/>
        </div>
    </div>
    <div class="form-group col-md-12">
        {{Form::label('detail',__('Detail'),array('class'=>'col-form-label')) }}
        {{Form::textarea('detail',null,array('class'=>'form-control pc-tinymce-2','rows'=>3,'placeholder'=>__('Detail')))}}
    </div>
    <div class="form-group col-12 d-flex justify-content-end col-form-label">
        <input type="button" value="{{__('Cancel')}}" class="btn btn-secondary btn-light" data-bs-dismiss="modal">
        <input type="submit" value="{{__('Save')}}" class="btn btn-primary ms-2">
    </div>
    <script src="{{ asset('assets/js/plugins/tinymce/tinymce.min.js') }}"></script>
  
    <script>
        if ($(".pc-tinymce-2").length) {
            tinymce.init({
                selector: '.pc-tinymce-2',
                height: "400",
                content_style: 'body { font-family: "Inter", sans-serif; }'
            });
        }
    </script>
</div>
{{Form::close()}}
