@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 px-4">
                <p class="h1 font-weight-bolder text-success pb-3 mb-2 border-bottom">Create New Event</p>
            </div>
            <div class="col-12">
                {{-- <form method="POST" action="{{ route('event.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Event Title</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1"
                            placeholder="Event Title">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Example textarea</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-12">

                        </div>
                    </div>
                </form> --}}
                <form method="POST" action="{{ route('event.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            <label for="eventTitle">Title</label>
                            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                                id="eventTitle" placeholder="Enter Event Title" >
                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                                <label for="description">Description</label>
                                <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="description"
                                    placeholder="Enter Event Description" ></textarea>
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-lg-3 col-md-6 col-sm-12 mb-3">
                            <label for="startDate">Start Date</label>
                            <input type="date" class="form-control  @error('start_date') is-invalid @enderror"
                                name="start_date" id="startDate" aria-describedby="startDateFeedback" >
                            @error('start_date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12 mb-3">
                            <label for="endDate">End Date</label>
                            <input type="date" class="form-control @error('end_date') is-invalid @enderror"
                                name="end_date" id="endDate" aria-describedby="endDateFeedback" >
                            @error('end_date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                            <label for="eventImage">Upload Event Image</label>
                            <div class="input-group @error('event_file') is-invalid @enderror">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="eventImage" name="event_file"
                                        >
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

                    <button class="btn btn-primary" type="submit">Create Event</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')

<script>
    $(document).ready(function () {
        bsCustomFileInput.init()
    });
</script>
@endsection
