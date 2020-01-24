function deleteAdmin(adminId){
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
            window.location = "/admin/account/delete-admin/" + adminId;
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