$(document).ready(function(){
    $('#search_text').val('');

    load_data();

    function load_data(query)
    {
        var user_type = get_filter('user_type');
        $.ajax({
            url:"fetch_users.php",
            method:"POST",
            data:{query:query, user_type:user_type},
            success:function(data)
            {
                $('#result').html(data);
            }
        });
    }
    $('#search_text').keyup(function(){
        var search = $(this).val();
        if(search != '')
        {
            load_data(search);
        }
        else
        {
            load_data();
        }
    });

    function get_filter(class_name)
    {
        var filter = [];
        $('.'+class_name+':checked').each(function(){
            filter.push($(this).val());
        });
        return filter;
    }


});