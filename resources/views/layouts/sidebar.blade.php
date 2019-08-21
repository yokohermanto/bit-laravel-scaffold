<div class="sidebar">
    <nav class="sidebar-nav ps ps--active-y">
        <ul class="nav">
            @if(session()->get("menu_html") != null)
                {!! session()->get("menu_html") !!}
            {{--@else--}}
                {{--@php--}}
                    {{--$x = new \App\Lib\MenuHandler();--}}
                    {{--$x->buildNav();--}}
                    {{--echo $x->getNav();--}}
                {{--@endphp--}}
            @endif
        </ul>
    </nav>
</div>
