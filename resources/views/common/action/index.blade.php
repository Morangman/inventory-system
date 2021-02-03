<div class="button-group" style="list-style: none;">
@foreach ($actions as $action)
    @if ($action)
        <li>{!! $action !!}</li>
    @endif
@endforeach
</div>
