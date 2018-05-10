<?php //------------------------------------------------------------------------------------------
// registered via $APP['render_main_page_proc']
function agency_main_page () {
    //------------------------------------------------------------------------------------------
    // provides the main page text
    echo l10n('agency.main-page');
}

//------------------------------------------------------------------------------------------
// registered via $APP['preprocess_func']
function agency_preprocess () {
    //------------------------------------------------------------------------------------------
    $new = l10n('menu.new');
    $browse = l10n('menu.browse+edit');

    l10n_register('agency.plugin', 'ru', array(
        'agency.menu.extras' => 'Extras',
        'agency.menu.extras.new-query' => 'Query the Database',
        'agency.menu.extras.list-queries' => 'Stored Queries',
        'agency.main-page' => <<<HTML
				<p>This is a demo of <a href="https://github.com/eScienceCenter/dbWebGen">dbWebGen</a>. It is great.</p>
				<p>Via the <i>$new</i> menu, you can create new records in the database</p>
				<p>Via the <i>$browse</i> menu, you can browse, edit and delete existing records in the database</p>
				<p>Via the <i>Extras</i> menu, you can query the database</p>
HTML
    ));

    l10n_register('agency.plugin', 'ru', array(
        'agency.menu.extras' => 'Дополнительно',
        'agency.menu.extras.new-query' => 'Запрос к базе',
        'agency.menu.extras.list-queries' => 'Сохраненные запросы',
        'agency.main-page' => <<<HTML
				<p>Наша туристическая фирма </p>
				<p>Через меню <i>$new</i> вы можете добавить новые записи в бд.</p>
				<p>Im Menü <i>$browse</i>  вы можете просматривать,редактировать и удалять записи в бд.</p>
				<p>Через меню <i>Extras</i> вы можете создать запрос.</p>
HTML
    ));
}

//------------------------------------------------------------------------------------------
// registered via $APP['menu_complete_proc']
function agency_menu_complete (&$menu) {
    //------------------------------------------------------------------------------------------
    global $APP;

    // we append an "Extras" dropdown to the main menu, allowing the user to query the DB
    $extras_menu = array(
        'name' => l10n('agency.menu.extras'),
        'items' => array(
            array(
                'label' => l10n('agency.menu.extras.new-query'),
                'href' => '?' . http_build_query(array('mode' => MODE_QUERY))
            ),
            array(
                'label' => l10n('agency.menu.extras.list-queries'),
                'href' => '?' . http_build_query(array('table' => $APP['querypage_stored_queries_table']))
            )
        )
    );

    $menu[] = $extras_menu;
}

?>
