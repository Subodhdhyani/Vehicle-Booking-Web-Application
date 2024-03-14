<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Success</title>
    @include('include.favicon')
    @include('include.bootstrap')
</head>
<body>
   @if (session('success'))
    <script>
        alert("{{ session('success') }}");
    </script>
    {{--<meta http-equiv="refresh" content="3;url={{ route('main.page') }}">--}}
    @endif
<script>
  setTimeout(function() {
    window.location.href = "{{ route('createbrands') }}";
    }, 1000); 
</script>
</body>
</html>


