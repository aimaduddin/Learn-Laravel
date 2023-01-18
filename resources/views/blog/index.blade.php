<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>
<body>
    {{-- @if (count($posts)<100)
            <h1>{{ dd($posts) }}
    @elseif (count($posts) === 202)
            <h1>You have exactly 202 posts</h1>
    @else
            <h1>No posts</h1>
    @endif --}}

    {{-- @unless ($posts)
        <h1> Posts has been added </h1>
    @endunless --}}

    @forelse ($posts as $post)
        {{ $loop->depth }} 
        {{-- index / iteration / remaining / first / last / depth / parent--}}
        {{ $post->title }} <br>
    @empty
        <p>No posts have been set</p>
    @endforelse
</body>
</html>