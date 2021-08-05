@if (session('status'))
    <div class="alert alert-danger alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{session('status')}}</strong>
    </div>
@endif
