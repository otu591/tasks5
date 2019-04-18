

$('#tasks').on('click','.del-item',function () {
    var id=$(this).data('id');
    //удаление
    $.ajax({
        url: path + '/task/delete',
        data: {id: id},
        type: 'GET',

        success: function (res) {
            window.location.reload();

        },

        error: function () {
            alert('Error!');
        }
    });
});

$('#tasks').on('click','.edit-item',function () {
    var id=$(this).data('id');
    //удаление
    $.ajax({
        url: path + '/task/edit',
        data: {id: id,text: $('#task'+id).text(),status: $('#check'+id).is(':checked')},
        type: 'POST',



        success: function (res) {
            window.location.reload();

        },

        error: function () {
            alert('Error!');
        }
    });
});


$('#sort').change(function (){

    window.location='sort/change?sort='+$(this).val();

});





