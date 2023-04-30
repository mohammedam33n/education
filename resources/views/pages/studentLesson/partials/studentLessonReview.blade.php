<div class="widget-content widget-content-area">
    <div class="bio-skill-box">
        <div class="timeline-simple">
            <h2 class="alert alert-success" role="alert">
                All Student Lessons Review
            </h2>


            <div class="timeline-list">
                <div class="timeline-post-content">
                    <div class="user-profile">
                        <img src="{{ asset('adminAssets/assets/img/90x90.jpg') }}" class="">
                    </div>
                    <div class="">
                        <span class="badge badge-success">Student Lesson Review</span>
                        <p class="meta-time-date">{{ $studentLessonReview->created_at }}</p>
                        <div class="row">
                            <p class="col">
                                finished :
                                <span class="badge badge-secondary">
                                    {{ $studentLessonReview->finished }}
                                </span>
                            </p>
                            <p class="col">
                                percentage :
                                <span class="badge badge-secondary">
                                    {{ $studentLessonReview->percentage }}%
                                </span>
                            </p>
                            <p class="inv-created-date col">
                                <span class="inv-title">last_chapter_finished :
                                </span>
                                <span class="inv-date badge bg-secondary mb-2">
                                    {{ $studentLessonReview->last_chapter_finished }}
                                </span>
                                <span class="inv-title">
                                    last_page_finished :
                                </span>
                                <span class="inv-date badge bg-secondary mb-2">
                                    {{ $studentLessonReview->last_chapter_finished }}
                                </span>
                            </p>
                        </div>
                        <div class="">
                            <svg> ... </svg>
                            <h6 class="">Syllabus Review</h6>
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="zero-config" class="table table-hover dataTable" style="width: 100%;"
                                        role="grid" aria-describedby="zero-config_info">
                                        <thead>
                                            <tr role="row">
                                                <th class="sorting_asc" tabindex="0" aria-controls="zero-config"
                                                    rowspan="1" colspan="1" aria-sort="ascending"
                                                    aria-label="Name: activate to sort column descending"
                                                    style="width: 177px;">id</th>
                                                <th class="sorting" tabindex="0" aria-controls="zero-config"
                                                    rowspan="1" colspan="1"
                                                    aria-label="from_chapter: activate to sort column ascending"
                                                    style="width: 275px;">from_chapter</th>
                                                <th class="sorting" tabindex="0" aria-controls="zero-config"
                                                    rowspan="1" colspan="1"
                                                    aria-label="to_chapter: activate to sort column ascending"
                                                    style="width: 125px;">to_chapter</th>
                                                <th class="sorting" tabindex="0" aria-controls="zero-config"
                                                    rowspan="1" colspan="1"
                                                    aria-label="from_page: activate to sort column ascending"
                                                    style="width: 55px;">from_page</th>
                                                <th class="sorting" tabindex="0" aria-controls="zero-config"
                                                    rowspan="1" colspan="1"
                                                    aria-label="to_page: activate to sort column ascending"
                                                    style="width: 94px;">to_page</th>
                                                <th class="sorting" tabindex="0" aria-controls="zero-config"
                                                    rowspan="1" colspan="1"
                                                    aria-label="finished: activate to sort column ascending"
                                                    style="width: 94px;">finished</th>
                                                <th class="sorting" tabindex="0" aria-controls="zero-config"
                                                    rowspan="1" colspan="1"
                                                    aria-label="rate: activate to sort column ascending"
                                                    style="width: 94px;">rate</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($studentLessonReview->syllabusReviews as $syllabusReview)
                                                <tr role="row">
                                                    <td class="sorting_1">{{ $syllabusReview->id }}</td>
                                                    <td>{{ $syllabusReview->from_chapter }}</td>
                                                    <td>{{ $syllabusReview->to_chapter }}</td>
                                                    <td>{{ $syllabusReview->from_page }}</td>
                                                    <td>{{ $syllabusReview->to_page }}</td>

                                                    @if ($syllabusReview->finished == 1)
                                                        <td><span class="badge badge-success"> Completed
                                                            </span></td>
                                                    @else
                                                        <td><span class="badge badge-danger">Not Completed </span></td>
                                                    @endif
                                                    </td>
                                                    <td>
                                                        @if ($syllabusReview->rate == 'excellent')
                                                            <span class="badge badge-primary">
                                                                {{ $syllabusReview->rate }}
                                                            </span>
                                                        @elseif ($syllabusReview->rate == 'very good')
                                                            <span class="badge badge-secondary">
                                                                {{ $syllabusReview->rate }}
                                                            </span>
                                                        @elseif ($syllabusReview->rate == 'good')
                                                            <span class="badge badge-success">
                                                                {{ $syllabusReview->rate }}
                                                            </span>
                                                        @elseif ($syllabusReview->rate == 'fail')
                                                            <span class="badge badge-danger">
                                                                {{ $syllabusReview->rate }}
                                                            </span>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th rowspan="1" colspan="1">id</th>
                                                <th rowspan="1" colspan="1">from_chapter</th>
                                                <th rowspan="1" colspan="1">to_chapter</th>
                                                <th rowspan="1" colspan="1">from_page</th>
                                                <th rowspan="1" colspan="1">to_page</th>
                                                <th rowspan="1" colspan="1">finished</th>
                                                <th rowspan="1" colspan="1">rate</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
