@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <p class="h1 font-weight-bolder text-success pb-3 mb-2 border-bottom">All Events</p>
            </div>
            @foreach ($events as $event)
                <div class="col-md-3">
                    <div class="card my-2" style="width: 18rem;">
                        <a href="{{ route('event.show', $event->id) }}" target="_blank">
                            <img class="card-img-top"
                                src="{{ isset($event->image) ? '/storage/' . $event->image : '/images/01.jpg' }}"
                                alt="Card image cap">
                        </a>
                        <div class="card-body">
                            <p class="card-text h3 font-weight-bolder">
                                {{ $event->title }}
                            </p>
                            <p class="card-text">
                                {{ Str::limit($event->description, 50, $end = '...') }}
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="row my-3">
                <div class="col-12"> {{ $events->links() }}</div>
            </div>

        </div>
    </div>
@endsection
