 <div class="widget-content widget-content-area">
     <div class="bio-skill-box">
         <div class="row">
             <div class="col-3">
                 <div class="d-flex b-skills {{ $studentLesson->finished ? 'bg-success' : 'bg-danger' }}">
                     <div class="">
                         <h5 style="color:white">Finished That Lesson</h5>
                         <p style="color:white">
                             {{ $studentLesson->finished ? 'Finished' : 'Not Finished' }}</p>
                     </div>
                 </div>
             </div>
             <div class="col-3">
                 <div class="d-flex b-skills">
                     <div class="">
                         <h5>Percentage</h5>
                         <p>{{ $studentLesson->percentage }}</p>
                     </div>
                 </div>
             </div>
             <div class="col-3">
                 <div class="d-flex b-skills">
                     <div class="">
                         <h5>Last Chapter Finished</h5>
                         <p>{{ $studentLesson->last_chapter_finished }}</p>
                     </div>
                 </div>
             </div>
             <div class="col-3">
                 <div class="d-flex b-skills">
                     <div class="">
                         <h5>Last Page Finished</h5>
                         <p>{{ $studentLesson->last_page_finished }}</p>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>
