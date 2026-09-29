# Eiscafé Delfino – moderne Demo Website

## GitHub Pages Upload

Diese ZIP ist absichtlich so gebaut, dass `index.html` direkt im ZIP-Hauptverzeichnis liegt.

1. ZIP entpacken.
2. **Den Inhalt** des Ordners hochladen – nicht einen zusätzlichen Unterordner.
3. In GitHub müssen `index.html`, `speisekarte.html`, `impressum.html`, `datenschutz.html` direkt im Repository-Root liegen.
4. GitHub Pages auf den Branch/Root veröffentlichen.

Wichtig: Das komplette Design-CSS und JavaScript sind zusätzlich direkt in den HTML-Dateien eingebettet. Dadurch bleibt die Seite auch dann vollständig gestylt, wenn der `assets`-Ordner versehentlich nicht hochgeladen wird.

Die Bilder werden für die Demo hochauflösend von den angegebenen Webquellen geladen. Für die endgültige Kundenversion sollten die final freigegebenen Originalbilder lokal im Projekt gespeichert werden.


## v3 – Direktlinks zur Speisekarte
Die Startseiten-Karten Gelato, Steinofenpizza und Pasta sind vollständig klickbar und öffnen direkt die passende Kategorie der Speisekarte.


## v4 Änderungen
- Eigene `bestellen.html` im Delfino-Look als Rahmen für das vorhandene Live-Bestellsystem.
- Alle Bestell-CTAs führen innerhalb der Demo auf diese Seite.
- Mobile Bottom-Bar zeigt nur noch „Online bestellen“.
- „Anrufen“ sitzt im mobilen Menü direkt unter „Online bestellen“; die nackte Telefonnummer wurde dort entfernt.


## v5 – Bestellsystem
Alle Bestell-Buttons verlinken direkt auf https://eiscafe-delfino.de/bestellen/. Die vorherige iframe-Einbettung wurde entfernt, da das fremde Bestellsystem auf iOS/Safari eingebettet nicht zuverlässig bedienbar ist. `bestellen.html` dient nur noch als sichere Weiterleitung.
