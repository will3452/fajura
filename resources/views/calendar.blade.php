@extends('layouts.app')
@section('content')
    <div class="text-center mt-4 uppercase ">
        <h1 class="text-2xl">Legend</h1>
        <div class="flex justify-center">   
            <div class="mx-2">
                Not Yet <span class="bg-green-500 w-4 h-4 inline-block"></span>
            </div>
            <div class="mx-2">
                Done <span class="bg-blue-500 w-4 h-4 inline-block"></span>
            </div>
            {{-- <div class="mx-2">
                Expired <span class="bg-red-500 w-4 h-4 inline-block"></span>
            </div> --}}
        </div>
    </div>
    <div class="flex justify-center p-6">
        <div id="calendar" class="w-full max-w-6xl md:max-w-1/2"></div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('fullcalendar/main.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('fullcalendar/main.min.css') }}">
    <script>
        let calendarE = document.getElementById('calendar');
        let calendar = new FullCalendar.Calendar(calendarE, {
            // initialView:'listWeek',
            headerToolbar: { center: 'dayGridMonth,timeGridWeek'},
            // dateClick: function() {
            //     alert('a day has been clicked!');
            // },
            events: [
                // {
                // title: 'Meeting',
                // start: '2021-03-16T14:30:00',
                // extendedProps: {
                //     status: 'done'
                // }
                // },
                // {
                // title: 'Birthday Party',
                // start: '2021-03-15T07:00:00',
                // backgroundColor: 'green',
                // borderColor: 'green'
                // }
                @foreach ($events as $event)
                    {
                        title: `{{ $event->attendee_name }}`,
                        start: `{{ $event->datetime }}`,
                        @if($event->status == 'done')
                        backgroundColor: 'blue',
                        borderColor: 'blue'
                        @elseif($event->status != 'done')
                        backgroundColor: 'green',
                        borderColor: 'green'
                        @endif
                    },
                @endforeach
                
            ],
            
        })
        calendar.render();
    </script>
@endpush