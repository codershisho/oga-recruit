<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Laravel9</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    @vite('resources/css/app.css')
    <style>
        .v-application {
            font-family: 'Noto Sans JP', sans-serif !important;
        }
    </style>
</head>

<body>
    <div id="app">
    </div>
    @vite('resources/js/app.ts')
    {{-- <script src="http://{{ Request::getHost() }}:6001/socket.io/socket.io.js"></script> --}}
</body>
{{-- <script>
    window.addEventListener("load", (event) => {
        Echo.channel("test").listen("MessageReceived", (e) => {
            console.log(e);
        });
    });
</script> --}}

</html>
