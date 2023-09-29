<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Returned-Books') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    You can find here, all your returned books.
                </div>
            </div>
            
            <br>
            <br>

            <table class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Borrow</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($books as $book)
                        <tr>
                            <td>{{ $book->book->title }}</td>
                            <td>{{ $book->book->description }}</td>
                            <td>
                                <form action="{{ route('books.borrow', $book->id) }}" method="POST">
                                    @csrf
                                    @method('post')
                                    <!-- // style the icon to make it look like a button -->
                                    <button type="submit" class="text-gray-600 hover:text-gray-900">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                        </svg>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

        </div>
    </div>
</x-app-layout>
