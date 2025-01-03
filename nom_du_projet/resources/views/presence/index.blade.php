@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Marquer votre présence</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif


    <form method="POST" action="{{ route('presence.store') }}">
        @csrf
        <div class="form-group">
            <label for="time_in">Heure d'entrée</label>
            <input type="time" name="time_in" id="time_in" class="form-control" value="{{ old('time_in', now()->toTimeString()) }}">
        </div>

        <div class="form-group">
            <label for="time_out">Heure de départ</label>
            <input type="time" name="time_out" id="time_out" class="form-control">
        </div>

    <button type="submit" class="btn btn-primary">Enregistrer la présence</button>
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
