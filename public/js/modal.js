let modal = document.getElementById('myModal');


$('.btnEdit').click(function () {
    modal.style.display = 'block';
    $('#date-start').val('');
    $('#date-end').val('');
    $('#time-start').val('');
    $('#time-end').val('');
    $('#event-description').val('');
    var rowId = $(this).data('value');
    $('#rowId').val(rowId);
    let row = $(this).parent().parent();
    let info = row.find('td');
    let dateStart = row.data('stat');
    let dateEnd = row.data('end');
    let timeStart = info[2].innerText;
    let timeEnd = info[3].innerText;
    let description = info[4].innerText;
    $('#date-start').val(dateStart);
    $('#date-end').val(dateEnd);
    $('#time-start').val(timeStart);
    $('#time-end').val(timeEnd);
    $('#event-description').val(description);
});

$('.close').click(function () {
    modal.style.display = 'none';
});

$(document).click(function (event) {
    if (event.target == modal) {
        modal.style.display = 'none'
    } else {

    }
});