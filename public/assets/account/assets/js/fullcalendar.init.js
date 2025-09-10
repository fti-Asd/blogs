/* Template Name: Techwind - Tailwind CSS Multipurpose Landing & Admin Dashboard Template
   Author: Shreethemes
   Email: support@shreethemes.in
   Website: https://shreethemes.in
   Version: 2.2.0
   Created: May 2022
   File Description: fullcalender.init.js for Calender
*/

document.addEventListener('DOMContentLoaded', function () {
    var Calendar = FullCalendar.Calendar;
    var Draggable = FullCalendar.Draggable;

    var containerEl = document.getElementById('external-events');
    var calendarEl = document.getElementById('calendar');
    var checkbox = document.getElementById('drop-remove');



    // initialize the external events
    // -----------------------------------------------------------------

    new Draggable(containerEl, {
        itemSelector: '.fc-event',
        eventData: function (eventEl) {
            return {
                title: eventEl.innerText
            };
        }
    });


    // initialize the calendar
    // -----------------------------------------------------------------

    var calendar = new Calendar(calendarEl, {
        locale: 'fa',
        headerToolbar: {
            left: 'prev,next today addEventButton',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay',

        },
        isRTL:true,
        businessHours: true, // display business hours
        editable: true,
        events: [
            {
                title: 'ناهار کاری',
                start: '2023-08-03T13:00:00',
                constraint: 'ساعات کاری'
            },
            {
                title: 'ملاقات',
                start: '2023-08-13T11:00:00',
                constraint: 'در دسترس برای جلسه', // defined below
                color: '#53c797'
            },
            {
                title: 'کنفرانس',
                start: '2023-08-18',
                end: '2023-08-20'
            },
            {
                title: 'مهمانی - جشن',
                start: '2023-08-29T20:00:00'
            },
        ],
        buttonText: {
            month: 'ماه',
            week: 'هفته',
            day: 'روز',
            today: 'امروز',

        },

        customButtons: {

            addEventButton: {
                text: 'اضافه کردن رویداد',
                click: function () {
                    var dateStr = prompt('فرمت صحیح وارد کردن به اساس سال-ماه-روز');
                    var date = new Date(dateStr + 'T00:00:00'); // will be in local time

                    if (!isNaN(date.valueOf())) { // valid?
                        calendar.addEvent({
                            title: 'رویداد قابل تغییر',
                            start: date,
                            allDay: true
                        });
                        alert('بسیار خوب، پایگاه داده خود را به روز کنید');
                    } else {
                        alert('فرمت صحیح نیست');
                    }
                }
            }
        },

        editable: true,
        droppable: true, // this allows things to be dropped onto the calendar
        drop: function (info) {
            // is the "remove after drop" checkbox checked?
            if (checkbox.checked) {
                // if so, remove the element from the "Draggable Events" list
                info.draggedEl.parentNode.removeChild(info.draggedEl);
            }
        }
    });

    calendar.render();
});
