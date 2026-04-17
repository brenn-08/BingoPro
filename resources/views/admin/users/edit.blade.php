@extends('layouts.admin')

@section('title', 'Edit User')

@section('content')
<div class="bg-white shadow sm:rounded-lg p-8 max-w-2xl">
    <h2 class="text-2xl font-bold mb-6">Edit User: {{ $user->name }}</h2>
    
    <form method="POST" action="{{ route('admin.users.update', $user) }}">
        @csrf @method('PATCH')
        
        <div class="mb-6">
            <label class="block text-sm font-medium text-gray-700 mb-2">Name</label>
            <input type="text" name="name" value="{{ $user->name }}" 
                   class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
        </div>
        
        <div class="mb-6">
            <label class="block text-sm font-medium text-gray-700 mb-2">Email</label>
            <input type="email" name="email" value="{{ $user->email }}" 
                   class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
        </div>
        
        <div class="mb-8">
            <label class="block text-sm font-medium text-gray-700 mb-4">Roles</label>
            @foreach($roles as $role)
                <label class="flex items-center p-3 bg-gray-50 rounded-xl mb-2">
                    <input type="checkbox" name="roles[]" value="{{ $role->name }}"
                           {{ $user->hasRole($role->name) ? 'checked' : '' }}
                           class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                    <span class="ml-3 text-sm font-medium">{{ ucfirst($role->name) }}</span>
                </label>
            @endforeach
        </div>
        
        <div class="flex space-x-4">
            <button type="submit" class="flex-1 bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-xl">
                Update User
            </button>
            <a href="{{ route('admin.users.index') }}" 
               class="flex-1 bg-gray-500 hover:bg-gray-600 text-white font-bold py-3 px-6 rounded-xl text-center">
                Cancel
            </a>
        </div>
    </form>
</div>
@endsection