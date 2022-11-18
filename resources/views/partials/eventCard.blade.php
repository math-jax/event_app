<div class="card-deck" id="eventCard">
    @if ($events->isNotEmpty())
        @foreach ($events as $event)
            <div class="col-lg-4 col-md-6 col-sm-12 my-2 py-2">
                <div class="card">
                    <a href="{{ route('event.show', $event->id) }}" target="_blank">
                        <img src="{{ isset($event->image) ? '/storage/' . $event->image : '/images/01.jpg' }}"
                            class="card-img-top" alt="{{ $event->title }}">
                    </a>
                    <div class="card-body">
                        <h5 class="card-title font-weight-bolder h3">{{ $event->id.'-'.$event->title }}</h5>
                        <p class="card-text">{{ $event->description }}</p>
                        <p class="card-text"><small
                                class="text-muted">{{ $event->created_at->diffForHumans() }}</small>
                        </p>
                    </div>
                </div>
            </div>
        @endforeach
    @else
        <div class="col-lg-12 my-2 py-2">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title font-weight-bolder h3 text-danger">
                        No Events available
                    </h5>

                </div>
            </div>
        </div>
    @endif

</div>
