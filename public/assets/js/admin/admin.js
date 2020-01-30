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

//Launch jQuery
jQuery(function($){
  
  
  $('.programSpecialty').on('change', () => {
    var programSpecialty = $('.programSpecialty').val();
    $.post('/views/admin/getFields.php', {program: programSpecialty}, (data) => {
      $('#field').html(data);
    });
  });
});