//Delete function
function deleteRecord(table, Id){
  Swal.fire({
      title: 'Are you sure?',
      text: "You won't be able to revert this!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
      if (result.value) {
        if(table == 'admin'){
          window.location = "/admin/account/delete-admin/" + Id;
        }else{
          window.location = "/admin/" + table + "/delete-" + table + "/" + Id;
        }
      }else{
          const Toast = Swal.mixin({
              toast: true,
              position: 'top-center',
              showConfirmButton: false,
              timer: 1500,
              timerProgressBar: true
            })
            Toast.fire({
              icon: 'error',
              title: 'Action Cancel'
            })
      }
    })
}

//Delete Topic function
function deleteTopic(course_id, topic_id){
  Swal.fire({
      title: 'Are you sure?',
      text: "You won't be able to revert this!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
      if (result.value) {
        window.location = "/admin/course/delete-topic/" + course_id + "/" + topic_id;
      }else{
          const Toast = Swal.mixin({
              toast: true,
              position: 'top-center',
              showConfirmButton: false,
              timer: 1500,
              timerProgressBar: true
            })
            Toast.fire({
              icon: 'error',
              title: 'Action Cancel'
            })
      }
    })
}

//Remove Course Instructor
function removeCourse(course_id){
  Swal.fire({
      title: 'Are you sure?',
      text: "You won't be able to revert this!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, Remove it!'
    }).then((result) => {
      if (result.value) {
        window.location = "/admin/instructor/remove-course/" + course_id;
      }else{
          const Toast = Swal.mixin({
              toast: true,
              position: 'top-center',
              showConfirmButton: false,
              timer: 1500,
              timerProgressBar: true
            })
            Toast.fire({
              icon: 'error',
              title: 'Action Cancel'
            })
      }
    })
}

//Remove Course Specialty
function removeCourseSpecialty(course_id, specialty_id){
  Swal.fire({
      title: 'Are you sure?',
      text: "You won't be able to revert this!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, Remove it!'
    }).then((result) => {
      if (result.value) {
        window.location = "/admin/specialty/remove-specialty-course/" + course_id + "/" + specialty_id;
      }else{
          const Toast = Swal.mixin({
              toast: true,
              position: 'top-center',
              showConfirmButton: false,
              timer: 1500,
              timerProgressBar: true
            })
            Toast.fire({
              icon: 'error',
              title: 'Action Cancel'
            })
      }
    })
}

//Launch jQuery
jQuery(function($){
  $('.programSpecialty').on('change', () => {
    var programSpecialty = $('.programSpecialty').val();
    $.post('/views/admin/getFields.php', {program: programSpecialty}, (data) => {
      $('#field').html(data);
    });
  });

  //get Course Name
  $('#course_specialty').keyup(() => {
      var course_name = $('#course_specialty').val()
      
      if(course_name != ""){

        $.post('/views/admin/getCourses.php', {course:course_name}, function(data) {
          $('.result-list').html(data).show();

          $('a.list-group-item').on('click', function() {
            var link = $(this).text();
            var span = $('.mask', this).text();

            $('#course_specialty').val(link.replace(/\d+/g, ''))
            $('#course_id').val(span);
            $('.result-list').hide();
          })
        });

      }else{
        $('.result-list').hide()
        alertify.error("Enter the course name");
      }
  });

});