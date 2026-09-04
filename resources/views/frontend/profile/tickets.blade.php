@extends('frontend.layout.master')

@section('section')
<div class="min-h-screen bg-[#0B0B14] py-12 px-4 sm:px-6 lg:px-8 text-white relative">
    <div class="max-w-5xl mx-auto space-y-8">
        
        {{-- Flash Messages --}}
        @if(session('success'))
            <div class="bg-emerald-950/60 border border-emerald-500/40 text-emerald-300 px-4 py-3 rounded-2xl text-sm flex items-center justify-between">
                <span>{{ session('success') }}</span>
            </div>
        @endif
        
        {{-- Page Header --}}
        <div class="flex flex-col md:flex-row items-start md:items-center justify-between gap-4 bg-[#121222] border border-gray-800/80 rounded-3xl p-6 sm:p-8 shadow-xl backdrop-blur-xl relative overflow-hidden">
            <div class="absolute top-0 right-0 w-80 h-80 bg-purple-600/10 rounded-full blur-3xl pointer-events-none"></div>
            <div>
                <a href="{{ route('user.profile') }}" class="inline-flex items-center gap-2 text-xs font-semibold text-purple-400 hover:text-purple-300 mb-3 transition">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                    Back to Profile
                </a>
                <h1 class="text-2xl sm:text-3xl font-extrabold text-white tracking-tight">My Booked Tickets</h1>
                <p class="text-sm text-gray-400 mt-1">Manage all your active and past event bookings in one place.</p>
            </div>
            <div class="flex items-center gap-2 bg-[#18182f] border border-gray-800 p-1.5 rounded-2xl">
                <button class="px-4 py-2 bg-purple-600 text-white text-xs font-semibold rounded-xl shadow">All Tickets</button>
                <button class="px-4 py-2 text-gray-400 hover:text-white text-xs font-semibold rounded-xl transition">Upcoming</button>
            </div>
        </div>

        {{-- Ticket List Container --}}
        <div class="space-y-4">
            @forelse($tickets as $ticket)
                <div class="bg-[#121222] border border-gray-800/80 rounded-3xl p-5 sm:p-6 shadow-xl backdrop-blur-xl flex flex-col md:flex-row items-center justify-between gap-6 transition hover:border-purple-500/40">
                    
                    {{-- Event Thumb & Info --}}
                    <div class="flex flex-col sm:flex-row items-center gap-5 w-full md:w-auto text-center sm:text-left">
                        <img src="{{ $ticket['image'] }}" alt="{{ $ticket['event_title'] }}" class="w-24 h-24 sm:w-28 sm:h-28 rounded-2xl object-cover border border-gray-800 shadow-md">
                        <div class="space-y-1.5">
                            <div class="flex flex-wrap items-center justify-center sm:justify-start gap-2">
                                @if($ticket['status'] == 'Confirmed')
                                    <span class="px-2.5 py-0.5 bg-emerald-950 text-emerald-400 border border-emerald-500/30 rounded-full text-[10px] font-bold uppercase tracking-wider">
                                        {{ $ticket['status'] }}
                                    </span>
                                @elseif($ticket['status'] == 'Cancelled')
                                    <span class="px-2.5 py-0.5 bg-rose-950 text-rose-400 border border-rose-500/30 rounded-full text-[10px] font-bold uppercase tracking-wider">
                                        {{ $ticket['status'] }}
                                    </span>
                                @else
                                    <span class="px-2.5 py-0.5 bg-amber-950 text-amber-400 border border-amber-500/30 rounded-full text-[10px] font-bold uppercase tracking-wider">
                                        {{ $ticket['status'] }}
                                    </span>
                                @endif
                                <span class="text-xs text-gray-400 font-mono">Code: {{ $ticket['ticket_code'] }}</span>
                            </div>
                            <h3 class="text-lg font-bold text-white tracking-tight">{{ $ticket['event_title'] }}</h3>
                            <p class="text-xs text-gray-400 flex items-center justify-center sm:justify-start gap-1.5">
                                <svg class="w-4 h-4 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                {{ $ticket['date'] }} at {{ $ticket['time'] }}
                            </p>
                            <p class="text-xs text-gray-400 flex items-center justify-center sm:justify-start gap-1.5">
                                <svg class="w-4 h-4 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                {{ $ticket['location'] }}
                            </p>
                        </div>
                    </div>

                    {{-- Pricing & Action Buttons --}}
                    <div class="flex flex-row md:flex-col items-center md:items-end justify-between w-full md:w-auto border-t md:border-t-0 pt-4 md:pt-0 border-gray-800 gap-4">
                        <div class="text-left md:text-right">
                            <span class="block text-xs text-gray-400">Qty: <span class="text-white font-semibold">{{ $ticket['quantity'] }}</span></span>
                            <span class="text-lg font-extrabold text-purple-400">{{ $ticket['total_price'] }}</span>
                        </div>
                        <div class="flex flex-wrap items-center justify-end gap-2">
                            {{-- View Details Button --}}
                            <button onclick="openTicketModal('{{ $ticket['event_title'] }}', '{{ $ticket['ticket_code'] }}', '{{ $ticket['date'] }}', '{{ $ticket['time'] }}', '{{ $ticket['location'] }}', '{{ $ticket['quantity'] }}', '{{ $ticket['total_price'] }}', '{{ $ticket['status'] }}', '{{ $ticket['image'] }}')" class="px-3 py-2 bg-[#1f1f38] hover:bg-[#282848] text-purple-300 border border-purple-500/30 text-xs font-semibold rounded-xl transition flex items-center gap-1">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                                Details
                            </button>

                            {{-- Download PDF Button --}}
                            <button onclick="alert('Downloading ticket PDF...')" class="px-3.5 py-2 bg-gradient-to-r from-purple-600 to-indigo-600 hover:from-purple-500 hover:to-indigo-500 text-white text-xs font-semibold rounded-xl shadow-lg shadow-purple-600/30 transition flex items-center gap-1">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                                PDF
                            </button>

                            {{-- Cancel Ticket Button --}}
                            @if($ticket['status'] != 'Cancelled')
                                <button onclick="if(confirm('Are you sure you want to cancel this ticket?')) { alert('Ticket cancelled successfully!'); }" class="px-3.5 py-2 bg-[#1f1f38] hover:bg-rose-950/80 text-rose-400 hover:text-rose-300 border border-rose-500/30 text-xs font-semibold rounded-xl transition flex items-center gap-1">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                                    Cancel
                                </button>
                            @endif
                        </div>
                    </div>

                </div>
            @empty
                <div class="bg-[#121222] border border-gray-800/80 rounded-3xl p-12 text-center space-y-3">
                    <p class="text-gray-400 text-sm">No booked tickets found.</p>
                </div>
            @endforelse
        </div>

    </div>

    {{-- Ticket Details Modal --}}
    <div id="ticketModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black/70 backdrop-blur-sm hidden px-4">
        <div class="bg-[#121222] border border-gray-800 rounded-3xl max-w-lg w-full p-6 sm:p-8 shadow-2xl relative space-y-6">
            <button onclick="closeTicketModal()" class="absolute top-5 right-5 text-gray-400 hover:text-white bg-[#18182f] p-2 rounded-xl border border-gray-800">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>

            <div class="flex items-center gap-4">
                <img id="modalImage" src="" class="w-16 h-16 rounded-2xl object-cover border border-gray-800">
                <div>
                    <span id="modalStatus" class="px-2.5 py-0.5 rounded-full text-[10px] font-bold uppercase tracking-wider"></span>
                    <h2 id="modalTitle" class="text-lg font-bold text-white mt-1"></h2>
                    <p id="modalCode" class="text-xs text-gray-400 font-mono"></p>
                </div>
            </div>

            <div class="bg-[#18182f] border border-gray-800/80 rounded-2xl p-4 space-y-3 text-xs">
                <div class="flex justify-between border-b border-gray-800 pb-2">
                    <span class="text-gray-400">Date & Time:</span>
                    <span id="modalDateTime" class="text-white font-medium"></span>
                </div>
                <div class="flex justify-between border-b border-gray-800 pb-2">
                    <span class="text-gray-400">Location:</span>
                    <span id="modalLocation" class="text-white font-medium text-right"></span>
                </div>
                <div class="flex justify-between border-b border-gray-800 pb-2">
                    <span class="text-gray-400">Quantity:</span>
                    <span id="modalQty" class="text-white font-medium"></span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-400">Total Amount:</span>
                    <span id="modalPrice" class="text-purple-400 font-bold"></span>
                </div>
            </div>

            <div class="text-center space-y-2">
                <div class="inline-block bg-white p-3 rounded-2xl shadow">
                    {{-- Mock QR Code --}}
                    <svg class="w-28 h-28 text-black" viewBox="0 0 24 24" fill="currentColor"><path d="M2 2h8v8H2V2m2 2v4h4V4H4m10-2h8v8h-8V2m2 2v4h4V4h-4M2 14h8v8H2v-8m2 2v4h4v-4H4m14-2h4v2h-4v-2m-4 2h2v2h-2v-2m4 4h4v2h-4v-2m-4 0h2v4h-2v-4m6-6h2v2h-2v-2m-2 4h2v2h-2v-2z"/></svg>
                </div>
                <p class="text-[11px] text-gray-500">Scan this QR code at the event entrance gate</p>
            </div>
        </div>
    </div>
</div>

<script>
    function openTicketModal(title, code, date, time, location, qty, price, status, image) {
        document.getElementById('modalTitle').innerText = title;
        document.getElementById('modalCode').innerText = 'Code: ' + code;
        document.getElementById('modalDateTime').innerText = date + ' at ' + time;
        document.getElementById('modalLocation').innerText = location;
        document.getElementById('modalQty').innerText = qty;
        document.getElementById('modalPrice').innerText = price;
        document.getElementById('modalImage').src = image;

        let statusBadge = document.getElementById('modalStatus');
        statusBadge.innerText = status;
        if(status === 'Confirmed') {
            statusBadge.className = 'px-2.5 py-0.5 bg-emerald-950 text-emerald-400 border border-emerald-500/30 rounded-full text-[10px] font-bold uppercase tracking-wider';
        } else {
            statusBadge.className = 'px-2.5 py-0.5 bg-rose-950 text-rose-400 border border-rose-500/30 rounded-full text-[10px] font-bold uppercase tracking-wider';
        }

        document.getElementById('ticketModal').classList.remove('hidden');
    }

    function closeTicketModal() {
        document.getElementById('ticketModal').classList.add('hidden');
    }
</script>
@endsection