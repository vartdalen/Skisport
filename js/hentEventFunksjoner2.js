function selectDato(value) {

    const url = '.\\Database\\adminDBAjaxURL\\selectEventDato2.php';
    
    $.ajax({
        url: url,
        type: "post",
        data: {Gren : value},
        success:function(data){
            document.getElementById('velgDato').innerHTML = data;
        },
        error:function(err){
            alert(err);
        }
    })
    
}