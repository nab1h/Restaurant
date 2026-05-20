<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">إدارة التصنيفات</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('status'))
            <div class="mb-6 bg-green-500/10 border border-green-500/20 text-green-400 rounded-lg p-4 text-center">
                {{ session('status') }}
            </div>
            @endif

            <div class="bg-[#111] border border-[#1a1a1a] rounded-xl overflow-hidden shadow-2xl p-6">
                <div class="flex justify-end mb-6">
                    <a href="{{ route('categories.create') }}" class="bg-[#E60914] hover:bg-red-700 text-white px-6 py-2 rounded-lg text-sm font-bold transition">
                        <i class="fas fa-plus ml-2"></i> إضافة تصنيف
                    </a>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-right border-collapse">
                        <thead>
                            <tr class="border-b border-[#1a1a1a]">
                                <th class="p-4 text-gray-500 text-sm">الصورة</th>
                                <th class="p-4 text-gray-500 text-sm">الاسم (عربي)</th>
                                <th class="p-4 text-gray-500 text-sm">الاسم (إنجليزي)</th>
                                <th class="p-4 text-gray-500 text-sm text-center">الحالة</th>
                                <th class="p-4 text-gray-500 text-sm text-center">الإجراءات</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-[#1a1a1a]">
                            @forelse($categories as $item)
                            <tr class="hover:bg-[#1a1a1a] transition duration-200 group">
                                <td class="p-4">
                                    <img src="{{ $item->image_url }}" alt="{{ $item->name_ar }}" class="w-12 h-12 rounded-lg object-cover border border-[#333]">
                                </td>

                                <td class="p-4 font-medium text-white">{{ $item->name_ar }}</td>

                                <td class="p-4 text-gray-400" dir="ltr">{{ $item->name_en }}</td>

                                <td class="p-4 text-center">
                                    @if($item->is_active)
                                    <span class="text-green-500 text-xs border border-green-500/20 bg-green-500/10 px-2 py-1 rounded">نشط</span>
                                    @else
                                    <span class="text-red-500 text-xs border border-red-500/20 bg-red-500/10 px-2 py-1 rounded">موقف</span>
                                    @endif
                                </td>

                                <!-- الأزرار -->
                                <td class="p-4 text-center">
                                    <div class="flex items-center justify-center gap-3 opacity-100 lg:opacity-0 group-hover:opacity-100 transition">
                                        <a href="{{ route('categories.edit', $item->id) }}" class="text-gray-400 hover:text-[#D4AF37]">
                                            <i class="fas fa-edit"></i>
                                        </a>

                                        <form action="{{ route('categories.destroy', $item->id) }}" method="POST" onsubmit="return confirm('هل أنت متأكد؟');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-gray-400 hover:text-red-500">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="p-8 text-center text-gray-500">لا توجد تصنيفات</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
