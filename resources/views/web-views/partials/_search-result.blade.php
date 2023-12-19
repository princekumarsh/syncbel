<style>
    .list-group-item li,
    a {
        color: {{ $web_config['primary_color'] }};
    }

    .list-group-item li,
    a:hover {
        color: {{ $web_config['secondary_color'] }};
    }
</style>
<diV class="card search-card search_re __inline-13 ">
    <div class="card-body  __h-400px overflow-x-hidden overflow-y-auto">
        <ul class="list-group list-group-flush">
            @foreach ($products as $i)
                <li class="list-group-item" onclick="$('.search_form').submit()">
                    <a href="javascript:"
                        onmouseover="$('.search-bar-input-mobile').val('{{ $i['name'] }}');$('.search-bar-input').val('{{ $i['name'] }}');">
                        {{ $i['name'] }}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</diV>
