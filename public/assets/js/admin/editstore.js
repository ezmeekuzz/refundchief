$(document).ready(function() {
    $('#editstore').submit(function(event) {
        // Prevent default form submission
        event.preventDefault();

        // Get form data
        var merchant_primary_id = $('#merchant_primary_id').val();
        var storename = $('#storename').val();
        var sellertype = $('#sellertype').val();
        var grossmerchandisevalue = $('#grossmerchandisevalue').val();
        var marketplace = $('#marketplace').val();

        // Perform client-side validation
        if (merchant_primary_id.trim() === '' || storename.trim() === '' || sellertype.trim() === '' || grossmerchandisevalue.trim() === '' || marketplace.trim() === '') {
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
            url: '/admin/editstore/update',
            data: $('#editstore').serialize(), // Serialize form data
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
