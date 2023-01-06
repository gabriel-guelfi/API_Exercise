$(document).ready(function (Jquery) {
    $.ajax({
        url: '/api.php/?f=list_Animals_Template',
        type: 'GET',
        success: function success(response) {
            var data = JSON.parse(response);
            console.log(response);
            console.log(data);
            // console.log(Object.keys(data));
            // console.log(Object.values(data));
            // console.log(response);
            var result = '';
            for (let i = 0; i < data.length; i++) {
                result += '<tr><td>' + data[i].animal_table_id +
                    '</td><td>' + data[i].animal_table_species +
                    '</td><td>' + data[i].animal_table_size +
                    '</td><td>' + data[i].animal_table_type +
                    '</td><td>' + data[i].animal_table_color +
                    '</td></tr>';
            } 

            $('#tbody').html(result);
            $('#tbody').show('slow');
        },

    })
})

