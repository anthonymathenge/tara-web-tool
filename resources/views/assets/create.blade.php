<!-- resources/views/assets/create.blade.php -->

    <h1>Create Asset</h1>


    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('assets.store') }}" method="post">
        @csrf

        <div class="form-group">
            <label for="name">Asset Name</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>

        <!-- Add other asset fields here -->

        <button type="submit" class="btn btn-primary">Create Asset</button>
    </form>

    <h1>List of Assets</h1>

    <ul>
        @if(isset($assets) && count($assets) > 0)
                @foreach($assets as $asset)
                <li>
                    <a href="{{ route('assets.show', $asset->id) }}">{{ $asset->name }}</a>
                </li>
            @endforeach
        @else
            <li>No assets found.</li>
        @endif
    </ul>

