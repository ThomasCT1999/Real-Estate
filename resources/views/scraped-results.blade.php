<!-- scraped-results.blade.php -->
<h1>Scraped Houses</h1>
<ul>
    @foreach($houses as $house)
        <li>{{ $house->address }}, Price: {{ $house->price }}</li>
    @endforeach
</ul>
