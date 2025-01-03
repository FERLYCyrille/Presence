@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Liste des Présences</h1>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Utilisateur</th>
                <th>Date</th>
                <th>Heure d'arrivée</th>
                <th>Heure de départ</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($presences as $presence)
                <tr>
                    <td>{{ $presence->user->name }}</td>
                    <td>{{ $presence->date }}</td>
                    <td>{{ $presence->time_in }}</td>
                    <td>{{ $presence->time_out }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
