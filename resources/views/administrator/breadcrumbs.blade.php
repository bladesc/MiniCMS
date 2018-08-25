<?php
$breadcrump = [];
for ($i = 1; $i <= count(Request::segments()); $i++) {

    $partOfUrl = "/";

    for ($y = 1; $y < $i; $y++) {
        $partOfUrl .= Request::segment($y) .'/';
    }

    $breadcrumb[] = ['uri' => $partOfUrl,'segment' => Request::segment($i)];
}
?>

<div id="breadcrumbs">
@foreach($breadcrumb as $key)
        <div class="breadcrumbs-block"><a href="{{url($key['uri'] . $key['segment'])}}">{{$key['segment']}}</a></div>
@endforeach
</div>



