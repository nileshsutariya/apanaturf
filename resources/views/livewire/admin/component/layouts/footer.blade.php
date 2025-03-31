<div>
    <script>
   
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
    </script>


</div>
