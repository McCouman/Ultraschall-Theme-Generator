# Ultraschall Theme Generator

Eine kleine Unterstützung zum erstellen und generieren eines eigenen Reaper - Ultraschall Themes.

Aktuelle Version 0.6.12 Alpha


## Zum Projekt

Mit UTG soll es möglich werden, ein neues Theme für Reaper Ultraschall Edition und die dazu gehörigen Buttons
über einen Browser zu erzeugen. Die Hintergrunddaten der Icons sollen dabei erhalten bleiben und nach Fertigstellung
als Zip-Datei von der Plattform uploadbar sein.

In der ersten Version soll das Verwalten von Themes über anlegen von Vorlagen ermöglicht werden.
Jede Vorlage speichert dabei die Icons-Sets und Hintergründe in einem separierten Ordner ab. Nach hochladen der
Button-Hintergründe und Icons, werde diese (je nach Positionierung in Ultraschall) automatisch miteinander verbunden.
So entsteht ein automatisch generiertes und fertige Button-Icon zum einsetzen in Ultraschall.

### Zu den Seiten

#### 1. Die Vorlagen (Templates)

Über die Templates Seite können Vorlagen angelegt, gelöscht oder ein Theme-Set heruntergeladen werden.

<img src="https://raw.githubusercontent.com/McCouman/Ultraschall-Theme-Generator/master/screenshot1.png">

#### 2. Das Hintergrund Bild-Setup (Set)

Über die Seite "Set" werden die 4 Positions-Icon als Hintergründe angezeigt.
Durch klicken der hellen Vorschau-Buttons wird der jeweilige Hintergrund eines Buttons angezeigt.
Zum Ändern der Buttonkonturen muss eine neues Hintergrund-Bild (mit gleichen Maßen wie in der Vorschau angegeben)
hochgeladen werden. Das neue Icon wird nach erfolgreichen Upload sofort angezeigt.

#### 3. Die Icons ändern (Icons)

Um ein Icon zu ändern wird verfahren, wie beim Upload der Hintergründe. Um neue Icons-Sets zu erzeugen,
empfiehlt es sich, die zum download bereitgestellte Photoshop Datei mit angaben zu den Maßen herunter zu laden.

**INFO: Es ist wichtig das bei den Icons darauf geachtet wird, das ein transparenter Hintergdrund genutzt wird!**

<img src="https://raw.githubusercontent.com/McCouman/Ultraschall-Theme-Generator/master/screenshot2.png">

Nach dem fertigstellen und hochladen (über Fileupload oder per Drag & Drop) erstellt UTG automatisch ein fertiges
Ultraschall-Icon, aus den vorliegenden Hintergrund-Set und dem neu hochgeladenen Icon. Über die Vorschau Box (in blau)
wird das eben verarbeitete Icon angezeigt. Wurden noch keine Uploads erzeugt, wird das "Standard-Icon" von
Ultrachall dafür angezeigt.

Ist ein Upload erfolgt, wird automatisch im Hintergrund das neue "Ultraschall-Button-Icon" erzeugt und in der Vorschaubox (grün) angezeigt. Über die Buttons "Zurücksetzen" werden hochgeladenen Daten mit den Standard-Icons wieder überschrieben.

# Changelogs

## Letzte Version (0.6.12 Alpha)

### Changes

- fixed namespace from include sections (create_templates)
- fixed image checks for create_icons
- fixed copy set from create templates class
- fixed functions from upload icons
- fixed missing icon "rippleall.png"
- fixed upper- and lowercase on created us-icons (see original)
- fixed create templates functions (uppercase problems)
- fixed clear loading icons from browser reload
- fixed linking from data set in page icons
- fixed links to update and icon in page setup
- fixed links to create page under the sidebar
- fixed field break under config.ini
- fixed routing.ini
- replace name form button "Zurücksetzen" to "set back" under Set page
- replace name form button "Zurücksetzen" to "set back" under Icon page
- create "update" button under Icons page to repeat the creation of the ultraschall icons
- create new function to repeat the creation of ultraschall icons
- create standard N/A icons for generated folders
- create update ultraschall icons in routing.ini

## Changelogs

### Version 0.5.52 Alpha

In dieser Version ist es möglich die Toolbar-Icons zum Editieren von Audio anzupassen und zu verarbeiten.
Über den Upload-Mechanismus, können die fertigen Icons heruntergeladen werden.

#### Pages

- Page: Templates
- Page: Set
- Page: Icons
- Page: Infos

#### Hauptfunktionen

- Functions: Upload
- Functions: Zip Download
- Functions: Image Merge

#### Changes

##### **Page: Templates**

Bei der Erstellung eines Templates werden automatisch die drei Ordner "icons", "setup", "generated" unter dem
Templates Ordner angelegt. Dabei wird auch eine ReaperTheme datei erzeugt.

Funktionen:

- create template,
- delete template,
- change setup,
- change icons,
- download template (*.zip)

##### **Page: Set**

Siehe auch "Zu den Seiten"

Funktionen:

- view standard set item,
- view uploaded set item,
- upload set items,
- change set items,
- remove to standard set item,

##### **Page: Icons**

Siehe auch "Zu den Seiten"

Funktionen:

- view standard icon,
- view uploaded icon,
- upload button icon,
- change button icon,
- merge set item and button icon to ultrschall icon,
- remove new button icon to standard icon,
- remove new ultrschall icon to standard icon,

##### **Page: Infos**

Hier bekommt man Informationen zum Stand der Versionen und Hintergrundinformationen zum Projekt und seiner Funktionen.

Funktionen:

- read markdown
- view: readme.md file

##### **Functions: Upload**

Funktionen:

- upload background button set,
- upload button icons,

##### **Functions: Zip Download**

Funktionen:

- generate zip file from templates
- generate download link

##### **Functions: Image Merge**

Funktionen:

- checked possition background set
- merged background set and button icons to utltraschall

----

Developed by Michael "M.C." McCouman Jr.

2016 07.11 - Germany
