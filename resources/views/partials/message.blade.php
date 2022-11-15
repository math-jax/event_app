
@if (Session::get('success'))
    <script>
        new Noty({
            type: 'success',
            layout: 'topRight',
            text: '{{ Session::get('success') }}'
        }).show();
    </script>
@endif

@if ($errors->any())
    @foreach ($errors->all() as $error)
        <script>
            new Noty({
                type: 'error',
                layout: 'topRight',
                text: '{{ $error }}'
            }).show();
        </script>
    @endforeach
@endif
