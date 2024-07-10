import { Calendar } from '@fullcalendar/core';
import dayGridPlugin from '@fullcalendar/daygrid';
import interactionPlugin from '@fullcalendar/interaction';
import listPlugin from '@fullcalendar/list';

document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    // Get the user role from the meta tag
    var userRole = document.querySelector('meta[name="user-role"]').getAttribute('content');

    if (calendarEl) {
        var calendar = new Calendar(calendarEl, {
            plugins: [dayGridPlugin, interactionPlugin, listPlugin],
            editable: userRole === 'admin',
            events: userRole === 'admin' ? '/admin/calendar/events' : '/user/calendar/events',
            dateClick: function(info) {
                if (userRole === 'admin') {
                    var eventName = prompt('Enter Event Name:');
                    if (eventName) {
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
            },
            eventClick: function(info) {
                if (userRole === 'admin') {
                    if (confirm(`Are you sure you want to delete the event: ${info.event.title}?`)) {
                        fetch(`/admin/calendar/events/${info.event.id}`, {
                            method: 'DELETE',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                            }
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                info.event.remove();
                                alert('Event deleted successfully');
                            } else {
                                alert('Failed to delete event');
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                        });
                    }
                }
            }
        });

        calendar.render();
    }
});
