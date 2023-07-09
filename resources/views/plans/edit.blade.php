{{ Form::model($plan, ['route' => ['plans.update', $plan->id],'method' => 'PUT','enctype' => 'multipart/form-data']) }}
@csrf
@method('put')
@php
    $settings = \App\Models\Utility::settings();    
@endphp
@if(!empty($settings['chatgpt_key']))
    <div class="d-flex justify-content-end">
        <a href="#" class="btn btn-primary btn-sm" data-size="lg" data-ajax-popup-over="true" data-url="{{ route('generate',['plan']) }}" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ __('Generate') }}" data-title="{{ __('Generate Content With AI') }}">
            <i class="fas fa-robot"></i> {{ __('Generate with AI') }}
        </a>
    </div>
@endif
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            {{ Form::label('name', __('Name'), ['class' => 'col-form-label']) }}
            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => __('Enter Name')]) !!}
        </div>
    </div>
    @if ($plan->price > 0)
        <div class="col-md-6">
            <div class="form-group">
                {{ Form::label('price', __('Price'), ['class' => 'col-form-label']) }}
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span
                            class="input-group-text">{{ env('CURRENCY_SYMBOL') ? env('CURRENCY_SYMBOL') : '$' }}</span>
                    </div>
                    {!! Form::number('price', null, ['class' => 'form-control', 'id' => 'monthly_price', 'min' => '0', 'placeholder' => __('Enter Price')]) !!}
                </div>
            </div>
        </div>
    @endif
    {{-- <div class="col-md-6">
        <div class="form-group">
            {{ Form::label('image', __('Image'), ['class' => 'col-form-label']) }}
            {{ Form::file('image', ['class' => 'form-control']) }}
        </div>
    </div> --}}
    <div class="col-6">
        <div class="form-group">
            {{ Form::label('duration', __('Duration'), ['class' => 'col-form-label']) }}
            {!! Form::select('duration', $arrDuration, null, ['class' => 'form-control ', 'required' => 'required']) !!}
        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            {{ Form::label('max_stores', __('Maximum stores'), ['class' => 'col-form-label']) }}
            {!! Form::text('max_stores', null, ['class' => 'form-control', 'id' => 'max_stores', 'placeholder' => __('Enter Max Stores')]) !!}
            <span><small>{{ __("Note: '-1' for Unlimited") }}</small></span>
        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            {{ Form::label('max_products', __('Maximum Product Per Store'), ['class' => 'col-form-label']) }}
            {!! Form::text('max_products', null, ['class' => 'form-control', 'id' => 'max_products', 'placeholder' => __('Enter Products Per Store')]) !!}
            <span><small>{{ __("Note: '-1' for Unlimited") }}</small></span>
        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            {{ Form::label('max_users', __('Maximum Users Per Store'), ['class' => 'col-form-label']) }}
            {!! Form::text('max_users', null, ['class' => 'form-control', 'id' => 'max_users', 'placeholder' => __('Enter Max Users')]) !!}
            <span><small>{{ __("Note: '-1' for Unlimited") }}</small></span>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {{ Form::label('storage_limit', __('Storage Limit'), ['class' => 'col-form-label']) }}
            {{ Form::number('storage_limit', null, ['class' => 'form-control','id' => 'storage_limit','placeholder' => __('Enter Storage Limit'),'required' => 'required']) }}
            <span><small>{{ __("Note: '-1' for Unlimited") }}</small></span>
        </div>
    </div>
    <div class="col-6">
        
    </div>
    <div class="col-6">
        <div class="custom-control form-switch pt-2">
            <input type="checkbox" class="form-check-input" name="enable_custdomain" id="enable_custdomain"
                {{ $plan['enable_custdomain'] == 'on' ? 'checked=checked' : '' }}>
            <label class="custom-control-label form-check-label"
                for="enable_custdomain">{{ __('Enable Domain') }}</label>
        </div>
    </div>
    <div class="col-6">
        <div class="custom-control form-switch pt-2">
            <input type="checkbox" class="form-check-input" name="enable_custsubdomain" id="enable_custsubdomain"
                {{ $plan['enable_custsubdomain'] == 'on' ? 'checked=checked' : '' }}>
            <label class="custom-control-label form-check-label"
                for="enable_custsubdomain">{{ __('Enable Sub Domain') }}</label>
        </div>
    </div>
    <div class="col-6">
        <div class="custom-control form-switch pt-2">
            <input type="checkbox" class="form-check-input" name="additional_page" id="additional_page"
                {{ $plan['additional_page'] == 'on' ? 'checked=checked' : '' }}>
            <label class="custom-control-label form-check-label"
                for="additional_page">{{ __('Enable Additional Page') }}</label>
        </div>
    </div>
    <div class="col-6">
        <div class="custom-control form-switch pt-2">
            <input type="checkbox" class="form-check-input" name="blog" id="blog"
                {{ $plan['blog'] == 'on' ? 'checked=checked' : '' }}>
            <label class="custom-control-label form-check-label" for="blog">{{ __('Enable Blog') }}</label>
        </div>
    </div>
    <div class="col-6">
        <div class="custom-control form-switch pt-2">
            <input type="checkbox" class="form-check-input" name="shipping_method" id="shipping_method"
                {{ $plan['shipping_method'] == 'on' ? 'checked=checked' : '' }}>
            <label class="custom-control-label form-check-label"
                for="shipping_method">{{ __('Enable Shipping Method') }}</label>
        </div>
    </div>
     <div class="col-6">
        <div class="custom-control form-switch pt-2">
            <input type="checkbox" class="form-check-input" name="pwa_store" id="pwa_store" {{ $plan['pwa_store'] == 'on' ? 'checked=checked' : '' }}>
            <label class="custom-control-label form-check-label"
                for="pwa_store">{{ __('Progressive Web App (PWA)') }}</label>
        </div>
    </div>
    <div class="col-6">
        <div class="custom-control form-switch pt-2">
            <input type="checkbox" class="form-check-input" name="enable_chatgpt" id="enable_chatgpt" {{ $plan['enable_chatgpt'] == 'on' ? 'checked=checked' : '' }}> 
        <label class="custom-control-label form-check-label"
            for="enable_chatgpt">{{ __('Enable Chatgpt') }}</label>
        </div>
    </div>

    <div class="col-12 pt-2">
        <div class="custom-control">
            {{ Form::label('description', __('Description'), ['class' => 'col-form-label']) }}
            {!! Form::textarea('description', null, ['class' => 'form-control', 'id' => 'description', 'rows' => 2, 'placeholder' => __('Enter Description')]) !!}
        </div>
    </div>
</div>
<div class="form-group col-12 d-flex justify-content-end col-form-label">
    <input type="button" value="{{ __('Cancel') }}" class="btn btn-secondary btn-light" data-bs-dismiss="modal">
    <input type="submit" value="{{ __('Update') }}" class="btn btn-primary ms-2">
</div>
</form>
