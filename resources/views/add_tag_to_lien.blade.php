<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assign Tag</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 text-gray-800 p-6">

    <form action="/assign_tag_to_link/{{$lien->id}}" method="POST" class="mb-6 space-y-2">
        @csrf

        <label class="text-sm block">add tag to this link</label>

        <select name="tag_id" class="border px-2 py-1 text-sm">
            @forelse ($tags as $tag)
                <option value="{{$tag->id}}">{{$tag->tag}}</option>
            @empty
                <option>you have to add tag</option>
            @endforelse
        </select>

        <br>

        <input type="submit" value="add"
               class="border px-3 py-1 text-sm cursor-pointer">
    </form>

    <h1 class="text-sm font-semibold mb-2">link tags</h1>

    @forelse ($tags_to_link as $tag_to_link)
        <p class="text-sm border-b py-1">{{$tag_to_link->tag}}</p>
    @empty
        <p class="text-sm text-gray-500">empty</p>
    @endforelse

</body>
</html>
