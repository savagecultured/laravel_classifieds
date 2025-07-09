<x-app-layout>
    <x-slot name="header">
        @if (session('message'))            
        <div class="bg-blue-200 text-gray-50 m-2 p-2 rounded-md">{{ session('message') }}</div>
        @endif
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('SubCategories') }}
        </h2>
    </x-slot>
    <!-- This file deals with the styling and table for Admin Categories.. -->

    <div class="container mx-auto">
        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block w-full sm:px-6 lg:px-8">
                    <div class="flex justify-end">
                        <a href="{{ route('subcategories.create') }}"
                        class="py-2 px-4 m-2 bg-blue-400 hover:bg-blue-200 text-gray-50 rounded-md">New Sub Category
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="w-full divide-y divide-gray-200 overflow-x-auto">
    <thead class="bg-gray-50">
        <tr>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Name
            </th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Slug
            </th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Image
            </th>
            <th scope="col" class="relative px-6 py-3">
                <span class="sr-only">Edit</span>    <!-- sr makes it invisible. Review if need be.. -->
            </th>
        </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200">
        @forelse ($sub_categories as $category)
        
        
        <tr>
            <td class="px-6 py-4 whitespace-nowrap">
                <div class="flex items-center">
                    {{ $category->name }}
                </div>
            </td>
            <td class="px-6 py-4 whitespace-nowrap">
                <div class="flex items-center">
                    {{ $category->slug }}
                </div>
            </td>
            <td class="px-6 py-4 whitespace-nowrap">
                <div class="flex items-center">
                   <img class="h-10 w-10 rounded-md" src="{{ Storage::url($category->image) }}">
                </div>
            </td>
           
            
            
            <td class="px-6 py-4 whitespace-nowrap  text-sm font-medium">
                <a href="{{ route('categories.edit', $category->id) }}" 
                    class="text-indigo-600 hover:text-indigo-900">Edit</a>
                    <form method="POST" action="{{ route('categories.destroy', $category->id) }}">
                                @csrf
                                @method('DELETE')

                                <a class="text-red-600 hover:text-red-900" 
                                    href="{{ route('categories.destroy', $category->id) }}"
                                         onclick="event.preventDefault();
                                                        this.closest('form').submit();">
                                    Delete
                                </a>
                              </form>
            </td>
            @empty
            <td><div class="m-2 p-2">No Sub Categories</div></td>
        </tr>
        @endforelse
        




        <!-- More rowsthis is index i wrongly put in admin category... -->

    </tbody>
                    </table>
                </div>        
            </div>
         </div>                   
    </div>    
</x-app-layout>