<form method="post" action="{!! $url !!}">
    {{ csrf_field() }}
    {{ method_field('DELETE') }}

    <button type="submit" class="btn delete-btn">
        <i class="icon-trash"></i>
    </button>
</form>
