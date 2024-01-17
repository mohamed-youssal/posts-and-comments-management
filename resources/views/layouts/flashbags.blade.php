@if (Session::has('message'))
    <script>
        // Trigger Toastr notification
        toastr.success("{{Session::get('message')}}");
    </script>
@endif