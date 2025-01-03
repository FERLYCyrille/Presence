@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Marquer votre présence</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('presence.store') }}">
        @csrf
        <button type="submit" class="btn btn-primary">Marquer ma présence</button>
    </form>

    <h2>Historique de présence</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Date</th>
                <th>Heure d'arrivée</th>
                <th>Heure de départ</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($presences as $presence)
                <tr>
                    <td>{{ $presence->date }}</td>
                    <td>{{ $presence->time_in }}</td>
                    <td>{{ $presence->time_out }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
