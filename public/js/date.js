$('.btnDelete').click(function () {
    let id = $(this).data('value');
    let btn = $(this);
    console.log(id);
    $.ajax({
        type:'POST',
        url:'/terminliste/' + id + '/delete',
        data:{id},
        success: function(){
            btn.parent().parent().remove();
        }

    });
});

$('#editSubmit').click(function (e) {
    e.preventDefault();
    let id = $('#rowId').val();
    console.log(id);
    $.ajax({
        type: 'POST',
        url: '/terminliste/' + id + '/update',
        data: $("#editForm").serialize(),
        success: function () {
            window.location.reload();
        }

    })
});

$('.btnPassed').click(function () {
        $('div.timeline-item').removeClass('hidden');
});

$('#btnFilter').click(function () {
    let tr = document.getElementsByClassName('trRow');
    let input = document.getElementById('filterOptions').value;
    for (let i = 0; i < tr.length; i++) {

        if (tr[i].classList.contains(input)) {
            tr[i].classList.remove('hidden');
        } else {
            tr[i].classList.add('hidden');
        }
        if (input === 'alle') {
            tr[i].classList.remove('hidden');
        }
    }

});

