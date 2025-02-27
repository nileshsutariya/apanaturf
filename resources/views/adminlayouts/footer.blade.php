</div>
        </div>

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->

    </div>
    <script>
    // Get current date
   
const currentDate = new Date();

// Format the date as "MMM DD, YYYY" (e.g., Feb 27, 2025)
const options = { month: 'short', day: '2-digit', year: 'numeric' };
let formattedDate = currentDate.toLocaleDateString('en-US', options);

// Insert a comma after the day
formattedDate = formattedDate.replace(/(\d{2}) /, '$1, ');

// Set the formatted date inside the <h6> tag
document.getElementById("currentDate").innerText = formattedDate;
</script>

<script>
    $(document).ready(function () {
        // Get the current page URL (excluding query params)
        var currentUrl = window.location.pathname.split("/").pop();

        // Loop through sidebar links
        $(".side-nav-link").each(function () {
            var linkUrl = $(this).attr("href");

            // If the href matches the current page, add 'active' class
            if (linkUrl === currentUrl) {
                $(this).addClass("active");

                // Optional: Add active class to the parent <li> for better styling
                $(this).closest(".side-nav-item").addClass("active");
            }
        });
    });




    $(document).ready(function () {
            var table = $('#responsive-datatable').DataTable({
                "ordering": false,
                "paging": true,
                "searching": true,
                "info": false,
                "pageLength": 10,
                "lengthChange": false,
                "dom": 'rt',
            });

            function createCustomPagination() {
                var pageInfo = table.page.info();
                var totalPages = pageInfo.pages;
                var currentPage = pageInfo.page;
                var pagination = $('.custom-pagination');
                pagination.empty();

                // Previous Button
                pagination.append('<li class="page-item ' + (currentPage === 0 ? 'disabled' : '') + '"><a class="page-link prev-page" href="javascript:void(0);">&lt;</a></li>');

                // First Page
                if (totalPages > 0) {
                    pagination.append('<li class="page-item ' + (currentPage === 0 ? 'active' : '') + '"><a class="page-link page-num" href="javascript:void(0);" data-page="0">1</a></li>');
                }

                // Show '...' before current range if needed
                if (currentPage > 2) {
                    pagination.append('<li class="page-item"><a class="page-link">...</a></li>');
                }

                // Show two pages around the current page
                for (var i = Math.max(1, currentPage - 1); i <= Math.min(totalPages - 2, currentPage + 1); i++) {
                    pagination.append('<li class="page-item ' + (i === currentPage ? 'active' : '') + '"><a class="page-link page-num" href="javascript:void(0);" data-page="' + i + '">' + (i + 1) + '</a></li>');
                }

                // Show '...' before last page if needed
                if (currentPage < totalPages - 3) {
                    pagination.append('<li class="page-item"><a class="page-link">...</a></li>');
                }

                // Last Page
                if (totalPages > 1) {
                    pagination.append('<li class="page-item ' + (currentPage === totalPages - 1 ? 'active' : '') + '"><a class="page-link page-num" href="javascript:void(0);" data-page="' + (totalPages - 1) + '">' + totalPages + '</a></li>');
                }

                // Next Button
                pagination.append('<li class="page-item ' + (currentPage === totalPages - 1 ? 'disabled' : '') + '"><a class="page-link next-page" href="javascript:void(0);">&gt;</a></li>');
            }

            // Pagination Click Events
            $(document).on('click', '.page-num', function () {
                var pageNum = $(this).data('page');
                table.page(pageNum).draw(false);
                createCustomPagination();
            });

            $(document).on('click', '.prev-page', function () {
                var currentPage = table.page.info().page;
                if (currentPage > 0) {
                    table.page(currentPage - 1).draw(false);
                    createCustomPagination();
                }
            });

            $(document).on('click', '.next-page', function () {
                var currentPage = table.page.info().page;
                var totalPages = table.page.info().pages;
                if (currentPage < totalPages - 1) {
                    table.page(currentPage + 1).draw(false);
                    createCustomPagination();
                }
            });

            // Initialize Pagination
            createCustomPagination();
        });








</script>


    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- Vendor js -->
<script src="{{asset('assets/js/vendor.min.js')}}"></script>

<!-- App js -->
<script src="{{asset('assets/js/app.js')}}"></script>

<!--Morris Chart-->
<!-- <script src="{{asset('assets/libs/morris.js/morris.min.js')}}"></script> -->
<script src="{{asset('assets/libs/raphael/raphael.min.js')}}"></script>

<!-- Projects Analytics Dashboard App js -->
<!-- <script src="{{asset('assets/js/pages/dashboard-sales.js')}}"></script> -->

<script src="{{asset('assets/libs/datatables.net/js/dataTables.min.js')}}"></script>
<script src="{{asset('assets/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js')}}"></script>

<script src="{{asset('assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('assets/libs/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js')}}"></script>

<script src="{{asset('assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('assets/libs/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js')}}"></script>

<script src="{{asset('assets/libs/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('assets/libs/datatables.net-buttons/js/buttons.print.min.js')}}"></script>

<script src="{{asset('assets/libs/datatables.net-keytable/js/dataTables.keyTable.min.js')}}"></script>
<script src="{{asset('assets/libs/datatables.net-select/js/dataTables.select.min.js')}}"></script>

<!-- Datatables init -->
<!-- <script src="{{ assert('assets/js/pages/table-datatable.js') }}"></script> -->


</body>
<!-- Mirrored from coderthemes.com/uplon/layouts/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 31 Jan 2025 10:56:29 GMT -->
</html>