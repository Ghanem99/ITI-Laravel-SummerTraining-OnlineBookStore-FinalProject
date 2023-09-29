


<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Update Books') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    You can update books here
                </div>
            </div>
<br>
            <form action="{{ route('books.update', $book->id) }}" method="POST">
                @csrf
                @method('PATCH')
                <div>
                    <label for="title">Title:</label>
                    <input type="text" name="title" id="title" value="{{ $book->title }}" required>
                </div>
                <div>
                    <label for="description">Description:</label>
                    <textarea name="description" id="description" rows="4" required>{{ $book->description }}</textarea>
                </div>
                <button type="submit" class="text-gray-600 hover:text-gray-900"> Update Book Details </button>
            </form>

            </div>
    </div>
</x-app-layout>
