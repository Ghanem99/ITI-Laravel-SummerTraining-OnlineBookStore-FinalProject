<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Books') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    You can find here all the Books in the library.
                </div>
            </div>

            <br>
            <a href="{{ route('books.create') }}" class="text-gray-600 hover:text-gray-900"> Add a new book </a>
            <table class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($books as $book)
                        <tr>
                            <td>{{ $book->title }}</td>
                            <td>{{ $book->description }}</td>
                            <td>
                                <form action="{{ route('books.edit', $book->id) }}" method="GET">
                                    @csrf
                                    @method('GET')    
                                    <button type="submit" class="text-gray-600 hover:text-gray-900"> Edit Book Details </button>
                                
                                </form>
                            </td>
                            <td>
                                <form action="{{ route('books.destroy', $book->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-gray-600 hover:text-gray-900"> Delete Book </button>
                                
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </div>
    </div>
</x-app-layout>
