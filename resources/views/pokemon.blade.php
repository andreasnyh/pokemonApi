<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <title>{{ env('APP_NAME') }}</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body class="text-center">
<h1 class="mt-4">{{ucfirst($pokemon->name) }} [id:{{ $pokemon->id }}]</h1>
<img src="{{ $pokemon->sprites->front_default }}"/>
<br>
<table class="table w-75 ml-auto mr-auto">
    <thead class="thead-light">
    <tr>
        <th colspan="4">All of {{ucfirst($pokemon->name)}}s Moves!</th>

    </tr>

    </thead>
    <tbody>
    <tr>
        @foreach($pokemon->moves as $moves)

            @if(($loop->iteration % 4) == 0)
                <td>
                    {{ucfirst($moves->move->name)}}
                </td>
    <tr>
        @else
            <td>
                {{ucfirst($moves->move->name)}}
            </td>
        @endif
        @endforeach

    </tr>
    </tbody>
</table>
</body>
</html>
