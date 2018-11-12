let modal = document.getElementById('myModal');


$('.btnEdit').click(function () {
    modal.style.display = 'block';
    $('#date-start').val('');
    $('#date-end').val('');
    $('#time-start').val('');
    $('#time-end').val('');
    $('#description').val('');
    $('#hoved').prop('checked', false);
    $('#junior').prop('checked', false);
    $('#aspirant').prop('checked', false);
    var rowId = $(this).data('value');
    $('#rowId').val(rowId);
    let row = $(this).parent().parent();
    let info = row.find('td');
    let dateStart = row.data('start');
    let dateEnd = row.data('end');
    let timeStart = info[2].innerText;
    let timeEnd = info[3].innerText;
    let description = info[4].innerText;
    let hoved = info[5].classList.contains('hoved');
    if (hoved === true) {
        $('#hoved').prop('checked', true)
    }
    let junior = info[6].classList.contains('junior');
    if (junior === true) {
        $('#junior').prop('checked', true)
    }
    let aspirant = info[7].classList.contains('aspirant');
    if (aspirant === true) {
        $('#aspirant').prop('checked', true)
    }
    $('#date-start').val(dateStart);
    $('#date-end').val(dateEnd);
    $('#time-start').val(timeStart.replace('\t', ''));
    $('#time-end').val(timeEnd.replace('\t', ''));
    $('#description').val(description);
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