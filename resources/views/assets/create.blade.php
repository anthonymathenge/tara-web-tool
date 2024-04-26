<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Create Asset</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="{{ asset('css/create.css') }}">
</head>
<body>
  <div class="container">
    <h1>Asset Creation</h1>

    <form action="{{ route('assets.store') }}" method="post">
        @csrf

        <div class="form-group">
            <input type="text" name="name" id="name" class="todo-input" placeholder="Enter asset name..." required>
        </div>

        <!-- Add other asset fields here -->

        <button type="submit" class="btn btn-primary">Create Asset</button>
    </form>

    <h1>List of Assets</h1>

    <div class="todos-container">
        <ul>
        @if(isset($assets) && count($assets) > 0)
            <ul>
                @foreach($assets as $asset)
                    <li class="todo">
                        <a href="{{ route('damage.index', ['id' => $asset->id]) }}">{{ $asset->name }}</a>
                    </li>
                @endforeach
            </ul>
        @else
            <li>No assets found.</li>
        @endif

        </ul>
    </div>
  </div>
  <script src="{{ asset('js/create.js') }}"></script>
</body>
</html>
