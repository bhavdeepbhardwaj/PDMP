// Set up CSRF token for jQuery Ajax requests
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

// Document ready function for Major Non Major Ports and Capacities
$(document).ready(function() {
    // Attach a change event handler to elements with the class 'status'
    $('.status').on("change", function(e) {
        e.preventDefault();

        // Get values from the DOM elements
        var rowid = $(this).attr('rowid');
        var status = $(this).val();
        var select_month = $('#selectMonth_' + rowid).val();
        var updated_by = $('#updatedby_' + rowid).val();

        // Make an Ajax request to update the status
        $.ajax({
            type: 'POST',
            url: '/update-status',
            data: {
                select_month: select_month,
                updated_by: updated_by,
                status: status,
                rowid: rowid,
            },
            success: function(data) {
                // Handle success, if needed
                // Check if the response contains the success status
                if (data.status === 'success') {
                    // Display the success message
                    $('#successMessage').show();
                    location.reload();
                }
            },
            error: function(error) {
                // Handle error, if needed
                console.error('Error updating status.');
            }
        });
    });
});


// Document ready function for Berth Related Information

$(document).ready(function() {
    // Attach a change event handler to elements with the class 'status'
    $('.status').on("change", function(e) {
        e.preventDefault();

        // Get values from the DOM elements
        var rowid = $(this).attr('rowid');
        var status = $(this).val();
        var select_month = $('#selectMonth_' + rowid).val();
        var updated_by = $('#updatedby_' + rowid).val();

        // Make an Ajax request to update the status
        $.ajax({
            type: 'POST',
            url: '/update-status-berth-related-information',
            data: {
                select_month: select_month,
                updated_by: updated_by,
                status: status,
                rowid: rowid,
            },
            success: function(data) {
                // Handle success, if needed
                // Check if the response contains the success status
                if (data.status === 'success') {
                    // Display the success message
                    $('#successMessage').show();
                    location.reload();
                }
            },
            error: function(error) {
                // Handle error, if needed
                console.error('Error updating status.');
            }
        });
    });
});
