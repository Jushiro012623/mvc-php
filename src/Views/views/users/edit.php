
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User | Edit</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="relative h-screen">
    <form class="shadow-lg p-10 absolute top-1/2 left-1/2 -translate-x-1/2 w-[500px]  -translate-y-1/2 " action="/users/<?= $user['id']?>" method="POST"  >
        <input type="hidden" name="_method" value="PUT">
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full px-3">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
                Name
            </label>
            <input required class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="text" id="name" name="name" placeholder="<?= $user['name'] ?>">
            </div>
        </div>
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full px-3">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
                Email Address
            </label>
            <input required class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="email" id="email" name="email" placeholder="<?= $user['email'] ?>">
            </div>
        </div>
        <input type="submit" class="w-full px-3 py-2 bg-slate-800 text-white" name="update_user" value="Save Changes">
    </form>
</body>
</html>