$(document).ready(function(){
    //Fetch All Records
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

    //Insert New Record

    //Delete Record

    //Fetch Single Record : Show in Modal Box

    //Hide Modal Box

    //Update Record

    //Live Search Record
});