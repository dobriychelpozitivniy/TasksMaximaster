

$("#myForm").submit(function(event) {
  event.preventDefault();
        $.ajax({
         type: "POST",
         url: "controler.php",
         dataType: "html",
         data: $("#myForm").serialize(),
        
         success: function(resp) {  // Получаем результат отправки формы 
           resp = $.parseJSON(resp)
           $("#resultAjax").html(resp[1]) // Текст результата
           $("#resultAjax").addClass(resp[0]) // Класс для тега
         }
        });
});