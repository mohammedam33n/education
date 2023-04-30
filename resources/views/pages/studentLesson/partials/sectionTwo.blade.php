 <div class="widget-content widget-content-area">
     <h3 class="">Lesson : {{ $studentLesson->lesson->title ?? '' }}</h3>

     <div class="bio-skill-box">
         <div class="row">
             <div class="col">
                 <div class="d-flex b-skills">
                     <div class="">
                         <h5>Chapters Count</h5>
                         <p>{{ $studentLesson->lesson->chapters_count ?? '' }}</p>
                     </div>
                 </div>
             </div>
             <div class="col">
                 <div class="d-flex b-skills">
                     <div class="">
                         <h5>Lesson Starts From</h5>
                         <p>{{ $studentLesson->lesson->from_page ?? '' }}</p>
                     </div>
                 </div>
             </div>
             <div class="col">
                 <div class="d-flex b-skills">
                     <div class="">
                         <h5>Lesson Ends At</h5>
                         <p>{{ $studentLesson->lesson->to_page ?? '' }}</p>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>
