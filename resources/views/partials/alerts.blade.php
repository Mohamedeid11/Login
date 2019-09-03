{{--allert of success--}}

@if(session('msg'))
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        {{session('msg')}}
    </div>
@endif

{{--alert of error--}}
@if(session('error'))
    <div class="alert alert-warning">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <strong>Warning !  </strong>{{session('error')}}
    </div>
    @endif
