@extends('layouts.app')
@section('content')
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
                        extendsProps:{
                            status:'done'
                        }
                    },
                @endforeach
                
            ],
            
        })
        calendar.render();
    </script>
@endpush