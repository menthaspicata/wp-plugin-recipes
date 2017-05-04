<?php

add_action('save_post', 'save_box_data');

/*
 * Этап 1. Добавление
 */
function meta_boxes() {
    add_meta_box('truediv', 'Пошаговый рецепт', 'print_steps_box', 'resipes', 'normal', 'high');
}
 
add_action( 'admin_menu', 'meta_boxes' );
/*
 * также можно использовать и другие хуки:
 * add_action( 'add_meta_boxes', 'tr_meta_boxes' );
 * если версия WordPress ниже 3.0, то
 * add_action( 'admin_init', 'tr_meta_boxes', 1 );
 */
 
/*
 * Этап 2. Заполнение
 */
function print_steps_box( $post ) {
    wp_nonce_field( basename( __FILE__ ), 'steps_box' );
    /*
     * добавляем текстовое поле
     */



    $step_title = get_post_meta($post->ID, 'step_title',true);
    $step_description = get_post_meta($post->ID, 'step_description',true);
?>
<div class='step-box'>
    <label>Заголовок <br>
    <input type="text" name="step_title" value="<?= esc_attr( $step_title ) ?>" size="100"/>
    </label><br> 


   <label class='step-number'>Шаг №1 <br>
    <textarea type="text" name="step_description" cols="102" rows="7"><?= esc_attr( $step_description ) ?> </textarea>
    </label> <br><br>
</div> 

 <button id="add_recipe_step" class="button button-primary button-large">Добавить шаг рецепта</button>
<?php
}

 
/*
 * Этап 3. Сохранение
 */
function save_box_data ( $post_id ) {
    // проверяем, пришёл ли запрос со страницы с метабоксом
    if ( !isset( $_POST['steps_box'] )
    || !wp_verify_nonce( $_POST['steps_box'], basename( __FILE__ ) ) )
        return $post_id;
    // проверяем, является ли запрос автосохранением
    if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) 
        return $post_id;
    // проверяем, права пользователя, может ли он редактировать записи
    if ( !current_user_can( 'edit_post', $post_id ) )
        return $post_id;
    // теперь также проверим тип записи 
    $post = get_post($post_id);
    // if ($post->resipes == 'post') { // укажите собственный
        update_post_meta($post_id, 'step_title', $_POST['step_title']);
        update_post_meta($post_id, 'step_description', $_POST['step_description']);
    // }
    return $post_id;
}
 



