<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Category</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 text-gray-800 min-h-screen flex items-center justify-center">

    <form action="/edit_Categories/{{$categorie->id}}" method="POST"
          class="w-full max-w-sm bg-white p-5 rounded border space-y-3">
        @csrf

        <div>
            <label class="block text-sm mb-1">Category title</label>
            <input
                type="text"
                name="title"
                value="{{ $categorie->title }}"
                class="w-full border rounded px-2 py-1 text-sm">
        </div>

        <button type="submit"
                class="w-full text-sm bg-gray-800 text-white py-1.5 rounded">
            Edit
        </button>
    </form>

</body>
</html>
