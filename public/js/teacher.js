getDataShow();

function getDataShow() {
    let href = $('#showTeacherAjaxContainer').data('href')
    $.ajax({
        url: href,
        success: function (response) {

            response.statistics.forEach(statistic => {
                $('#experiences_Container').append(`
                    <div class="col-4">
                        <div class="card border-secondary">
                            <div class="card-body">
                                <h5 class="card-title text-primary text-center">
                                    ${statistic.name}
                                    <i class="fa-solid fa-users-rays text-secondary"></i>
                                </h5>
                                <p class="card-text text-primary text-center">
                                ${statistic.value}
                                </p>
                            </div>
                        </div>
                    </div>
                `)
            });

            response.experiences.forEach(experience => {
                $('#experience_Content').append(`
                    <div class="item-timeline">
                        <div class="t-meta-date">
                            <p class="">${experience.from}</p>
                            <p class="">${experience.to}</p>
                        </div>
                        <div class="t-dot" data-original-title="" title=""></div>
                        <div class="t-text d-flex justify-content-between">
                            <a class="editExperienceButton title " data-title="${experience.title}"
                            data-from="${experience.from}"
                            data-to="${experience.to}"
                            data-teacherid="${experience.teacher_id}"
                            data-toggle="modal"
                            data-target="#editexperience"
                            data-href="/admin/experience/update/${experience.id}">
                                <p>${experience.title}</p>
                                
                            </a>
                       <a class="deleteButton" href="/admin/experience/delete/${experience.id}">
                           <i class="fa-solid fa-rectangle-xmark"></i>
                        </a>
                        </div>
                        
                    </div>
                `)
            });

            response.groups.forEach(group => {
                $('#pills-tab').append(`
                    <li class="nav-item">
                        <div class="nav-link list-actions" id="group-${group.id}"
                            data-invoice-id="group : ${group.id}">
                            <div class="f-m-body">
                                <div class="f-head">
                                  
                                </div>
                                <div class="f-body">
                               <h3>${group.name}</h3>
                                </div>
                            </div>
                        </div>
                    </li>
                `)


                let groupDaysHtml = '';
                group.group_days.forEach(groupDay => {
                    groupDaysHtml += `
                        <span class="badge bg-success mb-2">${groupDay.day}
                        </span>
                    `
                });


                let studentsGroupStudentsHtml = '';
                group.students.forEach(student => {
                    studentsGroupStudentsHtml += `
                        <tr>
                            <td>${student.id}</td>
                            <td>
                                <a class='text-primary'
                                    href="/admin/student/show/${student.id}"
                                    title='Enter Page show Student'>${student.name}
                                </a>
                            </td>
                            <td class="text-right">
                                ${student.birthday}</td>
                            <td class="text-right">
                                ${student.phone}</td>
                        </tr>
                    `
                });

                $('#ct').append(`
                    <div class="group-${group.id}">
                        <div class="content-section  animated animatedFadeInUp fadeInUp">

                            <div class="row inv--head-section">

                                <div class="col-sm-6 col-12">
                                    <h3 class="in-heading">${group.ffrom}</h3>
                                </div>
                                <div class="col-sm-6 col-12 align-self-center text-sm-right">
                                    <div class="company-info">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                            height="24" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-hexagon">
                                            <path
                                                d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z">
                                            </path>
                                        </svg>
                                        <h5 class="inv-brand-name">
                                            COUNT Student : ${group.students.length}</h5>
                                    </div>
                                </div>

                            </div>

                            <div class="row inv--detail-section">
                                <div class="col-sm-7 align-self-center">
                                    <p class="inv-to">Days Num :
                                        <span class="badge bg-danger mb-2">
                                            ${group.group_type.days_num}
                                        </span>
                                    </p>
                                </div>
                                <div
                                    class="col-sm-5 align-self-center  text-sm-right order-sm-0 order-1">
                                    <p class="inv-detail-title">Group Type :
                                        <span class="badge bg-danger mb-2">
                                            ${group.group_type.name}
                                        </span>
                                    </p>
                                </div>

                                <div class="col-sm-7 align-self-center">
                                    <p class="inv-customer-name">Days Group :</p>
                                `

                    +
                    groupDaysHtml
                    +

                    `
                                </div>
                                <div class="col-sm-5 align-self-center  text-sm-right order-2">
                                    <p class="inv-customer-name">
                                        <span class="text-primary">
                                            Time Group
                                        </span>
                                    </p>
                                    <p class="inv-created-date">
                                        <span class="inv-title">From :
                                        </span>
                                        <span class="inv-date badge bg-info mb-2">
                                            ${group.ffrom}
                                        </span>
                                    </p>
                                    <p class="inv-due-date">
                                        <span class="inv-title">
                                            To :
                                        </span>
                                        <span class="inv-date badge bg-info mb-2">
                                            ${group.fto}
                                        </span>
                                    </p>
                                </div>
                            </div>


                            <div class="row inv--product-table-section">
                                <div class="col-12">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead class="">
                                                <tr>
                                                    <th scope="col">Id</th>
                                                    <th scope="col">Name</th>
                                                    <th class="text-right" scope="col">Birthday
                                                    </th>
                                                    <th class="text-right" scope="col">Phone</th>
                                                </tr>
                                            </thead>
                                            <tbody id="student">
                                            `
                    +
                    studentsGroupStudentsHtml
                    +
                    `
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                `)
            });

            invoiceListClickEvents()

            initEditeExperienceModal()
        },
        error: function () {
        }
    })
}


//



