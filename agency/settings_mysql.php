<?php // helper variable
$ALL_ACTIONS = array(MODE_NEW, MODE_EDIT, MODE_LIST, MODE_VIEW, MODE_DELETE, MODE_LINK);

/* ========================================================================================================	*/
$APP = array (
    'title' => 'agency Database',
    'view_display_null_fields' => false,
    'page_size' => 10,
    'max_text_len' => 250,
    'pages_prevnext' => 2,
    'mainmenu_tables_autosort' => true,
    'search_lookup_resolve' => true,
    'search_string_transformation' => 'lower((%s)::text)',
);

$DB = array (
    'type' => 'postgresql',
    'host' => 'localhost',
    'port' => 5432,
    'user' => 'postgres',
    'pass' => 'root',
    'db' => 'agency',
);

$LOGIN = array (
);

$TABLES = array (
    'client' =>
        array (
            'display_name' => 'Client',
            'description' => '',
            'item_name' => 'Client',
            'actions' =>
                array (
                    0 => 'edit',
                    1 => 'new',
                    2 => 'view',
                    3 => 'list',
                    4 => 'delete',
                    5 => 'link',
                ),
            'fields' =>
                array (
                    'client_id' =>
                        array (
                            'label' => 'Client Id',
                            'required' => true,
                            'editable' => false,
                            'type' => 'T_Number',
                        ),
                    'group_id' =>
                        array (
                            'label' => 'Group Id',
                            'required' => true,
                            'editable' => true,
                            'type' => 'T_Number',
                        ),
                    'passport_id' =>
                        array (
                            'label' => 'Passport Id',
                            'required' => true,
                            'editable' => true,
                            'type' => 'T_ForeignKeyLookup',
                            'lookup' =>
                                array (
                                    'cardinality' => 'CARDINALITY_SINGLE',
                                    'table' => 'passport',
                                    'field' => 'passport_id',
                                    'display' => 'passport_id',
                                    'label_display_expr_only' => true,
                                ),
                        ),
                    'insurance_id' =>
                        array (
                            'label' => 'Insurance Id',
                            'required' => true,
                            'editable' => true,
                            'type' => 'T_Number',
                        ),
                ),
            'primary_key' =>
                array (
                    'columns' =>
                        array (
                            0 => 'client_id',
                        ),
                    'auto' => true,
                    'sequence_name' => 'client_client_id_seq',
                ),
        ),
    'client__group_' =>
        array (
            'display_name' => 'Client  Group ',
            'description' => '',
            'item_name' => 'Client  Group ',
            'actions' =>
                array (
                    0 => 'edit',
                    1 => 'new',
                    2 => 'view',
                    3 => 'list',
                    4 => 'delete',
                    5 => 'link',
                ),
            'fields' =>
                array (
                    'client_id' =>
                        array (
                            'label' => 'Client Id',
                            'required' => true,
                            'editable' => true,
                            'type' => 'T_ForeignKeyLookup',
                            'lookup' =>
                                array (
                                    'cardinality' => 'CARDINALITY_SINGLE',
                                    'table' => 'client',
                                    'field' => 'client_id',
                                    'display' => 'client_id',
                                    'label_display_expr_only' => true,
                                ),
                        ),
                    'group_id' =>
                        array (
                            'label' => 'Group Id',
                            'required' => true,
                            'editable' => true,
                            'type' => 'T_ForeignKeyLookup',
                            'lookup' =>
                                array (
                                    'cardinality' => 'CARDINALITY_SINGLE',
                                    'table' => 'group_',
                                    'field' => 'group_id',
                                    'display' => 'group_id',
                                    'label_display_expr_only' => true,
                                ),
                        ),
                ),
            'primary_key' =>
                array (
                    'columns' =>
                        array (
                        ),
                    'auto' => false,
                ),
        ),
    'country' =>
        array (
            'display_name' => 'Country',
            'description' => '',
            'item_name' => 'Country',
            'actions' =>
                array (
                    0 => 'edit',
                    1 => 'new',
                    2 => 'view',
                    3 => 'list',
                    4 => 'delete',
                    5 => 'link',
                ),
            'fields' =>
                array (
                    'country_id' =>
                        array (
                            'label' => 'Country Id',
                            'required' => true,
                            'editable' => false,
                            'type' => 'T_Number',
                        ),
                    'country_name' =>
                        array (
                            'label' => 'Country Name',
                            'required' => true,
                            'editable' => true,
                            'type' => 'T_TextLine',
                            'len' => 50,
                        ),
                ),
            'primary_key' =>
                array (
                    'columns' =>
                        array (
                            0 => 'country_id',
                        ),
                    'auto' => true,
                    'sequence_name' => 'country_country_id_seq',
                ),
        ),
    'country__trip' =>
        array (
            'display_name' => 'Country  Trip',
            'description' => '',
            'item_name' => 'Country  Trip',
            'actions' =>
                array (
                    0 => 'edit',
                    1 => 'new',
                    2 => 'view',
                    3 => 'list',
                    4 => 'delete',
                    5 => 'link',
                ),
            'fields' =>
                array (
                    'country_id' =>
                        array (
                            'label' => 'Country Id',
                            'required' => true,
                            'editable' => true,
                            'type' => 'T_ForeignKeyLookup',
                            'lookup' =>
                                array (
                                    'cardinality' => 'CARDINALITY_SINGLE',
                                    'table' => 'country',
                                    'field' => 'country_id',
                                    'display' => 'country_name',
                                    'label_display_expr_only' => true,
                                ),
                        ),
                    'trip_id' =>
                        array (
                            'label' => 'Trip Id',
                            'required' => true,
                            'editable' => true,
                            'type' => 'T_ForeignKeyLookup',
                            'lookup' =>
                                array (
                                    'cardinality' => 'CARDINALITY_SINGLE',
                                    'table' => 'trip',
                                    'field' => 'trip_id',
                                    'display' => 'trip_id',
                                    'label_display_expr_only' => true,
                                ),
                        ),
                ),
            'primary_key' =>
                array (
                    'columns' =>
                        array (
                        ),
                    'auto' => false,
                ),
        ),
    'group_' =>
        array (
            'display_name' => 'Group ',
            'description' => '',
            'item_name' => 'Group ',
            'actions' =>
                array (
                    0 => 'edit',
                    1 => 'new',
                    2 => 'view',
                    3 => 'list',
                    4 => 'delete',
                    5 => 'link',
                ),
            'fields' =>
                array (
                    'group_id' =>
                        array (
                            'label' => 'Group Id',
                            'required' => true,
                            'editable' => false,
                            'type' => 'T_Number',
                        ),
                    'n_places' =>
                        array (
                            'label' => 'N Places',
                            'required' => true,
                            'editable' => true,
                            'type' => 'T_Number',
                        ),
                    'trip_id' =>
                        array (
                            'label' => 'Trip Id',
                            'required' => true,
                            'editable' => true,
                            'type' => 'T_ForeignKeyLookup',
                            'lookup' =>
                                array (
                                    'cardinality' => 'CARDINALITY_SINGLE',
                                    'table' => 'trip',
                                    'field' => 'trip_id',
                                    'display' => 'trip_id',
                                    'label_display_expr_only' => true,
                                ),
                        ),
                    'departure_date' =>
                        array (
                            'label' => 'Departure Date',
                            'required' => true,
                            'editable' => true,
                            'type' => 'T_TextLine',
                        ),
                    'arrival_date' =>
                        array (
                            'label' => 'Arrival Date',
                            'required' => true,
                            'editable' => true,
                            'type' => 'T_TextLine',
                        ),
                    'attendant_id' =>
                        array (
                            'label' => 'Attendant Id',
                            'required' => true,
                            'editable' => true,
                            'type' => 'T_ForeignKeyLookup',
                            'lookup' =>
                                array (
                                    'cardinality' => 'CARDINALITY_SINGLE',
                                    'table' => 'personnel',
                                    'field' => 'person_id',
                                    'display' => 'person_name',
                                    'label_display_expr_only' => true,
                                ),
                        ),
                ),
            'primary_key' =>
                array (
                    'columns' =>
                        array (
                            0 => 'group_id',
                        ),
                    'auto' => true,
                    'sequence_name' => 'group__group_id_seq',
                ),
        ),
    'group__hotel' =>
        array (
            'display_name' => 'Group  Hotel',
            'description' => '',
            'item_name' => 'Group  Hotel',
            'actions' =>
                array (
                    0 => 'edit',
                    1 => 'new',
                    2 => 'view',
                    3 => 'list',
                    4 => 'delete',
                    5 => 'link',
                ),
            'fields' =>
                array (
                    'group_id' =>
                        array (
                            'label' => 'Group Id',
                            'required' => true,
                            'editable' => true,
                            'type' => 'T_ForeignKeyLookup',
                            'lookup' =>
                                array (
                                    'cardinality' => 'CARDINALITY_SINGLE',
                                    'table' => 'group_',
                                    'field' => 'group_id',
                                    'display' => 'group_id',
                                    'label_display_expr_only' => true,
                                ),
                        ),
                    'hotel_id' =>
                        array (
                            'label' => 'Hotel Id',
                            'required' => true,
                            'editable' => true,
                            'type' => 'T_ForeignKeyLookup',
                            'lookup' =>
                                array (
                                    'cardinality' => 'CARDINALITY_SINGLE',
                                    'table' => 'hotel',
                                    'field' => 'hotel_id',
                                    'display' => 'name',
                                    'label_display_expr_only' => true,
                                ),
                        ),
                    'check_in_date' =>
                        array (
                            'label' => 'Check In Date',
                            'required' => true,
                            'editable' => true,
                            'type' => 'T_TextLine',
                        ),
                    'check_out_date' =>
                        array (
                            'label' => 'Check Out Date',
                            'required' => true,
                            'editable' => true,
                            'type' => 'T_TextLine',
                        ),
                ),
            'primary_key' =>
                array (
                    'columns' =>
                        array (
                        ),
                    'auto' => false,
                ),
        ),
    'hotel' =>
        array (
            'display_name' => 'Hotel',
            'description' => '',
            'item_name' => 'Hotel',
            'actions' =>
                array (
                    0 => 'edit',
                    1 => 'new',
                    2 => 'view',
                    3 => 'list',
                    4 => 'delete',
                    5 => 'link',
                ),
            'fields' =>
                array (
                    'hotel_id' =>
                        array (
                            'label' => 'Hotel Id',
                            'required' => true,
                            'editable' => false,
                            'type' => 'T_Number',
                        ),
                    'name' =>
                        array (
                            'label' => 'Name',
                            'required' => true,
                            'editable' => true,
                            'type' => 'T_TextLine',
                            'len' => 30,
                        ),
                    'hotel_type_id' =>
                        array (
                            'label' => 'Hotel Type Id',
                            'required' => true,
                            'editable' => true,
                            'type' => 'T_Number',
                        ),
                    'food_type_id' =>
                        array (
                            'label' => 'Food Type Id',
                            'required' => true,
                            'editable' => true,
                            'type' => 'T_Number',
                        ),
                ),
            'primary_key' =>
                array (
                    'columns' =>
                        array (
                            0 => 'hotel_id',
                        ),
                    'auto' => true,
                    'sequence_name' => 'hotel_hotel_id_seq',
                ),
        ),
    'passport' =>
        array (
            'display_name' => 'Passport',
            'description' => '',
            'item_name' => 'Passport',
            'actions' =>
                array (
                    0 => 'edit',
                    1 => 'new',
                    2 => 'view',
                    3 => 'list',
                    4 => 'delete',
                    5 => 'link',
                ),
            'fields' =>
                array (
                    'passport_id' =>
                        array (
                            'label' => 'Passport Id',
                            'required' => true,
                            'editable' => false,
                            'type' => 'T_Number',
                        ),
                ),
            'primary_key' =>
                array (
                    'columns' =>
                        array (
                            0 => 'passport_id',
                        ),
                    'auto' => true,
                    'sequence_name' => 'passport_passport_id_seq',
                ),
        ),
    'personnel' =>
        array (
            'display_name' => 'Personnel',
            'description' => '',
            'item_name' => 'Personnel',
            'actions' =>
                array (
                    0 => 'edit',
                    1 => 'new',
                    2 => 'view',
                    3 => 'list',
                    4 => 'delete',
                    5 => 'link',
                ),
            'fields' =>
                array (
                    'person_id' =>
                        array (
                            'label' => 'Person Id',
                            'required' => true,
                            'editable' => false,
                            'type' => 'T_Number',
                        ),
                    'person_name' =>
                        array (
                            'label' => 'Person Name',
                            'required' => true,
                            'editable' => true,
                            'type' => 'T_TextLine',
                            'len' => 50,
                        ),
                ),
            'primary_key' =>
                array (
                    'columns' =>
                        array (
                            0 => 'person_id',
                        ),
                    'auto' => true,
                    'sequence_name' => 'personnel_person_id_seq',
                ),
        ),
    'transport_type' =>
        array (
            'display_name' => 'Transport Type',
            'description' => '',
            'item_name' => 'Transport Type',
            'actions' =>
                array (
                    0 => 'edit',
                    1 => 'new',
                    2 => 'view',
                    3 => 'list',
                    4 => 'delete',
                    5 => 'link',
                ),
            'fields' =>
                array (
                    'transport_type_id' =>
                        array (
                            'label' => 'Transport Type Id',
                            'required' => true,
                            'editable' => false,
                            'type' => 'T_Number',
                        ),
                    'transport_type' =>
                        array (
                            'label' => 'Transport Type',
                            'required' => true,
                            'editable' => true,
                            'type' => 'T_TextLine',
                            'len' => 50,
                        ),
                ),
            'primary_key' =>
                array (
                    'columns' =>
                        array (
                            0 => 'transport_type_id',
                        ),
                    'auto' => true,
                    'sequence_name' => 'transport_type_transport_type_id_seq',
                ),
        ),
    'transport_type__trip' =>
        array (
            'display_name' => 'Transport Type  Trip',
            'description' => '',
            'item_name' => 'Transport Type  Trip',
            'actions' =>
                array (
                    0 => 'edit',
                    1 => 'new',
                    2 => 'view',
                    3 => 'list',
                    4 => 'delete',
                    5 => 'link',
                ),
            'fields' =>
                array (
                    'transport_type_id' =>
                        array (
                            'label' => 'Transport Type Id',
                            'required' => true,
                            'editable' => true,
                            'type' => 'T_ForeignKeyLookup',
                            'lookup' =>
                                array (
                                    'cardinality' => 'CARDINALITY_SINGLE',
                                    'table' => 'transport_type',
                                    'field' => 'transport_type_id',
                                    'display' => 'transport_type',
                                    'label_display_expr_only' => true,
                                ),
                        ),
                    'trip_id' =>
                        array (
                            'label' => 'Trip Id',
                            'required' => true,
                            'editable' => true,
                            'type' => 'T_ForeignKeyLookup',
                            'lookup' =>
                                array (
                                    'cardinality' => 'CARDINALITY_SINGLE',
                                    'table' => 'trip',
                                    'field' => 'trip_id',
                                    'display' => 'trip_id',
                                    'label_display_expr_only' => true,
                                ),
                        ),
                ),
            'primary_key' =>
                array (
                    'columns' =>
                        array (
                        ),
                    'auto' => false,
                ),
        ),
    'trip' =>
        array (
            'display_name' => 'Trip',
            'description' => '',
            'item_name' => 'Trip',
            'actions' =>
                array (
                    0 => 'edit',
                    1 => 'new',
                    2 => 'view',
                    3 => 'list',
                    4 => 'delete',
                    5 => 'link',
                ),
            'fields' =>
                array (
                    'trip_id' =>
                        array (
                            'label' => 'Trip Id',
                            'required' => true,
                            'editable' => false,
                            'type' => 'T_Number',
                        ),
                    'duration' =>
                        array (
                            'label' => 'Duration',
                            'required' => true,
                            'editable' => true,
                            'type' => 'T_Number',
                        ),
                    'cost' =>
                        array (
                            'label' => 'Cost',
                            'required' => true,
                            'editable' => true,
                            'type' => 'T_TextLine',
                        ),
                ),
            'primary_key' =>
                array (
                    'columns' =>
                        array (
                            0 => 'trip_id',
                        ),
                    'auto' => true,
                    'sequence_name' => 'trip_trip_id_seq',
                ),
        ),
    'trip__excursion' =>
        array (
            'display_name' => 'Trip  Excursion',
            'description' => '',
            'item_name' => 'Trip  Excursion',
            'actions' =>
                array (
                    0 => 'edit',
                    1 => 'new',
                    2 => 'view',
                    3 => 'list',
                    4 => 'delete',
                    5 => 'link',
                ),
            'fields' =>
                array (
                    'trip_id' =>
                        array (
                            'label' => 'Trip Id',
                            'required' => true,
                            'editable' => true,
                            'type' => 'T_ForeignKeyLookup',
                            'lookup' =>
                                array (
                                    'cardinality' => 'CARDINALITY_SINGLE',
                                    'table' => 'trip',
                                    'field' => 'trip_id',
                                    'display' => 'trip_id',
                                    'label_display_expr_only' => true,
                                ),
                        ),
                    'excursion_id' =>
                        array (
                            'label' => 'Excursion Id',
                            'required' => true,
                            'editable' => true,
                            'type' => 'T_Number',
                        ),
                ),
            'primary_key' =>
                array (
                    'columns' =>
                        array (
                        ),
                    'auto' => false,
                ),
        ),
    'users' =>
        array (
            'display_name' => 'Users',
            'description' => '',
            'item_name' => 'Users',
            'actions' =>
                array (
                    0 => 'edit',
                    1 => 'new',
                    2 => 'view',
                    3 => 'list',
                    4 => 'delete',
                    5 => 'link',
                ),
            'fields' =>
                array (
                    'id' =>
                        array (
                            'label' => 'Id',
                            'required' => true,
                            'editable' => true,
                            'type' => 'T_Number',
                        ),
                    'login' =>
                        array (
                            'label' => 'Login',
                            'required' => true,
                            'editable' => true,
                            'type' => 'T_TextLine',
                            'len' => 50,
                        ),
                    'password' =>
                        array (
                            'label' => 'Password',
                            'required' => true,
                            'editable' => true,
                            'type' => 'T_TextLine',
                            'len' => 32,
                        ),
                    'name' =>
                        array (
                            'label' => 'Name',
                            'required' => true,
                            'editable' => true,
                            'type' => 'T_TextLine',
                            'len' => 10,
                        ),
                ),
            'primary_key' =>
                array (
                    'columns' =>
                        array (
                            0 => 'id',
                        ),
                    'auto' => false,
                ),
        ),
);
?>
