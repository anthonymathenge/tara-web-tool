<!-- resources/views/assets/index.blade.php -->

<h1>List of Assets</h1>

<ul>
    @foreach($assets as $asset)
        <li>
            <a href="{{ route('assets.show', $asset->id) }}">{{ $asset->name }}</a>
        </li>
    @endforeach
</ul>
