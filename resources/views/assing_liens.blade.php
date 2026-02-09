<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category Links</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 text-gray-800 p-6">

    <h1 class="text-lg font-semibold mb-4">
        {{ $categorie->title }}:
    </h1>

    @forelse ($liens as $lien)
        <div class="mb-4 border-b pb-3">

            <p class="text-sm">
                <nav class="space-y-1">
                    <a href="/add_tag_to_lien/{{$lien->id}}" class="underline font-medium">
                        {{ $lien->title }}:
                    </a><br>

                    <a href="{{$lien->lien}}" target="_blank" class="text-blue-600 underline">
                        {{ $lien->lien }}
                    </a>
                </nav>
            </p>

            <form action="/delete_lien/{{$lien->id}}" method="POST" class="mt-2">
                @csrf
                <input type="submit" value="delete"
                       class="text-xs text-red-600 cursor-pointer">
            </form>

        </div>
    @empty
        <p class="text-sm text-gray-500">is empty</p>
    @endforelse

</body>
</html>
