
<!DOCTYPE html>
<html lang="en">
<!-- <html lang="en" data-layout="topnav"> -->

<head>
    <meta charset="utf-8" />
    <title>Calendar | Uplon - Responsive Bootstrap 5 Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('assets/images/favicon.ico')}}">

    <!-- Vendor css -->
    <link href="{{asset('assets/css/vendor.min.css')}}" rel="stylesheet" type="text/css" />

    <!-- App css -->
    <link href="{{asset('assets/css/app.min.css')}}" rel="stylesheet" type="text/css" id="app-style" />

    <!-- Icons css -->
    <link href="{{asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />

    <!-- Theme Config Js -->
    <script src="{{asset('assets/js/config.js')}}"></script>
</head>

<body>
    <!-- Begin page -->
    <div class="wrapper">


        <div class="page-content">

            <div class="page-container">


                <div class="row">
                    <div class="col-xl-3">
                        <div class="card" style="display: none !important;">
                            <div class="card-body">
                                <button class="btn btn-primary w-100" id="btn-new-event">
                                    <i class="ti ti-plus me-2 align-middle"></i> Create New Event
                                </button>

                                <div id="external-events" class="mt-2">
                                    <p class="text-muted">Drag and drop your event or click in the calendar</p>
                                    <div class="external-event fc-event bg-success-subtle text-success" data-class="bg-success-subtle">
                                        <i class="ti ti-circle-filled me-2"></i>New Event Planning
                                    </div>
                                    <div class="external-event fc-event bg-info-subtle text-info" data-class="bg-info-subtle">
                                        <i class="ti ti-circle-filled me-2"></i>Meeting
                                    </div>
                                    <div class="external-event fc-event bg-warning-subtle text-warning" data-class="bg-warning-subtle">
                                        <i class="ti ti-circle-filled me-2"></i>Generating Reports
                                    </div>
                                    <div class="external-event fc-event bg-danger-subtle text-danger" data-class="bg-danger-subtle">
                                        <i class="ti ti-circle-filled me-2"></i>Create New theme
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div> 

                    <div class="col-xl-9">
                        <div class="card">
                            <div class="card-body">
                                <div id="calendar"></div>
                            </div>
                        </div>
                    </div><!-- end col -->
                </div>
                <!--end row-->

                <!-- Add New Event MODAL -->
                <div class="modal fade" id="event-modal" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form class="needs-validation" name="event-form" id="forms-event" novalidate>
                                <div class="modal-header p-3 border-bottom-0">
                                    <h5 class="modal-title" id="modal-title">
                                        Event
                                    </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body px-3 pb-3 pt-0">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="mb-3">
                                                <label class="control-label form-label">Event
                                                    Name</label>
                                                <input class="form-control" placeholder="Insert Event Name" type="text" name="title" id="event-title" required />
                                                <div class="invalid-feedback">Please provide a valid event name</div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="mb-3">
                                                <label class="control-label form-label">Category</label>
                                                <select class="form-select" name="category" id="event-category" required>
                                                    <option value="bg-primary">Blue</option>
                                                    <option value="bg-secondary">Gray Dark</option>
                                                    <option value="bg-success">Green</option>
                                                    <option value="bg-info">Cyan</option>
                                                    <option value="bg-warning">Yellow</option>
                                                    <option value="bg-danger">Red</option>
                                                    <option value="bg-dark">Dark</option>
                                                </select>
                                                <div class="invalid-feedback">Please select a valid event category</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="d-flex flex-wrap align-items-center gap-2">
                                        <button type="button" class="btn btn-danger" id="btn-delete-event">
                                            Delete
                                        </button>

                                        <button type="button" class="btn btn-light ms-auto" data-bs-dismiss="modal">
                                            Close
                                        </button>

                                        <button type="submit" class="btn btn-primary" id="btn-save-event">
                                            Save
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- end modal-content-->
                    </div>
                    <!-- end modal dialog-->
                </div>
                <!-- end modal-->

            </div> <!-- container -->

          

        </div>

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->

    </div>
    <!-- END wrapper -->

  
    <!-- Vendor js -->
    <script src="{{asset('assets/js/vendor.min.js')}}"></script>

    <!-- App js -->
    <script src="{{asset('assets/js/app.js')}}"></script>

    <!-- Fullcalendar js -->
    <script src="{{asset('assets/libs/fullcalendar/index.global.min.js')}}"></script>

    <!-- Calendar App Demo js -->
    <script src="{{asset('assets/js/pages/apps-calendar.js')}}"></script>

</body>

</html>