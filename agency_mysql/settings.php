<?php // helper variable
$ALL_ACTIONS = array(MODE_NEW, MODE_EDIT, MODE_LIST, MODE_VIEW, MODE_DELETE, MODE_LINK);

/* ========================================================================================================	*/
$APP = array(
    'plugins' => array('plugin.php'),
    'title' => 'Туристическая фирма',
    'view_display_null_fields' => false,
    'page_size' => 10,
    'max_text_len' => 250,
    'pages_prevnext' => 2,
    'mainmenu_tables_autosort' => true,
    'search_lookup_resolve' => true,
    'search_string_transformation' => 'lower((%s)::text)',
    'null_label' => "<span class='nowrap' title='If you check this box, no value will be stored for this field." .
        "This may reflect missing, unknown, unspecified or inapplicable information. Note that no value (missing information)" .
        "is different to providing an empty value: an empty value is a value.'>No Value</span>",
    'render_main_page_proc' => 'demo_main_page',
    'menu_complete_proc' => 'demo_menu_complete',
    'querypage_stored_queries_table' => 'stored_queries',
    'global_search' => array('include_table' => true),
    'preprocess_func' => 'demo_preprocess'
);

/* ========================================================================================================	*/
$DB = array(
    'type' => DB_MYSQL,
    'host' => 'localhost',
    'port' => 3306,
    'user' => 'root',
    'pass' => '',
    'db' => 'agency'
);

/* ========================================================================================================	*/
$LOGIN = array(
    'users_table' => 'users',
    'primary_key' => 'id',
    'username_field' => 'login',
    'password_field' => 'password',
    'name_field' => 'name',
    'password_hash_func' => 'md5',
    'form' => array('username' => 'Имя пользователя', 'password' => 'Пароль'),
);

/* ========================================================================================================	*/
$TABLES = array(
    // ----------------------------------------------------------------------------------------------------
    'users' => array(
        'actions' => $ALL_ACTIONS,
        'display_name' => 'Пользователи',
        'description' => 'Пользователи of this application.',
        'item_name' => 'Пользователь',
        'primary_key' => array('auto' => true, 'columns' => array('id'), 'sequence_name' => 'users_id_seq'),
        'sort' => array('name' => 'asc'),
        'fields' => array(
            'id' => array('label' => 'ID', 'type' => T_NUMBER, 'editable' => false),
            'name' => array('label' => 'Полное имя', 'type' => T_TEXT_LINE, 'len' => 50, 'required' => true),
            'login' => array('label' => 'Login ID', 'type' => T_TEXT_LINE, 'len' => 10, 'required' => true),
            'password' => array('label' => 'Password', 'type' => T_PASSWORD, 'len' => 32, 'required' => true, 'min_len' => 3,
                'placeholder' => 'Мин. 3 символа'),
        )
    ),

    // ----------------------------------------------------------------------------------------------------
    'country' => array(
        'actions' => $ALL_ACTIONS,
        'display_name' => 'Страны',
        'description' => 'Страны.',
        'item_name' => 'Страна',
        'primary_key' => array('auto' => true, 'columns' => array('country_id'), 'sequence_name' => 'country_id_seq'),
        'sort' => array('country_name' => 'asc'),
        'fields' => array(
            'country_id' => array('label' => 'ID', 'type' => T_NUMBER, 'editable' => false),
            'country_name' => array('label' => 'Название страны', 'type' => T_TEXT_LINE, 'len' => 25, 'required' => true),
        )
    )
);
?>
