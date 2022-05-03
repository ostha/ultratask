<div>
@if (Session::has('success'))
<div style="color: green">
Successfully done.
</div>

@elseif(Session::has('failure'))


@endif
</div>
