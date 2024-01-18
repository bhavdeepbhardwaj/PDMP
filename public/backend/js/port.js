$(function () {
    // Get the CSRF token from the meta tag
    var csrfToken = $('meta[name="csrf-token"]').attr('content');

    // Fetch Port Types
    $.get('/get-port-types', function (data) {
        var portTypes = data.portTypes;
        $('#port_type').html('<option value="">-- Select Type --</option>');
        $.each(portTypes, function (index, portType) {
            $('#port_type').append('<option value="' + portType.id + '">' + portType
                .category_name + '</option>');
        });
    });

    // Event listener for changing Port Type
    $('#port_type').on('change', function () {
        var port_type_id = $(this).val();
        if (port_type_id === '1') {
            // If Port Type is 1, hide State Board dropdown and fetch Ports directly
            $('#startBoard_div').hide();
            fetchPorts(port_type_id);
        } else {
            // If Port Type is not 2, show State Board dropdown/
            $('#port_name').html('');
            $('#startBoard_div').show();
        }
    });

    // Event listener for changing State Board
    $('#state_board').on('change', function () {
        fetchPorts();
    });

    function fetchPorts(port_type_id) {
        // var port_type_id = $('#port_type').val();
        var states_board_id = $('#state_board').is(':visible') ? $('#state_board').val() : null;

        // Fetch Ports based on Port Type and State Board
        $.ajax({
            url: '/get-ports',
            method: 'post',
            data: {
                port_type: port_type_id,
                state_board: states_board_id,
                _token: csrfToken,
            },
            dataType: 'json',
            success: function (data) {
                var ports = data.ports;
                $('#port_name').html('');
                // Clear existing options and add default "Select Port" option
                $('#port_name').html('<option value="">All Port</option>');

                $.each(ports, function (index, port) {
                    $('#port_name').append('<option value="' + port.id + '">' + port
                        .port_name + '</option>');
                });
            },
            error: function (xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    }

    $('#port_type').on('change', function () {
        var portTypeId = $(this).val();
        if (portTypeId != 1) {
            $.ajax({
                url: '/get-state-boards/',
                method: 'GET',
                success: function (data) {
                    var stateBoards = data.stateBoards;
                    $('#state_board').html('');

                    // Clear existing options and add default "All State Board" option
                    $('#state_board').html('<option value="">All State Board</option>');

                    $.each(stateBoards, function (index, stateBoard) {
                        $('#state_board').append('<option value="' + stateBoard.id + '">' + stateBoard.name + '</option>');
                    });
                },
                error: function (xhr, status, error) {
                    console.error('Error fetching state boards:', status, error);
                }
            });
        } else {
            $('#state_board').html('<option value="0" selected>All State Board</option>');
        }

    });
});
