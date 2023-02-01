$(document).ready(function()
{

        $(document).ready( function () {
            $('#user_table').DataTable();
        });

        $(document).ready( function () {
            $('#categories_table').DataTable();
        });


        $.ajaxSetup({
           headers:
           {
           	  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           }
	    });

        $('.delete-user').on('submit', function (e) {
              e.preventDefault();
              var button = $(this);

              swal.fire({
                icon: 'warning',
                  title: 'Are you sure you want to delete this user ?',
                  showDenyButton: false,
                  showCancelButton: true,
                  confirmButtonText: 'Yes'
              }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed)
                {
                  $.ajax({
                    type: 'post',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: button.data('route'),
                    data: {
                      '_method': 'delete'
                    },
                    success: function (response)
                    {
                        Swal.fire({
                          icon: 'success',
                          title: 'User deleted successfully',
                          showDenyButton: false,
                          showCancelButton: false,
                          confirmButtonText: 'Yes'
                      }).then((result) => {
                        window.location='/users'
                      });

                    }
                  });
                }
                else if (result.dismiss === Swal.DismissReason.cancel)
                {
                    Swal.fire(
                      'Cancelled',
                      'The user is still in database :)',
                      'error'
                    )

                }

              });

        })

        $('.delete-category').on('submit', function (e) {
            e.preventDefault();
            var button = $(this);

            swal.fire({
              icon: 'warning',
                title: 'Are you sure you want to delete this category ?',
                showDenyButton: false,
                showCancelButton: true,
                confirmButtonText: 'Yes'
            }).then((result) => {
              /* Read more about isConfirmed, isDenied below */
              if (result.isConfirmed)
              {
                $.ajax({
                  type: 'post',
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  },
                  url: button.data('route'),
                  data: {
                    '_method': 'delete'
                  },
                  success: function (response)
                  {
                      Swal.fire({
                        icon: 'success',
                        title: 'Category deleted successfully',
                        showDenyButton: false,
                        showCancelButton: false,
                        confirmButtonText: 'Yes'
                    }).then((result) => {
                      window.location='/categories'
                    });

                  }
                });
              }
              else if (result.dismiss === Swal.DismissReason.cancel)
              {
                  Swal.fire(
                    'Cancelled',
                    'The user is still in database :)',
                    'error'
                  )

              }

            });

          })


});
