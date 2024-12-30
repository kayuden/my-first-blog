<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>My First Blog - Page non trouvée</title>
        <!-- Lien vers le CDN Bootstrap 5 -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
        <style>
            body {
            background-color: #f8f9fa;
            font-family: 'Arial', sans-serif;
            }
            .error-container {
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            }
            .error-container h1 {
            font-size: 6rem;
            font-weight: bold;
            color: #6c757d;
            }
            .error-container p {
            font-size: 1.5rem;
            color: #6c757d;
            }
            .btn-custom {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            font-size: 1rem;
            border-radius: 5px;
            text-decoration: none;
            }
            .btn-custom:hover {
            background-color: #0056b3;
            color: white;
            }
        </style>
    </head>
    <body>
        <div class="container error-container">
            <h1>404 Not Found</h1>
            <p>Désolé, la page que vous cherchez n'existe pas.</p>
            <a href="/my-first-blog" class="btn-custom">Retour à l'accueil</a>
        </div>

        <!-- Lien vers le script Bootstrap 5 -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
