<x-app-layout>
    <x-slot name="header">
        <div class="bg-gradient-to-r from-blue-50 to-blue-100 -mx-4 -my-2 px-4 py-6">
            <h2 class="font-semibold text-2xl text-blue-900 leading-tight">
                {{ $category->name }}
            </h2>
            <p class="text-blue-700 mt-1">Add some salt and pepper</p>
        </div>
    </x-slot>

    <div class="min-h-screen bg-gradient-to-br from-blue-50 via-white to-blue-50">
        <div class="container mx-auto px-4 py-8">
            <!-- Back Button -->
            <div class="mb-6">
                <a href="{{ route('categories.index') }}"
                   class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg shadow-sm transition-colors duration-200">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                    Back to Categories
                </a>
            </div>

            <!-- Main Form Card -->
            <div class="max-w-2xl mx-auto">
                <div class="bg-white shadow-xl rounded-2xl border border-blue-100 overflow-hidden">
                    <div class="bg-gradient-to-r from-blue-600 to-blue-700 px-8 py-6">
                        <h3 class="text-xl font-semibold text-white">Category Information</h3>
                        <p class="text-blue-100 mt-1">Fill in the details for your new category</p>
                    </div>

                    <form action="{{ route('categories.update', $category->id) }}" method="POST" enctype="multipart/form-data" class="p-8">
                        @csrf
                        @method('PUT')
                        
                        <div class="space-y-8">
                            <!-- Category Name -->
                            <div class="space-y-2">
                                <label for="name" class="block text-sm font-semibold text-blue-900">
                                    Category Name
                                </label>
                                <div class="relative">
                                    <input type="text" 
                                           name="name" 
                                           id="name" 
                                           class="w-full px-4 py-3 border border-blue-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 bg-blue-50/30 placeholder-blue-400" 
                                           value="{{ $category->name }}"
                                           required />
                                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                        <svg class="w-5 h-5 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                                        </svg>
                                    </div>
                                </div>
                            </div>

                            <!-- Category Image -->
                            <div class="space-y-2">
                                <label for="image" class="block text-sm font-semibold text-blue-900">
                                    Category Image
                                </label>
                                <div class="w-full m-2 p-2">
                                    <img class="h-32 w-32" src="{{ Storage::url($category->image) }}">
                                </div>
                                <div class="space-y-4">
                                    <!-- Image Preview -->
                                    <div id="imagePreview" class="hidden">
                                        <div class="relative inline-block">
                                            <img id="previewImg" class="w-32 h-32 object-cover rounded-lg border-2 border-blue-200 shadow-sm" />
                                            <button type="button" 
                                                    id="removeImage"
                                                    class="absolute -top-2 -right-2 w-6 h-6 bg-red-500 hover:bg-red-600 text-white rounded-full flex items-center justify-center text-sm transition-colors duration-200">
                                            
                                            </button>
                                        </div>
                                    </div>
                                    
                                    <!-- Upload Area -->
                                    <div id="uploadArea" class="relative">
                                        <input type="file" 
                                               id="image" 
                                               name="image" 
                                               accept="image/*"
                                               class="hidden" />
                                        <label for="image" 
                                               class="flex flex-col items-center justify-center w-full h-32 border-2 border-dashed border-blue-300 rounded-lg cursor-pointer bg-blue-50 hover:bg-blue-100 transition-colors duration-200">
                                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                                <svg class="w-8 h-8 mb-3 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                                </svg>
                                                <p class="mb-2 text-sm text-blue-600 font-medium">
                                                    <span>Click to upload</span> or drag and drop
                                                </p>
                                                <p class="text-xs text-blue-500">PNG, JPG, GIF up to 5MB</p>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex items-center justify-end space-x-4 mt-8 pt-6 border-t border-blue-100">
                            <button type="button" 
                                    onclick="history.back()"
                                    class="px-6 py-3 text-blue-600 font-medium hover:text-blue-700 hover:bg-blue-50 rounded-lg transition-colors duration-200">
                                Cancel
                            </button>
                            <button type="submit" 
                                    class="px-8 py-3 bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white font-semibold rounded-lg shadow-lg hover:shadow-xl transition-all duration-200 transform hover:scale-105">
                                Edit Category
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const imageInput = document.getElementById('image');
            const imagePreview = document.getElementById('imagePreview');
            const previewImg = document.getElementById('previewImg');
            const uploadArea = document.getElementById('uploadArea');
            const removeButton = document.getElementById('removeImage');

            // Handle file selection
            imageInput.addEventListener('change', function(e) {
                const file = e.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        previewImg.src = e.target.result;
                        imagePreview.classList.remove('hidden');
                        uploadArea.classList.add('hidden');
                    };
                    reader.readAsDataURL(file);
                }
            });

            // Handle image removal
            removeButton.addEventListener('click', function() {
                imageInput.value = '';
                imagePreview.classList.add('hidden');
                uploadArea.classList.remove('hidden');
            });

            // Handle drag and drop
            const uploadLabel = uploadArea.querySelector('label');
            
            uploadLabel.addEventListener('dragover', function(e) {
                e.preventDefault();
                uploadLabel.classList.add('border-blue-500', 'bg-blue-200');
            });

            uploadLabel.addEventListener('dragleave', function(e) {
                e.preventDefault();
                uploadLabel.classList.remove('border-blue-500', 'bg-blue-200');
            });

            uploadLabel.addEventListener('drop', function(e) {
                e.preventDefault();
                uploadLabel.classList.remove('border-blue-500', 'bg-blue-200');
                
                const files = e.dataTransfer.files;
                if (files.length > 0) {
                    const file = files[0];
                    if (file.type.startsWith('image/')) {
                        imageInput.files = files;
                        imageInput.dispatchEvent(new Event('change'));
                    }
                }
            });
        });
    </script>
</x-app-layout>