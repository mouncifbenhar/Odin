<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>trash page</h1>
    <div class="space-y-4">
        @forelse ($bin_links as $link)
            <div class="border p-3 rounded bg-white">
                <p class="text-sm font-medium">{{ $link->title }}</p>
                <a href="{{$link->lien }}" target="_blank" class="text-sm text-blue-600 underline">
                    {{$link->lien}}
                </a>

                <form action="/delete_lien/{{$link->id}}" method="POST" class="mt-2">
                    @csrf
                    <button type="submit" class="text-xs text-red-500 underline">
                        delete
                    </button>
                </form>
                <form action="/recover_lien/{{$link->id}}" method="POST" class="mt-2">
                    @csrf
                    <button type="submit" class="text-xs text-red-500 underline">
                        recover
                    </button>
                </form>
            </div>
        @empty
            <p class="text-sm text-gray-500">is empty</p>
        @endforelse
    </div>
</body>
</html>