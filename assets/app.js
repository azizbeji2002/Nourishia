import './bootstrap.js';
/*
 * Welcome to your app's main JavaScript file!
 *
 * This file will be included onto the page via the importmap() Twig function,
 * which should already be in your base.html.twig.
 */
import './styles/app.css';

console.log('This log comes from assets/app.js - welcome to AssetMapper! 🎉');

import { Calendar } from '@fullcalendar/core';
import dayGridPlugin from '@fullcalendar/daygrid';
import interactionPlugin from '@fullcalendar/interaction';
import timeGridPlugin from '@fullcalendar/timegrid';

document.addEventListener('DOMContentLoaded', function () {
    let calendarEl = document.getElementById('calendar');
    if (calendarEl) {
        let events = JSON.parse(calendarEl.dataset.events);
        let calendar = new Calendar(calendarEl, {
            plugins: [dayGridPlugin, timeGridPlugin, interactionPlugin],
            initialView: 'dayGridMonth',
            locale: 'fr',
            events: events
        });
        calendar.render();
    }
});
