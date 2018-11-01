$('.btnDelete').click(function () {
    let id = $(this).data('value');
    let btn = $(this);
    console.log(id);
    $.ajax({
        type:'POST',
        url:'/table/' + id + '/delete',
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
        url: '/table/' + id + '/update',
        data: $("#editForm").serialize(),
        success: function () {
            window.location.reload();
        }

    })
});

$('.btnPassed').click(function () {
        $('div.timeline-item').removeClass('hidden');
});



