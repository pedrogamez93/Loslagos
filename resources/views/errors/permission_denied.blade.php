<!-- resources/views/errors/permission_denied.blade.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acceso Denegado</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script>
        console.error('No tienes permiso para acceder a esta página.');
    </script>
    <style>
        body, html {
            height: 100%;
            font-family: 'Nunito', sans-serif;
            background-color: #f8f9fa;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
        }
        .content {
            text-align: center;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        .content h1 {
            font-size: 3rem;
            margin-bottom: 20px;
            color: #333;
        }
        .content p {
            font-size: 1.5rem;
            color: #666;
        }
        .content a {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="content">
        <h1>Acceso Denegado</h1>
        <p>No tienes permiso para acceder a esta página.</p>
        <a href="/dashboard" class="btn btn-primary">Volver al Dashboard</a>
    </div>
</body>
</html>
