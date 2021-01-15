

<!DOCTYPE html>
<html>
<head>
    <title>Editar Postos</title>

    <link rel="stylesheet" href="{{ asset('style/css/form.css') }}">
</head>
<body>

    <form action="{{ route('postos.update', ['posto' => $postos->id]) }}" method="post">
        @method('PUT')
        @csrf

        <label> Cidade: </label>
        <select name="id_cidade">
            @foreach ($cidades as $cidade)
                <option
                    value="{{ $cidade->id }}"
                    @if ($cidade->id == $postos->id_cidade)
                        selected='true'
                    @endif
                > {{ $cidade->nome }} </option>
            @endforeach
        </select>

        <label>Reservatório:</label>
		<input type="number" name="reservatorio" value="{{ $postos->reservatorio }}" min='1' max='100' required="true">

		<label>Latitude:</label>
		<input type="number" name="latitude" value="{{ $postos->latitude }}" required="true">

		<label>Longitude:</label>
		<input type="number" name="longitude" value="{{ $postos->longitude }}" required="true">

		<input type="submit" value="Editar Posto">
	</form>
</body>
</html>
