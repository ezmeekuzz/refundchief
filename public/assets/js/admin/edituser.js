$(document).ready(function() {
    $('#edituser').submit(function(event) {
        // Prevent default form submission
        event.preventDefault();

        // Get form data
        var fullname = $('#fullname').val();
        var emailaddress = $('#emailaddress').val();
        var usertype = $('#usertype').val();
        var password = $('#password').val();

        // Perform client-side validation
        if (fullname.trim() === '' || emailaddress.trim() === '' || !usertype || usertype.trim() === '' || password.trim() === '') {
            // Show error using SweetAlert2
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Please fill in the required fields!',
            });
            return;
        }

        // Send AJAX request
        $.ajax({
            type: 'POST',
            url: '/admin/edituser/update',
            data: $('#edituser').serialize(), // Serialize form data
            dataType: 'json',
            beforeSend: function() {
                // Show loading effect
                Swal.fire({
                    title: 'Updating...',
                    allowOutsideClick: false,
                    didOpen: () => {
                        Swal.showLoading();
                    }
                });
            },
            success: function(response) {
                if (response.success) {
                    // Redirect upon successful login
                    Swal.fire({
                        icon: 'success',
                        title: 'Data Save',
                        text: response.message,
                    });
                } else {
                    // Show error message
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: response.message,
                    });
                }
            },
            error: function(xhr, status, error) {
                // Handle AJAX errors
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'An error occurred while logging in. Please try again later.',
                });
                console.error(xhr.responseText);
            }
        });
    });
});e