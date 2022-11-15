@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 my-2">
                <div class="card">
                    {{-- <div class="card-header">{{ __('Dashboard') }}</div> --}}
                    <div class="card-body">
                        <div class="card mb-3">
                            <img src="{{ isset($event->image) ? '/storage/'.$event->image  : '/images/01.jpg' }}" class="card-img-top" alt="{{ $event->title }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $event->title }}</h5>
                                <p class="card-text">
                                    {{$event->description}}
                                </p>
                                <p class="card-text">
                                    <small class="text-muted">
                                        Created {{ $event->created_at->diffForHumans() }}
                                    </small>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 my-2">
                <div class="card">
                    <div class="card-body">
                        <form class="border-bottom" method="POST" action="{{ route('event.create') }}">
                            @csrf
                            <div class="form-group">
                                <input type="text" class="form-control" id="exampleFormControlInput1"
                                    placeholder="search">
                            </div>
                        </form>
                        <div class="card my-2" style="width: 18rem;">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">An item</li>
                                <li class="list-group-item">A second item</li>
                                <li class="list-group-item">A third item</li>
                            </ul>
                        </div>
                        <div class="card mb-3" style="max-width: 540px;">
                            <div class="row no-gutters">
                                <div class="col-md-4 px-2 py-2">
                                    <img src="/images/01.jpg" alt="..."
                                        style="width: 100px;height:100px;border-radius:50%;">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">Card title</h5>
                                        <p class="card-text">This is a wider card with supporting text below as a natural
                                            lead-in to additional content. This content is a little bit longer.</p>
                                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
