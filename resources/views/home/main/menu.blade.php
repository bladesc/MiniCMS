<nav>
    <div id="nav-logo">


    logo


    </div>
    <div id="nav-menu">
        <ul>
            @foreach($menu as $item)
                <li><a href="{{$item->url}}">{{$item->name}}</a></li>
            @endforeach
        </ul>
    </div>
    <div class="foot-box"></div>
</nav>
