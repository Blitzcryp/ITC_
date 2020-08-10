
function jsonToHtmlTable(jsonObj, selector) {
    addColumns(jsonObj, selector);
    console.log('Hello from jsontohtml');
    addRows(jsonObj, selector);
}

function addColumns(jsonObj, selector) {
    if (!$.isArray(jsonObj) || jsonObj.length < 1)
        return;
    var object = jsonObj[0];
    var theadHtml = "";
    for (var property in object) {
        if (object.hasOwnProperty(property))
            theadHtml += "<th>" + property + "</th>";
    }

    $(selector + ' thead tr').html(theadHtml);
}

function addRows(jsonObj, selector) {
    console.log('Hello from addrows');
    var tbody = $(selector + ' tbody');
    $.each(jsonObj, function (i, d) {
        var row = '<tr>';
        var checkbox = '<input type="checkbox" name="checkbox-'+d['Id']+'"value="'+ d['Id'] + '"/>';
        row += '<td>' + checkbox + '</td>';
        $.each(d, function (j, e) {
            row += '<td>' + e + '</td>';
        });
        row += '</tr>';
        tbody.append(row);
    });
}
