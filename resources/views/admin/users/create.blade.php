

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add New Books') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    You can create a new user 
                </div>
            </div>
<br>
        <form action="{{ route('users.create') }}" method="POST">
         @csrf
         
         <div>
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" required>
         </div>
            <div>
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" required>
            </div>
            
            <div>
                <label for="is_admin">Is Admin:</label>
                <input type="number" name="is_admin" id="is_admin" required>
            </div>
         
            <button type="submit" class="text-gray-600 hover:text-gray-900"> Add a new Admin </button>
      </form>

            </div>
    </div>
</x-app-layout>
