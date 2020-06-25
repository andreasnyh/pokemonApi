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
        <th colspan="4">{{ucfirst($pokemon->name)}}s Starter Moves!</th>
        {{--        <th colspan="4">All of {{ucfirst($pokemon->name)}}s Possible Moves!</th>--}}

    </tr>

    </thead>
    <tbody>
    <tr>
        @foreach($pokemon->moves as $moves)
            @if($moves->version_group_details[0]->version_group->name == "red-blue" &&
                $moves->version_group_details[0]->level_learned_at == 1)

                <td>
                    {{ucfirst($moves->move->name)}}
                </td>

            @endif
        @endforeach

    </tr>
    </tbody>
</table>

<table class="table w-75 ml-auto mr-auto">
    <thead class="thead-light">
    <tr>
        <th colspan="4">All of {{ucfirst($pokemon->name)}}s Possible Moves in Pokémon Red & Blue!</th>
    </tr>

    </thead>
    <tbody>
    <tr>
        <?php
            $counter = 0
        ?>
        @foreach($pokemon->moves as $moves)
            @if($moves->version_group_details[0]->version_group->name == "red-blue")

                @if($counter != 0 && ($counter % 4) == 0)
                    <tr>
                    <td>
                        {{ucfirst($moves->move->name)}}
                    </td>
        <?php
        $counter = $counter +1
        ?>
        @else
            <td>
                {{ucfirst($moves->move->name)}}
            </td>
            <?php
            $counter = $counter +1
            ?>
        @endif
        @endif
        @endforeach

    </tr>
    </tbody>
</table>
</body>
</html>
