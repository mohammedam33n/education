  <div class="widget-content widget-content-area">
      <div class="bio-skill-box">
          <div class="row">
              <div class="col">
                  <div class="d-flex b-skills">
                      <div class="">
                          <h5>Subject</h5>
                          <p>{{ $studentLesson->lesson->subject->name ?? '' }}</p>
                      </div>
                  </div>
              </div>
              <div class="col">
                  <div class="d-flex b-skills">
                      <div class="">
                          <h5>Lesson</h5>
                          <p>{{ $studentLesson->lesson->title ?? '' }}</p>
                      </div>
                  </div>
              </div>
              <div class="col">
                  <div class="d-flex b-skills">
                      <div class="">
                          <h5>Student</h5>
                          <p>{{ $studentLesson->student->name ?? '' }}</p>
                      </div>
                  </div>
              </div>
              <div class="col">
                  <div class="d-flex b-skills">
                      <div class="">
                          <h5>Group</h5>
                          <p>{{ $studentLesson->group->from ?? '' }}</p>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
