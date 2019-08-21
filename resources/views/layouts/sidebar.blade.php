
<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            {{--<li class="nav-item">--}}
                {{--<a class="nav-link active" href="/dasbor">--}}
                    {{--<i class="nav-icon icon-speedometer"></i> Dasbor--}}
                {{--</a>--}}
            {{--</li>--}}
            {{--<li class="nav-title">Master Data</li>--}}
            {{--<li class="nav-item">--}}
                {{--<a class="nav-link" href="/dasbor/pengguna">--}}
                    {{--<i class="nav-icon icon-user"></i> Pengguna--}}
                {{--</a>--}}
            {{--</li>--}}
            {{--<li class="nav-item nav-dropdown">--}}
                {{--<a class="nav-link nav-dropdown-toggle" href="#">--}}
                    {{--<i class="nav-icon fa fa-home"></i> Pengaturan--}}
                {{--</a>--}}
                {{--<ul class="nav-dropdown-items">--}}
                    {{--<li class="nav-item">--}}
                        {{--<a class="nav-link" href="/dasbor/menu">--}}
                            {{--<i class="nav-icon icon-lock"></i> Menu--}}
                        {{--</a>--}}
                    {{--</li>--}}
                    {{--<li class="nav-item">--}}
                        {{--<a class="nav-link" href="/dasbor/role">--}}
                            {{--<i class="nav-icon icon-lock"></i> Role--}}
                        {{--</a>--}}
                    {{--</li>--}}
                {{--</ul>--}}
            {{--</li>--}}
            @php
                $x = new \App\Lib\MenuHandler();
                $x->buildNav();
                echo $x->getNav();
            @endphp
        </ul>
    </nav>
    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>
