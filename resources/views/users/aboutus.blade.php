@include('users.layouts.userheader')
<style>
    .aboutcontainer {
        font-size: 17px;
        font-weight: 500 !important;
    }
    .content{
        margin-left: 25%;
        margin-right: 25%;
        margin-bottom: 200px;
        font-family: 'poppins', sans-serif !important;

        /* overflow-y: scroll; */
    }
    @media (max-width:1025px) {
        .content {
            margin-left: 15%;
            margin-right: 15%;4
        }
    }

    @media (max-width:650px) {
        .content {
            margin: 20px !important;
        }
    }
    @media (max-width:400px){
        .content{
            margin:15px !important;
        }
    }


</style>
<section class="content mt-4">
    <div class="container mt-5 aboutcontainer">
        <div class="row text-center mb-3">
            <h1>About</h1>
        </div>
        <div class="ml-3 text-center mb-2">By accessing and placing an order with UXTheme, you confirm that <br>you are in
            agreement with and bound by the terms and conditions</div><br>
        <p class="text-left">By accessing and placing an order with UXTheme, you confirm that you are in agreement with
            and bound by the terms and conditions contained in the Terms of Use outlined below. These terms apply to the
            entire website and any email or other type of communication between you and UXTheme. Under no circumstances
            shall UXTheme team be liable for any direct, indirect, special, incidental or consequential damages,
            including, but not limited to, loss of data or profit, arising out of the use, or the inability to use, the
            materials on this site, even if UXTheme team or an authorized representative has been advised of the
            possibility of such damages. If your use of materials from this site results in the need for servicing,
            repair or correction of equipment or data, you assume any costs thereof. UXTheme will not be responsible for
            any outcome that may occur during the course of usage of our resources.</p>
        <br>
        <h5>License</h5>
        <br>
        <p>
            By purchasing or downloading resource ("item" or "file") you are being granted a license to use these files
            for specific uses under certain conditions. Ownership remains with UXTheme, and you are required to abide by
            the following licensing terms.
        </p><br>
        <h5>Security</h5>
        <br>
        <p>
            • You have rights for royalty free use of our resources for any or all of your personal.
    </p><p>
            • You are not required to attribute or link to UXTheme in any of projects.</p>
            <p> • We reserve the rights to change prices and revise the resources usage policy in any moment.
        </p>
        <br>
        <h5>Embedded content from other websites </h5>
        <br>
        <p> Articles on this site may include embedded content (e.g. videos, images, articles, etc.). Embedded content
            from
            other websites behaves in the exact same way as if the visitor has visited the other website.
            These websites may collect data about you, use cookies, embed additional third-party tracking, and monitor
            your
            interaction with that embedded content, including tracking</p><br>
        <h5>
            Changes about terms</h5><br>
        <p>
            If we change our terms of use we will post those changes on this page. Registered users will be sent an
            email
            that outlines changes made to the terms of use.
        </p>
    </div>
</section>
@include('users.layouts.userfooter')