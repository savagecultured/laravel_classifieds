<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('New Category') }}
        </h2>
    </x-slot>

    <div class="container mx-auto">
        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block w-full sm:px-6 lg:px-8">
                    <div class="flex justify-start">
                        <a href="{{ route('categories.index') }}"
                        class="py-2 px-4 m-2 bg-blue-400 hover:bg-blue-200 text-gray-50 rounded-md">Back
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                </div>  
                <div class="space-y-8 divide-y divide-gray-200 w-1/2 mt-10">
                 <form class="m-2 p-2 shadow" enctype="multipart/form-data">
    <div class="sm:col-span-6">
      <label for="title" class="block text-sm font-medium text-gray-700"> Post Title </label>
      <div class="mt-1">
        <input type="text" id="title" name="title" class="block w-full transition duration-150 ease-in-out appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
      </div>
    </div>
    <div class="sm:col-span-6">
      <label for="title" class="block text-sm font-medium text-gray-700"> Post Image </label>
      <div class="mt-1">
        <input type="file" id="image" name="image" class="block w-full transition duration-150 ease-in-out appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
      </div>
    </div>
                 </form>
                 </div>


            </div>
         </div>                   
    </div>    
</x-app-layout>