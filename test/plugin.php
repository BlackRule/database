<?php //------------------------------------------------------------------------------------------
// registered via $APP['render_main_page_proc']
function demo_main_page () {
    //------------------------------------------------------------------------------------------
    // provides the main page text
    echo l10n('demo.main-page');
}

//------------------------------------------------------------------------------------------
// registered via $APP['preprocess_func']
function demo_preprocess () {
    //------------------------------------------------------------------------------------------
    $new = l10n('menu.new');
    $browse = l10n('menu.browse+edit');

    l10n_register('demo.plugin', 'ru', array(
        'demo.menu.extras' => 'Extras',
        'demo.menu.extras.new-query' => 'Query the Database',
        'demo.menu.extras.list-queries' => 'Stored Queries',
        'demo.main-page' => <<<HTML
				<p>This is a demo of <a href="https://github.com/eScienceCenter/dbWebGen">dbWebGen</a>. It is great.</p>
				<p>Via the <i>$new</i> menu, you can create new records in the database</p>
				<p>Via the <i>$browse</i> menu, you can browse, edit and delete existing records in the database</p>
				<p>Via the <i>Extras</i> menu, you can query the database</p>
HTML
    ));

    l10n_register('demo.plugin', 'ru', array(
        'demo.menu.extras' => 'Дополнительно',
        'demo.menu.extras.new-query' => 'Запрос к базе',
        'demo.menu.extras.list-queries' => 'Сохраненные запросы',
        'demo.main-page' => <<<HTML
				<p>Наша туристическая фирма </p>
				<p>Через меню <i>$new</i> вы можете добавить новые записи в бд.</p>
				<p>Im Menü <i>$browse</i>  вы можете просматривать,редактировать и удалять записи в бд.</p>
				<p>Через меню <i>Extras</i> вы можете создать запрос.</p>
HTML
    ));
}

//------------------------------------------------------------------------------------------
// registered via $APP['menu_complete_proc']
function demo_menu_complete (&$menu) {
    //------------------------------------------------------------------------------------------
    global $APP;

    // we append an "Extras" dropdown to the main menu, allowing the user to query the DB
    $extras_menu = array(
        'name' => l10n('demo.menu.extras'),
        'items' => array(
            array(
                'label' => l10n('demo.menu.extras.new-query'),
                'href' => '?' . http_build_query(array('mode' => MODE_QUERY))
            ),
            array(
                'label' => l10n('demo.menu.extras.list-queries'),
                'href' => '?' . http_build_query(array('table' => $APP['querypage_stored_queries_table']))
            )
        )
    );

    $menu[] = $extras_menu;
}

?>
