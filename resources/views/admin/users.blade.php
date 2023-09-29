<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    You can find here all the Users in the library.
                </div>
            </div>
<br>

            <a href="{{ route('users.create') }}" class="text-gray-600 hover:text-gray-900"> Add a new user </a>

            <table class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Admin</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->is_admin }}</td>
                            <td>
                                <form action="{{ route('users.edit', $user->id) }}" method="GET">
                                    @csrf
                                    @method('GET')    
                                    <button type="submit" class="text-gray-600 hover:text-gray-900"> Edit User Details </button>
                                
                                </form>

                            </td>
                            <td>
                                <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-gray-600 hover:text-gray-900"> Delete User </button>
                                
                                </form>
                            </td>

                            
                            
                        </tr>
                    @endforeach
                </tbody>
            </div>
    </div>
</x-app-layout>
