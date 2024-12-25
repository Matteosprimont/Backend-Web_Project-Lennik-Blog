<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Nieuw Bericht van Contactformulier</title>
</head>
<body>
    <h2>Nieuw bericht van het contactformulier</h2>
    <p><strong>Naam:</strong> {{ $request->name }}</p>
    <p><strong>E-mail:</strong> {{ $request->email }}</p>
    <p><strong>Bericht:</strong></p>
    <p>{{ $request->message }}</p>
</body>
</html>
