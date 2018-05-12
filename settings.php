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
    'render_main_page_proc' => 'agency_main_page',
    'menu_complete_proc' => 'agency_menu_complete',
    'querypage_stored_queries_table' => 'stored_queries',
    'global_search' => array('include_table' => true),
    'preprocess_func' => 'agency_preprocess'
);

$DB = array(
    'type' => 'postgresql',
    'host' => 'localhost',
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


$__arr = array (
	'Accommodations' => 'Accommodations',
	'Accommodation' => 'Accommodation',
	'Id' => 'Id',
	'Checkin Date' => 'Checkin Date',
	'Checkout Date' => 'Checkout Date',
	'Group Id' => 'Group Id',
	'Hotel Id' => 'Hotel Id',
	'Clients' => 'Clients',
	'Client' => 'Client',
	'Fullname' => 'Fullname',
	'Rus Passport Data' => 'Rus Passport Data',
	'Foreign Passport Data' => 'Foreign Passport Data',
	'Insurance Date Of Issue' => 'Insurance Date Of Issue',
	'Clients  Groups' => 'Clients  Groups',
	'Client Id' => 'Client Id',
	'Countries' => 'Countries',
	'Country' => 'Страна',
	'Name' => 'Name',
	'Groups' => 'Groups',
	'Group' => 'Group',
	'N Places' => 'N Places',
	'Trip Id' => 'Trip Id',
	'Departure Date' => 'Departure Date',
	'Arrival Date' => 'Arrival Date',
	'Attendant Id' => 'Attendant Id',
	'Hotel Types' => 'Hotel Types',
	'Hotel Type' => 'Hotel Type',
	'Hotels' => 'Hotels',
	'Hotel' => 'Hotel',
	'Hotel Type Id' => 'Hotel Type Id',
	'Meal Plan Id' => 'Meal Plan Id',
	'Meal Plans' => 'Meal Plans',
	'Meal Plan' => 'Meal Plan',
	'Personnel' => 'Personnel',
	'Transport Types' => 'Transport Types',
	'Transport Type' => 'Transport Type',
	'Trips' => 'Trips',
	'Trip' => 'Trip',
	'Duration' => 'Duration',
	'Cost' => 'Cost',
	'N Excursions' => 'N Excursions',
	'Trips  Countries' => 'Trips  Countries',
	'Country Id' => 'Country Id',
	'Trips  Transport Types' => 'Trips  Transport Types',
	'Transport Type Id' => 'Transport Type Id',
	'Users' => 'Users',
	'User' => 'User',
	'Login' => 'Login',
	'Password' => 'Password',
);
$TABLES = array (
	'accommodations' =>
		array (
			'display_name' => $__arr['Accommodations'],
			'description' => '',
			'item_name' => $__arr['Accommodation'],
			'actions' => $ALL_ACTIONS,
			'fields' =>
				array (
					'id' =>
						array (
							'label' => $__arr['Id'],
							'required' => true,
							'editable' => false,
							'type' => 'T_Number',
						),
					'checkin_date' =>
						array (
							'label' => $__arr['Checkin Date'],
							'required' => true,
							'editable' => true,
							'type' => 'T_TextLine',
						),
					'checkout_date' =>
						array (
							'label' => $__arr['Checkout Date'],
							'required' => true,
							'editable' => true,
							'type' => 'T_TextLine',
						),
					'group_id' =>
						array (
							'label' => $__arr['Group Id'],
							'required' => true,
							'editable' => true,
							'type' => 'T_ForeignKeyLookup',
							'lookup' =>
								array (
									'cardinality' => 'CARDINALITY_SINGLE',
									'table' => 'groups',
									'field' => 'id',
									'display' => 'id',
									'label_display_expr_only' => true,
								),
						),
					'hotel_id' =>
						array (
							'label' => $__arr['Hotel Id'],
							'required' => true,
							'editable' => true,
							'type' => 'T_ForeignKeyLookup',
							'lookup' =>
								array (
									'cardinality' => 'CARDINALITY_SINGLE',
									'table' => 'hotels',
									'field' => 'id',
									'display' => 'name',
									'label_display_expr_only' => true,
								),
						),
				),
			'primary_key' =>
				array (
					'columns' =>
						array (
							0 => 'id',
						),
					'auto' => true,
					'sequence_name' => 'accommodations_id_seq',
				),
		),
	'clients' =>
		array (
			'display_name' => $__arr['Clients'],
			'description' => '',
			'item_name' => $__arr['Client'],
			'actions' => $ALL_ACTIONS,
			'fields' =>
				array (
					'id' =>
						array (
							'label' => $__arr['Id'],
							'required' => true,
							'editable' => false,
							'type' => 'T_Number',
						),
					'fullname' =>
						array (
							'label' => $__arr['Fullname'],
							'required' => true,
							'editable' => true,
							'type' => 'T_TextLine',
							'len' => 100,
							'resizeable' => true,
						),
					'rus_passport_data' =>
						array (
							'label' => $__arr['Rus Passport Data'],
							'required' => true,
							'editable' => true,
							'type' => 'T_TextLine',
							'len' => 100,
							'resizeable' => true,
						),
					'foreign_passport_data' =>
						array (
							'label' => $__arr['Foreign Passport Data'],
							'required' => true,
							'editable' => true,
							'type' => 'T_TextLine',
							'len' => 100,
							'resizeable' => true,
						),
					'insurance_date_of_issue' =>
						array (
							'label' => $__arr['Insurance Date Of Issue'],
							'required' => true,
							'editable' => true,
							'type' => 'T_TextLine',
						),
				),
			'primary_key' =>
				array (
					'columns' =>
						array (
							0 => 'id',
						),
					'auto' => true,
					'sequence_name' => 'clients_id_seq',
				),
		),
	'clients__groups' =>
		array (
			'display_name' => $__arr['Clients  Groups'],
			'description' => '',
			'item_name' => 'Client<->Group',
			'actions' => $ALL_ACTIONS,
			'fields' =>
				array (
					'id' =>
						array (
							'label' => $__arr['Id'],
							'required' => true,
							'editable' => false,
							'type' => 'T_Number',
						),
					'group_id' =>
						array (
							'label' => $__arr['Group Id'],
							'required' => true,
							'editable' => true,
							'type' => 'T_ForeignKeyLookup',
							'lookup' =>
								array (
									'cardinality' => 'CARDINALITY_SINGLE',
									'table' => 'groups',
									'field' => 'id',
									'display' => 'id',
									'label_display_expr_only' => true,
								),
						),
					'client_id' =>
						array (
							'label' => $__arr['Client Id'],
							'required' => true,
							'editable' => true,
							'type' => 'T_ForeignKeyLookup',
							'lookup' =>
								array (
									'cardinality' => 'CARDINALITY_SINGLE',
									'table' => 'clients',
									'field' => 'id',
									'display' => 'fullname',
									'label_display_expr_only' => true,
								),
						),
				),
			'primary_key' =>
				array (
					'columns' =>
						array (
							0 => 'id',
						),
					'auto' => true,
					'sequence_name' => 'clients__groups_id_seq',
				),
		),
	'countries' =>
		array (
			'display_name' => $__arr['Countries'],
			'description' => '',
			'item_name' => $__arr['Country'],
			'actions' => $ALL_ACTIONS,
			'fields' =>
				array (
					'id' =>
						array (
							'label' => $__arr['Id'],
							'required' => true,
							'editable' => false,
							'type' => 'T_Number',
						),
					'name' =>
						array (
							'label' => $__arr['Name'],
							'required' => true,
							'editable' => true,
							'type' => 'T_TextLine',
							'len' => 100,
							'resizeable' => true,
						),
				),
			'primary_key' =>
				array (
					'columns' =>
						array (
							0 => 'id',
						),
					'auto' => true,
					'sequence_name' => 'countries_id_seq',
				),
		),
	'groups' =>
		array (
			'display_name' => $__arr['Groups'],
			'description' => '',
			'item_name' => $__arr['Group'],
			'actions' => $ALL_ACTIONS,
			'fields' =>
				array (
					'id' =>
						array (
							'label' => $__arr['Id'],
							'required' => true,
							'editable' => false,
							'type' => 'T_Number',
						),
					'n_places' =>
						array (
							'label' => $__arr['N Places'],
							'required' => true,
							'editable' => true,
							'type' => 'T_Number',
						),
					'trip_id' =>
						array (
							'label' => $__arr['Trip Id'],
							'required' => true,
							'editable' => true,
							'type' => 'T_ForeignKeyLookup',
							'lookup' =>
								array (
									'cardinality' => 'CARDINALITY_SINGLE',
									'table' => 'trips',
									'field' => 'id',
									'display' => 'id',
									'label_display_expr_only' => true,
								),
						),
					'hotel_id' =>
						array (
							'label' => $__arr['Hotel Id'],
							'required' => true,
							'editable' => true,
							'type' => 'T_ForeignKeyLookup',
							'lookup' =>
								array (
									'cardinality' => 'CARDINALITY_SINGLE',
									'table' => 'hotels',
									'field' => 'id',
									'display' => 'name',
									'label_display_expr_only' => true,
								),
						),
					'departure_date' =>
						array (
							'label' => $__arr['Departure Date'],
							'required' => true,
							'editable' => true,
							'type' => 'T_TextLine',
						),
					'arrival_date' =>
						array (
							'label' => $__arr['Arrival Date'],
							'required' => true,
							'editable' => true,
							'type' => 'T_TextLine',
						),
					'attendant_id' =>
						array (
							'label' => $__arr['Attendant Id'],
							'required' => true,
							'editable' => true,
							'type' => 'T_ForeignKeyLookup',
							'lookup' =>
								array (
									'cardinality' => 'CARDINALITY_SINGLE',
									'table' => 'personnel',
									'field' => 'id',
									'display' => 'fullname',
									'label_display_expr_only' => true,
								),
						),
				),
			'primary_key' =>
				array (
					'columns' =>
						array (
							0 => 'id',
						),
					'auto' => true,
					'sequence_name' => 'groups_id_seq',
				),
		),
	'hotel_types' =>
		array (
			'display_name' => $__arr['Hotel Types'],
			'description' => '',
			'item_name' => $__arr['Hotel Type'],
			'actions' => $ALL_ACTIONS,
			'fields' =>
				array (
					'id' =>
						array (
							'label' => $__arr['Id'],
							'required' => true,
							'editable' => false,
							'type' => 'T_Number',
						),
					'name' =>
						array (
							'label' => $__arr['Name'],
							'required' => true,
							'editable' => true,
							'type' => 'T_TextLine',
							'len' => 100,
							'resizeable' => true,
						),
				),
			'primary_key' =>
				array (
					'columns' =>
						array (
							0 => 'id',
						),
					'auto' => true,
					'sequence_name' => 'hotel_types_id_seq',
				),
		),
	'hotels' =>
		array (
			'display_name' => $__arr['Hotels'],
			'description' => '',
			'item_name' => $__arr['Hotel'],
			'actions' => $ALL_ACTIONS,
			'fields' =>
				array (
					'id' =>
						array (
							'label' => $__arr['Id'],
							'required' => true,
							'editable' => false,
							'type' => 'T_Number',
						),
					'name' =>
						array (
							'label' => $__arr['Name'],
							'required' => true,
							'editable' => true,
							'type' => 'T_TextLine',
							'len' => 100,
							'resizeable' => true,
						),
					'hotel_type_id' =>
						array (
							'label' => $__arr['Hotel Type Id'],
							'required' => true,
							'editable' => true,
							'type' => 'T_ForeignKeyLookup',
							'lookup' =>
								array (
									'cardinality' => 'CARDINALITY_SINGLE',
									'table' => 'hotel_types',
									'field' => 'id',
									'display' => 'name',
									'label_display_expr_only' => true,
								),
						),
					'meal_plan_id' =>
						array (
							'label' => $__arr['Meal Plan Id'],
							'required' => true,
							'editable' => true,
							'type' => 'T_ForeignKeyLookup',
							'lookup' =>
								array (
									'cardinality' => 'CARDINALITY_SINGLE',
									'table' => 'meal_plans',
									'field' => 'id',
									'display' => 'name',
									'label_display_expr_only' => true,
								),
						),
				),
			'primary_key' =>
				array (
					'columns' =>
						array (
							0 => 'id',
						),
					'auto' => true,
					'sequence_name' => 'hotels_id_seq',
				),
		),
	'meal_plans' =>
		array (
			'display_name' => $__arr['Meal Plans'],
			'description' => '',
			'item_name' => $__arr['Meal Plan'],
			'actions' => $ALL_ACTIONS,
			'fields' =>
				array (
					'id' =>
						array (
							'label' => $__arr['Id'],
							'required' => true,
							'editable' => false,
							'type' => 'T_Number',
						),
					'name' =>
						array (
							'label' => $__arr['Name'],
							'required' => true,
							'editable' => true,
							'type' => 'T_TextLine',
							'len' => 100,
							'resizeable' => true,
						),
				),
			'primary_key' =>
				array (
					'columns' =>
						array (
							0 => 'id',
						),
					'auto' => true,
					'sequence_name' => 'meal_plans_id_seq',
				),
		),
	'personnel' =>
		array (
			'display_name' => $__arr['Personnel'],
			'description' => '',
			'item_name' => $__arr['Personnel'],
			'actions' => $ALL_ACTIONS,
			'fields' =>
				array (
					'id' =>
						array (
							'label' => $__arr['Id'],
							'required' => true,
							'editable' => false,
							'type' => 'T_Number',
						),
					'fullname' =>
						array (
							'label' => $__arr['Fullname'],
							'required' => true,
							'editable' => true,
							'type' => 'T_TextLine',
							'len' => 100,
							'resizeable' => true,
						),
				),
			'primary_key' =>
				array (
					'columns' =>
						array (
							0 => 'id',
						),
					'auto' => true,
					'sequence_name' => 'personnel_id_seq',
				),
		),
	'transport_types' =>
		array (
			'display_name' => $__arr['Transport Types'],
			'description' => '',
			'item_name' => $__arr['Transport Type'],
			'actions' => $ALL_ACTIONS,
			'fields' =>
				array (
					'id' =>
						array (
							'label' => $__arr['Id'],
							'required' => true,
							'editable' => false,
							'type' => 'T_Number',
						),
					'name' =>
						array (
							'label' => $__arr['Name'],
							'required' => true,
							'editable' => true,
							'type' => 'T_TextLine',
							'len' => 100,
							'resizeable' => true,
						),
				),
			'primary_key' =>
				array (
					'columns' =>
						array (
							0 => 'id',
						),
					'auto' => true,
					'sequence_name' => 'transport_types_id_seq',
				),
		),
	'trips' =>
		array (
			'display_name' => $__arr['Trips'],
			'description' => '',
			'item_name' => $__arr['Trip'],
			'actions' => $ALL_ACTIONS,
			'fields' =>
				array (
					'id' =>
						array (
							'label' => $__arr['Id'],
							'required' => true,
							'editable' => false,
							'type' => 'T_Number',
						),
					'duration' =>
						array (
							'label' => $__arr['Duration'],
							'required' => true,
							'editable' => true,
							'type' => 'T_Number',
						),
					'cost' =>
						array (
							'label' => $__arr['Cost'],
							'required' => true,
							'editable' => true,
							'type' => 'T_TextLine',
						),
					'n_excursions' =>
						array (
							'label' => $__arr['N Excursions'],
							'required' => true,
							'editable' => true,
							'type' => 'T_Number',
						),
				),
			'primary_key' =>
				array (
					'columns' =>
						array (
							0 => 'id',
						),
					'auto' => true,
					'sequence_name' => 'trips_id_seq',
				),
		),
	'trips__countries' =>
		array (
			'display_name' => $__arr['Trips  Countries'],
			'description' => '',
			'item_name' => 'Trip<->Country',
			'actions' => $ALL_ACTIONS,
			'fields' =>
				array (
					'id' =>
						array (
							'label' => $__arr['Id'],
							'required' => true,
							'editable' => false,
							'type' => 'T_Number',
						),
					'trip_id' =>
						array (
							'label' => $__arr['Trip Id'],
							'required' => true,
							'editable' => true,
							'type' => 'T_ForeignKeyLookup',
							'lookup' =>
								array (
									'cardinality' => 'CARDINALITY_SINGLE',
									'table' => 'trips',
									'field' => 'id',
									'display' => 'id',
									'label_display_expr_only' => true,
								),
						),
					'country_id' =>
						array (
							'label' => $__arr['Country Id'],
							'required' => true,
							'editable' => true,
							'type' => 'T_ForeignKeyLookup',
							'lookup' =>
								array (
									'cardinality' => 'CARDINALITY_SINGLE',
									'table' => 'countries',
									'field' => 'id',
									'display' => 'name',
									'label_display_expr_only' => true,
								),
						),
				),
			'primary_key' =>
				array (
					'columns' =>
						array (
							0 => 'id',
						),
					'auto' => true,
					'sequence_name' => 'trips__countries_id_seq',
				),
		),
	'trips__transport_types' =>
		array (
			'display_name' => $__arr['Trips  Transport Types'],
			'description' => '',
			'item_name' => 'Trip<->Transport Type',
			'actions' => $ALL_ACTIONS,
			'fields' =>
				array (
					'id' =>
						array (
							'label' => $__arr['Id'],
							'required' => true,
							'editable' => false,
							'type' => 'T_Number',
						),
					'trip_id' =>
						array (
							'label' => $__arr['Trip Id'],
							'required' => true,
							'editable' => true,
							'type' => 'T_ForeignKeyLookup',
							'lookup' =>
								array (
									'cardinality' => 'CARDINALITY_SINGLE',
									'table' => 'trips',
									'field' => 'id',
									'display' => 'id',
									'label_display_expr_only' => true,
								),
						),
					'transport_type_id' =>
						array (
							'label' => $__arr['Transport Type Id'],
							'required' => true,
							'editable' => true,
							'type' => 'T_ForeignKeyLookup',
							'lookup' =>
								array (
									'cardinality' => 'CARDINALITY_SINGLE',
									'table' => 'transport_types',
									'field' => 'id',
									'display' => 'name',
									'label_display_expr_only' => true,
								),
						),
				),
			'primary_key' =>
				array (
					'columns' =>
						array (
							0 => 'id',
						),
					'auto' => true,
					'sequence_name' => 'trips__transport_types_id_seq',
				),
		),
	'users' =>
		array (
			'display_name' => $__arr['Users'],
			'description' => '',
			'item_name' => $__arr['User'],
			'actions' => $ALL_ACTIONS,
			'fields' =>
				array (
					'id' =>
						array (
							'label' => $__arr['Id'],
							'required' => true,
							'editable' => false,
							'type' => 'T_Number',
						),
					'name' =>
						array (
							'label' => $__arr['Name'],
							'required' => true,
							'editable' => true,
							'type' => 'T_TextLine',
							'len' => 50,
						),
					'login' =>
						array (
							'label' => $__arr['Login'],
							'required' => true,
							'editable' => true,
							'type' => 'T_TextLine',
							'len' => 10,
						),
					'password' =>
						array (
							'label' => $__arr['Password'],
							'required' => true,
							'editable' => true,
							'type' => 'T_TextLine',
							'len' => 32,
						),
				),
			'primary_key' =>
				array (
					'columns' =>
						array (
							0 => 'id',
						),
					'auto' => true,
					'sequence_name' => 'users_id_seq',
				),
		),
);

?>
