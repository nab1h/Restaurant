<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">إضافة تصنيف جديد</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-[#111] border border-[#1a1a1a] rounded-2xl overflow-hidden shadow-2xl p-8">
                <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    @if ($errors->any())
                    <div class="mb-4 bg-red-500/10 text-red-400 p-3 rounded text-sm">
                        {{ $errors->first() }}
                    </div>
                    @endif

                    <div class="mb-4">
                        <label class="block text-gray-400 text-sm mb-2">الاسم (عربي)</label>
                        <input type="text" name="name_ar" class="w-full bg-[#0a0a0a] border border-[#1a1a1a] rounded-lg px-4 py-3 text-white focus:border-[#E60914] focus:outline-none" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-400 text-sm mb-2">الاسم (إنجليزي)</label>
                        <input type="text" name="name_en" class="w-full bg-[#0a0a0a] border border-[#1a1a1a] rounded-lg px-4 py-3 text-white focus:border-[#E60914] focus:outline-none" dir="ltr" required>
                    </div>

                    <div class="mb-6">
                        <label class="block text-gray-400 text-sm mb-2">صورة التصنيف</label>
                        <input type="file" name="image" id="imageInput" class="block w-full text-sm text-gray-400
                            file:mr-4 file:py-2 file:px-4
                            file:rounded-full file:border-0
                            file:text-sm file:font-semibold
                            file:bg-[#1a1a1a] file:text-white
                            hover:file:bg-[#333] cursor-pointer
                        " accept="image/*" required>

                        <!-- معاينة الصورة -->
                        <div id="imagePreview" class="mt-4 hidden">
                            <p class="text-xs text-gray-500 mb-2">معاينة:</p>
                            <img src="#" alt="Preview" class="w-32 h-32 object-cover rounded-lg border border-[#333]">
                        </div>
                    </div>

                    <!-- تفعيل -->
                    <div class="mb-6 flex items-center">
                        <input type="checkbox" name="is_active" id="is_active" checked class="w-4 h-4 text-[#E60914] bg-[#1a1a1a] border-[#333] rounded focus:ring-[#E60914]">
                        <label for="is_active" class="mr-2 text-gray-300">نشط</label>
                    </div>

                    <div class="flex justify-end gap-4">
                        <a href="{{ route('categories.index') }}" class="text-gray-400 hover:text-white">إلغاء</a>
                        <button type="submit" class="bg-[#E60914] hover:bg-red-700 text-white px-6 py-2 rounded-lg font-bold">حفظ</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('imageInput').addEventListener('change', function(e) {
            const file = e.target.files[0];
            const preview = document.getElementById('imagePreview');
            const img = preview.querySelector('img');

            if (file) {
                const url = URL.createObjectURL(file);
                img.src = url;
                preview.classList.remove('hidden');
            } else {
                preview.classList.add('hidden');
            }
        });
    </script>
</x-app-layout>
