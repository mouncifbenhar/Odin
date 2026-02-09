<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Links</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 text-gray-800 p-6 max-w-2xl mx-auto space-y-8">

    <!-- Create link -->
    <form action="create_lien" method="POST" class="space-y-3 bg-white p-4 rounded border">
        @csrf

        <div>
            <label class="text-sm block">Title</label>
            <input type="text" name="title" class="w-full border rounded px-2 py-1 text-sm">
        </div>

        <div>
            <label class="text-sm block">Lien</label>
            <input type="text" name="lien" class="w-full border rounded px-2 py-1 text-sm">
        </div>

        <select name="categories_id" class="w-full border rounded px-2 py-1 text-sm">
            @forelse ($categories as $categorie)
                <option value="{{$categorie->id}}">{{$categorie->title}}</option>
            @empty
                <option>create categorie first</option>
            @endforelse
        </select>

        <button type="submit" class="text-sm bg-gray-800 text-white px-3 py-1 rounded">
            Create
        </button>
    </form>

    @if(session('success'))
        <p class="text-sm text-green-600">
            {{ session('success') }}
        </p>
    @endif

    <!-- Links list -->
    <div class="space-y-4">
        @forelse ($liens as $lien)
            <div class="border p-3 rounded bg-white">
                <p class="text-sm font-medium">{{ $lien->title }}</p>
                <a href="{{ $lien->lien }}" target="_blank" class="text-sm text-blue-600 underline">
                    {{ $lien->lien }}
                </a>

                <form action="/delete_lien/{{$lien->id}}" method="POST" class="mt-2">
                    @csrf
                    <button type="submit" class="text-xs text-red-500 underline">
                        delete
                    </button>
                </form>
            </div>
        @empty
            <p class="text-sm text-gray-500">is empty</p>
        @endforelse
    </div>

    <!-- Search -->
    <form action="/search" method="POST" class="space-y-3 bg-white p-4 rounded border">
        @csrf

        <input type="text" name="title" placeholder="title"
            class="w-full border rounded px-2 py-1 text-sm">

        <select name="categories_id" class="w-full border rounded px-2 py-1 text-sm">
            <option value="">select categorie</option>
            @forelse ($categories as $categorie)
                <option value="{{$categorie->id}}">{{$categorie->title}}</option>
            @empty
                <option>create categorie first</option>
            @endforelse
        </select>

        <select name="tag_id" class="w-full border rounded px-2 py-1 text-sm">
            <option value="">select tag</option>
            @forelse ($tags as $tag)
                <option value="{{$tag->id}}">{{$tag->tag}}</option>
            @empty
                <option>add tag first</option>
            @endforelse
        </select>

        <button type="submit" class="text-sm bg-gray-700 text-white px-3 py-1 rounded">
            Search
        </button>
    </form>

</body>
</html>
