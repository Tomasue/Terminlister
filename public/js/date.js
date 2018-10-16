$('.btnDelete').click(function () {
    let id = $(this).data('value');
    console.log(id);
    $.ajax({
        type:'POST',
        url:'/table/' + id + '/delete',
        data:{id},
        success: function(){
            $(this).remove();
            console.log('done')
        }

    });
});

