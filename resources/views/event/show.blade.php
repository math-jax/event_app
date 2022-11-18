@extends('layouts.app')

@section('body')
    <div class="container">
        <div class="card">
            <div class="card-header">
                {{ $event->title }}
            </div>
            <div class="card-body">
                <h5 class="card-title">{{ $event->description }}</h5>
                From : <p class="card-text">{{ $event->start_date->toDateString() }}</p>
                To: <p class="card-text">{{ $event->end_date->toDateString() }}</p>
                Location of the event (Venue): <p class="card-text">{{ $event->venue }}</p>
                <a href="/" class="btn btn-primary">Go to all Events</a>
            </div>
        </div>
    </div>
@endsection

@section('script')

@endsection
