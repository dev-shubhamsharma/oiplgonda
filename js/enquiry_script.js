$('#enquiry-form').submit(function(event) {

    event.preventDefault();

    var name = $('#name').val();
    var email = $('#email').val();
    var mobile_number = $('#mobile_number').val();
    var message = $('#message').val();

    // $('#success-msg').hide();
    $('#message-box-overlay').hide();
    $('#message-box').hide();

    $.ajax({
        type: "POST",
        url: "ajax/process_enquiry.php",
        // data: "name="+name+"&password="+mobile,
        data : {
            name:name,
            email:email,
            mobile_number: mobile_number,
            message: message
        },
        success : function(response){
            // alert('Saved success');
            // $('#success-msg').show();
            if(response.status == 'success') {
                $('#message-box')
                .text(response.message)
                .show();

                $('#message-box').removeClass('error'); 
                $('#message-box').addClass('success');
                $('#message-box-overlay').show();
                $('#enquiry-form')[0].reset();
            }
            else if(response.status == 'error') {
                $('#message-box')
                .text(response.message)
                .show();

                $('#message-box').removeClass('success'); 
                $('#message-box').addClass('error');
                $('#message-box-overlay').show();

                if (response.errors) {
                    // Display specific errors next to the form fields
                    $.each(response.errors, function(index, errorText) {
                        // Logic to display errors. We'll append them to a list or a dedicated area.
                        // For demonstration, let's append them below the main message area:
                         $('#message-box').append('<li>' + errorText + '</li>');
                    });
                }

                

                
            }
            
        },
        error: function(xhr, status, error) {
            alert('An error occurred: ' + status + ' ' + error);
            console.log(xhr.responseText);
        }

    });

    return false;
});



$('#close-btn').click(function(event)
{
    event.preventDefault();
    event.stopPropagation();
    $('#message-box-overlay').css('display','none');
    $('#message-box').hide(); // Also hide the message box itself for completeness
    $('#message-box').removeClass('success error').empty();
});
