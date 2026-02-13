<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
<h1>admin Dashboard</h1>
<a href="/A_all_users">manage users</a>

<div class="space-y-4">
    <h1>All_the_categories</h1>
@forelse ($allcategories as $categorie)
        <div class="mb-4 border-b pb-2">
            <p class="text-sm font-medium">{{ $categorie->title }}</p>

            <form action="/delete_categorie/{{$categorie->id}}" method="POST" class="inline">
                @csrf
                <input type="submit" value="Delete" class="text-xs text-red-600 cursor-pointer">
            </form>

        </div>
    @empty
        <p class="text-sm text-gray-500">no categorie is created</p>
    @endforelse 
    




<div class="space-y-4">
      <h1>all_the_link</h1>    
        @forelse ($all_liens as $lien)
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


        <div class="space-y-4">
      <h1>the_trashed_link</h1>    
        @forelse ($only_trashed_liens as $lien_trashed)
            <div class="border p-3 rounded bg-white">
                <p class="text-sm font-medium">{{ $lien_trashed->title }}</p>
                <a href="{{ $lien_trashed->lien }}" target="_blank" class="text-sm text-blue-600 underline">
                    {{ $lien_trashed->lien }}
                </a>

                <form action="/delete_lien/{{$lien_trashed->id}}" method="POST" class="mt-2">
                    @csrf
                    <button type="submit" class="text-xs text-red-500 underline">
                        delete
                    </button>
                </form>
            </div>
        @empty
            <p class="text-sm text-gray-500">is empty</p>
        @endforelse
</body>
</html>