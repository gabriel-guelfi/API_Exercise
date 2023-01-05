$(document).ready(function (Jquery) {
    $.ajax({
        url: '/api.php/?f=list_Animals_Template',
        type: 'GET',
        success: function success(response) {
            var data = JSON.parse(response);
            console.log(data);
            // console.log('success');
            // console.log(response);
            for (let i = 0; i < data.length; i++) {
                var result = '';
                result = + '<tr><td>' + data[i].animal_table_id +
                    '</td><td>' + data[i].animal_table_species +
                    '</td><td>' + data[i].animal_table_size +
                    '</td><td>' + data[i].animal_table_type +
                    '</td><td>' + data[i].animal_table_color +
                    '</td></tr>';
                console.log(data);
            } 

            $('#tbody').html(result);
            $('#tbody').show('slow');
        },

    })
})

