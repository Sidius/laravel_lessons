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

<h1>Hello World</h1>
{{--<p><?=$res ?? null?></p>--}}
{{--<p><?=$name ?? null?></p>--}}

{{ $res ?? null }} <br>
{{ $name ?? null }} <br>

{{--{{ route('post', ['id' => 3, 'slug' => 'test-2']) }} <br>--}}
{{--{{ route('admin.post', ['id' => 3]) }} <br>--}}

</body>
</html>
