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
            div.menu-profile-cover{
                background-image: url('/images/background.jpeg') !important;

                }
                span.logo{
                    background-image: url('/images/logo.png') !important;
                }
                a.menu-link{
                    display: 'none' !important;
                }
                div.menu-caret:before{
                    color: white !important;
                }
        </style>
    </head>
    <body>
        <div id="app">
            <root-app></root-app>
        </div>
    </body>
    <script>
        // localStorage.setItem("academic_rank", 'Campus Administrator');
        // console.log(localStorage.getItem("academic_rank"))
        //      function preventBack() { window.history.forward(); }
        // setTimeout("preventBack()", 0);
        // window.onunload = function () { null };
        
    </script>
    
</html>
