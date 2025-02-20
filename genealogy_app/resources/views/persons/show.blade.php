<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Person Details</title>
</head>
<body>
    <h1>Person Details</h1>

    <div>
        <h2>{{ $person->name }}</h2>
        <p>Created by: {{ $person->user->name }}</p>
    </div>

    <div>
        <h3>Parents</h3>
        <ul>
            <li>Parent 1</li>
            <li>Parent 2</li>
        </ul>
    </div>

    <div>
        <h3>Children</h3>
        <ul>
            <li>Child 1</li>
            <li>Child 2</li>
        </ul>
    </div>

    <a href="{{ route('persons.index') }}">Back to Persons</a>
</body>
</html>