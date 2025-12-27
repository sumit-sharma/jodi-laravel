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
                            <div class="col-md-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">Feedbacks List: {{ $rno }}</h4>
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Customer</a></li>
                                            <li class="breadcrumb-item active">Feedback List</li>
                                        </ol>
                                    </div>
                                </div>
                            </div>


                            <div class="col-10">
                                <h6>Sent</h6>
                            </div>
                            <div class="col-2 text-right" style="text-align: right;">
                                <div class="mb-4">
                                    <button type="button" class="btn btn-secondary">Total Record - <span
                                            id="sendTotal"></span>
                                    </button>
                                </div>
                            </div>
                            <div class="clearfix"></div>




                            <div class="col-md-12">
                                <div class="table-rep-plugin">
                                    <div class="table-responsive mb-0" data-pattern="priority-columns">
                                        <table id="Table_feedback_sender" class="table table-bordered table-sm align-middle"
                                            style="table-layout: fixed; width: 100%;">
                                            <thead class="table-primary pdng_d">
                                                <tr>
                                                    <th data-priority="1">Proposal</th>
                                                    <th data-priority="2">Name</th>
                                                    <th data-priority="3">F_St</th>
                                                    <th data-priority="4">Feedback</th>
                                                    <th data-priority="5">Dated</th>
                                                    <th data-priority="6">Time</th>
                                                    <th data-priority="7">F-By</th>
                                                </tr>
                                            </thead>

                                            <tbody class="pdng_d"></tbody>
                                        </table>
                                    </div>


                                </div>
                            </div>
                            <div class="col-md-12 col-12 mt-3 text-right" id="sender_pagination_links"></div>

                            <div class="clearfix"></div>
                            <hr>

                            <div class="col-10">
                                <h6>Received</h6>
                            </div>
                            <div class="col-2 text-right" style="text-align: right;">
                                <div class="mb-4">
                                    <button type="button" class="btn btn-secondary">Total Record - <span
                                            id="receivedTotal"></span>
                                    </button>
                                </div>
                            </div>
                            <div class="clearfix"></div>


                            <div class="col-md-12">
                                <div class="table-rep-plugin">
                                    <div class="table-responsive mb-0" data-pattern="priority-columns">
                                        <table id="Table_feedback_receiver"
                                            class="table table-bordered table-sm align-middle"
                                            style="table-layout: fixed; width: 100%;">
                                            <thead class="table-primary pdng_d">
                                                <tr>
                                                    <th data-priority="1">Proposal</th>
                                                    <th data-priority="2">Name</th>
                                                    <th data-priority="3">F_St</th>
                                                    <th data-priority="4">Feedback</th>
                                                    <th data-priority="5">Dated</th>
                                                    <th data-priority="6">Time</th>
                                                    <th data-priority="7">F-By</th>
                                                </tr>
                                            </thead>

                                            <tbody class="pdng_d"></tbody>
                                        </table>
                                    </div>


                                </div>
                            </div>
                            <div class="col-md-12 col-12 mt-3 text-right" id="receive_pagination_links"></div>
                            <div class="clearfix"></div>

                        </div>
                    </div><!-- end card -->
                </div><!-- end col -->
            </div>

        </div>
        <!-- end row-->


    </div> <!-- container-fluid -->
@endsection

@section('bottom-section')
    <script>
        $(document).ready(function () {

            const rno = "{{ $rno }}";
            // Formatting helpers
            const formatDate = (dateStr) => {
                if (!dateStr) return '-';
                return new Date(dateStr).toLocaleDateString('en-GB', { day: '2-digit', month: 'short', year: 'numeric' });
            }



            function renderTable(items, type) {
                var tbody;
                if (type == "rno") {
                    tbody = document.querySelector('#Table_feedback_sender tbody');
                } else if (type == "proposal") {
                    tbody = document.querySelector('#Table_feedback_receiver tbody');
                }

                if (!tbody) return;

                tbody.innerHTML = '';

                if (!items || items.length === 0) {
                    tbody.innerHTML = '<tr><td colspan="7" class="text-center">No matches found</td></tr>';
                    return;
                }

                items.forEach(item => {
                    let drno, dname;
                    // Determine values based on type
                    if (type == "rno") {
                        drno = item.proposal;
                        dname = item.receiver?.refname || '';
                    } else if (type == "proposal") {
                        drno = item.rno;
                        dname = item.sender?.refname || '';
                    }

                    const tr = document.createElement('tr');


                    tr.innerHTML = `<td><a href="#" class="biodata_modal" data-bs-toggle="modal" data-bs-target="#Modal_biodata" data-rno="${drno}">${drno}</a></td> <td>${dname}</td> <td>${item.fstatus == 0 ? 'No' : 'Yes'}</td> <td>${item.feedback}</td> <td>${formatDate(item.fdate)}</td> <td>${item.time}</td> <td>${item.fby}</td> `; tbody.appendChild(tr);
                });
            }

            function renderPagination(paginator, originalFormData, type) {
                let container;
                if (type == "rno") {
                    container = document.getElementById('sender_pagination_links');
                } else if (type == "proposal") {
                    container = document.getElementById('receive_pagination_links');
                }

                container.innerHTML = '';

                if (!paginator.links || paginator.links.length <= 3) return; // Hide if single page (prev, 1, next)

                const nav = document.createElement('nav');
                const ul = document.createElement('ul');
                ul.className = 'pagination';

                paginator.links.forEach((link, index) => {
                    // Laravel paginator links: { url: '...', label: '...', active: true/false }
                    const li = document.createElement('li');
                    li.className = `page-item ${link.active ? 'active' : ''} ${!link.url ? 'disabled' : ''}`;

                    const a = document.createElement('a');
                    a.className = 'page-link';
                    a.innerHTML = link.label;
                    a.href = 'javascript:void(0);';

                    if (link.url) {
                        a.onclick = function () {
                            fetchFeedbackByType(type, rno, link.page);
                        };
                    }

                    li.appendChild(a);
                    ul.appendChild(li);
                });

                nav.appendChild(ul);
                container.appendChild(nav);
            }


            function fetchFeedbackByType(type, rno, page) {
                let tbody, totalRecords;
                if (type == "rno") {
                    tbody = document.querySelector('#Table_feedback_sender tbody');
                    totalRecords = document.getElementById('sendTotal')
                } else if (type == "proposal") {
                    tbody = document.querySelector('#Table_feedback_receiver tbody');
                    totalRecords = document.getElementById('receivedTotal')
                }
                totalRecords.innerHTML = 0;
                if (!tbody) return;

                tbody.innerHTML = '';

                const formData = new FormData();
                formData.append('type', type);
                formData.append('rno', rno);
                formData.append('page', page);
                formData.append('limit', 10);
                fetch(`/fetch-feedback/${type}/${rno}?page=${page}&limit=10`, {
                    method: 'GET',
                })
                    .then(response => response.json())
                    .then(data => {

                        console.log(data);
                        if (totalRecords) totalRecords.innerHTML = data.total;
                        renderTable(data.data, type);
                        renderPagination(data, formData, type);
                    })
                    .catch(error => console.error('Error:', error));
            }

            fetchFeedbackByType('rno', rno, 1)
            fetchFeedbackByType('proposal', rno, 1)
        });
    </script>
@endsection