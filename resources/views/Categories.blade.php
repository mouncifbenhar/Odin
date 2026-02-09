<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 text-gray-800 p-6">

    <h1 class="text-lg font-semibold mb-4">Categories</h1>

    <form action="create_Categories" method="POST" class="mb-6 space-y-2">
        @csrf
        <label class="text-sm">Categories title:</label><br>
        <input type="text" name="title" class="border px-2 py-1 text-sm"><br>
        <input type="submit" value="create" class="border px-3 py-1 text-sm cursor-pointer"><br>
    </form>

    @if(session('success'))
        <p class="text-sm text-green-600 mb-4">
            {{ session('success') }}
        </p>
    @endif

    @forelse ($categories as $categorie)
        <div class="mb-4 border-b pb-2">
            <p class="text-sm font-medium">{{ $categorie->title }}</p>

            <form action="/delete_categorie/{{$categorie->id}}" method="POST" class="inline">
                @csrf
                <input type="submit" value="Delete" class="text-xs text-red-600 cursor-pointer">
            </form>

            <a href="/Edit_categorie/{{$categorie->id}}" class="text-xs underline ml-2">Edit</a><br>

            <a href="/assing_liens/{{$categorie->id}}" class="text-xs underline">
                Assing liens
            </a>
        </div>
    @empty
        <p class="text-sm text-gray-500">no categorie is created</p>
    @endforelse

</body>
</html>
