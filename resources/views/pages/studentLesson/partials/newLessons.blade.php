<h2 class="alert alert-primary" role="alert">
    New Lessons
</h2>
<div class="table-responsive mb-4 mt-4">
    <div id="html5-extension_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
        <div class="row">

            <div class="col-md-12">
                <table id="html5-extension" class="table table-hover non-hover dataTable no-footer" style="width: 100%;"
                    role="grid" aria-describedby="html5-extension_info">
                    <thead>
                        <tr role="row">
                            <th class="sorting" tabindex="0" aria-controls="html5-extension" rowspan="1"
                                colspan="1" aria-label="Position: activate to sort column ascending"
                                style="width: 197px;">From Chapter</th>
                            <th class="sorting" tabindex="0" aria-controls="html5-extension" rowspan="1"
                                colspan="1" aria-label="Office: activate to sort column ascending"
                                style="width: 85px;">To Chapter</th>
                            <th class="sorting" tabindex="0" aria-controls="html5-extension" rowspan="1"
                                colspan="1" aria-label="Age: activate to sort column ascending" style="width: 32px;">
                                From Page</th>
                            <th class="sorting" tabindex="0" aria-controls="html5-extension" rowspan="1"
                                colspan="1" aria-label="Start date: activate to sort column ascending"
                                style="width: 95px;">To Page</th>
                            <th class="sorting" tabindex="0" aria-controls="html5-extension" rowspan="1"
                                colspan="1" aria-label="Start date: activate to sort column ascending"
                                style="width: 95px;">Rate</th>
                            <th class="sorting" tabindex="0" aria-controls="html5-extension" rowspan="1"
                                colspan="1" aria-label="Salary: activate to sort column ascending"
                                style="width: 61px;">Finished</th>
                            <th class="sorting" tabindex="0" aria-controls="html5-extension" rowspan="1"
                                colspan="1" aria-label="Salary: activate to sort column ascending"
                                style="width: 61px;">Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($studentLesson->syllabus as $syllab)
                            <tr role="row">
                                <td>{{ $syllab->from_chapter }}</td>
                                <td>{{ $syllab->to_chapter }}</td>
                                <td>{{ $syllab->from_page }}</td>
                                <td>{{ $syllab->to_page }}</td>
                                <td>
                                    @if ($syllab->rate == 'excellent')
                                        <span class="badge badge-primary">
                                            {{ $syllab->rate }}
                                        </span>
                                    @elseif ($syllab->rate == 'very good')
                                        <span class="badge badge-secondary">
                                            {{ $syllab->rate }}
                                        </span>
                                    @elseif ($syllab->rate == 'good')
                                        <span class="badge badge-success">
                                            {{ $syllab->rate }}
                                        </span>
                                    @elseif ($syllab->rate == 'fail')
                                        <span class="badge badge-danger">
                                            {{ $syllab->rate }}
                                        </span>
                                    @endif
                                </td>
                                @if ($syllab->finished == 1)
                                    <td><span class="badge badge-success"> Completed
                                        </span></td>
                                @else
                                    <td><span class="badge badge-danger">Not Completed </span></td>
                                @endif
                                <td>{{ $syllab->created_at }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
