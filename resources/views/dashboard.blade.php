<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 text-gray-800 min-h-screen p-6 max-w-xl mx-auto space-y-8">
   @if(auth()->user()->role->contains('role', 'admin'))
    <a href="/A_dashboard" class="text-sm text-yellow-600 underline">manage</a>
     @endif
    <!-- Navigation -->
    <nav class="space-y-2">
        <a href="/categories_page" class="block text-sm underline">
            Categories page
        </a>
        <a href="/liens_page" class="block text-sm underline">
            Liens page
        </a>
    </nav>

    <!-- Create tag -->
    <form action="/create_tag" method="POST" class="bg-white border rounded p-4 space-y-3">
        @csrf

        <div>
            <label class="block text-sm mb-1">Tag</label>
            <input type="text" name="tag" class="w-full border rounded px-2 py-1 text-sm">
        </div>

        <button type="submit" class="text-sm bg-gray-800 text-white px-3 py-1 rounded">
            Create tag
        </button>
    </form>

    @if(session('success'))
        <p class="text-sm text-green-600">
            {{ session('success') }}
        </p>
    @endif

    <a href="/bin_page" class="text-sm text-red-600 underline">Trash</a>

    <form action="/logout" method="POST">
        @csrf
        <button class="text-sm text-red-600 underline">
            Logout
        </button>
    </form>
  
</body>
</html>

