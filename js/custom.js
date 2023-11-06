$(document).ready(function(){
    //Fetch All Records
   function loadTable(){
    $.ajax({
        url: "http://localhost/php_project/php-ajax-rest-api/api-fetch-all.php",
        type: "GET",
        success: function(data){
            if(data.status != false){
                $.each(data, function(key, value){
                    $("#load-table").append(`
                    <tr>
                        <td class="center">${value.user_id}</td>
                        <td>${value.user_name}</td>
                        <td>${value.user_age}</td>
                        <td>${value.user_city}</td>
                        <td class="center"><button class="edit-btn" data-eid="${value.user_id}">Edit</button></td>
                        <td class="center"><button class="delete-btn" data-did="${value.user_id}">Delete</button></td>
                    </tr>`);
                });
            }else{
                $("#load-table").append(`<tr><td>${data.message}</td></tr>`);
            }
        }
    });
   }

   loadTable();

    //Insert New Record

    //Delete Record

    //Fetch Single Record : Show in Modal Box
    $(document).on("click", ".edit-btn", function(){
        $("#modal").show();
        var user_id = $(this).data("eid");
        var obj = {sid: user_id};
        var myJSON = JSON.stringify(obj);
        $.ajax({
            url: "http://localhost/php_project/php-ajax-rest-api/api-fetch-single.php",
            type: "POST",
            data: myJSON,
            success: function(data){
                $("#edit-id").val(data[0].user_id);
                $("#edit-name").val(data[0].user_name);
                $("#edit-age").val(data[0].user_age);
                $("#edit-city").val(data[0].user_city);
            }
        });
    });

    //Hide Modal Box
    $("#close-btn").on("click", function(){
        $("#modal").hide();
    });
    //Update Record

    //Live Search Record
});