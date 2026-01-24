<?php
/**
 * index.php - Verhindert die Verzeichnisanzeige
 * Setzt einen 403 Forbidden Header und zeigt eine benutzerfreundliche Meldung an
 */

// HTTP-Statuscode 403 (Forbidden) setzen
header('HTTP/1.1 403 Forbidden');
header('Status: 403 Forbidden');

// Content-Type für korrekte Darstellung
header('Content-Type: text/html; charset=utf-8');
?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zugriff verweigert</title>
    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, sans-serif;
            background-color: #f8f9fa;
            color: #333;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .container {
            text-align: center;
            max-width: 600px;
            padding: 2rem;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }
        h1 {
            color: #dc3545;
            margin-bottom: 1rem;
        }
        .icon {
            font-size: 4rem;
            color: #dc3545;
            margin-bottom: 1rem;
        }
        p {
            line-height: 1.6;
            margin-bottom: 1.5rem;
        }
        .code {
            background-color: #f8f9fa;
            border: 1px solid #dee2e6;
            border-radius: 4px;
            padding: 0.5rem;
            font-family: monospace;
            font-size: 0.9rem;
            margin-top: 1rem;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="icon">⛔</div>
        <h1>Zugriff verweigert</h1>
        <p>Sie haben keine Berechtigung, auf dieses Verzeichnis zuzugreifen.</p>
        <p>Falls Sie glauben, dass dies ein Fehler ist, kontaktieren Sie bitte den Administrator.</p>
        <div class="code">Fehler 403 - Forbidden</div>
    </div>
</body>
</html>
<?php
// Skriptausführung beenden
exit();
?>