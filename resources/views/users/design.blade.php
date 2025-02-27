<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Calendar</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/5.11.3/main.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/5.11.3/main.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #F5F5F5;
            padding: 20px;
        }
        .container {
            display: flex;
            gap: 20px;
        }
        .sidebar {
            width: 250px;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }
        .calendar-container {
            flex-grow: 1;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }
        .stats {
            margin-top: 20px;
        }
        .stats div {
            background: white;
            padding: 15px;
            margin-bottom: 10px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        .toggle-switch {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .toggle-switch input {
            width: 40px;
            height: 20px;
            appearance: none;
            background: #ccc;
            border-radius: 10px;
            position: relative;
            cursor: pointer;
        }
        .toggle-switch input:checked {
            background: #0B6623;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="sidebar">
            <h2>January 2025</h2>
            <input type="date">
            <div class="toggle-switch">
                <span>Set Bedding</span>
                <input type="checkbox">
            </div>
            <div class="stats">
                <div>Total Booked: <strong>135</strong></div>
                <div>Total Available: <strong>65</strong></div>
                <div>Total Slots: <strong>200</strong></div>
            </div>
        </div>
        <div class="calendar-container">
            <div id='calendar'></div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'timeGridWeek',
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay'
                },
                events: [
                    {
                        title: 'Mr. Abhishek Guleria',
                        start: '2025-01-14T09:00:00',
                        end: '2025-01-14T10:00:00',
                        color: 'green'
                    },
                    {
                        title: 'Mr. Abhishek Guleria',
                        start: '2025-01-15T09:00:00',
                        end: '2025-01-15T10:00:00',
                        color: 'green'
                    },
                    {
                        title: 'Mr. Abhishek Guleria',
                        start: '2025-01-14T10:00:00',
                        end: '2025-01-14T11:00:00',
                        color: 'blue'
                    }
                ]
            });
            calendar.render();
        });
    </script>
</body>
</html>
