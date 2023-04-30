<a class='editExperienceButton bs-tooltip text-success m-auto' data-toggle='modal' data-target='#editexperience'
    data-title="{{ $query->title }}" data-from="{{ $query->from }}" data-to="{{ $query->to }}"
    data-teacherid="{{ $query->teacher_id }}" data-href="{{ route('admin.experience.update', $query->id) }}"><i
        class='fa-solid fa-pen fa-xl'></i></a>
