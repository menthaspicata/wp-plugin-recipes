<?php

add_action( 'init', 'create_resip_wp' );

function create_resip_wp() {
    register_post_type( 'resipes',
        array(
            'labels' => array(
                'name'                  => 'Рецепты',
                'menu_name'             => 'Рецепты',
                'name_admin_bar'        => 'Рецепты',
                'singular_name'         => 'Рецепты',
                'add_new'               => 'Добавить',
                'add_new_item'          => 'Добавить рецепт',
                'edit'                  => 'Редактировать',
                'edit_item'             => 'Редактировать рецепт',
                'new_item'              => 'Новый рецепт',
                'view'                  => 'Смотреть',
                'view_item'             => 'Смотреть рецепт',
                'search_items'          => 'Поиск рецептов',
                'not_found'             => 'Рецепт не найден',
                'not_found_in_trash'    => 'Рецептов нет'
            ),
            'public' => true,
            'menu_position' => 3,
            'supports' => array( 'title' , 'editor'),
            'taxonomies' => array('ingridients_tax'),
            'has_archive' => true,
            'rewrite' => array(
                'slug' => 'recipes',
                //'with_front' => false
            )
        )
    );

        register_taxonomy(
        'ingridients_tax',
        'resipes',
        array(
            'labels' => array(
                'name'              => 'Категория',
                'singular_name'     => 'Категории'
            ),
            'query_var'         => true,
            'rewrite' => array(
                'slug' => 'resires',
                'hierarchical' => true
                //'with_front' => false
            ),
            'hierarchical' => true,
        )
    );
}