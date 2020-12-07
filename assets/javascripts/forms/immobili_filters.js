// $(document).ready(function(){
//     $('#search_text').val('');
//
//     load_data();
//
//     function load_data(query)
//     {
//         $.ajax({
//             url:"fetch_users.php",
//             method:"POST",
//             data:{query:query},
//             success:function(data)
//             {
//                 $('#result').html(data);
//             }
//         });
//     }
//     $('#search_text').keyup(function(){
//         var search = $(this).val();
//         if(search != '')
//         {
//             load_data(search);
//         }
//         else
//         {
//             load_data();
//         }
//     });
// });