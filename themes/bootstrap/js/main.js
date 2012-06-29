jQuery(document).ready(function($) {
    
    // Comments show or hide
    $('.comment-links').click(function() {

        var element = $(this).parent().parent().find('.comment-stream');

        if (element.is(':visible')) {
            element.hide();   
        } else {
            element.show();
        }
        return false;

    });

    // Ajax pagination
    $('.appcontent').on('click', '.load-more-stream a', function() {
        var url = $(this).attr('href');

        $(this).parent().html('<em>loading content...</em>');

        $.ajax({
            url: url,
            type: 'POST',
            complete: function(xhr, textStatus) {
                //called when complete
            },
            success: function(data, textStatus, xhr) {
                var result = $(data).find('.appcontent .streams').html();
                var nextLink = $(data).find('.appcontent .load-more-stream').html();

                $('.appcontent .streams').append(result);
                
                if (nextLink != '') {
                    $('.appcontent .load-more-stream').html(nextLink);
                } else {
                    $('.appcontent .load-more-stream').remove();
                }
            },
            error: function(xhr, textStatus, errorThrown) {
                //called when there is an error
            }
        });

        return false;
    });

    // Update status form
    $('form#update-status-form textarea').focusin(function() {
        $(this).val('');
    }).focusout(function() {
        var val = $(this).val();

        if (val == '') {
            $(this).val('Post your status...');   
        }
    });

    $('form#update-status-form button').click(function() {
        var url = $(this).parent().attr('action');
        var textarea = $(this).parent().find('textarea');
        var statusNew = textarea.val();

        statusNew = (statusNew == 'Post your status...') ? '' : statusNew;

        if (statusNew != '') {
            $.ajax({
                url: url,
                type: 'POST',
                data: {status: statusNew},
                complete: function(xhr, textStatus) {
                    //called when complete
                },
                success: function(data, textStatus, xhr) {
                    if (data.status == true) {
                        alert('Status updated.');
                    } else {
                        alert('Post status failed.')
                    }
                    textarea.val('Post your status...');
                },
                error: function(xhr, textStatus, errorThrown) {
                    //called when there is an error
                }
            });               
        } else {
            $('.alert alert-error').remove();
            $(this).parent().before('<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">×</button><strong>Ooopppsss...!</strong> Your status cannot be empty.</div>');
        }
        
        return false;
    });
});