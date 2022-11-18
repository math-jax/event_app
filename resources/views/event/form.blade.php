@extends('layouts.app')

@section('body')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 px-4">
                <p class="h1 font-weight-bolder text-success pb-3 mb-2 border-bottom">
                    {{ isset($event) ? 'Edit ' . $event->title : 'Create New Event' }}</p>
            </div>
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form method="POST"
                            action="{{ isset($event) ? route('event.update', $event->id) : route('event.store') }}"
                            enctype="multipart/form-data">
                            @csrf
                            @isset($event)
                                @method('PUT')
                            @endisset
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label class="font-weight-bold" for="eventTitle">Title</label>
                                    <input type="text" name="title"
                                        class="form-control @error('title') is-invalid @enderror" id="eventTitle"
                                        placeholder="Enter Event Title"
                                        value="{{ isset($event) ? $event->title : old('title') }}">
                                    @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label class="font-weight-bold" for="description">Description</label>
                                    <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="description"
                                        placeholder="Enter Event Description">{{ isset($event) ? $event->description : old('description') }}</textarea>
                                    @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-lg-3 col-md-6 col-sm-12 mb-3">
                                    <label class="font-weight-bold" for="startDate">Start Date</label>
                                    <input type="date" class="form-control  @error('start_date') is-invalid @enderror"
                                        name="start_date" id="startDate" aria-describedby="startDateFeedback"
                                        value="{{ isset($event) ? $event->start_date->toDateString() : old('start_date') }}">
                                    @error('start_date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-lg-3 col-md-6 col-sm-12 mb-3">
                                    <label class="font-weight-bold" for="endDate">End Date</label>
                                    <input type="date" class="form-control @error('end_date') is-invalid @enderror"
                                        name="end_date" id="endDate" aria-describedby="endDateFeedback"
                                        value="{{ isset($event) ? $event->end_date->toDateString() : old('end_date') }}">
                                    @error('end_date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-lg-3 col-md-6 col-sm-12 mb-3">
                                    <label class="font-weight-bold" for="venue">Location of the Event (Venue)</label>
                                    <input type="text" class="form-control  @error('start_date') is-invalid @enderror"
                                        name="venue" id="venue" aria-describedby="venueFeedback"
                                        value="{{ isset($event) ? $event->venue : old('venue') }}">
                                    @error('venue')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-lg-3 col-md-6 col-sm-12 mb-3">
                                    <label class="font-weight-bold" for="eventImage">Upload Event Image</label>
                                    <div class="input-group @error('event_file') is-invalid @enderror">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="eventImage"
                                                name="event_file"
                                                value="{{ isset($event) ? $event->image : old('event_file') }}">
                                            <label class="custom-file-label" for="eventImage">Choose file...</label>
                                        </div>
                                    </div>
                                    @error('end_date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <button class="btn btn-primary"
                                type="submit">{{ isset($event) ? 'Update Event' : 'Create Event' }}</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            bsCustomFileInput.init()
        });
    </script>
@endsection
