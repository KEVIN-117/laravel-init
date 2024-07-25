<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Articles</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    @if (session('message'))
        <div class="bg-green-700/20 border-l-4 border-green-700 text-green-700 p-4" role="alert">
            <p class="font-bold">Success</p>
            <p>{{ session('message') }}</p>
        </div>
    @endif
    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <img class="mx-auto h-10 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600"
                alt="Your Company">
            <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">
                Edit Article
            </h2>
        </div>

        <div class="mt-10 w-[50%] mx-auto">
            <form class="space-y-6" action="/articles/{{$article->id}}" method="POST">
                @csrf
                <div>
                    <label for="title" class="block text-sm font-medium leading-6 text-gray-900">Article
                        Title</label>
                    <div class="mt-2">
                        <input id="title" name="title" type="text" value="{{ $article->title }}"
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>

                <div>
                    <label for="content" class="block text-sm font-medium leading-6 text-gray-900">Article
                        Content</label>
                    <div class="mt-2">
                        <textarea id="content" name="content"
                            class="block w-full h-[200px] rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">{{ $article->content }}</textarea>
                    </div>
                </div>

                <div class="flex justify-between w-full items-center">
                    <label for="is_published" class="block text-sm font-medium leading-6 text-gray-900">Article
                        Published?</label>
                    <div class="mt-2">
                        <input id="is_published" name="is_published" type="checkbox"
                            checked="{{ $article->is_published }}" value="{{ $article->is_published ? '1' : '0' }}">
                    </div>
                </div>

                <div class="flex flex-col gap-3">
                    <button type="submit"
                        class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Update
                        Article</button>
                    <a href="/articles"
                        class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                        Cancel Update
                    </a>
                </div>
            </form>
            @if ($errors->any())
                <h2 class="mt-10 text-center text-2xl leading-9 tracking-tight text-red-600 font-bold">
                    Errors Found
                </h2>
                <ul class="border-2 rounded-xl py-5 border-red-600 bg-red-600/20">
                    @foreach ($errors->all() as $error)
                        <li class="ml-5 text-base capitalize">{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>
</body>

</html>
