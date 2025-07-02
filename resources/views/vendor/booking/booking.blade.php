@include('vendor.layouts.header')
<style>
    .event-slot {
        margin: auto !important;            
        width: 80% !important;   
        /* background-color: #bde0fe !important;   */
        border-radius: 6px !important;
        font-size: 10px !important;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1) !important; 
    }
    .event-slot > div {
        padding: 6px !important;
        text-align: center !important;
        font-weight: 600 !important;
    }
    #schedular {
        display: grid;
        grid-template-columns: auto repeat(10, 1fr);
        width: 100%;
        max-width: 100%;
    }
    .current-date {
        font-weight: bold;
        font-size: 16px;
        color: black;
    }
    .selected-date {
        font-weight: bold;
        font-size: 16px;
        background-color: yellow;
        color: black;
    }
    @media (min-width: 768px) and (max-width: 1000px) {
        .date-picker {
            margin-left: 150px;
        }
    }
    .week-calendar {
        width: 670px !important;
    }
    @media (max-width: 376px) {
        .week-calendar {
            overflow-x: auto;
            white-space: nowrap;
            scrollbar-width: thin;
        }
        .week-container,
        .calendar {
            width: 670px;
        }
    }
    @media (max-width: 1024px) {
        .week-calendar {
            overflow-x: auto;
            white-space: nowrap;
            scrollbar-width: thin;
        }
        .week-container,
        .calendar {
            width: 670px;
        }
    }
    .week-container {
        display: grid !important;
        grid-template-columns: 90px repeat(7, 1fr);
        width: 100%;
        margin-left: -23px;
        gap: 29px;
    }
    .time-grid {
        display: grid;
        grid-template-columns: repeat(7, 1fr);
        width: 100%;
    }
    .week-container div,
    .time-grid div {
        text-align: center;
    }
    .week-container {
        display: none !important;
        width: 100%;
    }
    .week-container div {
        flex: 1;
        text-align: center;
    }
    .calendar-container {
        background: white;
        border-radius: 51px;
        padding: 20px;
        text-align: center;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    .calendar-header {
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 20px;
        font-weight: bold;
        color: #2d472c;
    }
    .calendar-header i {
        margin-right: 10px;
    }
    .calendar-grid {
        display: grid;
        grid-template-columns: repeat(7, 1fr);
        margin-top: 10px;
    }
    .calendar-day {
        padding: 10px;
        text-align: center;
        border-radius: 5px;
        cursor: pointer;
    }
    .calendar-day:hover {
        background-color: #e9ecef;
        color: #2d472c;
        font-weight: 700;
    }
    .calendar-today {
        background-color: #2d472c;
        color: white;
        font-weight: 700;
    }
    .calendar-selected {
        border: 1px solid #2d472c;
    }
    .month-year {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        margin-top: 0px;
    }
    .dropdown {
        display: inline-block;
    }
    select {
        border: none;
        font-size: 18px;
        font-weight: bold;
        background: none;
        color: #234723;
        cursor: pointer;
        outline: none;
        overflow-y: hidden !important;
    }
    .weekdays {
        display: grid;
        grid-template-columns: repeat(7, 1fr);
        font-weight: bold;
        margin-top: 25px;
        color: #234723;
    }
    .toggle-container {
        display: flex;
        align-items: center;
        gap: 13px;
        font-size: 16px;
        color: #6e6e6e;
        margin-top: 20px;
        justify-content: end;
    }
    .info-icon {
        background-color: #234723;
        color: white;
        border-radius: 50%;
        width: 20px;
        height: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 12px;
        cursor: pointer;
    }
    .toggle-switch {
        position: relative;
        display: inline-block;
        width: 40px;
        height: 20px;
    }
    .toggle-switch input {
        opacity: 0;
        width: 0;
        height: 0;
    }
    .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        transition: .4s;
        border-radius: 20px;
        height: 30px;
        width: 50px;
    }
    .slider:before {
        position: absolute;
        content: "";
        height: 24px;
        width: 24px;
        left: 3px;
        bottom: 3px;
        background-color: white;
        transition: .4s;
        border-radius: 50%;
    }
    input:checked+.slider {
        background-color: #234723;
    }
    input:checked+.slider:before {
        transform: translateX(20px);
    }
    .calendar {
        display: grid;
        grid-template-columns: 80px repeat(7, 1fr);
        grid-template-rows: repeat(11, 70px);
        border: none;
        font-family: 'Poppins', sans-serif !important;
        font-size: 12px;
    }
    .time-slot {
        text-align: center;
        padding: 5px;
        cursor: pointer;
        background-color: transparent;
        font-weight: bold;
        width: auto !important;
        height: auto !important;
    }
    .events {
        /* background-color: lightblue; */
        padding: 5px;
        border-radius: 4px;
        display: flex;
        align-items: center;
        justify-content: center;
        width: 90%;
        margin: auto;
        font-size: 14px;
    }
    .time-slot,
    .day-header {
        border-bottom: 1px solid #ddd;
        border-right: 1px solid #ddd;
        text-align: center;
        padding: 5px;
        cursor: pointer;
    }
    .week-day {
        text-align: center;
        padding: 8px;
        font-size: small;
        width: 55px;
    }
    .highlight {
        background-color: #191919;
        color: white;
        font-weight: bold;
        border-radius: 5px;
        padding: 3px;
    }
    .actions {
        display: flex;
        gap: 10px;
    }
    .btn.remove {
        padding: 10px 20px;
        border-radius: 4px;
        border: none;
        cursor: pointer;
        font-weight: bold;
        font-size: 16px;
        font-weight: 700;
    }
    .btn.save {
        background-color: #299D91;
        color: white;
        font-size: 16px;
        font-weight: 700;
    }
    .btn.pay {
        color: #299D91;
        border: 2px solid #299D91;
        font-size: 16px;
        font-weight: 700;
    }
    span {
        font-size: 12px !important;
    }
    .modal-demo {
        width: 350px !important;
        max-height: 90vh;
        border-radius: 15px;
        padding: 0px 30px 10px;
        overflow-y: auto;
        scrollbar-width: none;
        -ms-overflow-style: none;
    }
    .modal-demo::-webkit-scrollbar {
        display: none;
    }
    .form-control {
        border-radius: 8px;
        padding: 20px;
        height: 45px;
        font-size: 12px;
    }
    span {
        font-size: 16px;
    }
    @keyframes fadeIn {
        from {
            opacity: 0;
        }
        to {
            opacity: 1;
        }
    }
    @keyframes slideIn {
        from {
            transform: translateY(-20px);
            opacity: 0;
        }
        to {
            transform: translateY(0);
            opacity: 1;
        }
    }
    .table-header {
        display: grid;
        grid-template-columns: 1fr 2fr 1fr;
        color: #4b5563;
        font-weight: 600;
        font-size: 12px;
        margin-bottom: 0.5rem;
        color: #7C8082;
    }
    .list {
        max-height: 24rem;
        height: 380px !important;
        overflow-y: auto;
        scrollbar-width: none;
    }
    .list::-webkit-scrollbar {
        display: none;
    }
    .list-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 0.5rem;
        border: none;
        border-left: 1px solid #09BB71;
        border-right: 1px solid #09BB71;
        border-bottom: 2px solid #09BB71;
        border-radius: 10px;
        margin-bottom: 0.5rem;
        transition: background-color 0.3s, transform 0.3s, box-shadow 0.3s;
        margin-left: auto;
        margin-right: auto;
    }

    .list-item:hover {
        background-color: #FFFFFF;
        transform: scale(1.05);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        z-index: 10;
        position: relative;
        border: 1px solid #000000;
    }

    .list-item img {
        width: 2rem;
        height: 2rem;
        border-radius: 50%;
    }

    .list-item .info {
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .list-item .info span {
        font-weight: 600;
        font-size: 16px !important;
    }

    .list-item .info .name {
        color: #4b5563;
    }

    .list-item .amount {
        color: #4b5563;
        font-weight: 400;
        font-size: 14px;
    }

    .list-item .info img.opacity-50 {
        opacity: 0.5;
    }

    .list-item .info .name.opacity-50 {
        opacity: 0.5;
    }

    .list-item.light {
        opacity: 0.5;
    }

    .list-item.large {
        width: 100%;
    }

    .list-item.medium {
        width: 94%;
    }

    .list-item.small {
        width: 88%;
    }

    .footer {
        display: flex;
        justify-content: space-between;
    }

    .footer button {
        padding: 0.5rem 0rem;
        border-radius: 5px;
        font-weight: 600;
        font-size: 0.875rem;
        cursor: pointer;
        transition: background-color 0.3s, transform 0.3s;
        width: 48%;
    }

    .footer .back {
        background-color: #ffffff;
        color: #10b981;
        border: 1px solid #10b981;
    }

    .footer .back:hover {
        background-color: #ffffff;
        transform: scale(1.05);
    }

    .footer .select {
        background-color: #10b981;
        color: white;
        border: none;
    }

    .footer .select:hover {
        background-color: #059669;
        transform: scale(1.05);
    }

    @media (max-width: 640px) {

        .table-header {
            font-size: 0.75rem;
        }

        .list-item .info span,
        .list-item .amount {
            font-size: 0.75rem;
        }

        .footer button {
            padding: 0.5rem 1rem;
            font-size: 0.75rem;
        }
    }
</style>

<div class="page-title-box">
    <div class="row" style="font-family: 'Poppins', sans-serif !important;">
        <div class="col-md-8 col-lg-4 col-sm-12 date-picker">
            <div class="calendar-container" id="calendar"
                style="font-size: 12px !important;  box-shadow: 0px 25px 30px #00000040;">
                <div class="calendar-header">
                    <img class="mr-2" src="{{ asset('assets/image/client/calendargreen.svg') }}" alt="dashboard"
                        height="">
                    <div class="month-year">
                        <select id="monthSelector"></select>
                        <select id="yearSelector"></select>
                    </div>
                </div>
                <div class="weekdays">
                    <div>Su</div>
                    <div>Mo</div>
                    <div>Tu</div>
                    <div>We</div>
                    <div>Th</div>
                    <div>Fr</div>
                    <div>Sa</div>
                </div>
                <div class="calendar-grid" id="calendarDays"></div>
            </div>
            <div class="mt-4 p-2">
                <div class="card tilebox-one" style="border-radius: 7px; box-shadow: 0px 17px 25px #00000040; height: 100px; padding: 20px 20px 15px 20px;">
                    <div class="d-flex align-items-center">
                        <div class="me-3 d-flex align-items-center">
                            <img src="{{ asset('assets/image/client/linegreen.svg') }}" alt="dashboard" height="60px">
                        </div>
                        <div class="flex-grow-1">
                            <h6 class="mt-2 mb-1" style="font-size: 13.5px; color: #898989;">Total Booked</h6>
                            <h3 data-plugin="counterup" style="font-size: 23.5px; font-weight: 700;">135</h3>
                        </div>
                        <div class="ms-auto">
                            <button style="border: none; background-color: #109145; box-shadow: 0 2px 4px #00000040; border-radius: 50px; padding: 6px 7px;">
                                <img src="{{ asset('assets/image/client/calendarwhite.svg') }}" alt="dashboard" style="width: 20px;">
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card tilebox-one" style="border-radius: 7px; box-shadow: 0px 17px 25px #00000040; height: 100px; padding: 20px 20px 15px 20px;">
                    <div class="d-flex align-items-center">
                        <div class="me-3 d-flex align-items-center">
                            <img src="{{ asset('assets/image/client/lineblack.svg') }}" alt="dashboard" height="60px">
                        </div>
                        <div class="flex-grow-1">
                            <h6 class="mt-2 mb-1" style="font-size: 13.5px; color: #898989;">Total Available</h6>
                            <h3 data-plugin="counterup" style="font-size: 23.5px; font-weight: 700;">65</h3>
                        </div>
                        <div class="ms-auto">
                            <button style="border: none; background-color: #191F2F; box-shadow: 0 2px 4px #00000040; border-radius: 50px; padding: 6px 7px;">
                                <img src="{{ asset('assets/image/client/calendarwhite.svg') }}" alt="dashboard" style="width: 20px;">
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card tilebox-one" style="border-radius: 7px; box-shadow: 0px 17px 25px #00000040; height: 100px; padding: 20px 20px 15px 20px;">
                    <div class="d-flex align-items-center">
                        <div class="me-3 d-flex align-items-center">
                            <img src="{{ asset('assets/image/client/linegray.svg') }}" alt="dashboard" height="60px">
                        </div>
                        <div class="flex-grow-1">
                            <h6 class="mt-2 mb-1" style="font-size: 13.5px; color: #898989;">Total Slots</h6>
                            <h3 data-plugin="counterup" style="font-size: 23.5px; font-weight: 700;">200</h3>
                        </div>
                        <div class="ms-auto">
                            <button style="border: none; background-color: #ffffff; box-shadow: 0 2px 4px #00000040; border-radius: 50px; padding: 6px 7px;">
                                <img src="{{ asset('assets/image/client/calendarblack.svg') }}" alt="dashboard" style="width: 20px;">
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-lg-8 col-sm-12">
            <table class="table table-hover text-nowrap">
                <tbody>
                    <div class="row" style="font-family: 'Poppins', sans-serif !important; overflow-x: auto !important;">
                        <div class="container week-calendar">
                            <div id="weekDates" class="week-container">
                                <div class="empty" style="padding: 12px;"></div>
                            </div>
                            <div class="calendar" id="schedular"></div>
                        </div>
                        <div id="payment-withdraw" class="modal-demo">
                            <div class="d-flex pr-3 pt-3 align-items-center justify-content-between mb-0" style="width: 100%; height: auto;">
                                <button type="button" class="btn-close ml-auto" onclick="Custombox.modal.close();">
                                    <span class="sr-only">Close</span>
                                </button>
                            </div>
                            <form action="{{route('booking.store')}}" method="POST">
                                @csrf
                                <div class="add-text ml-2 mt-0" style="font-size: small;">
                                    <div class="container-fluid">
                                        <div class="mb-2">
                                            <div class="row">
                                            <input type="text" id="bookingId" name="booking_id" value="">
                                                <div class="col-md-12">
                                                    <span>User Name</span>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <input type="text" id="username" class="form-control" name="customer_id" placeholder="Abhishek Guleria">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-2">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <span>Venue</span>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <input type="text" class="form-control" placeholder="Sports complex,abc,393001">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-2">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <span>Date</span>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <input type="date" class="form-control" name="booking_on" placeholder="9AM , 17 Jan 2025">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-2">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <span>Entry Time</span>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <input type="time" class="form-control" name="time_in" placeholder="N/A">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-2">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <span>Exit Time</span>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <input type="time" class="form-control" name="time_out" placeholder="N/A">
                                                </div>
                                            </div>
                                        </div>
                                        <div class=" mt-4 mb-2 book-buttons" style="border: none;">
                                            <div class="mb-2">
                                                <div class="row">
                                                    <div class="col-md-12 d-flex action-buttons">
                                                        <button class="btn save mr-2 cancel-button" id="cancelBooking" style="width: 100%;">Cancel</button>
                                                        <button class="btn pay mr-3 book-btn" style="width: 100%;"id="addname">
                                                            Book
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <input type="text" id="bookingStatus" name="status" value="">

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.2/js/bootstrap.bundle.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.2.0/js/adminlte.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables.net/1.13.6/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables.net-bs4/1.11.5/dataTables.bootstrap4.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables.net-buttons/2.4.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables.net-buttons/2.4.2/js/buttons.html5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables.net-buttons/2.4.2/js/buttons.print.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/custombox/4.0.3/custombox.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
    const bookingsFromDB = @json($bookingsFromDB);
</script>

<script>
    function formatTimeLabel(hour) {
        const suffix = hour >= 12 ? 'PM' : 'AM';
        const h = hour % 12 || 12;
        return `${h}${suffix}`;
    }

    document.addEventListener("DOMContentLoaded", function () {
        const calendar = document.getElementById("schedular");
        const weekContainer = document.getElementById("weekDates");
        const calendarDays = document.getElementById("calendarDays");
        const monthSelector = document.getElementById("monthSelector");
        const yearSelector = document.getElementById("yearSelector");

        let currentDate = new Date();
        let selectedDate = null;
        // let selectedTimeSlot = null;
        let events = {};

        const times = [
            { label: "7AM", hour: 7 }, { label: "8AM", hour: 8 },
            { label: "9AM", hour: 9 }, { label: "10AM", hour: 10 },
            { label: "11AM", hour: 11 }, { label: "12PM", hour: 12 },
            { label: "1PM", hour: 13 }, { label: "2PM", hour: 14 },
            { label: "3PM", hour: 15 }, { label: "4PM", hour: 16 },
            { label: "5PM", hour: 17 }, { label: "6PM", hour: 18 },
            { label: "7PM", hour: 19 }, { label: "8PM", hour: 20 },
            { label: "9PM", hour: 21 },{ label: "10PM", hour: 22 },
        ];

        // Convert bookingsFromDB to events
        bookingsFromDB.forEach(booking => {
            // console.log(booking); 
            const date = new Date(booking.booking_on);
            const dayName = date.toLocaleString('en-US', { weekday: 'short' });
            const dayNumber = date.getDate();
            const dayKey = `${dayName} ${dayNumber}`;

            let startHour = convertTo24Hour(booking.time_in);
            let endHour = convertTo24Hour(booking.time_out);

            if (!events[dayKey]) events[dayKey] = [];

            for (let hour = startHour; hour < endHour; hour++) {
                events[dayKey].push({
                    name: booking.customer_name,
                    start: hour,
                    end: hour + 1,
                    status: booking.status,
                    id: booking.id || ''
                });
            }
        });

        // Helper function to convert "12PM", "1AM", etc. to 24-hour format
        function convertTo24Hour(timeStr) {
            const [hour, modifier] = timeStr.toUpperCase().replace(/\s/g, '').match(/(\d+)(AM|PM)/).slice(1);
            let h = parseInt(hour, 10);
            if (modifier === 'PM' && h !== 12) h += 12;
            if (modifier === 'AM' && h === 12) h = 0;
            return h;
        }
        function formatTime(hour) {
            const suffix = hour >= 12 ? 'PM' : 'AM';
            const h = hour % 12 || 12;
            return `${h}${suffix}`;
        }

        function getNext10Days(startDate = new Date()) {
            const days = [];
            for (let i = 0; i < 10; i++) {
                const date = new Date(startDate);
                date.setDate(startDate.getDate() + i);
                const dayName = date.toLocaleString('en-US', { weekday: 'short' });
                const dayNumber = date.getDate();
                days.push({ dayName, dayNumber });
            }
            return days;
        }


        function renderCalendar(weekDates = getNext10Days()) {
            calendar.innerHTML = "<div class='time-slot'></div>";
            let today = new Date();
            const rendered = {};

            // Header
            weekDates.forEach(date => {
                calendar.innerHTML += `
                    <div class='time-slot day-header ${date.dayNumber === today.getDate() ? "current-date" : ""}' 
                        data-day="${date.dayNumber}" onclick="selectDate(this)">
                        <span class="${date.dayNumber === today.getDate() ? "highlight" : ""}">${date.dayNumber}</span><br>${date.dayName}
                    </div>`;
            });
            
            // Time rows
            times.forEach(timeObj => {
                calendar.innerHTML += `<div class='time-slot time-label'>${timeObj.label}</div>`;
                weekDates.forEach(date => {
                    const dayKey = `${date.dayName} ${date.dayNumber}`;
                                const matchList = events[dayKey] || [];

                    const match = events[dayKey]?.find(e => e.start === timeObj.hour && !rendered[`${dayKey}-${e.start}`]);

                    if (match) {
                        console.log(match.name, match.status);

                        const duration = match.end - match.start;
                        rendered[`${dayKey}-${match.start}`] = true;
                        let bgColor = match.status === '0' ? 'gray' : 'lightblue';


                        calendar.innerHTML += `
                            <div class='time-slot event-slot'
                                data-booking-id="${match.id}"
                                data-status="${match.status}"
                                data-name="${match.name}"
                                data-start="${match.start}"
                                data-end="${match.end}"
                                style="grid-row: span ${duration}; background-color: ${bgColor}; border-radius: 5px;">
                                <div style="padding: 5px; font-size: 10px;">
                                    ${match.name}<br>${formatTime(match.start)} - ${formatTime(match.end)}
                                </div>
                            </div>`;
                    } else {
                        calendar.innerHTML += `<div class='time-slot' data-time='${dayKey}-${timeObj.label}'></div>`;
                    }
                });
            });
            attachTimeSlotListeners();
        }

        function attachTimeSlotListeners() {
            // Handle new booking time slots
            document.querySelectorAll('.time-slot[data-time]').forEach(slot => {
                slot.addEventListener("click", function () {
                    const [dayInfo, timeLabel] = this.getAttribute("data-time").split("-");
                    const [dayName, dayNumberStr] = dayInfo.trim().split(" ");
                    const dayNumber = parseInt(dayNumberStr, 10);

                    const monthIndex = parseInt(document.getElementById("monthSelector").value, 10) - 1;
                    const year = parseInt(document.getElementById("yearSelector").value, 10);
                    const dateObj = new Date(year, monthIndex, dayNumber);

                    const displayDate = dateObj.toLocaleDateString('en-US', {
                        year: 'numeric', month: 'long', day: 'numeric'
                    });

                    // Set modal fields
                    document.getElementById("username").value = "";
                    document.getElementById("bookingId").value = "";
                    const isoDate = dateObj.toISOString().split("T")[0]; // YYYY-MM-DD
                    const time24 = convertTo24Hour(timeLabel).toString().padStart(2, '0') + ":00"; // HH:00

                    document.querySelector('input[name="booking_on"]').value = isoDate;
                    document.querySelector('input[name="time_in"]').value = time24;

                    document.querySelector('input[name="time_out"]').value = "";
                    document.getElementById("bookingStatus").value = "";

                    document.getElementById("addname").style.display = "inline-block";
                        document.getElementById("cancelBooking").style.display = "none";

                    new Custombox.modal({
                        content: { target: "#payment-withdraw", effect: "blur" }
                    }).open();
                });
            });


            // Handle existing event slots
            document.querySelectorAll('.event-slot').forEach(slot => {
                slot.addEventListener("click", function () {
                    try {
                        const name = this.getAttribute("data-name");
                        const startHour = parseInt(this.getAttribute("data-start"));
                        const endHour = parseInt(this.getAttribute("data-end"));
                        const bookingId = this.getAttribute("data-booking-id");
                        const status = this.getAttribute("data-status");

                        const parentDayColumn = this.closest('[data-day]');
                        const dayNumber = parentDayColumn?.getAttribute('data-day') || '1';
                        const selectedMonth = document.getElementById("monthSelector").value;
                        const selectedYear = document.getElementById("yearSelector").value;
                        const dateObj = new Date(selectedYear, selectedMonth, dayNumber);
                        const mysqlDate = dateObj.toISOString().split('T')[0];

                        document.getElementById("username").value = name;
                        document.getElementById("bookingId").value = bookingId;
                        document.querySelector('input[name="booking_on"]').value = mysqlDate;
                        document.querySelector('input[name="time_in"]').value = `${startHour.toString().padStart(2, '0')}:00:00`;
                        document.querySelector('input[name="time_out"]').value = `${endHour.toString().padStart(2, '0')}:00:00`;
                        document.getElementById("bookingStatus").value = status;

                        // Hide or show book button based on status
                        const bookBtn = document.getElementById("addname");
                        const cancelBtn = document.getElementById("cancelBooking");

                        if (status === '1') {
                            if (bookBtn) bookBtn.style.display = "none";
                            if (cancelBtn) cancelBtn.style.display = "inline-block";
                        } else {
                            if (bookBtn) bookBtn.style.display = "inline-block";
                            if (cancelBtn) cancelBtn.style.display = "none";
                        }
                        // if (bookBtn) bookBtn.style.display = status === '1' ? "none" : "inline-block";

                        new Custombox.modal({
                            content: { target: "#payment-withdraw", effect: "blur" }
                        }).open();
                    } catch (err) {
                        console.error("Modal error:", err);
                        alert("Failed to open booking modal.");
                    }
                });
            });
        }

    
        document.getElementById("addname").addEventListener("click", function () {
            const username = document.getElementById("username").value.trim();
            const bookingId = document.getElementById("bookingId").value;
            const booking_on = document.querySelector('input[name="booking_on"]').value;
            const time_in = document.querySelector('input[name="time_in"]').value;
            const time_out = document.querySelector('input[name="time_out"]').value;
            const status = document.getElementById("bookingStatus").value;

            if (!booking_on || !time_in || !username) {
                alert("Please fill in all required fields.");
                return;
            }

            const payload = {
                id: bookingId || null,
                customer_name: username,
                booking_on: booking_on, // e.g., "June 30, 2025"
                time_in: time_in.toUpperCase().replace(/\s/g, ''), // e.g., "10AM"
                time_out: time_out ? time_out.toUpperCase().replace(/\s/g, '') : null, // e.g., "11AM" or ""
                status: status || '1'
            };

            fetch("{{ route('booking.store') }}", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                },
                body: JSON.stringify(payload)
            })
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    alert("Booking saved successfully.");
                    location.reload(); // or re-render the calendar instead
                } else {
                    alert("Error: " + (data.message || "Could not save booking."));
                }
            })
            .catch(error => {
                console.error("Request error:", error);
                alert("An unexpected error occurred.");
            });
        });
        function populateSelectors() {
            const months = ["January", "February", "March", "April", "May", "June", "July", "August",
                "September", "October", "November", "December"];
            for (let i = 0; i < 12; i++) {
                let option = document.createElement("option");
                option.value = i + 1;
                option.textContent = months[i];
                monthSelector.appendChild(option);
            }
            let currentYear = new Date().getFullYear();
            for (let i = currentYear; i <= currentYear + 5; i++) {
                let option = document.createElement("option");
                option.value = i;
                option.textContent = i;
                yearSelector.appendChild(option);
            }
            monthSelector.value = currentDate.getMonth() + 1;
            yearSelector.value = currentDate.getFullYear();
        }
        
        monthSelector.addEventListener("change", function () {
            currentDate.setMonth(parseInt(monthSelector.value));
            renderCalendars();
        });

        yearSelector.addEventListener("change", function () {
            currentDate.setFullYear(parseInt(yearSelector.value));
            renderCalendars();
        });

        function renderCalendars() {
            calendarDays.innerHTML = "";
            let firstDay = new Date(currentDate.getFullYear(), currentDate.getMonth(), 1).getDay();
            let lastDate = new Date(currentDate.getFullYear(), currentDate.getMonth() + 1, 0).getDate();
            let today = new Date();
            today.setHours(0, 0, 0, 0);

            for (let i = 0; i < firstDay; i++) {
                calendarDays.appendChild(document.createElement("div"));
            }

            for (let day = 1; day <= lastDate; day++) {
                let dayDiv = document.createElement("div");
                dayDiv.textContent = day;
                dayDiv.classList.add("calendar-day");

                let selectedDay = new Date(currentDate.getFullYear(), currentDate.getMonth(), day);
                if (selectedDay < today) dayDiv.classList.add("disabled-date");
                if (day === today.getDate() && currentDate.getMonth() === today.getMonth()) {
                    dayDiv.classList.add("calendar-today");
                }

                dayDiv.addEventListener("click", function () {
                    if (selectedDay < today) return;
                    if (selectedDate) selectedDate.classList.remove("calendar-selected");
                    selectedDate = dayDiv;
                    selectedDate.classList.add("calendar-selected");
                    updateWeekView(new Date(currentDate.getFullYear(), currentDate.getMonth(), day));
                });

                calendarDays.appendChild(dayDiv);

            }
        }

        function updateWeekView(startDate) {
            weekContainer.innerHTML = "";
            let weekDates = getNext10Days(startDate);

            weekContainer.innerHTML = weekDates.map(date =>
                `<div class="week-day">
                    <strong class="highlight">${date.dayNumber}</strong>
                    <div>${date.dayName}</div>
                </div>`
            ).join('');

            renderCalendar(weekDates);
        }

        populateSelectors();
        renderCalendars();
        renderCalendar();
    });

    document.getElementById("cancelBooking").addEventListener("click", function (e) {
        e.preventDefault();

        const bookingId = document.getElementById("bookingId").value;
        const booking_on = document.querySelector('input[name="booking_on"]').value;
        const time_in = document.querySelector('input[name="time_in"]').value;
        const time_out = document.querySelector('input[name="time_out"]').value;

        if (!bookingId) {
            alert("Cannot cancel: no booking ID found.");
            return;
        }

        const payload = {
            id: bookingId,
            booking_on,
            time_in,
            time_out,
            status: '0' // Cancelled
        };

        fetch("{{ route('booking.store') }}", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": "{{ csrf_token() }}"
            },
            body: JSON.stringify(payload)
        })
        .then(res => res.json())
        .then(data => {
            if (data.success) {
                alert("Booking cancelled!");
                location.reload();
            } else {
                alert("Cancellation failed.");
            }
        })
        .catch(err => {
            console.error("Error:", err);
            alert("Error while cancelling.");
        });
    });

</script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const calendarDays = document.getElementById("calendarDays");
        calendarDays.addEventListener("click", function (event) {
            if (event.target.classList.contains("calendar-day")) {
                let element = document.querySelector(".calendar-day.calendar-selected");
            }
        });
    });
</script>

@include('vendor.layouts.footer')
