<?php
//! Private Konfiguration
// MySQL Verbindungsdaten
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'your_username');
define('DB_PASSWORD', 'your_password');
define('DB_NAME', 'your_database');
define('DB_ASSET_NAME', 'your_database');

// RemoteAdmin
define('REMOTEADMIN_URL', 'localhost');
define('REMOTEADMIN_PORT', 8002);
define('REMOTEADMIN_HTTPAUTHUSERNAME', 'opensim');
define('REMOTEADMIN_HTTPAUTHPASSWORD', 'opensim123');

// Seitenadressen
define('BASE_URL', 'http://yourdomain.com');
define('SITE_NAME', 'Dein Grid Name');

// Konfigurieren sie ihre Robust.ini wie folgt:
//
// MapTileURL = "${Const|BaseURL}:${Const|PublicPort}/oswebinterface/maptile.php";
// SearchURL = "${Const|BaseURL}:${Const|PublicPort}/oswebinterface/searchservice.php";
// DestinationGuide = "${Const|BaseURL}/oswebinterface/guide.php"
// AvatarPicker = "${Const|BaseURL}/oswebinterface/avatarpicker.php"
// GridSearch = "${Const|BaseURL}/oswebinterface/gridsearch.php";
// MessageURI = "${Const|BaseURL}/oswebinterface/messages.php";
// welcome = ${Const|BaseURL}/oswebinterface/welcomesplashpage.php
// economy = ${Const|BaseURL}:8008/
// about = ${Const|BaseURL}/oswebinterface/aboutinformation.php
// register = ${Const|BaseURL}/oswebinterface/createavatar.php
// help = ${Const|BaseURL}/oswebinterface/help.php
// password = ${Const|BaseURL}/oswebinterface/passwordreset.php
// partner = ${Const|BaseURL}/oswebinterface/partner.php
// GridStatus = ${Const|BaseURL}:${Const|PublicPort}/oswebinterface/gridstatus.php
// GridStatusRSS = ${Const|BaseURL}:${Const|PublicPort}/oswebinterface/gridstatusrss.php

//! Allgemeine Konfiguration

// Konfigurationsoptionen Standart Template:
// "headerBlanc.php", "headerST.php", "headerW3.php", "headerBT5.php", "headerFoundation.php", "headerMaterialize.php", "headerTailwind.php",  "headerPrimer.php", "headerTachyons.php", "headerSpectre.php", "headerTent.php"
define('HEADER_FILE', 'headerBlanc.php'); // Ändere diesen Wert, um die verschienen Template Header Datei zu laden.

// Konfigurationsoption für den Banker
define('BANKER_UUID', '00000000-0000-0000-0000-000000000000');

// Verifizierungsfunktionen
define('VERIFICATION_METHOD', 'email'); // 'email' oder 'uuid'

// Asset Bilder
define('ASSETPFAD', 'cache/');
define('ASSET_FEHLT', ASSETPFAD . '00000000-0000-0000-0000-000000000002');
define('GRID_PORT', ':8002');
define('GRID_ASSETS', ':8003/assets/');
define('GRID_ASSETS_SERVER', BASE_URL . 'GRID_ASSETS');

// Guide
define('GRIDLIST_FILE', 'include/gridlist.csv');
define('GRIDLIST_VIEW', 'json'); // 'json', 'database' oder 'grid'

// Tagesmeldungen
define('SHOW_DAILY_UPDATE', true); // Ein- oder ausschalten
define('DAILY_UPDATE_TYPE', 'rss'); // 'text' oder 'rss'
define('DAILYTEXT', 'Dies ist eine aus der config.php konfigurierte tagesaktuelle Einblendung.'); // Tagesaktueller Text
//define('RSS_FEED_URL', 'https://www.hypergridbusiness.com/feed'); // URL des RSS-Feeds Beispiel:Hypergrid Business.
//define('RSS_FEED_URL', 'http://opensimulator.org/viewgit/?a=rss-log&p=opensim'); // URL des RSS-Feeds Beispiel:OpenSimulator.org.
define('RSS_FEED_URL', BASE_URL . '/oswebinterface/include/rss-feed.php');
define('FEED_CACHE_PATH', __DIR__.'/feed_cache.html'); // Cache-Dateipfad
define('FEED_CACHE_MAX_AGE', 3600); // Cache max. 60 Minuten alt
define('CALENDAR_TITLE', 'Event Calendar');

// Media 
//define('MEDIA_SERVER', 'http://localhost:8500/stream');
define('MEDIA_SERVER', 'http://schwarze-welle.de:7500/stream');
//define('MEDIA_SERVER_STATUS', 'http://localhost:8500/status-json.xsl');
define('MEDIA_SERVER_STATUS', 'http://schwarze-welle.de:7500/');

// Passwörter (unbedingt austauschen!)
// Für das austauschen der Passwöter könnt ihr den paswd_generator.php benutzen den ihr im Verszeichnis /include findet.
$registration_passwords_register = ["wTPcHHeJtWdq7TgO", "gSIYKo2GwJdbG8OF", "2BhmSCM4hoFrOvxF", "3cy4JmMzvlSU1A9U", "xee1dobnAQw68l2h"];
$registration_passwords_reset = ["2p1hyc7SB66jfKQ1", "LxCqG48wwnay5MfO", "1CbEcKTifZ6h9OlK", "SoS5POHZOWHxtm4u", "v8hHP9NH3aOfv3gl"];
$registration_passwords_partner = ["5RnzSCEsPMDxaQR2", "9HvbzusabKTIxaz8", "Y4VlOWRr58Hi8Ws2", "u3nnDDmTJllseMFa", "NclxMDWwvWU6vw9T"];
$registration_passwords_inventory = ["KCyLnXcYbzlHHGxJ", "s0FpOl2WK0z2XFom", "HCauWX3iWnWer618", "bhfYKNN9KCyKVR02", "6ClHiehJajeGVq0f"];
$registration_passwords_datatable = ["YQ48zwTDqnnAb6Xu", "BkM5xOL3BFLwTkUm", "CPP86GIPdelqbH4u", "96cbwc7AgRNYYAbn", "tZ9fsOhFVo93uN5s"];
$registration_passwords_listinventar = ["irAd4LBMwYRgb5TU", "YYqz1eM6R9TsepKI", "TkuB4bpjaeE8tD5G", "WYYuKeYeyqfimLYR", "yqmTqvHbcYZDOVrP"];
$registration_passwords_picreader = ["uAXaqeNx2gZPmVkb", "xrc7PfHMf0llM8le", "dSPpMbeHxbkJ4aSA", "ST0vyvHS0pstdcQe", "zD81V0R21gMUUHps"];
$registration_passwords_mutelist = ["MB8Kc1cRrOvq8mzc", "Qn7zmYL9horDjupk", "wwhM3EURkNSKE1aE", "GStRnBjRUgxl5EbE", "LLk9JFcuwfQRF3qR"];
$registration_passwords_avatarpicker = ["QAotMKYpuYRPQpf0", "c3PT4r5Y2CgMNDmz", "0Eo97SU7swmBpNsR", "cDwE3Lw356K8KoeW", "hzZSxckUQI6Bbdma"];
$registration_passwords_economy = ["kkkQwdLjalFE6Zd5", "RFoDmJbAneTYAKpP", "SXiAUpusQsEG95q1", "rIHjlus3RNkDNNPU", "ujfObXDU74HZ4Gh4"];
$registration_passwords_events = ["H8JYYA7B5xU1LFNp", "agGln8DgmGknH3Zm", "45eBxkwpfqhFWl8F", "Q6IAMHuiUFEfiRrz", "mbXQiPqlwNq2N4le"];

// Farben der Webseite
$colorSchemes = array(
    'oceanBreeze' => array('header' => '#2E8BC0', 'footer' => '#2E8BC0', 'secondary' => '#B1D4E0', 'primary' => '#3B3B98'),
    'sunsetGlow' => array('header' => '#FF6F61', 'footer' => '#FF6F61', 'secondary' => '#FFD54F', 'primary' => '#2C3E50'),
    'forestHaven' => array('header' => '#2F5233', 'footer' => '#2F5233', 'secondary' => '#A4DE02', 'primary' => '#FFAE03'),
    'lavenderBliss' => array('header' => '#6A0572', 'footer' => '#6A0572', 'secondary' => '#D2B4DE', 'primary' => '#F5B7B1'),
    'fierySunset' => array('header' => '#D32F2F', 'footer' => '#D32F2F', 'secondary' => '#FFCDD2', 'primary' => '#B71C1C'),
    'coolMint' => array('header' => '#009688', 'footer' => '#009688', 'secondary' => '#B2DFDB', 'primary' => '#004D40'),
    'royalBlue' => array('header' => '#3F51B5', 'footer' => '#3F51B5', 'secondary' => '#C5CAE9', 'primary' => '#1A237E'),
    'autumnHarvest' => array('header' => '#8D6E63', 'footer' => '#8D6E63', 'secondary' => '#FFCCBC', 'primary' => '#3E2723'),
    'goldenHour' => array('header' => '#FFEB3B', 'footer' => '#FFEB3B', 'secondary' => '#FFF9C4', 'primary' => '#FBC02D'),
    'mintChocolate' => array('header' => '#4CAF50', 'footer' => '#4CAF50', 'secondary' => '#CDDC39', 'primary' => '#795548'),
    'berryBurst' => array('header' => '#E91E63', 'footer' => '#E91E63', 'secondary' => '#F8BBD0', 'primary' => '#880E4F'),
    'midnightBlue' => array('header' => '#0D47A1', 'footer' => '#0D47A1', 'secondary' => '#BBDEFB', 'primary' => '#1E88E5'),
    'grayscale1' => array('header' => '#333333', 'footer' => '#333333', 'secondary' => '#666666', 'primary' => '#E0E0E0'),
    'grayscale2' => array('header' => '#4F4F4F', 'footer' => '#4F4F4F', 'secondary' => '#A0A0A0', 'primary' => '#FFFFFF'),
    'grayscale3' => array('header' => '#2B2B2B', 'footer' => '#2B2B2B', 'secondary' => '#858585', 'primary' => '#D9D9D9'),
    'emeraldDream' => array('header' => '#50C878', 'footer' => '#50C878', 'secondary' => '#98FB98', 'primary' => '#006400'),
    'coralReef' => array('header' => '#FF7F50', 'footer' => '#FF7F50', 'secondary' => '#FFD700', 'primary' => '#8B0000'),
    'purpleHaze' => array('header' => '#8A2BE2', 'footer' => '#8A2BE2', 'secondary' => '#DA70D6', 'primary' => '#4B0082'),
    'sunshineMeadow' => array('header' => '#FFD700', 'footer' => '#FFD700', 'secondary' => '#F0E68C', 'primary' => '#556B2F'),
    'autumnLeaves' => array('header' => '#FF4500', 'footer' => '#FF4500', 'secondary' => '#FFD700', 'primary' => '#8B4513'),
    'crimsonTide' => array('header' => '#DC143C', 'footer' => '#DC143C', 'secondary' => '#FFDAB9', 'primary' => '#8B0000'),
    'skylineView' => array('header' => '#87CEEB', 'footer' => '#87CEEB', 'secondary' => '#4682B4', 'primary' => '#1E90FF'),
    'blazingSunset' => array('header' => '#FF4500', 'footer' => '#FF4500', 'secondary' => '#FFD700', 'primary' => '#FF8C00'),
    'morningMist' => array('header' => '#87CEEB', 'footer' => '#87CEEB', 'secondary' => '#B0E0E6', 'primary' => '#4682B4'),
    'twilightSparkle' => array('header' => '#4B0082', 'footer' => '#4B0082', 'secondary' => '#9370DB', 'primary' => '#8A2BE2'),
    'sereneGreen' => array('header' => '#2E8B57', 'footer' => '#2E8B57', 'secondary' => '#98FB98', 'primary' => '#006400'),
    'coralBlush' => array('header' => '#FF6F61', 'footer' => '#FF6F61', 'secondary' => '#FFA07A', 'primary' => '#FA8072'),
    'earthyBrown' => array('header' => '#8B4513', 'footer' => '#8B4513', 'secondary' => '#D2B48C', 'primary' => '#A0522D'),
    'crimsonWave' => array('header' => '#B22222', 'footer' => '#B22222', 'secondary' => '#FF6347', 'primary' => '#DC143C'),
    'coolCyan' => array('header' => '#00CED1', 'footer' => '#00CED1', 'secondary' => '#E0FFFF', 'primary' => '#20B2AA'),
    'deepPurple' => array('header' => '#9400D3', 'footer' => '#9400D3', 'secondary' => '#9932CC', 'primary' => '#8B008B'),
    'warmAmber' => array('header' => '#FFBF00', 'footer' => '#FFBF00', 'secondary' => '#FFD700', 'primary' => '#FF8C00'),
    'gentlePink' => array('header' => '#FF69B4', 'footer' => '#FF69B4', 'secondary' => '#FFB6C1', 'primary' => '#FF1493'),
    'midnightTeal' => array('header' => '#008080', 'footer' => '#008080', 'secondary' => '#40E0D0', 'primary' => '#20B2AA'),
    'sunsetOrange' => array('header' => '#FF4500', 'footer' => '#FF4500', 'secondary' => '#FF6347', 'primary' => '#FF7F50'),
    'forestGreen' => array('header' => '#228B22', 'footer' => '#228B22', 'secondary' => '#32CD32', 'primary' => '#006400'),
    'icyBlue' => array('header' => '#00BFFF', 'footer' => '#00BFFF', 'secondary' => '#ADD8E6', 'primary' => '#1E90FF'),
    'rosyRed' => array('header' => '#FF6347', 'footer' => '#FF6347', 'secondary' => '#FF7F7F', 'primary' => '#FF4500'),
    'plumPurple' => array('header' => '#8B008B', 'footer' => '#8B008B', 'secondary' => '#DA70D6', 'primary' => '#9932CC'),
    'vibrantYellow' => array('header' => '#FFD700', 'footer' => '#FFD700', 'secondary' => '#FFFF00', 'primary' => '#FFA500'),
    'aquaMarine' => array('header' => '#7FFFD4', 'footer' => '#7FFFD4', 'secondary' => '#E0FFFF', 'primary' => '#40E0D0'),
    'burntSienna' => array('header' => '#E97451', 'footer' => '#E97451', 'secondary' => '#D2691E', 'primary' => '#CD5C5C'),
    'mintGreen' => array('header' => '#98FF98', 'footer' => '#98FF98', 'secondary' => '#ADFF2F', 'primary' => '#32CD32'),
    'sapphireBlue' => array('header' => '#0F52BA', 'footer' => '#0F52BA', 'secondary' => '#4682B4', 'primary' => '#1E90FF'),
    'coralPink' => array('header' => '#F88379', 'footer' => '#F88379', 'secondary' => '#FF7F50', 'primary' => '#FF6347'),
    'jadeGreen' => array('header' => '#00A36C', 'footer' => '#00A36C', 'secondary' => '#50C878', 'primary' => '#2E8B57'),
    'peachOrange' => array('header' => '#FFDAB9', 'footer' => '#FFDAB9', 'secondary' => '#FFE4B5', 'primary' => '#FFA07A'),
    'rubyRed' => array('header' => '#9B111E', 'footer' => '#9B111E', 'secondary' => '#FF6347', 'primary' => '#B22222'),
    'skyBlue' => array('header' => '#87CEEB', 'footer' => '#87CEEB', 'secondary' => '#B0E0E6', 'primary' => '#00BFFF'),
    'burntOrange' => array('header' => '#FF7F50', 'footer' => '#FF7F50', 'secondary' => '#FFA07A', 'primary' => '#FF4500'),
    'standardcolor' => array('header' => '#cdb38b', 'footer' => '#eecfa1', 'secondary' => '#f5f5dc', 'primary' => '#4F4F4F')
);
// Die Farbschaltflächen habe ich eingefügt damit man sich ein gesamtbild der Farbschemas machen kann.
// Bitte last eure kereativität durch nichts stoppen ändert die colorSchemes wie es euch gefällt.
define('SHOW_COLOR_BUTTONS', false); // Farbschaltflächen anzeigen (true/false)
define('INITIAL_COLOR_SCHEME', 'standardcolor'); // Farbschema auswählen

// Farben und Schriftart
// Setze aktuelle Farbschema basierend auf der Konstanten INITIAL_COLOR_SCHEME
$currentColorScheme = $colorSchemes[INITIAL_COLOR_SCHEME];

// definiere die Farben für Header, Footer und andere
define('HEADER_COLOR', $currentColorScheme['header']);   // Header-Farbe
define('FOOTER_COLOR', $currentColorScheme['footer']);   // Footer-Farbe
define('SECONDARY_COLOR', $currentColorScheme['secondary']);  // Sekundärfarbe
define('PRIMARY_COLOR', $currentColorScheme['primary']); // Primäre Schriftfarbe

define('FONT_FAMILY_STATS', 'Arial, Verdana, sans-serif');
define('FONT_FAMILY', 'Pacifico, normal, serif');

// Schriftgrößen
define('BASE_FONT_SIZE', '26px'); // Standardgröße für Text
define('TITLE_FONT_SIZE', '48px'); // Größe für Überschriften
define('STATS_FONT_SIZE', '14px'); // Größe für Statistik-Text

// Links
define('LINK_COLOR', '#3A3A3A'); // Standard Link-Farbe
define('LINK_HOVER_COLOR', 'red'); // Link-Farbe beim Hover

// Hintergrund- und Vordergrundbilder
define('BACKGROUND_IMAGE', 'pics/transparent.png'); // Hintergrundbild
define('FOREGROUND_IMAGE', 'pics/transparent.png'); // Logo oder Vordergrundbild
define('BACKGROUND_OPACITY', 1.0); // Transparenz des Hintergrunds
define('FOREGROUND_OPACITY', 1.0); // Transparenz des Logos

// Anzeigeoptionen
define('LOGO_ON', 'OFF'); // Logo anzeigen: ON / OFF
define('TEXT_ON', 'ON'); // Begrüßungstext anzeigen: ON / OFF
define('LOGO_PATH', 'include/Metavers150.png'); // Pfad zum Logo
define('LOGO_WIDTH', '50%'); // Logo-Breite
define('LOGO_HEIGHT', '25%'); // Logo-Höhe
define('GUIDE_DATA', 'DATA'); // DATA/JSON guide anzeigen.

// Begrüßungstext
// Schriftarten gibt es hier: https://fonts.google.com/
// LOGO_FONT Beispiele: 'Pacifico', 'Barriecito','Playfair Display','Comic Neue','Roboto','Lobster','Montserrat','Oswald','Raleway','Merriweather','Lora','Open Sans','Dancing Script','Nunito'
define('LOGO_FONT', 'Lobster'); // Schriftart des Logos
define('PRIMARY_COLOR_LOGO', '#00FFFF'); // Allgemeine Schriftfarbe Schwarz 000000, Weiss FFFFFF
define('WELCOME_TEXT', '<p> &nbsp; Willkommen im ' . SITE_NAME . '</p>');
define('WELCOME_TEXT_WIDTH', '50%');  // Standardbreite (z. B. 50%)
define('WELCOME_TEXT_HEIGHT', 'auto');  // Standardhöhe (auto für flexible Höhe)
define('WELCOME_TEXT_COLOR', PRIMARY_COLOR_LOGO);  // Farbe des Textes
define('WELCOME_TEXT_ALIGN', 'left');  // Zentriert, links oder rechts
define('WELCOME_TEXT_FONT_SIZE', '24px');  // Schriftgröße des Textes

// Bildanzeige-Einstellungen
define('SLIDESHOW_FOLDER', './images'); // Verzeichnis für die Bilder
define('IMAGE_SIZE', 'width:100%;height:100%'); // Größe der Bilder (100% für Vollbild)
define('SLIDESHOW_DELAY', 9000); // Zeit zwischen Bildern (in ms, 9000 = 9 Sekunden)

// Einstellungen für Maptiles
define('FREI_COLOR', '#0088FF'); // Farbe für freie Koordinaten
define('BESCHLAGT_COLOR', '#55C155'); // Farbe für SingleRegion
define('VARREGION_COLOR', '#006400'); // Farbe für VarRegion
define('CENTER_COLOR', '#FF0000'); // Farbe für Zentrum
define('TILE_SIZE', '25px'); // Größe der Farbfelder

// Zentrum des Grids
define('CONF_CENTER_COORD_X', 5500); // X-KOORDINATE DES ZENTRUMS
define('CONF_CENTER_COORD_Y', 5500); // Y-KOORDINATE DES ZENTRUMS

define('MAPS_X', 32);
define('MAPS_Y', 32);

// MOTD-Einstellung: 'Dyn' für dynamisch, 'Static' für statisch
define('MOTD', 'Dyn'); // Oder 'Static'

// Statische MOTD (nur relevant, wenn MOTD auf 'Static' gesetzt ist)
define('MOTD_STATIC_MESSAGE', 'Willkommen auf im Grid! Bitte beachte unsere Regeln.');
define('MOTD_STATIC_TYPE', 'system');
define('MOTD_STATIC_URL_TOS', BASE_URL . '/include/tos.php');
define('MOTD_STATIC_URL_DMCA', BASE_URL . '/include/dmca.php');

// Definiere verschiedene RSS-Feed-URLs getrennt durch Komma.
$feed_urls = [
    'http://opensimulator.org/viewgit/?a=rss-log&p=opensim', // Standard-Feed
    'https://www.hypergridbusiness.com/feed'
];

// Maximale Anzahl der Einträge pro Feed
$max_entries = 50;
?>
