<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
</head>
<body>
    <table class="container" id="rec">
        <thead><td>Check</td><td>Id</td><td>Name</td></thead>
        
        <tbody></tbody>
    </table>
    <form type="post">
        <input type="checkbox" onclick="toggle(this);"/>
        <label id="selector_checkbox">SELECTEAZA TOATE</label>
        <br/>

        
        <input type="button" value="Trimite" onclick="send(this);"/>
        <br/>
    </form>


        <br/>
        <br/>

    <table class="container" id="post_data">
        <tr>Selected Elements</tr>
    </table>
</body>
</html>

<script src="buttonControlScript.js"></script>
<script src="tableGeneratorScript.js"></script>
<script>   
$(document).ready(function(){

    $.ajax({
        url:'jsonEncoder.php',
        type: 'get',
        data: {'functionCall': 'json_encode'},
        success: function(response) {
            var obj = JSON.parse(response);
            console.log(obj);

            jsonToHtmlTable(obj, '#rec');
        }
    });
    
}
);

</script>