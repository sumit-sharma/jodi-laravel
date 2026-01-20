@extends('layouts.home')

@section('main-content')

    <div class="container-fluid">

        <div class="row">


            <div class="col-xl-12">
                <!-- card -->
                <div class="card">
                    <!-- card body -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">Wrong Emails</h4>
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Mail</a></li>
                                            <li class="breadcrumb-item active">Wrong Emails</li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>

                            <div class="col-md-12 col-12">
                                <div class="table-rep-plugin">
                                    <div class="table-responsive mb-0" data-pattern="priority-columns">
                                        <table id="tech-companies-1" class="table table-bordered">
                                            <thead class="table-primary pdng_d">
                                                <tr>
                                                    <th data-priority="1" width="">Name</th>
                                                    <th data-priority="2" width="">RM</th>
                                                    <th data-priority="3" width="">Wromg Email Id</th>
                                                </tr>
                                            </thead>

                                            <tbody class="pdng_d">
                                            @foreach ( $wrongData as $row )
                                            
                                            <tr>
                                                <td>{{ $row->rno }}</td>
                                                <td>{{ $row->refname }}</td>
                                                <td>{{ $row->email }}</td>
                                                </tr> 
                                                @endforeach   
                                            </tbody>

                                        </table>
                                    </div>
                                    {{ $wrongData->withQueryString()->links() }}

                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div><!-- end card -->
                </div><!-- end col -->
            </div>
            <div class="clearfix"></div>



        </div>
        <!-- end row-->


    </div>
@endsection