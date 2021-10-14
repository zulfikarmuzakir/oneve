@extends('profile.master')

@section('content')
    List event

    <table border="1">
        <tr>
            <td>Nama Event</td>
        </tr>

        @foreach ($event as $item)
        <tr>
        <td>{{ $item->event_name }}</td>
        </tr>
       @endforeach
    </table>

@endsection