

<!DOCTYPE html>
<html>
<head>
    <title>Editar Cidade</title>

    <link rel="stylesheet" href="{{ asset('style/css/form.css') }}">
</head>
<body>

    <form action="{{ route('cidades.update', ['cidade' => $cidades->id]) }}" method="post">
        @method('PUT')
        @csrf
        <label>Nome da Cidade:</label>
		<input type="text" name="nome" value="{{ $cidades->nome }}" required="true">

		<label>Latitude:</label>
		<input type="text" name="latitude" value="{{ $cidades->latitude }}" required="true">

		<label>Longitude:</label>
		<input type="text" name="longitude" value="{{ $cidades->longitude }}" required="true">

		<input type="submit" value="Editar Cidade">
	</form>
</body>
</html>
