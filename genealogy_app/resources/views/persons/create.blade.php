<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Person</title>
</head>
<body>
    <h1>Create New Person</h1>

    <form action="{{ route('persons.store') }}" method="POST">
        @csrf
        <div>
            <label for="name">Name</label>
            <input type="text" id="name" name="name">
        </div>
        <button type="submit">Create Person</button>
    </form>

    <a href="{{ route('persons.index') }}">Back to Persons</a>
</body>
</html>