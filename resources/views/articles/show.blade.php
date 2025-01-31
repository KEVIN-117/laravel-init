@extends('main')

@section('content')
    <div
        class="w-[80%] mx-auto flex flex-col justify-center items-center h-auto p-10 backdrop-blur-2xl bg-slate-950/50 rounded-xl border-2 border-indigo-600">
        <img class="mx-auto h-10 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600"
            alt="Your Company">
        <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">
            Get Article
        </h2>
        <div class="rounded-xl border-2 border-slate-800 p-10 shadow-2xl shadow-slate-800">
            <div
                class="flex flex-col items-center justify-between border-2 p-3  border-slate-900 rounded-xl divide-y-2 divide-slate-900">

                <div class="flex w-full justify-between items-center py-5">
                    <h3 class="text-lg font-medium text-slate-500">Title</h3>
                    <p class="text-lg text-slate-800">{{ $article->title }}</p>
                </div>


                <div class="flex w-full justify-between items-center py-5">
                    <h3 class="text-lg font-medium text-slate-500">Content</h3>
                    <p class="text-lg ml-auto w-[50%] text-slate-800">{{ $article->content }}</p>
                </div>

                <div class="flex w-full justify-between items-center py-5">
                    <h3 class="text-lg font-medium text-slate-500">Published</h3>
                    <p class="text-lg text-slate-800">{{ $article->is_published ? 'Yes' : 'No' }}
                    </p>
                </div>
            </div>
            <div>
                <h3 class="text-2xl font-bold text-center text-slate-500 border-b-2 border-slate-800 pb-2 mt-6 mb-4">
                    Actions</h3>
                <div class="flex justify-evenly items-center w-full mx-auto">
                    <a href="/articles"
                        class="text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-2xl px-5 py-2.5 text-center me-2 mb-2">
                        Back
                    </a>
                    <a href="/articles/{{ $article->id }}/edit"
                        class="text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-2xl px-5 py-2.5 text-center me-2 mb-2">
                        Edit
                    </a>
                    <form action="/articles/{{ $article->id }}/delete" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-2xl px-5 py-2.5 text-center me-2 mb-2">
                            Delete Article
                        </button>
                    </form>
                </div>
            </div>
        </div>
    @endsection
