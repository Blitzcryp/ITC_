function toggle(source) {
    var checkboxes = document.querySelectorAll('input[type="checkbox"]');
    for (var i = 0; i < checkboxes.length; i++) {
        if (checkboxes[i] != source)
            checkboxes[i].checked = source.checked;
    }

    // Probabil putea fi facut mai scurt cu ternary dar se intelege mai bine asa :)
    var button = $("#selector_checkbox");
    switch(button.html()){
        case "SELECTEAZA TOATE":
            button.html('DESELECTEAZA TOATE');
            break;
        case "DESELECTEAZA TOATE":
            button.html("SELECTEAZA TOATE");
            break;
        default:
            break;
    }
}

function send(){
    var array = []
    var checkboxes = document.querySelectorAll('input[type=checkbox]:checked')

    for (var i = 0; i < checkboxes.length; i++) {
        array.push(checkboxes[i].value)
    }
    var JSONarr = JSON.stringify(array);
    $.ajax({
        url: 'decoder.php',
        type: 'POST',
        dataType: 'json',
        data: {
            'data': JSONarr
        },
        success:function(response){
            var table = $("#post_data");
            for(var i = 0; i < response.length; i++){
                if(response[i] !="on"){
                    var row = "<td>";
                    row += response[i];
                    row += "</td>";

                    table.append(row);
                }
            }
        }
    });

    console.log("Json Array: " + JSONarr);
    console.log("Array: " + array);
}

