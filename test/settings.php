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
    'type' => 'postgresql',
    'host' => 'test',
    'port' => 5432,
    'user' => 'ivan',
    'pass' => 'password',
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
    'insurances' =>
        array(
            'display_name' => 'Insurances',
            'description' => '',
            'item_name' => 'Insurances',
            'actions' => $ALL_ACTIONS,
            'fields' =>
                array(
                    'id' =>
                        array(
                            'label' => 'Id',
                            'required' => true,
                            'editable' => false,
                            'type' => 'T_Number',
                        ),
                    'date_of_issue' =>
                        array(
                            'label' => 'Date Of Issue',
                            'required' => true,
                            'editable' => true,
                            'type' => 'T_TextLine',
                        ),
                ),
            'primary_key' =>
                array(
                    'columns' => array(0 => 'id',),
                    'auto' => true,
                    'sequence_name' => 'insurances_id_seq',
                ),
        ),
    'field_groups' => array(
						array(
							'label' => 'Birth date',
							'help' => 'Enter the person\'s birthday.',
							'label_tooltip' => 'Only the year is mandatory, but try to enter all date available components.',
							'fields' => array(
								'dob_year' => 6,
								'dob_month' => 3,
								'dob_day' => 3
							)
						)
					)
);
?>
