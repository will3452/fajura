<div class='p-6 pt-0 border-t-2 border-gray-100 md:border-0 md:shadow my-2 md:rounded  text-center md:text-left cursor-pointer' x-data="{isRemoved:false, showOption:false, showRSForm:false}" x-show.transition.duration.2000ms="!isRemoved" >
    <div class="flex justify-end">
        <button class="w-4 relative top-4" x-on:click="showOption = !showOption"><img src="/img/icons/more.svg" alt=""></button>
    </div>
    <div >
        <div class="flex justify-center md:justify-start">
            <h1 class="font-bold uppercase">{{ $appointment->attendee_name }}</h1>
            <div class="text-xs ml-2 capitalize">{{ $appointment->attendee_gender }}</div>
        </div>
        <div class="padding shadow flex flex-col w-full" x-show.transition = 'showOption' x-on:click.away = "showOption = false">
           <button class="py-2" x-on:click="showRSForm = !showRSForm">Reschedule</button>
            <div class="flex" x-show.transition = "showRSForm">
                <input type="datetime-local" class="input" wire:model="datetime"> <button x-on:click="showRSForm = false" class="bg-green-400 text-white p-2" wire:click="update()">Save</button>
            </div>
            <button class="py-2 hover:bg-red-500 hover:text-white" x-on:click="isRemoved=true" wire:click="delete()">Remove</button>
        </div>
        <p class="my-2 text-gray-800 text-xs"><img src="/img/icons/email.svg" alt="" class="w-4 h-4 inline-block"> {{ $appointment->attendee_email }}  - <img src="/img/icons/smartphone.svg" alt="" class="w-4 h-4 inline-block"> {{ $appointment->attendee_mobile }} </p>
        <p class="text-gray-800 text-xs">
            <img src="/img/icons/appointment.svg" alt="" class="w-4 h-4 inline-block"> {{ $appointment->date_and_time->format('M/d/y g:i A') }}
            <img src="/img/icons/location.svg" alt="" class="w-4 h-4 inline-block"> {{ $appointment->attendee_address }}</p>
        <div class="mt-2 flex flex-wrap justify-center md:justify-start">
            @foreach ($appointment->services as $item)
                <span class="m-1 py-1 px-2 text-sm border-l-2 border-gray-200">{{ $item->name }}</span>
            @endforeach
        </div>
    </div>
    @if (request()->menu == 3 || !request()->menu)
        <div class="flex justify-end">
            <button x-on:click="isRemoved = true" wire:click="done()" class="bg-blue-100 rounded w-full md:w-auto px-4 flex justify-center items-center text-xs"><img src="/img/icons/check.svg" alt="" class="w-4 py-2"> <span class="ml-2">Mark as Done</span></button>
        </div>
    @endif
</div>