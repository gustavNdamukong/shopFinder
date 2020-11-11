/*!
 * Author Gustav
 * Copyright Gustav Ndamukong
 */

/*!
 * Site-wide javaSript code
 */


   
$(document).on('click', '#delete_btn', function(e)
{
    return confirm('Are you sure you want to delete this feed? This action cannot be reversed!');
    e.preventDefault();
});

