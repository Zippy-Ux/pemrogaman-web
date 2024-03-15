<?php
$menu = [
    [
        "nama" => "Beranda"
    ],
    [
        "nama" => "Berita",
        "subMenu" => [
            [
                "nama" => "Wisata",
                "subMenu" => [
                    [
                        "nama" => "Pantai"
                    ],
                    [
                        "nama" => "Gunung"
                    ]
                ]
            ],
            [
                "nama" => "Kuliner"
            ],
            [
                "nama" => "Hiburan"
            ]
        ]
    ],
    [
        "nama" => "Tentang"
    ],
    [
        "nama" => "Kontak"
    ],
];

function tampilkanMenuBertingkat(array $menu, $indentation = 0) {
    echo "<ul>";
    foreach ($menu as $key => $item) {
        echo "<li>";
        echo str_repeat("&nbsp;&nbsp;", $indentation);
        echo $item['nama'];
        if (isset($item['subMenu'])) {
            tampilkanMenuBertingkat($item['subMenu'], $indentation + 1);
        }
        echo "</li>";
    }
    echo "</ul>";
}

tampilkanMenuBertingkat($menu);
?>
