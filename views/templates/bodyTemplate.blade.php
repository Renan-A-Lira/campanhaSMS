<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- Styles --}}
    <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    {{-- Font Awesome Icons --}}
    <link href = "fontawesome-free-6.1.1-web/css/all.css" rel="stylesheet" />
    {{-- JavaScript --}}
    <script type="text/javascript" src="jquery-3.2.1/dist/jquery.slim.min.js"></script>
    <script type="text/javascript" src="bootstrap/dist/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="assets/js/exportCSV.js"></script>


    <title>SMS</title>


    <style>
        body{
            background-color: mintcream;
        }
        .modal-backdrop{
            background-color: blue;
        }
        .painel {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin: 1vh 0;
        }
        #lista {
            margin: 6vh 0;
        }
        img{
            width: 20%;
        }
        #footer {
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
            background-color: #343a40;
            color: white;
            text-align: center;
            padding: 1vh 0;
        }
    </style>
</head>
<body class="">
    
    @yield('content')

    <script>
        function newSpreadsheet(){
            $('#loading').modal('show');
        }
        newSpreadsheet()
    </script>


</body>
</html>