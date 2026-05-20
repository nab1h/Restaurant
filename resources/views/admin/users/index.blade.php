<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('إدارة المستخدمين') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if (session('status'))
            <div class="mb-6 bg-green-500/10 border border-green-500/20 text-green-400 rounded-lg p-4 text-center">
                {{ session('status') }}
            </div>
            @endif

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($users as $user)
                <!-- كرت المستخدم -->
                <div class="bg-[#111] border border-[#1a1a1a] rounded-2xl p-6 relative overflow-hidden group hover:border-[#E60914]/50 transition duration-300">

                    <!-- زر الحذف (أعلى اليمين) -->
                    <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('هل أنت متأكد من حذف هذا المستخدم؟');" class="absolute top-4 right-4">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-gray-600 hover:text-red-500 transition">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>

                    <!-- الصورة الرمزية -->
                    <div class="flex flex-col items-center mb-6">
                        <div class="w-20 h-20 rounded-full bg-[#222] border-2 border-[#E60914] flex items-center justify-center text-2xl font-bold text-white mb-3 shadow-[0_0_15px_rgba(230,9,20,0.3)]">
                            {{ substr($user->name, 0, 1) }}
                        </div>

                        <h3 class="text-xl font-bold text-white">{{ $user->name }}</h3>

                        <!-- دور المستخدم -->
                        <span class="mt-1 px-3 py-1 rounded-full text-xs font-semibold
                                {{ $user->role === 'admin' ? 'bg-purple-500/10 text-purple-400 border border-purple-500/20' : 'bg-blue-500/10 text-blue-400 border border-blue-500/20' }}">
                            {{ $user->role === 'admin' ? 'مدير' : 'مستخدم' }}
                        </span>

                        <p class="text-gray-500 text-sm mt-2">{{ $user->email }}</p>
                    </div>

                    <hr class="border-[#1a1a1a] my-4">

                    <!-- التحكم في الصلاحية (Role) -->
                    <div class="mb-4">
                        <label class="block text-gray-400 text-xs uppercase tracking-wider mb-2 text-center">الصلاحية (Role)</label>

                        <form action="{{ route('admin.users.update-role', $user->id) }}" method="POST">
                            @csrf
                            <div class="relative">
                                <select name="role" onchange="this.form.submit()"
                                    class="w-full bg-[#0a0a0a] border border-[#333] rounded-lg px-3 py-2 text-sm text-white focus:outline-none focus:border-[#E60914] appearance-none cursor-pointer text-center font-bold">

                                    <option value="user" {{ $user->role === 'user' ? 'selected' : '' }}>
                                        <i class="fas fa-user"></i> مستخدم
                                    </option>
                                    
                                    <option value="sales" {{ $user->role === 'sales' ? 'selected' : '' }}>
                                        Sales (مبيعات)
                                    </option>

                                    <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>
                                        <i class="fas fa-user-shield"></i> مدير (Admin)
                                    </option>

                                </select>
                                <!-- سهم القائمة المنسدلة المخصص -->
                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-[#E60914]">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                    </svg>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- قسم تغيير كلمة المرور (داخل الكرت) -->
                    <form action="{{ route('admin.users.update-password', $user->id) }}" method="POST" class="mt-2">
                        @csrf
                        <label class="block text-gray-400 text-xs uppercase tracking-wider mb-2 text-center">تغيير كلمة المرور</label>

                        <div class="relative mb-2">
                            <input type="password" name="new_password" placeholder="كلمة المرور الجديدة"
                                class="w-full bg-[#0a0a0a] border border-[#333] rounded-lg px-3 py-2 text-sm text-white focus:outline-none focus:border-[#E60914] transition text-center"
                                required autocomplete="new-password">
                        </div>

                        <button type="submit" class="w-full bg-[#1a1a1a] hover:bg-[#E60914] text-white text-xs py-2 rounded-lg border border-[#333] hover:border-[#E60914] transition duration-300 flex items-center justify-center gap-2">
                            <i class="fas fa-key"></i> تحديث
                        </button>
                    </form>

                </div>
                @empty
                <div class="col-span-full text-center text-gray-500 py-10">
                    لا يوجد مستخدمين حالياً.
                </div>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>
