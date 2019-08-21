
<div class="sidebar">
    <nav class="sidebar-nav ps ps--active-y">
        <ul class="nav">
            @php
                $x = new \App\Lib\MenuHandler();
                $x->buildNav();
                echo $x->getNav();
            @endphp
        </ul>
    </nav>
</div>
