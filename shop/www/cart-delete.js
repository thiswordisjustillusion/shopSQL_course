//удаление товара
        $('.btn-del').click(function () { //клик на кнопку     
        var id = $(this).attr('id'); //получаем id товара
            $.ajax({//аякс-запрос
            type: "POST",//метод
            url: 'cartdel.php',//куда передаем
            data: {id_tov: id},//данные
            success: function(data) {//получаем результат
                    //тут можно пересчитать сумму
                    $('tr#'+id).css('display', 'none');//скрываем строку таблицы
                }
            });
        });