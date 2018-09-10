<?php return [
    'plugin' => [
        'name' => 'Brücken Annotierer',
        'description' => 'Ein einfaches Tool zum Annotieren von Brückenbildern',
    ],
    'database' => [
        'field' => [
            'bridgetypename' => 'Name des Brückentypes',
            'description' => 'Beschreibung',
            'id' => 'ID',
            'bridgepictureid' => 'Bild ID',
            'workpackage' => 'Arbeitspaket',
            'hotkey' => 'Hotkey',
        ],
    ],
    'mainmenu' => [
        'item' => [
            'name' => 'Brücken Annotierer',
        ],
    ],
    'sidemenu' => [
        'items' => [
            'bridgetypes' => [
                'name' => 'Brückentypen',
            ],
            'bridgepictures' => [
                'name' => 'Brückenbilder',
            ],
            'workpackage' => [
                'name' => 'Arbeitspakete',
            ],
        ],
    ],
    'settings' => [
        'menu_label' => 'Brücken Annotierer',
        'menu_description' => 'Einstellungen zum Brücken Annotierer',
        'images' => [
            'path' => 'Pfad zum Datenset',
        ],
        'workpackages' => [
            'size' => 'Größe Arbeitspakete',
        ],
        'bridgetypes' => [
            'fieldname' => 'Brückentypen',
        ],
        'hotkey' => [
            'name' => 'Hotkey',
        ],
    ],
    'Database' => [
        'field' => [
            'worker' => 'Bearbeiter',
        ],
    ],
];