# Konfigurationsanleitung für das OS Webinterface

Diese Anleitung erklärt die wichtigsten Einstellungen aus der config.example.php und wie du sie für dein Grid anpasst.

Kopiere die config.example.php in config.php und passe die folgenden Abschnitte an:

## 1. RemoteAdmin-Konfiguration

- **REMOTEADMIN_URL**: Adresse des RemoteAdmin-Servers (z.B. localhost oder IP)
  > Wird benötigt, damit das Webinterface mit dem OpenSim-Grid kommunizieren und Verwaltungsbefehle senden kann.
- **REMOTEADMIN_PORT**: Port des RemoteAdmin-Servers (Standard: 8002)
  > Gibt an, auf welchem Port der RemoteAdmin-Dienst erreichbar ist.

## 2. Seitenadressen

- **BASE_URL**: Basis-URL deiner Webseite (z.B. <http://deinserver.de>)
  > Die Hauptadresse, unter der das Webinterface erreichbar ist. Wichtig für Links und Weiterleitungen.
- **SITE_NAME**: Name deines Grids
  > Wird auf der Webseite angezeigt und dient zur Identifikation deines Grids.

## 3. Template-Auswahl

- **HEADER_FILE**: Wähle das gewünschte Template für das Seitenlayout (z.B. headerBlanc.php, headerBT5.php usw.)
  > Bestimmt das Aussehen und Layout der Seite. Verschiedene Header bieten unterschiedliche Designs.

## 4. Banker-Konfiguration

- **BANKER_UUID**: UUID des Bankers (wird für MoneyServer benötigt)
  > Identifiziert den System-Benutzer, der für Geldtransaktionen im Grid zuständig ist.

## 5. Verifizierung

- **VERIFICATION_METHOD**: "email" oder "uuid" – wie sollen Nutzer verifiziert werden?
  > Legt fest, ob sich Nutzer per E-Mail oder UUID verifizieren müssen. Erhöht die Sicherheit bei der Registrierung.

## 6. Asset-Einstellungen

- **ASSETPFAD**: Pfad zum Asset-Cache
  > Speicherort für zwischengespeicherte Grid-Assets (z.B. Bilder, Texturen).
- **ASSET_FEHLT**: Standardbild für fehlende Assets
  > Platzhalterbild, wenn ein Asset nicht gefunden wird.
- **GRID_PORT**: Port für Grid-Dienste
  > Gibt an, auf welchem Port Grid-Dienste laufen (z.B. Regionsserver).
- **GRID_ASSETS**: Pfad für Grid-Assets
  > Relativer Pfad zu den Grid-Assets (z.B. für Texturen).
- **GRID_ASSETS_SERVER**: URL des Asset-Servers
  > Komplette Adresse, unter der die Grid-Assets erreichbar sind.

## 7. Grid-Liste & Guide

- **GRIDLIST_FILE**: Datei für die Grid-Liste
  > Enthält die Übersicht aller Grids/Regionen, die im Webinterface angezeigt werden.
- **GRIDLIST_VIEW**: Anzeigeformat (json, database, grid)
  > Bestimmt, wie die Grid-Liste dargestellt wird (als JSON, aus Datenbank oder als Tabelle).

## 8. Tagesmeldungen

- **SHOW_DAILY_UPDATE**: Tagesmeldungen aktivieren (true/false)
  > Zeigt aktuelle Hinweise oder News auf der Startseite an.
- **DAILY_UPDATE_TYPE**: "text" oder "rss"
  > Legt fest, ob die Tagesmeldung als Text oder aus einem RSS-Feed geladen wird.
- **DAILYTEXT**: Text für Tagesmeldung
  > Wird angezeigt, wenn als Typ "text" gewählt ist.
- **RSS_FEED_URL**: URL des RSS-Feeds
  > Quelle für News, wenn als Typ "rss" gewählt ist.

## 9. Media-Server

- **MEDIA_SERVER**: URL des Media-Streams
  > Adresse eines Audio- oder Videostreams, der im Webinterface eingebunden werden kann.
- **MEDIA_SERVER_STATUS**: Status-URL des Media-Servers
  > Zeigt den aktuellen Status des Streams an (z.B. ob online).

## 10. Passwörter

- Passwörter für verschiedene Bereiche werden als Array gespeichert.
  > Dienen zur Absicherung von Verwaltungsfunktionen und Schnittstellen. Unbedingt vor Produktivbetrieb ändern! Nutze dazu den paswd_generator.php im include-Ordner.

## 11. Farbschemata

- Wähle ein Farbschema oder passe die Farben individuell an.
- **SHOW_COLOR_BUTTONS**: Farbauswahl anzeigen (true/false)
  > Ermöglicht Nutzern, das Farbschema der Seite selbst zu wählen.
- **INITIAL_COLOR_SCHEME**: Name des Farbschemas
  > Legt das Standard-Farbschema beim Laden der Seite fest.

## 12. Schriftarten & Größen

- Passe Schriftarten und -größen nach Wunsch an.
  > Bestimmt das Aussehen und die Lesbarkeit der Seite.

## 13. Links & Bilder

- Passe Linkfarben, Hintergrund- und Vordergrundbilder an.
  > Gestaltet das Erscheinungsbild und die Benutzerfreundlichkeit.

## 14. Anzeigeoptionen

- **LOGO_ON**: Logo anzeigen (ON/OFF)
  > Blendet das Logo auf der Seite ein oder aus.
- **TEXT_ON**: Begrüßungstext anzeigen (ON/OFF)
  > Zeigt einen individuellen Begrüßungstext auf der Startseite an.
- **LOGO_PATH**: Pfad zum Logo
  > Gibt an, wo das Logo-Bild gespeichert ist.

## 15. Begrüßungstext

- Passe Begrüßungstext, Farbe, Ausrichtung und Größe an.
  > Gestaltet die Willkommensnachricht für Besucher individuell.

## 16. Bildanzeige (Slideshow)

- **SLIDESHOW_FOLDER**: Verzeichnis für Bilder
  > Ordner, aus dem die Slideshow die Bilder lädt.
- **IMAGE_SIZE**: Bildgröße
  > Bestimmt die Anzeigegröße der Slideshow-Bilder.
- **SLIDESHOW_DELAY**: Zeit zwischen Bildern
  > Wie lange jedes Bild angezeigt wird (in Millisekunden).

## 17. Maptiles & Grid-Zentrum

- Farben und Einstellungen für die Grid-Kartenanzeige
- **CONF_CENTER_COORD_X/Y**: Zentrum des Grids
  > Legt die Koordinaten des Kartenmittelpunkts fest.
- **MAPS_X/Y**: Anzahl der Kacheln
  > Bestimmt die Größe der angezeigten Grid-Karte.

## 18. MOTD (Message of the Day)

- **MOTD**: "Dyn" (dynamisch) oder "Static" (statisch)
  > Legt fest, ob die Tagesnachricht dynamisch generiert oder statisch angezeigt wird.
- **MOTD_STATIC_MESSAGE**: Statische Nachricht
  > Text, der als feste Nachricht angezeigt wird.
- **MOTD_STATIC_TYPE**: Typ der Nachricht
  > Kategorisiert die Nachricht (z.B. system, info).
- **MOTD_STATIC_URL_TOS/DMCA**: Links zu TOS/DMCA
  > Verlinkt auf die Nutzungsbedingungen und DMCA-Informationen.

## 19. RSS-Feeds

- **$feed_urls**: Liste der RSS-Feeds
  > Hier können mehrere News-Quellen eingetragen werden, die im Webinterface angezeigt werden.
- **$max_entries**: Maximale Einträge pro Feed
  > Begrenzt die Anzahl der angezeigten News pro Feed.

---

**Hinweis:** Passe alle Werte in deiner config.php an deine Umgebung an. Die Beispielwerte dienen nur zur Orientierung!
