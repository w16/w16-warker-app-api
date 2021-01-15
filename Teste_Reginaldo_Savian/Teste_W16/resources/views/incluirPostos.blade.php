

<!DOCTYPE html>
<html>
<head>
    <title>Incluir Postos</title>

    <link rel="stylesheet" href="{{ asset('style/css/form.css') }}">
</head>
<body>

	<form action="{{ route('postos.store') }}" method="post">
        @csrf

        <label> Cidade: </label>
        <select name="id_cidade">
            @foreach ($cidades as $cidade)
                <option value="{{ $cidade->id }}"> {{ $cidade->nome }} </option>
            @endforeach
        </select>

        <label>Reservatório:</label>
		<input type="number" name="reservatorio" min='1' max='100' required="true">

		<label>Latitude:</label>
		<input type="number" name="latitude" required="true">

		<label>Longitude:</label>
		<input type="number" name="longitude" required="true">

		<input type="submit" value="Cadastrar Posto">
	</form>
</body>
</html>
