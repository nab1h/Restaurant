<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">إدارة المنتجات</h2>
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
                    <a href="{{ route('products.create') }}" class="bg-[#E60914] hover:bg-red-700 text-white px-6 py-2 rounded-lg text-sm font-bold transition">
                        <i class="fas fa-plus ml-2"></i> إضافة منتج
                    </a>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-right border-collapse">
                        <thead>
                            <tr class="border-b border-[#1a1a1a]">
                                <th class="p-4 text-gray-500 text-sm">الصورة</th>
                                <th class="p-4 text-gray-500 text-sm">الاسم</th>
                                <th class="p-4 text-gray-500 text-sm">التصنيف</th>
                                <th class="p-4 text-gray-500 text-sm">السعر</th>
                                <!-- عمود التايمر الجديد -->
                                <th class="p-4 text-gray-500 text-sm text-center">مدة العرض</th>
                                <th class="p-4 text-gray-500 text-sm">الحالة</th>
                                <th class="p-4 text-gray-500 text-sm text-center">الإجراءات</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-[#1a1a1a]">
                            @forelse($products as $item)
                            <tr class="hover:bg-[#1a1a1a] transition duration-200 group">
                                <td class="p-4">
                                    <img src="{{ $item->image_url }}" class="w-10 h-10 rounded object-cover border border-[#333]">
                                </td>
                                <td class="p-4">
                                    <div class="font-bold text-white">{{ $item->name_ar }}</div>
                                    <div class="text-xs text-gray-500">{{ $item->name_en }}</div>
                                </td>
                                <td class="p-4 text-gray-400 text-sm">{{ $item->category->name_ar ?? '-' }}</td>
                                <td class="p-4">
                                    @if($item->is_discount)
                                    <span class="text-red-500 line-through text-xs block">{{ $item->price }} $</span>
                                    <span class="text-[#D4AF37] font-bold">{{ $item->discount_price }} $</span>
                                    @else
                                    <span class="text-white font-bold">{{ $item->price }} $</span>
                                    @endif
                                </td>

                                <!-- خلية التايمر -->
                                <td class="p-4 text-center whitespace-nowrap">
                                    @if($item->is_discount && $item->offer_expires_at)
                                    @if(now()->gt($item->offer_expires_at))
                                    <span class="text-red-500 text-xs bg-red-500/10 px-2 py-1 rounded border border-red-500/20">
                                        <i class="fas fa-times-circle ml-1"></i> منتهي
                                    </span>
                                    @else
                                    <div class="admin-countdown inline-flex items-center gap-1 bg-[#0a0a0a] border border-[#333] rounded-md px-3 py-2 text-xs font-mono"
                                        data-expires="{{ $item->offer_expires_at }}" id="admin-timer-{{ $item->id }}">
                                        <span class="days text-white">00</span><span class="text-gray-500">ي</span>
                                        <span class="text-gray-600">:</span>
                                        <span class="hours text-white">00</span><span class="text-gray-500">س</span>
                                        <span class="text-gray-600">:</span>
                                        <span class="minutes text-white">00</span><span class="text-gray-500">د</span>
                                        <span class="text-gray-600">:</span>
                                        <span class="seconds text-[#D4AF37]">00</span><span class="text-gray-500">ث</span>
                                    </div>
                                    @endif
                                    @else
                                    <span class="text-gray-600 text-xs">-</span>
                                    @endif
                                </td>

                                <td class="p-4 text-center">
                                    @if($item->is_available)
                                    <span class="text-green-500 text-xs bg-green-500/10 px-2 py-1 rounded border border-green-500/20">متاح</span>
                                    @else
                                    <span class="text-gray-500 text-xs bg-gray-500/10 px-2 py-1 rounded border border-gray-500/20">غير متاح</span>
                                    @endif
                                </td>
                                <td class="p-4 text-center">
                                    <div class="flex items-center justify-center gap-3 opacity-100 lg:opacity-0 group-hover:opacity-100 transition">
                                        <a href="{{ route('products.edit', $item->id) }}" class="text-gray-400 hover:text-[#D4AF37]">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('products.destroy', $item->id) }}" method="POST" onsubmit="return confirm('هل أنت متأكد؟');">
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
                                <td colspan="7" class="p-8 text-center text-gray-500">لا توجد منتجات</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const timers = document.querySelectorAll('.admin-countdown');

            if (timers.length === 0) return;

            function updateAdminTimers() {
                timers.forEach(timer => {
                    const targetDate = new Date(timer.getAttribute('data-expires')).getTime();
                    const now = new Date().getTime();
                    const distance = targetDate - now;

                    if (distance < 0) {
                        timer.innerHTML = '<span class="text-red-500 text-xs">منتهي</span>';
                        return;
                    }

                    const days = Math.floor(distance / (1000 * 60 * 60 * 24));
                    const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                    const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                    const seconds = Math.floor((distance % (1000 * 60)) / 1000);

                    timer.querySelector('.days').innerText = days < 10 ? '0' + days : days;
                    timer.querySelector('.hours').innerText = hours < 10 ? '0' + hours : hours;
                    timer.querySelector('.minutes').innerText = minutes < 10 ? '0' + minutes : minutes;
                    timer.querySelector('.seconds').innerText = seconds < 10 ? '0' + seconds : seconds;
                });
            }

            updateAdminTimers();
            setInterval(updateAdminTimers, 1000);
        });
    </script>
</x-app-layout>
