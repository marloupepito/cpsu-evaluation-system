<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
        <title>CPSU - Evaluation System</title>
        <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests"> 
        <!-- Fonts -->
      
        <!-- Styles -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body>
        <div id="app">
            <root-app></root-app>
        </div>
    </body>
    
</html>
