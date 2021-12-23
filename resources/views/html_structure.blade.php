<!DOCTYPE html>
<html>

<head>
    <title>Taskify</title>
    <meta charset="utf-8">
    <meta author="Ezequiel Morais">
    <meta lang="pt-br">

    {{-- FONTS --}}
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Train+One&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:ital,wght@1,200&display=swap" rel="stylesheet">
    <!-- JavaScript Bundle with Popper -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    @yield('css link')
</head>

<body>
    <nav class="navbar">
        <div class="container-fluid text-light me-5">
            <a class="navbar-brand text-light" href="/">Taskify</a>

            <a class="navbar-link text-light" href="/">TESTE</a>
            <a class="navbar-link text-light" href="/">TESTE2</a>
            <a class="navbar-link text-light" href="/">TESTE3</a>

        </div>
    </nav>
    @yield('content')
</body>

</html>
