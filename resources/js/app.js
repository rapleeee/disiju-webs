require('./bootstrap');
import { Calendar } from '@fullcalendar/core';
import dayGridPlugin from '@fullcalendar/daygrid';
import interactionPlugin from '@fullcalendar/interaction';
import listPlugin from '@fullcalendar/list';

document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var calendar = new Calendar(calendarEl, {
        plugins: [dayGridPlugin, interactionPlugin, listPlugin],
        editable: true,
        events: '/admin/calendar/events', // Fetch events from the server
        dateClick: function(info) {
            var eventName = prompt('Enter Event Name:');
            if (eventName) {
                // Save the event to the server
                fetch('/admin/calendar/events', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({
                        title: eventName,
                        start: info.dateStr
                    })
                })
                .then(response => response.json())
                .then(data => {
                    calendar.addEvent(data);
                    alert('Event added successfully');
                })
                .catch(error => {
                    console.error('Error:', error);
                });
            }
        }
    });

    calendar.render();
});
