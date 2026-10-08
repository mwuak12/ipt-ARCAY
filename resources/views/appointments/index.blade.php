@extends('layouts.app')

@section('content')
    <h3>List of Appointments</h3>

    <a href="{{ route('appointments.create') }}" class="btn btn-primary">
        Add Appointment
    </a>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table>
        <thead>
            <tr>
                <th>Patient</th>
                <th>Doctor</th>
                <th>Date</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
            @forelse($appointments as $appointment)
                <tr>
                    <td>{{ $appointment->patient?->name ?? 'Patient unavailable' }}</td>
                    <td>{{ $appointment->doctor?->name ?? 'Doctor unavailable' }}</td>
                    <td>{{ $appointment->appointment_date }}</td>
                    <td>{{ $appointment->status }}</td>
                    <td>
                        <a href="{{ route('appointments.edit', $appointment->id) }}" class="btn btn-warning">Edit</a>

                        <form action="{{ route('appointments.destroy', $appointment->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this appointment?')">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">No appointments found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
