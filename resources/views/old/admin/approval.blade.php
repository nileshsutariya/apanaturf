@include('admin.layouts.header')

<div class="page-title-box">

    <div class="d-flex align-items-sm-center flex-sm-row flex-column gap-2">
        <div class="flex-grow-1">
            <h3 class="ml-3"><strong>Changes Approval Requests</strong></h3>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-12">
            <div class="card" style="background-color: transparent; box-shadow: none;">
                <div class="card-body pt-2" style="overflow: hidden;">
                    <div class="table-container" style="max-height: 400px; overflow-y: auto;">
                        <table id="responsive-datatable" id="inquiriestable" class="table dt-responsive nowrap"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%; font-size: 13px;">
                            <thead>
                                <tr class="text-uppercase">
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Date</th>
                                    <th>Subject</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                <tr>
                                    <td>changer name</td>
                                    <td>email</td>
                                    <td>date</td>
                                    <td>page name</td>
                                    <td><a href="{{route('demo')}}" 
                                        class="btn btn-warning btn-sm view-btn" id="view-btn">View</a></td>                                </tr>

                            </tbody>

                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>

</div>

@include('admin.layouts.footer')