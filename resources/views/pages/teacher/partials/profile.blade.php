<div class="user-profile layout-spacing">
    <div class="widget-content widget-content-area">
        <div class="d-flex justify-content-between">
            <h3 class="">{{ __('teacher.Info') }}</h3>
            <a class="mt-2 editTeacherButton" data-toggle='modal' data-target='#editTeacher'
               data-teacher="{{ $teacher }}" data-href="{{ route('admin.teacher.update', $teacher->id) }}">
                <i class="fa-solid fa-user-pen text-primary fa-2x"></i>
            </a>

        </div>
        <div class="text-center user-info">
            @if ($teacher->avatar)
                <img src="{{ $teacher->avatar }}" alt="" class="avatar-image">
            @else
                <img src="{{ asset('images/Spare.jpg') }}" alt="" class="avatar-image">
            @endif
            <p class="">{{ $teacher->name }}</p>
        </div>


        <div class="user-info-list">

            <div class="">
                <ul class="contacts-block list-unstyled">
                    <li class=" mb-2 d-flex justify-content-start align-items-center">
                        <i class="fa-solid fa-cake-candles text-dark icon mr-2"></i>
                        {{ $teacher->birthday }}
                    </li>
                    <li class=" mb-2 d-flex justify-content-start align-items-center">
                        <i class="fa-solid fa-phone-flip text-dark font-weight-bold  mr-2"></i>
                        {{  $teacher->phone }}

                    </li>
                    <li class=" mb-2 d-flex justify-content-start align-items-center">
                        <i class="fa-solid fa-paperclip text-dark  mr-2 "></i>
                        {{ $teacher->qualification }}
                    </li>

                </ul>
            </div>
        </div>
    </div>
</div>
