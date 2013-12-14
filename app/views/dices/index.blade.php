<ul>
    @foreach($dices as $dice)
        <li>{{ $dice->rolled }}</li>
    @endforeach
</ul>