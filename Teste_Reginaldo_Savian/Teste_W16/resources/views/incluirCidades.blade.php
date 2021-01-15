

<!DOCTYPE html>
<html>
<head>
    <title>Incluir Cidade</title>

    <link rel="stylesheet" href="{{ asset('style/css/form.css') }}">
</head>
<body>

	<form action="{{ route('cidades.store') }}" method="post">
        @csrf

        <label>Nome da Cidade:</label>
		<input type="text" name="nome" required="true">

		<label>Latitude:</label>
		<input type="text" name="latitude" required="true">

		<label>Longitude:</label>
		<input type="text" name="longitude" required="true">

		<input type="submit" value="Cadastrar Cidade">
	</form>
</body>
</html>
