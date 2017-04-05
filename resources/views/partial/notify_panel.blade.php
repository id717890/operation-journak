<div class="form-group">
    @if(Session::has('success_msg'))
        @if (Session::get('success_msg')!=null)
            <div id="success-msg" class="alert alert-remark-success"
                 style="">{!! Session::get('success_msg') !!}
                <button type="button" id="close-success-alert" class="close" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
            </div>
        @endif
    @endif
    @if(Session::has('error_msg'))
        @if (Session::get('error_msg')!=null)
            <div id="error-msg" class="alert alert-remark-danger"
                 style="">{!! Session::get('error_msg') !!}
                <button type="button" id="close-error-alert" class="close" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
            </div>
        @endif
    @endif
</div>