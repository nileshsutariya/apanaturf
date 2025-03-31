<div>
        </div>
    </div>
</div>

<script>

    const currentDate = new Date();

    const options = { month: 'short', day: '2-digit', year: 'numeric' };
    let formattedDate = currentDate.toLocaleDateString('en-US', options);

    formattedDate = formattedDate.replace(/(\d{2}) /, '$1, ');

    document.getElementById("currentDate").innerText = formattedDate;
</script>

<script>
    $(document).ready(function () {
        var currentUrl = window.location.pathname.split("/").pop();

        $(".side-nav-link").each(function () {
            var linkUrl = $(this).attr("href");

            if (linkUrl === currentUrl) {
                $(this).addClass("active");

                $(this).closest(".side-nav-item").addClass("active");
            }
        });
    });

</script>

</div>