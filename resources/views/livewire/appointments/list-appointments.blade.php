<div id="controlls" class="flex justify-center md:justify-end overflow-x-auto">
    @php
        $menu = request()->menu ?? 3;
    @endphp
    <a  href="{{ url()->current().'?menu=1' }}" class="flex items-center py-1 px-2 mx-1 @if($menu == 1) active @endif"><img src="/img/icons/select-all.svg" class="w-4 h-4" alt=""> <div class="ml-1">All</div></a>
    <a  href="{{ url()->current().'?menu=2' }}" class="flex items-center py-1 px-2 mx-1 @if($menu == 2) active @endif"><img src="/img/icons/check.svg" class="w-4 h-4" alt=""> <div class="ml-1">Done</div>
    @if (\App\Models\Appointment::where('status', 'done')->count())
        <span class="text-xs text-blue-300 rounded-full w-4 h-4 flex justify-center items-center ml-1">{{ \App\Models\Appointment::where('status', 'done')->count() }}</span>
    @endif
    </a>
    <a  href="{{ url()->current().'?menu=3' }}" class="flex items-center py-1 px-2 mx-1 @if($menu == 3) active @endif"><img src="/img/icons/time-left.svg" class="w-4 h-4" alt=""> <div class="ml-1">Undone</div> 
     @if (\App\Models\Appointment::where('status','!=', 'done')->count())
        <span class="text-xs rounded-full text-blue-300 w-4 h-4 flex justify-center items-center ml-1">{{ \App\Models\Appointment::where('status', '!=', 'done')->count() }}</span>
    @endif
</a>
    {{-- <a  href="#" class="flex items-center py-1 px-2 mx-1 @if($menu == 4) active @endif"><img src="/img/icons/sort.svg" class="w-4 h-4" alt=""> <div class="ml-1">Sort</div></a> --}}
</div>
<div id="list">
    @if(!count($appointments))
        <div class="bg-yellow-100 text-yellow-900 py-4 px-6 rounded mt-6">
            No Appointment Available.
        </div>
    @endif
    @foreach ($appointments as $appointment)
        @livewire('appointments.list-appointments-item', ['appointment'=>$appointment], key($appointment->id))
    @endforeach
</div>