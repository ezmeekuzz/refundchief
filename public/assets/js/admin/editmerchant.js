$(document).ready(function() {
    $('#editmerchant').submit(function(event) {
        // Prevent default form submission
        event.preventDefault();

        // Get form data
        var merchant_id = $('#merchant_id').val();
        var fullname = $('#fullname').val();
        var emailaddress = $('#emailaddress').val();
        var contactnumber = $('#contactnumber').val();
        var cardnumber = $('#cardnumber').val();
        var fee = $('#fee').val();

        // Perform client-side validation
        if (merchant_id.trim() === '' || fullname.trim() === '' || emailaddress.trim() === '' || contactnumber.trim() === '' || cardnumber.trim() === '' || fee.trim() === '') {
            // Show error using SweetAlert2
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Please fill in all the required fields!',
            });
            return;
        }

        // Send AJAX request
        $.ajax({
            type: 'POST',
            url: '/admin/editmerchant/update',
            data: $('#editmerchant').serialize(), // Serialize form data
            dataType: 'json',
            beforeSend: function() {
                // Show loading effect
                Swal.fire({
                    title: 'Saving...',
                    allowOutsideClick: false,
                    didOpen: () => {
                        Swal.showLoading();
                    }
                });
            },
            success: function(response) {
                if (response.success) {
                    // Reset form and show success message
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
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
                    text: 'An error occurred. Please try again later.',
                });
                console.error(xhr.responseText);
            }
        });
    });
});
