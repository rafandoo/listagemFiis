@section('title', 'Fiis Index')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        <!-- Fonte do Google -->
        <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">

        <!-- CSS Bootstrap -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

        <!-- CSS da aplicação -->
        <link rel="stylesheet" href="/css/style.css">
        <script src="/js/scripts.js"></script>
    </head>
    <body>
        <div id="search-container" class="col-md-12">
            <h1>Busque fiis</h1>
            <form action="">
                <input type="text" id="search" name="search" class="form-control" placeholder="Procurar...">
            </form>
        </div>
        <div class="col-md-10 offset-md-1 dashboard-fiis-container">
            <p>Confira nossas fiiss</p>
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">Código</th>
                    <th scope="col">Valor Atual</th>
                    <th scope="col">Valor mínimo</th>
                    <th scope="col">Valor máximo</th>
                    <th scope="col">Valorização</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($fiis as $fii)
                        <tr>
                            <th scope="row">{{ $fii->nome }}</th>
                            <td>{{ $fii->codigo }}</td>
                            <td>{{ $fii->v_atual }}</td>   
                            <td>{{ $fii->v_min }}</td> 
                            <td>{{ $fii->v_max }}</td>
                            <td>{{ $fii->valorizacao }}</td>  
                            <td>
                        </tr>   
                    @endforeach
                </tbody>
            </table>
        </div>
        <footer>
        <p>Lista de Fiis &copy; 2022</p>
        </footer>
        <script src="https://unpkg.com/ionicons@5.1.2/dist/ionicons.js"></script>
        @endsection
</body>