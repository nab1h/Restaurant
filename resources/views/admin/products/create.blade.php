<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">إضافة منتج جديد</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-[#111] border border-[#1a1a1a] rounded-2xl overflow-hidden shadow-2xl p-8">
                <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    @if ($errors->any())
                    <div class="mb-4 bg-red-500/10 text-red-400 p-3 rounded text-sm">
                        {{ $errors->first() }}
                    </div>
                    @endif

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-4">
                        <!-- الاسم العربي -->
                        <div>
                            <label class="block text-gray-400 text-sm mb-2">الاسم (عربي)</label>
                            <input type="text" name="name_ar" value="{{ old('name_ar') }}" class="w-full bg-[#0a0a0a] border border-[#1a1a1a] rounded-lg px-4 py-3 text-white focus:border-[#E60914]" required>
                        </div>
                        <!-- الاسم الإنجليزي -->
                        <div>
                            <label class="block text-gray-400 text-sm mb-2">الاسم (إنجليزي)</label>
                            <input type="text" name="name_en" value="{{ old('name_en') }}" class="w-full bg-[#0a0a0a] border border-[#1a1a1a] rounded-lg px-4 py-3 text-white focus:border-[#E60914]" dir="ltr" required>
                        </div>
                    </div>

                    <!-- التصنيف -->
                    <div class="mb-4">
                        <label class="block text-gray-400 text-sm mb-2">التصنيف</label>
                        <select name="cat_id" class="w-full bg-[#0a0a0a] border border-[#1a1a1a] rounded-lg px-4 py-3 text-white focus:border-[#E60914]" required>
                            <option value="">اختر التصنيف...</option>
                            @foreach($categories as $cat)
                            <option value="{{ $cat->id }}" {{ old('cat_id') == $cat->id ? 'selected' : '' }}>
                                {{ $cat->name_ar }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- الوصف -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-4">
                        <div>
                            <label class="block text-gray-400 text-sm mb-2">الوصف (عربي)</label>
                            <textarea name="description_ar" rows="3" class="w-full bg-[#0a0a0a] border border-[#1a1a1a] rounded-lg px-4 py-3 text-white focus:border-[#E60914]" required>{{ old('description_ar') }}</textarea>
                        </div>
                        <div>
                            <label class="block text-gray-400 text-sm mb-2">الوصف (إنجليزي)</label>
                            <textarea name="description_en" rows="3" class="w-full bg-[#0a0a0a] border border-[#1a1a1a] rounded-lg px-4 py-3 text-white focus:border-[#E60914]" dir="ltr" required>{{ old('description_en') }}</textarea>
                        </div>
                    </div>

                    <!-- الأسعار والخصم وتاريخ الانتهاء -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-4">
                        <div>
                            <label class="block text-gray-400 text-sm mb-2">السعر الأساسي ($)</label>
                            <input type="number" step="0.01" name="price" value="{{ old('price') }}" class="w-full bg-[#0a0a0a] border border-[#1a1a1a] rounded-lg px-4 py-3 text-white focus:border-[#E60914]" required>
                        </div>

                        <div>
                            <div class="flex items-center mb-2">
                                <input type="checkbox" name="is_discount" id="is_discount" class="w-4 h-4 mr-2" {{ old('is_discount') ? 'checked' : '' }}>
                                <label for="is_discount" class="text-gray-400 text-sm">يوجد خصم؟</label>
                            </div>
                            <input type="number" step="0.01" name="discount_price" id="discount_price" value="{{ old('discount_price') }}" class="w-full bg-[#0a0a0a] border border-[#1a1a1a] rounded-lg px-4 py-3 text-white focus:border-[#E60914] placeholder-opacity-50" placeholder="سعر الخصم" disabled>
                        </div>

                        <!-- حقل التايمر الجديد -->
                        <div>
                            <label class="block text-gray-400 text-sm mb-2">تاريخ انتهاء العرض (التايمر)</label>
                            <input type="datetime-local" name="offer_expires_at" id="offer_expires_at"
                                value="{{ old('offer_expires_at') }}"
                                class="w-full bg-[#0a0a0a] border border-[#1a1a1a] rounded-lg px-4 py-3 text-white focus:border-[#E60914] opacity-50 cursor-not-allowed" disabled>
                        </div>
                    </div>

                    <!-- الصورة -->
                    <div class="mb-4">
                        <label class="block text-gray-400 text-sm mb-2">صورة المنتج</label>
                        <input type="file" name="image" class="w-full text-gray-400 text-sm" accept="image/*">
                        <p class="text-xs text-gray-600 mt-1">* ملاحظة: في حالة الخطأ، يجب اختيار الصورة مرة أخرى (لأسباب أمنية).</p>
                    </div>

                    <!-- التفعيل -->
                    <div class="mb-6 flex items-center">
                        <input type="checkbox" name="is_available" id="is_available" checked class="w-4 h-4 text-[#E60914] bg-[#1a1a1a] border-[#333] rounded" {{ old('is_available') ? 'checked' : '' }}>
                        <label for="is_available" class="mr-2 text-gray-300">المنتج متاح للعرض</label>
                    </div>

                    <div class="flex justify-end gap-4">
                        <a href="{{ route('products.index') }}" class="text-gray-400 hover:text-white">إلغاء</a>
                        <button type="submit" class="bg-[#E60914] hover:bg-red-700 text-white px-6 py-2 rounded-lg font-bold">حفظ المنتج</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const discountCheck = document.getElementById('is_discount');
            const discountInput = document.getElementById('discount_price');
            const timerInput = document.getElementById('offer_expires_at'); // جلب حقل التايمر

            function toggleDiscountState() {
                if (discountCheck.checked) {
                    discountInput.disabled = false;
                    discountInput.classList.remove('opacity-50');

                    timerInput.disabled = false;
                    timerInput.classList.remove('opacity-50', 'cursor-not-allowed');
                } else {
                    discountInput.disabled = true;
                    discountInput.classList.add('opacity-50');

                    // تفريغ الحقل وتعطيله عند إزالة الخصم
                    timerInput.disabled = true;
                    timerInput.classList.add('opacity-50', 'cursor-not-allowed');
                    timerInput.value = '';
                }
            }

            // تشغيل الدالة عند تحميل الصفحة لضبط الحالة الأولية
            toggleDiscountState();

            // الاستماع لتغييرات الـ Checkbox
            discountCheck.addEventListener('change', toggleDiscountState);
        });
    </script>
</x-app-layout>
