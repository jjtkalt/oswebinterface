# oswebinterface

## German

**OpenSimulator Viewer Webinterface:**

Dieses Webinterface dient ausschließlich dazu, die Kommunikationslücke zwischen dem OpenSimulator und dem Viewer/Client, wie beispielsweise Firestorm, zu schließen.
Es ermöglicht eine nahtlose Interaktion und erleichtert die Verwaltung und Steuerung der virtuellen Umgebung direkt über den Viewer.

Das normale Webinterface wird in der Regel separat installiert und bietet zusätzliche Funktionen zur Verwaltung des OpenSimulator-Servers.
Mittlerweile gibt es hierfür einige ansprechende und benutzerfreundliche Lösungen, die die Administration und Konfiguration des Systems erheblich vereinfachen.
Diese Tools sind besonders nützlich für Benutzer, die keine tiefergehenden technischen Kenntnisse besitzen, aber dennoch effizient mit der Plattform arbeiten möchten.

Für das osWebinterface ist keine Domain erforderlich – eine einfache IP-Adresse genügt, genau wie beim OpenSimulator selbst. Das Interface lässt sich ohnehin nicht direkt über einen normalen Aufruf im Browser öffnen.
Natürlich wirkt eine eigene Domain ansprechender und professioneller, und sie ist heutzutage auch recht kostengünstig.
Das osWebinterface wurde so gestaltet, dass es sich problemlos in gängige CMS-Systeme wie WordPress oder Joomla integrieren lässt – beispielsweise als Custom HTML Block, iFrame, Embed Block oder sogar als eigenständige Seite.

## Installation Instructions

Bitte konfigurieren sie Ihr osWebinterface wie folgt:

  1. Laden Sie das oswebinterface in Ihr Webverzeichnis hoch (z.B. /var/www/oswebinterface).
  2. Passen Sie die Konfigurationsdateien an Ihre Umgebung an.
  3. Stellen Sie sicher, dass Ihr Webserver (Apache, Nginx, etc.) korrekt eingerichtet ist, um PHP-Dateien auszuführen.
  4. Richten Sie die erforderlichen Berechtigungen für die Dateien und Verzeichnisse ein.

    Folgende Dateien müssen angepasst werden:
      oswebinterface/include/config.php
      oswebinterface/include/env.php
      opensim/bin/Robust.HG.ini

 5. Testen Sie das Interface, indem Sie die URL in Ihrem Browser aufrufen (z.B. <http://IhreDomainOderIP/oswebinterface/welcomesplashpage.php>).

## Config.php Setup

config.example.php umbenennen in config.php und folgende Einträge anpassen:

Die config.example.php (Config.php) wird in der Config.md ausführlich erklärt.

## Env.php Setup

  'DB_SERVER', 'localhost' - ändert falls nötig;
  'DB_USERNAME', 'your_username' - Geben sie hier den Datenbankbenutzer an;
  'DB_PASSWORD', 'your_password' - Geben sie hier das Datenbankpasswort an;
  'DB_NAME', 'your_database' - Geben sie hier den Datenbanknamen an;
  'DB_ASSET_NAME', 'your_database' - Geben sie hier den Assetdatenbanknamen an (kann identisch mit DB_NAME sein);

  'REMOTEADMIN_HTTPAUTHUSERNAME', 'opensim' - ändern falls nötig;
  'REMOTEADMIN_HTTPAUTHPASSWORD', 'opensim123' - ändern falls nötig;

## Robust.ini Setup

    MapTileURL = "${Const|BaseURL}:${Const|PublicPort}/oswebinterface/maptile.php";
    SearchURL = "${Const|BaseURL}:${Const|PublicPort}/oswebinterface/searchservice.php";
    DestinationGuide = "${Const|BaseURL}/oswebinterface/guide.php"
    AvatarPicker = "${Const|BaseURL}/oswebinterface/avatarpicker.php"
    GridSearch = "${Const|BaseURL}/oswebinterface/gridsearch.php";
    MessageURI = ${Const|BaseURL}/oswebinterface/messages.php
    welcome = ${Const|BaseURL}/oswebinterface/welcomesplashpage.php
    economy = ${Const|BaseURL}:8008/; Download, compile and install Moneyserver from here: https://github.com/ManfredAabye/opensimcurrencyserver-dotnet
    about = ${Const|BaseURL}/oswebinterface/aboutinformation.php
    register = ${Const|BaseURL}/oswebinterface/createavatar.php
    help = ${Const|BaseURL}/oswebinterface/help.php
    password = ${Const|BaseURL}/oswebinterface/passwordreset.php
    partner = ${Const|BaseURL}/oswebinterface/partner.php
    GridStatus = ${Const|BaseURL}:${Const|PublicPort}/oswebinterface/gridstatus.php
    GridStatusRSS = ${Const|BaseURL}:${Const|PublicPort}/oswebinterface/gridstatusrss.php

  ---
  