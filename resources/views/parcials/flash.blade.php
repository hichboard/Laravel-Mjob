

@if(session('success'))
<div class="uk-alert-success" uk-alert>
    <a class="uk-alert-close" uk-close></a>
    <p>{{session('success')}}</p>
</div>
@elseif(session('suc'))
<div class="uk-alert-success" uk-alert>
    <a class="uk-alert-close" uk-close></a>
    <p>{{session('suc')}}</p>
</div>
@elseif(session('sup'))
<div class="uk-alert-success" uk-alert>
    <a class="uk-alert-close" uk-close></a>
    <p>{{session('sup')}}</p>
</div>
@endif