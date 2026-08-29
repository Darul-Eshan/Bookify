@extends('backend.layout.master')

@section('content')
<div class="space-y-8" x-data="{ 
    coupons: [
        { id: 1, code: 'EID2026', discount: '20%', type: 'Percentage', limit: '150 Used', status: 'active', expiry: '25 Jun, 2026' },
        { id: 2, code: 'TECH500', discount: '৳500', type: 'Fixed Amount', limit: '45 Used', status: 'active', expiry: '10 Jul, 2026' }
    ],
    toggleStatus(coupon) {
        coupon.status = coupon.status === 'active' ? 'inactive' : 'active';
    }
}">
    <!-- Page Header -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-white tracking-tight">Coupons & Promos</h1>
        </div>
    </div>

    <!-- 1. Top Section: Create Coupon Form Box -->
    <div class="bg-[#121222] border border-gray-800 rounded-2xl p-6 shadow-xl">
        <div class="mb-4 pb-3 border-b border-gray-800">
            <h3 class="text-base font-bold text-white flex items-center gap-2">
                <svg class="w-5 h-5 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                Create New Promo Code
            </h3>
        </div>

        <form action="#" method="POST" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 items-end">
            @csrf
            <div>
                <label class="block text-xs font-medium text-gray-300 mb-1.5">Coupon Code</label>
                <input type="text" name="code" placeholder="e.g. SUMMER50" required class="w-full bg-[#18182f] border border-gray-800 rounded-xl px-4 py-2.5 text-sm text-white uppercase focus:outline-none focus:border-purple-500">
            </div>
            <div>
                <label class="block text-xs font-medium text-gray-300 mb-1.5">Discount Value</label>
                <input type="text" name="discount" placeholder="e.g. 15% or ৳300" required class="w-full bg-[#18182f] border border-gray-800 rounded-xl px-4 py-2.5 text-sm text-white focus:outline-none focus:border-purple-500">
            </div>
            <div>
                <label class="block text-xs font-medium text-gray-300 mb-1.5">Expiry Date</label>
                <input type="date" name="expiry_date" required class="w-full bg-[#18182f] border border-gray-800 rounded-xl px-4 py-2.5 text-sm text-white focus:outline-none focus:border-purple-500">
            </div>
            <div>
                <button type="submit" class="w-full px-5 py-2.5 bg-purple-600 hover:bg-purple-700 text-white rounded-xl text-sm font-semibold shadow-lg shadow-purple-600/30 transition flex items-center justify-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                    Create
                </button>
            </div>
        </form>
    </div>

    <!-- 2. Bottom Section: Coupon Boxes / Cards Grid -->
    <div class="space-y-4">
        <div class="flex items-center justify-between">
            <h3 class="text-lg font-bold text-white">Active Promo Codes List</h3>
            <span class="text-xs px-3 py-1 bg-purple-500/10 text-purple-400 border border-purple-500/20 rounded-full font-semibold">Total: 2 Coupons</span>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
            <template x-for="coupon in coupons" :key="coupon.id">
                <div class="bg-[#121222] border border-gray-800 rounded-2xl p-5 shadow-xl flex flex-col justify-between space-y-4 hover:border-purple-500/50 transition">
                    <div>
                        <div class="flex items-center justify-between mb-3">
                            <div class="px-3 py-1 bg-purple-600/20 text-purple-400 font-mono font-bold rounded-xl border border-purple-500/30 text-sm tracking-wider" x-text="coupon.code"></div>
                            
                            <!-- Status Badge -->
                            <span :class="coupon.status === 'active' ? 'bg-emerald-500/10 text-emerald-400 border-emerald-500/20' : 'bg-amber-500/10 text-amber-400 border-amber-500/20'" 
                                  class="px-2.5 py-1 border rounded-full text-xs font-semibold capitalize" 
                                  x-text="coupon.status"></span>
                        </div>
                        <h4 class="text-xl font-bold text-white mt-2" x-text="coupon.discount + ' OFF'"></h4>
                        <p class="text-xs text-gray-400 mt-1">Usage Limit: <span class="text-gray-200" x-text="coupon.limit"></span></p>
                    </div>

                    <div class="flex items-center justify-between pt-3 border-t border-gray-800">
                        <span class="text-xs text-gray-500">Exp: <span x-text="coupon.expiry"></span></span>
                        
                        <div class="flex items-center gap-2">
                            <!-- Active/Deactive Toggle Button -->
                            <button @click="toggleStatus(coupon)" 
                                    :class="coupon.status === 'active' ? 'bg-amber-500/20 text-amber-400 border-amber-500/30 hover:bg-amber-500/30' : 'bg-emerald-500/20 text-emerald-400 border-emerald-500/30 hover:bg-emerald-500/30'" 
                                    class="px-3 py-1.5 border rounded-xl text-xs font-semibold transition">
                                <span x-text="coupon.status === 'active' ? 'Deactive' : 'Active'"></span>
                            </button>

                            <!-- Delete Button -->
                            <form action="#" method="POST" onsubmit="return confirm('Delete this coupon?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-3 py-1.5 bg-red-600/20 hover:bg-red-600/30 text-red-400 border border-red-500/30 rounded-xl text-xs font-semibold transition" style="background-color: rgba(220, 38, 38, 0.15); color: #f87171;">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </template>
        </div>
    </div>
</div>
@endsection