DELFINO MODERN – WORDPRESS / WOOCOMMERCE THEME v1.0
==================================================

Zweck
-----
Dieses Theme verbindet die neue moderne Delfino-Oberfläche mit dem bestehenden
WooCommerce-System. Produkte, Warenkorb und Kasse bleiben auf derselben Domain.
Die GitHub-Pages-Version ist weiterhin nur als Verkaufs-/Design-Demo gedacht.

Vor Installation
----------------
1. Vollständiges WordPress-Backup erstellen.
2. Wenn möglich zuerst auf einer Staging-Kopie testen.
3. WooCommerce und alle aktuell für Bestellzeiten/Restaurantfunktionen genutzten
   Plugins aktiv lassen. Dieses Theme löscht oder ersetzt keine Bestelldaten.

Installation
------------
WordPress-Admin -> Design -> Themes -> Theme hinzufügen -> Theme hochladen.
ZIP hochladen und aktivieren.

Seiten
------
- Bestehende Seite mit Slug "bestellen" wird automatisch mit page-bestellen.php
  im neuen Design dargestellt.
- Seite mit Slug "speisekarte" wird automatisch als moderne dynamische Karte
  dargestellt. Falls sie noch nicht existiert, eine leere Seite "Speisekarte"
  mit dem Slug "speisekarte" anlegen.
- Warenkorb/Kasse/Produktseiten werden über WooCommerce im selben Theme gerendert.

Wichtig
-------
Das Theme greift auf die vorhandenen WooCommerce-Produkte zu. Dadurch müssen
Speisen und Preise nicht doppelt gepflegt werden. Bei speziellen Produkt-Add-ons,
Lieferzonen oder einem proprietären Restaurant-Plugin sollten diese Funktionen
auf Staging geprüft werden, bevor das Theme live geschaltet wird.
