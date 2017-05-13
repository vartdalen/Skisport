function selectDato(value) {
    
    const getUrl = '.\\Database\\adminDBAjaxURL\\selectEventDato.php';
    const gren = $('#velgGren').val();

    $.ajax({
        
        url: getUrl,
        processData: false,
        type: 'POST',
        data: {Gren: value},
        success:function (data){
//            var list = document.getElementById('velgDato');
//            list.append($("<option></option").attr("value", '').text('Please Select'));
//            $.each(json, function(value, key) {
//                
//                list.append($("<option></option>").attr("value", value).text(key));
//                
//            });
            document.getElementById('velgDato').innerHTML = data;
            alert(JSON.stringify(data));
//            var len = Object.keys(response).length;
//            console.log(len);
//            for (var i = 0; i < Object.keys(data).length; i++) {
            
//                var parsed_data = $.parseJSON(data);
//                console.log(parsed_data);
//                var input = document.getElementById(i);
//                $('#velgDato').val(data);
                
                
//            }
            
//            alert(valueOf(data));
        },
        error:function (rompe) {
            alert(rompe);
        }
    });
    
}
