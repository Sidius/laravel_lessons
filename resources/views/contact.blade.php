<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
{{--<form action="/l-1-5/send-email" method="post">--}}
<form action="{{ route('contact') }}" method="post">
{{--    {{ csrf_field() }}--}}
{{--    {{ method_field('PUT') }}--}}
    @method('PUT')
    @csrf
    <label>
        <input type="text" name="name">
    </label>
    <label>
        <input type="email" name="email">
    </label>
    <button type="submit">Submit</button>
</form>
</body>
</html>
