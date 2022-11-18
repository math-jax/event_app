@extends('layouts.app')

@section('body')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <p class="h1 font-weight-bolder text-success pb-3 mb-2 border-bottom">All Events</p>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="filterEvent">Filter Events By</label>
                    </div>
                    <select class="custom-select" id="filterEvent">
                        <option value="0" selected>All Events</option>
                        <option value="1">Finished Events</option>
                        <option value="2">Finished Events in past last 7 days</option>
                        <option value="3">Upcoming Events</option>
                        <option value="4">Upcoming Events within 7 days</option>
                    </select>
                </div>
            </div>
            {{-- Content div to display html loaded via ajax --}}
            <div id="content"></div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function () {
            loadEvents();
        });

        //select input change function
        $('#filterEvent').change(function (e) {
            e.preventDefault();
            var id = $('#filterEvent').val();
            filterEvents(id);
        });

        //function to fetch filtered events based on value selected
        function filterEvents(id) {
            $.ajax({
                url: '/event/sort/'+ id,
                method: "GET",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: id,
                },
                success: function (response) {
                    $('#content').html(response);
                },
            });
        }

        //Load all events at page load
        function loadEvents() {
            $.ajax({
                url: '/all-events/',
                method: "GET",
                data: {
                    _token: '{{ csrf_token() }}',
                },
                success: function (response) {
                    $('#content').html(response);
                },
            });
        }

    </script>
@endsection
