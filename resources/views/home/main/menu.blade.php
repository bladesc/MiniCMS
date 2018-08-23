<nav>
    <div id="nav-logo">


    <p>logo</p>


    </div>
    <div id="nav-menu">
        <ul>
            <li><a href="#">start</a></li>
            <li><a href="#">o nas</a></li>
            <li><a href="#">usługi</a></li>
            <li><a href="#">galeria</a></li>
            <li><a href="#">kontakt</a></li>

            @foreach($menu as $item)
                <li><a href="{{$item->url}}">{{$item->name}}</a></li>
            @endforeach
        </ul>
    </div>
    <div class="foot-box"></div>
</nav>
