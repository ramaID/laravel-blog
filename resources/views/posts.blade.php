<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog: Posts</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    @foreach ($years as $year => $posts)
        <x-post-list :year="$year" :posts="$posts" />
        <hr />
    @endforeach
</body>

</html>
