jQuery(document).ready(function($){

var $stepBox = $('.step-box');

$('#add_recipe_step').click(function(a){

        // Prevents the default action from occuring.
        a.preventDefault();



            var addNewStep = '<label>Заголовок'+'<br>'+'<input type="text" name="step_title" value="" size="100"/>'+
                                '</label>'+'<br>'+'<label>Шаг №'+'<br>'+'<textarea type="text" name="step_description" cols="102" rows="7"></textarea>'+'</label>'+ '<br>'+'<br>';

            $stepBox.append(addNewStep);
    });

});