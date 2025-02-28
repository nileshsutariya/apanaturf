
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Simple Tables</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
<!-- AdminLTE 3 CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.2.0/css/adminlte.min.css">

<!-- Font Awesome (Icons) -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

<!-- Bootstrap 4 -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.2/css/bootstrap.min.css">

<!-- Overlay Scrollbars (for scrolling UI enhancements) -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/overlayscrollbars/1.13.1/css/OverlayScrollbars.min.css">
<script data-cfasync="false" nonce="79d5a330-2021-4cc9-8204-792e3ea92dce">try{(function(w,d){!function(j,k,l,m){if(j.zaraz)console.error("zaraz is loaded twice");else{j[l]=j[l]||{};j[l].executed=[];j.zaraz={deferred:[],listeners:[]};j.zaraz._v="5850";j.zaraz._n="79d5a330-2021-4cc9-8204-792e3ea92dce";j.zaraz.q=[];j.zaraz._f=function(n){return async function(){var o=Array.prototype.slice.call(arguments);j.zaraz.q.push({m:n,a:o})}};for(const p of["track","set","debug"])j.zaraz[p]=j.zaraz._f(p);j.zaraz.init=()=>{var q=k.getElementsByTagName(m)[0],r=k.createElement(m),s=k.getElementsByTagName("title")[0];s&&(j[l].t=k.getElementsByTagName("title")[0].text);j[l].x=Math.random();j[l].w=j.screen.width;j[l].h=j.screen.height;j[l].j=j.innerHeight;j[l].e=j.innerWidth;j[l].l=j.location.href;j[l].r=k.referrer;j[l].k=j.screen.colorDepth;j[l].n=k.characterSet;j[l].o=(new Date).getTimezoneOffset();if(j.dataLayer)for(const t of Object.entries(Object.entries(dataLayer).reduce(((u,v)=>({...u[1],...v[1]})),{})))zaraz.set(t[0],t[1],{scope:"page"});j[l].q=[];for(;j.zaraz.q.length;){const w=j.zaraz.q.shift();j[l].q.push(w)}r.defer=!0;for(const x of[localStorage,sessionStorage])Object.keys(x||{}).filter((z=>z.startsWith("_zaraz_"))).forEach((y=>{try{j[l]["z_"+y.slice(7)]=JSON.parse(x.getItem(y))}catch{j[l]["z_"+y.slice(7)]=x.getItem(y)}}));r.referrerPolicy="origin";r.src="/cdn-cgi/zaraz/s.js?z="+btoa(encodeURIComponent(JSON.stringify(j[l])));q.parentNode.insertBefore(r,q)};["complete","interactive"].includes(k.readyState)?zaraz.init():j.addEventListener("DOMContentLoaded",zaraz.init)}}(w,d,"zarazData","script");window.zaraz._p=async bs=>new Promise((bt=>{if(bs){bs.e&&bs.e.forEach((bu=>{try{const bv=d.querySelector("script[nonce]"),bw=bv?.nonce||bv?.getAttribute("nonce"),bx=d.createElement("script");bw&&(bx.nonce=bw);bx.innerHTML=bu;bx.onload=()=>{d.head.removeChild(bx)};d.head.appendChild(bx)}catch(by){console.error(`Error executing script: ${bu}\n`,by)}}));Promise.allSettled((bs.f||[]).map((bz=>fetch(bz[0],bz[1]))))}bt()}));zaraz._p({"e":["(function(w,d){})(window,document)"]});})(window,document)}catch(e){throw fetch("/cdn-cgi/zaraz/t"),e;};</script></head>
<style>
        .week-calendar {
            width: 670px;
        }
      
        .week-container {
            display: grid;
            grid-template-columns: 1fr repeat(7, 1fr); /* First column blank, then 7 equal columns */
            width: 100%;
            /* gap: 20px; */
        }

        /* .week-container div:first-child {
            visibility: hidden; 
        } */

        .time-grid {
            display: grid;
            grid-template-columns: repeat(7, 1fr); /* Match with week-container */
            width: 100%;
        }

        .week-container div, 
        .time-grid div {
            text-align: center;
            /* border: 1px solid #ddd; For visibility */
        }

        .week-container {
            display: flex;
            width: 100%;
        }

        .week-container div {
            flex: 1; /* Ensure equal width */
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
            gap: 5px;
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
        }

        .calendar-today {
            background-color: #2d472c;
            color: white;
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

        input:checked + .slider {
            background-color: #234723;
        }

        input:checked + .slider:before {
            transform: translateX(20px);
        }

        .calendar {
            display: grid;
            grid-template-columns: 80px repeat(7, 1fr); /* Time column + 7 days */
            grid-template-rows: repeat(11, 70px); /* Adjust row height */
            border: none;
            font-family: 'Poppins', sans-serif !important;
            font-size: 12px;
        }

        .time-slot {
            /* border: 1px solid #ddd; */
            text-align: center;
            padding: 5px;
            cursor: pointer;
            background-color: transparent;
            font-weight: bold;
            width: auto !important;
        }

        .event {
            background-color: lightblue;
            padding: 5px;
            border-radius: 4px;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 90%;
            margin: auto;
            font-size: 14px;
        }

        .time-slot, .day-header {
            /* border: 1px solid #ddd; */
            border-bottom: 1px solid #ddd;
            border-right: 1px solid #ddd;
            text-align: center;
            padding: 5px;
            cursor: pointer;
        }

        /* .week-container {
            display: flex;
            justify-content: end;
            gap: 30px;
            margin-right: 20px;
            margin-bottom: 10px;
        } */

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

    </style>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    
    
    <!-- Main content -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Responsive Hover Table</h3>
                    
                    <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
                            
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive d-flex p-0">
                  <div class="col-md-4 col-lg-4">
                      hsyufacvbnhjayutgsh
                    </div>
                    <div class="col-md-8 col-lg-8 col-sm-8">
                    <table class="table table-hover text-nowrap">
               
                  <tbody>
                    
            <div class="row" style="font-family: 'Poppins', sans-serif !important;">
                    <div class="container week-calendar">
                        <div id="weekDates" class="week-container">
                            <div class="empty"></div>
                        </div>
                        
                        <div class="calendar" id="schedular"></div>
                    </div>
                
                    <!-- Modal for Adding/Editing Events -->
                    <div class="modal fade" id="addEventModal" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Add Event</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body">
                                    <input type="hidden" id="eventId">
                                    <div class="mb-3">
                                        <label class="form-label">Event Title</label>
                                        <input type="text" class="form-control" id="eventTitle">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-primary" id="saveEvent">Save</button>
                                    <button class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Event Modal -->
                    <div class="modal fade" id="editEventModal" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Edit Event</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body">
                                    <input type="hidden" id="editEventId">
                                    <div class="mb-3">
                                        <label class="form-label">Event Title</label>
                                        <input type="text" class="form-control" id="editEventTitle">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-danger" id="deleteEvent">Delete</button>
                                    <button class="btn btn-primary" id="updateEvent">Save</button>
                                    <button class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    

                </tbody>
            </table>
                </div>
            </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.2.0
    </div>
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<!-- jQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<!-- Bootstrap 4 JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.2/js/bootstrap.bundle.min.js"></script>

<!-- AdminLTE 3 JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.2.0/js/adminlte.min.js"></script>

<!-- Overlay Scrollbars (for enhanced scrolling) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/overlayscrollbars/1.13.1/js/jquery.overlayScrollbars.min.js"></script>

<!-- Chart.js (for graphs and analytics) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>

<!-- Moment.js (for handling dates) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"></script>

<!-- AdminLTE Plugins (if needed) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.2.0/js/demo.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.2.0/js/pages/dashboard.js"></script>
    
    <script>
        const calendarDays = document.getElementById("calendarDays");
        const monthSelector = document.getElementById("monthSelector");
        const yearSelector = document.getElementById("yearSelector");
        let currentDate = new Date();
        let selectedDate = null;

        function populateSelectors() {
            const months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
            for (let i = 0; i < 12; i++) {
                let option = document.createElement("option");
                option.value = i;
                option.textContent = months[i];
                monthSelector.appendChild(option);
            }
            let currentYear = new Date().getFullYear();
            for (let i = currentYear - 10; i <= currentYear + 10; i++) {
                let option = document.createElement("option");
                option.value = i;
                option.textContent = i;
                yearSelector.appendChild(option);
            }
            monthSelector.value = currentDate.getMonth();
            yearSelector.value = currentDate.getFullYear();
        }

        function renderCalendar() {
            calendarDays.innerHTML = "";
            let firstDay = new Date(currentDate.getFullYear(), currentDate.getMonth(), 1).getDay();
            let lastDate = new Date(currentDate.getFullYear(), currentDate.getMonth() + 1, 0).getDate();
            
            let today = new Date();
            today.setHours(0, 0, 0, 0);

            for (let i = 0; i < firstDay; i++) {
                let emptyDiv = document.createElement("div");
                calendarDays.appendChild(emptyDiv);
            }
            for (let day = 1; day <= lastDate; day++) {
                let dayDiv = document.createElement("div");
                dayDiv.textContent = day;
                dayDiv.classList.add("calendar-day");

                let selectedDay = new Date(currentDate.getFullYear(), currentDate.getMonth(), day);
                if (selectedDay < today) {
                    dayDiv.classList.add("disabled-date"); // Disable past dates
                }

                if (day === today.getDate() && currentDate.getMonth() === today.getMonth() && currentDate.getFullYear() === today.getFullYear()) {
                    dayDiv.classList.add("calendar-today");
                }

                dayDiv.addEventListener("click", function () {
                    if (selectedDay < today) {
                        return; // Prevent selecting past dates
                    }

                    if (selectedDate) {
                        selectedDate.classList.remove("calendar-selected");
                    }
                    selectedDate = dayDiv;
                    selectedDate.classList.add("calendar-selected");
                    updateWeekView(new Date(currentDate.getFullYear(), currentDate.getMonth(), day));
                });
                calendarDays.appendChild(dayDiv);
            }
        }

        function updateWeekView(selectedDate) {
            const weekContainer = document.getElementById("weekDates");
            let weekDates = [];

            for (let i = 0; i < 7; i++) {
                let date = new Date(selectedDate);
                date.setDate(selectedDate.getDate() + i);
                weekDates.push({
                    dayName: date.toLocaleString('en-US', { weekday: 'short' }),
                    dayNumber: date.getDate()
                });
            }

            weekContainer.innerHTML = weekDates.map(date =>
                `<div class="week-day">
                    <strong class="${date.dayNumber === selectedDate.getDate() ? 'highlight' : ''}" style="font-size: 20px;">${date.dayNumber}</strong>
                    <div style="font-size: 12px; font-weight: bold;">${date.dayName}</div>
                </div>`
            ).join('');

            updateSchedule(weekDates);
        }


        function updateSchedule(weekDates) {
            const scheduler = document.getElementById("schedular");
            const times = ["9AM", "10AM", "11AM", "12PM", "1PM", "2PM", "3PM", "4PM", "5PM", "6PM"];
            let events = JSON.parse(localStorage.getItem("events")) || {};
            // scheduler.innerHTML = `<div class='time-slot'></div>` + weekDates.map(date => `<div class='day-header'>${date.dayName} ${date.dayNumber}</div>`).join('');

            times.forEach(time => {
                scheduler.innerHTML += `<div class='time-slot'>${time}</div>`;
                weekDates.forEach(date => {
                    const key = `${date.dayName} ${date.dayNumber}-${time}`;
                    scheduler.innerHTML += `<div class='time-slot' data-time='${key}'>${events[key] || ''}</div>`;
                });
            });
        }

        monthSelector.addEventListener("change", function () {
            currentDate.setMonth(parseInt(this.value));
            renderCalendar();
        });

        yearSelector.addEventListener("change", function () {
            currentDate.setFullYear(parseInt(this.value));
            renderCalendar();
        });

        populateSelectors();
        renderCalendar();
    </script>
    
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const calendar = document.getElementById("schedular");
            const weekContainer = document.getElementById("weekDates");
    
            let events = {}; // Temporary storage (Clears on refresh)
    
            function getNext7Days() {
                const today = new Date();
                const next7Days = [];

                for (let i = 0; i < 7; i++) {
                    const date = new Date();
                    date.setDate(today.getDate() + i);
                    const dayName = date.toLocaleString('en-US', { weekday: 'short' });
                    const dayNumber = date.getDate();
                    next7Days.push({ dayName, dayNumber });
                }
                return next7Days;
            }
    
            function displayWeek() {
                const weekDates = getNext7Days();
                const today = new Date().getDate();

                weekContainer.innerHTML = `<div class="week-day empty"></div>` + weekDates.map(date =>
                    `<div class="week-day">
                        <strong class="${date.dayNumber === today ? 'highlight' : ''}" style="font-size: 18px;">${date.dayNumber}</strong>
                        <div style="font-size: 12px; font-weight: bold;">${date.dayName}</div>
                    </div>`
                ).join('');
            }
        
            function renderCalendar() {
                calendar.innerHTML = ""; // Clear previous content
                const days = getNext7Days().map(date => `${date.dayName} ${date.dayNumber}`);
                const times = ["9AM", "10AM", "11AM", "12PM", "1PM", "2PM", "3PM", "4PM", "5PM", "6PM"];

                times.forEach(time => {
                    calendar.innerHTML += `<div class='time-slot'>${time}</div>`;
                    days.forEach(day => {
                        const key = `${day}-${time}`;
                        calendar.innerHTML += `<div class='time-slot' data-time='${key}'>
                            ${events[key] ? `<div class='event px-3' data-key="${key}" style="cursor:pointer; font-size: 10px;">${events[key]}</div>` : ''}
                        </div>`;
                    });
                });
            }
            
            // Initial rendering
            displayWeek();
            renderCalendar();
    
            // Event handler for adding/editing events
            calendar.addEventListener("click", function (e) {
                if (e.target.classList.contains("time-slot") && !e.target.querySelector(".event")) {
                    const timeKey = e.target.getAttribute("data-time");
                    if (timeKey) {
                        document.getElementById("eventId").value = timeKey;
                        document.getElementById("eventTitle").value = "";
                        new bootstrap.Modal(document.getElementById("addEventModal")).show();
                    }
                } else if (e.target.classList.contains("event")) {
                    const key = e.target.getAttribute("data-key");
                    document.getElementById("editEventId").value = key;
                    document.getElementById("editEventTitle").value = events[key];
                    new bootstrap.Modal(document.getElementById("editEventModal")).show();
                }
            });
    
            // Save new event
            document.getElementById("saveEvent").addEventListener("click", function () {
                const timeKey = document.getElementById("eventId").value;
                const title = document.getElementById("eventTitle").value;
                if (title.trim() !== "") {
                    events[timeKey] = title;
                    renderCalendar();
                }
                bootstrap.Modal.getInstance(document.getElementById("addEventModal")).hide();
            });
    
            // Update event
            document.getElementById("updateEvent").addEventListener("click", function () {
                const key = document.getElementById("editEventId").value;
                const newTitle = document.getElementById("editEventTitle").value;
                if (newTitle.trim() !== "") {
                    events[key] = newTitle;
                    renderCalendar();
                }
                bootstrap.Modal.getInstance(document.getElementById("editEventModal")).hide();
            });
    
            // Delete event
            document.getElementById("deleteEvent").addEventListener("click", function () {
                const key = document.getElementById("editEventId").value;
                delete events[key];
                renderCalendar();
                bootstrap.Modal.getInstance(document.getElementById("editEventModal")).hide();
            });
        });
    </script>
<!-- jQuery -->
</body>
</html>
