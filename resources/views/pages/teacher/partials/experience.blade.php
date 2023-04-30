<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
    <div class="work-experience layout-spacing ">
        <div class="widget-content widget-content-area">
            <h3 class="">
                {{ __('teacher.Work Experiences') }}
                <a class="text-success float-right creatTeacherExperienceButton"
                   type="button"
                   data-toggle="modal"
                   data-target='#creatExperienceModal'>

                    <i class="fa-solid fa-plus text-success"></i>
                </a>
            </h3>
            <div class="timeline-alter" id="experience_Content">

            </div>
        </div>
    </div>
</div>

@include('pages.experience.createModal')

@include('pages.experience.editModal')
