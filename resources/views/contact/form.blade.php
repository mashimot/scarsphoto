<form action="{{ route('contact.store') }}" method="post" class="wpcf7-form" novalidate="novalidate">
    @csrf
    <div style="display: none;">
        <input type="hidden" name="_wpcf7" value="6899">
        <input type="hidden" name="_wpcf7_version" value="5.1.7">
        <input type="hidden" name="_wpcf7_locale" value="en_US">
        <input type="hidden" name="_wpcf7_unit_tag" value="wpcf7-f6899-p5896-o1">
        <input type="hidden" name="_wpcf7_container_post" value="5896">
    </div>
    <p>Your Name (required)
        <br>
        <span class="wpcf7-form-control-wrap your-name">
            <input type="text" name="contact_name" value="{{ old('contact_name') }}" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" aria-required="true" aria-invalid="false">
            @error('contact_name')
                <span role="alert" class="wpcf7-not-valid-tip">{{ $message }}</span>
            @enderror                                                                           
        </span>
    </p>
    <p>Your Email (required)
        <br>
        <span class="wpcf7-form-control-wrap your-email">
            <input type="email" name="contact_email" value="{{ old('contact_email') }}" size="40" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email wpcf7-not-valid" aria-required="true" aria-invalid="false">
            @error('contact_email')
                <span role="alert" class="wpcf7-not-valid-tip">{{ $message }}</span>
            @enderror
        </span>
    </p>
    <p>Your Phone (required)
        <br>
        <span class="wpcf7-form-control-wrap your-phone">
            <input type="text" name="contact_phone" value="{{ old('contact_phone') }}" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" aria-required="true" aria-invalid="false">
            @error('contact_phone')
                <span role="alert" class="wpcf7-not-valid-tip">{{ $message }}</span>
            @enderror                                                                           
        </span>
    </p>                                                                
    <p>Subject
        <br>
        <span class="wpcf7-form-control-wrap your-subject">
            <input type="text" name="contact_subject" value="{{ old('contact_subject') }}" size="40" class="wpcf7-form-control wpcf7-text" aria-invalid="false">
            @error('contact_subject')
                <span role="alert" class="wpcf7-not-valid-tip">{{ $message }}</span>
            @enderror                                                                        
        </span>
    </p>
    <p>Your Message
        <br>
        <span class="wpcf7-form-control-wrap your-message">
            <textarea name="contact_message" cols="40" rows="10" class="wpcf7-form-control wpcf7-textarea" aria-invalid="false">{{ old('contact_message') }}</textarea>
            @error('contact_message')
                <span role="alert" class="wpcf7-not-valid-tip">{{ $message }}</span>
            @enderror                                                                           
        </span>
    </p>
    <p>
        <input type="submit" value="Send" class="wpcf7-form-control wpcf7-submit">
        <span class="ajax-loader"></span>
    </p>
    @if(Session::has('success'))
        <div class="wpcf7-response-output">
            {{ Session::get('success') }}
        </div>
    @endif                                                                
    <div class="wpcf7-response-output wpcf7-display-none"></div>
</form>