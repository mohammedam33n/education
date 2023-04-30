
<div class="modal fade" id="newLessonModalReview" tabindex="-1" role="dialog" aria-labelledby="newLessonModalReview"
aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h5 class="modal-title text-light" id="newLessonModalReviewTitle">إضافة درس مراجعة جديد</h5>
            </div>
            <div class="modal-body">
                <form data-url="{{route('admin.syllabusReview.createNewLessonAjax')}}" method="post" id="newLessonFromReview">
                    
                    {{-- <input type="hidden" name="student_lesson_review_id" id="student_lesson_review_id"> --}}

                    <div class="row mb-3">
                        <div class="col">
                            <input class="text-dark form-control" id="from_chapter" name="from_chapter" placeholder="From Chapter" type="number">
                        </div>
                        <div class="col">
                            <input class="text-dark form-control" id="to_chapter" name="to_chapter" placeholder="To Chapter" type="number">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <input class="text-dark form-control" id="from_page" name="from_page" placeholder="From Page" type="number">
                        </div>
                        <div class="col">
                            <input class="text-dark form-control" id="to_page" name="to_page" placeholder="To Page" type="number">
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i>Discard</button>
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>