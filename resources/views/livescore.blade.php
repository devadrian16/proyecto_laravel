@extends('layouts.api')

@section('title', 'LiveScore')

@section('css')
<link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
@endsection

@section('content')
<div class="container">

    <?php
    //header('Refresh: 240');
    $semana = ['Domingo', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado'];
    $mes = ['-', 'Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];
    ?>

    <div class="card">
        <div class="card-header">
            Partidos {{ $semana[date('w', strtotime($fecha))] }}, {{ $dia }} {{ $mes[date('n', strtotime($fecha))] }} {{ $anno }}
        </div>
        
        <div class="card-body">

            @if(count($laliga) != 0)
            <div class="card">
                <div class="card-header">La Liga</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table style="width: 75%; margin: 0 auto;" class="table">
                            <tbody>
                                @foreach($laliga as $match)
                                @if($match['fixture']['status']['short'] == '1H' or $match['fixture']['status']['short'] == 'HT' or $match['fixture']['status']['short'] == '2H' || $match['fixture']['status']['short'] == 'ET' || $match['fixture']['status']['short'] == 'P')
                                <tr>
                                    <td class="text-center">{{ $match['fixture']['status']['long'] }}</td>
                                    <td style="color: crimson;" class="parpadeo text-center">{{ $match['fixture']['status']['elapsed'] }}'</td>
                                    <td class="text-end">
                                        {{ $match['teams']['home']['name'] }}
                                        <a style="text-decoration: none; color: black;">
                                            <img src="{{ $match['teams']['home']['logo'] }}" alt="{{ $match['teams']['home']['name'] }}" style="width: 25px; height: 25px;">
                                        </a>
                                    </td>
                                    <td class="text-center">
                                        <div class="livescore">
                                            {{ $match['goals']['home'] }} : {{ $match['goals']['away'] }}
                                        </div>
                                    </td>
                                    <td>
                                        <a style="text-decoration: none; color: black;">
                                            <img src="{{ $match['teams']['away']['logo'] }}" alt="{{ $match['teams']['away']['name'] }}" style="width: 25px; height: 25px;">
                                        </a>
                                        {{ $match['teams']['away']['name'] }}
                                    </td>
                                </tr>
                                @else
                                <tr>
                                    <td class="text-center">{{ date('H:i', strtotime($match['fixture']['date'])) }}</td>
                                    <td>{{$match['fixture']['status']['short']}}</td>
                                    <td class="text-end">
                                        {{ $match['teams']['home']['name'] }}
                                        <a style="text-decoration: none; color: black;">
                                            <img src="{{ $match['teams']['home']['logo'] }}" alt="{{ $match['teams']['home']['name'] }}" style="width: 25px; height: 25px;">
                                        </a>
                                    </td>
                                    <td class="text-center">
                                        {{ $match['goals']['home'] }} : {{ $match['goals']['away'] }}
                                    </td>
                                    <td>
                                        <a style="text-decoration: none; color: black;">
                                            <img src="{{ $match['teams']['away']['logo'] }}" alt="{{ $match['teams']['away']['name'] }}" style="width: 25px; height: 25px;">
                                        </a>
                                        {{ $match['teams']['away']['name'] }}
                                    </td>
                                </tr>
                                @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            @endif

            @if(count($segunda) != 0)
            <div class="card">
                <div class="card-header">Segunda Division</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table style="width: 75%; margin: 0 auto;" class="table">
                            <tbody>
                                @foreach($segunda as $match)
                                @if($match['fixture']['status']['short'] == '1H' || $match['fixture']['status']['short'] == 'HT' || $match['fixture']['status']['short'] == '2H' || $match['fixture']['status']['short'] == 'ET' || $match['fixture']['status']['short'] == 'P')
                                <tr>
                                    <td class="text-center">{{ $match['fixture']['status']['long'] }}</td>
                                    <td style="color: crimson;" class="parpadeo text-center">{{ $match['fixture']['status']['elapsed'] }}'</td>
                                    <td class="text-end">
                                        {{ $match['teams']['home']['name'] }}
                                        <a style="text-decoration: none; color: black;">
                                            <img src="{{ $match['teams']['home']['logo'] }}" alt="{{ $match['teams']['home']['name'] }}" style="width: 25px; height: 25px;">
                                        </a>
                                    </td>
                                    <td class="text-center">
                                        <div class="livescore">
                                            {{ $match['goals']['home'] }} : {{ $match['goals']['away'] }}
                                        </div>
                                    </td>
                                    <td>
                                        <a style="text-decoration: none; color: black;">
                                            <img src="{{ $match['teams']['away']['logo'] }}" alt="{{ $match['teams']['away']['name'] }}" style="width: 25px; height: 25px;">
                                        </a>
                                        {{ $match['teams']['away']['name'] }}
                                    </td>
                                </tr>
                                @else
                                <tr>
                                    <td class="text-center">{{ date('H:i', strtotime($match['fixture']['date'])) }}</td>
                                    <td></td>
                                    <td class="text-end">
                                        {{ $match['teams']['home']['name'] }}
                                        <a style="text-decoration: none; color: black;">
                                            <img src="{{ $match['teams']['home']['logo'] }}" alt="{{ $match['teams']['home']['name'] }}" style="width: 25px; height: 25px;">
                                        </a>
                                    </td>
                                    <td class="text-center">
                                        {{ $match['goals']['home'] }} : {{ $match['goals']['away'] }}
                                    </td>
                                    <td>
                                        <a style="text-decoration: none; color: black;">
                                            <img src="{{ $match['teams']['away']['logo'] }}" alt="{{ $match['teams']['away']['name'] }}" style="width: 25px; height: 25px;">
                                        </a>
                                        {{ $match['teams']['away']['name'] }}
                                    </td>
                                </tr>
                                @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            @endif

            @if(count($premier) != 0)
            <div class="card">
                <div class="card-header">Premier League</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table style="width: 75%; margin: 0 auto;" class="table">
                            <tbody>
                                @foreach($premier as $match)
                                @if($match['fixture']['status']['short'] == '1H' || $match['fixture']['status']['short'] == 'HT' || $match['fixture']['status']['short'] == '2H' || $match['fixture']['status']['short'] == 'ET' || $match['fixture']['status']['short'] == 'P')
                                <tr>
                                    <td class="text-center">{{ $match['fixture']['status']['long'] }}</td>
                                    <td style="color: crimson;" class="parpadeo text-center">{{ $match['fixture']['status']['elapsed'] }}'</td>
                                    <td class="text-end">
                                        {{ $match['teams']['home']['name'] }}
                                        <a style="text-decoration: none; color: black;">
                                            <img src="{{ $match['teams']['home']['logo'] }}" alt="{{ $match['teams']['home']['name'] }}" style="width: 25px; height: 25px;">
                                        </a>
                                    </td>
                                    <td class="text-center">
                                        <div class="livescore">
                                            {{ $match['goals']['home'] }} : {{ $match['goals']['away'] }}
                                        </div>
                                    </td>
                                    <td>
                                        <a style="text-decoration: none; color: black;">
                                            <img src="{{ $match['teams']['away']['logo'] }}" alt="{{ $match['teams']['away']['name'] }}" style="width: 25px; height: 25px;">
                                        </a>
                                        {{ $match['teams']['away']['name'] }}
                                    </td>
                                </tr>
                                @else
                                <tr>
                                    <td class="text-center">{{ date('H:i', strtotime($match['fixture']['date'])) }}</td>
                                    <td></td>
                                    <td class="text-end">
                                        {{ $match['teams']['home']['name'] }}
                                        <a style="text-decoration: none; color: black;">
                                            <img src="{{ $match['teams']['home']['logo'] }}" alt="{{ $match['teams']['home']['name'] }}" style="width: 25px; height: 25px;">
                                        </a>
                                    </td>
                                    <td class="text-center">
                                        {{ $match['goals']['home'] }} : {{ $match['goals']['away'] }}
                                    </td>
                                    <td>
                                        <a style="text-decoration: none; color: black;">
                                            <img src="{{ $match['teams']['away']['logo'] }}" alt="{{ $match['teams']['away']['name'] }}" style="width: 25px; height: 25px;">
                                        </a>
                                        {{ $match['teams']['away']['name'] }}
                                    </td>
                                </tr>
                                @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            @endif

        </div>
    </div>
</div>
@endsection