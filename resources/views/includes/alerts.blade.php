{{--SUCCESS--}}
@if(session()->has('alert-success'))
    <div class="alert alert-success alert-dismyissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
            ×
        </button>

        {!! session('alert-success') !!}
    </div>
@endif

{{--WARNING--}}
@if(session()->has('alert-warning'))
    <div class="alert alert-warning alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
            ×
        </button>

        {!! session('alert-warning') !!}
    </div>
@endif

{{--DANGER--}}
@if(session()->has('alert-danger'))
    <div class="alert alert-danger alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
            ×
        </button>

        {!! session('alert-danger') !!}
    </div>
@endif

{{--INFO--}}
@if(session()->has('alert-info'))
    <div class="alert alert-info alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
            ×
        </button>

        {!! session('alert-info') !!}
    </div>
@endif