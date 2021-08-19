<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>City</title>
</head>

<body>
    <h2>Cities</h2>

    @foreach ($city as $cities)
    <h3>City:</h3>
    <p>{{$cities->city}}</p>
    @endforeach

</body>

</html>