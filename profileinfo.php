
<?php
// Dateiname: profileinfo.php
// Beschreibung: Zeigt das OpenSim-Nutzerprofil basierend auf Benutzername oder UUID an
/*
Installieren sie bitte die folgenden Pakete, um die Bildvorschau zu ermöglichen:
sudo apt install imagemagick
sudo apt install php-intl
sudo apt install php-imagick
*/

echo '<!DOCTYPE html><html lang="de"><head><meta charset="UTF-8"><title>OpenSim Nutzerprofil</title><link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"></head><body>';
echo '<div class="w3-container w3-margin-top" style="max-width:420px">';
echo '<form class="w3-card w3-padding w3-margin-bottom" method="get" action="">';
echo '<label for="user"><b>Benutzername (Vorname Nachname) oder UUID:</b></label>';
echo '<input class="w3-input w3-border w3-margin-top" type="text" name="user" id="user" value="' . (isset($_GET['user']) ? htmlspecialchars($_GET['user']) : '') . '" required placeholder="z.B. Max Mustermann oder UUID">';
echo '<button class="w3-button w3-blue w3-margin-top" type="submit">Profil anzeigen</button>';
echo '</form>';

include_once __DIR__ . '/include/env.php';
$db = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

$userinput = $_GET['user'] ?? '';
if (empty(trim($userinput))) {
    echo '<div class="w3-card w3-padding w3-margin w3-yellow" style="max-width:400px">Bitte gib einen Benutzernamen oder eine UUID ein und klicke auf "Profil anzeigen".</div>';
    echo '</div></body></html>';
    exit;
}

$isUuid = preg_match('/^[0-9a-fA-F-]{36}$/', $userinput);
$uuid = null;
if ($isUuid) {
    $uuid = $db->real_escape_string($userinput);
} else {
    $parts = preg_split('/\s+/', trim($userinput));
    if (count($parts) < 2) {
        echo '<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">';
        echo '<div class="w3-card w3-padding w3-margin w3-red" style="max-width:400px">Bitte gib Vor- und Nachnamen an.</div>';
        exit;
    }
    list($first, $last) = $parts;
    $sql = "SELECT PrincipalID FROM UserAccounts WHERE FirstName=? AND LastName=?";
    $stmt = $db->prepare($sql);
    $stmt->bind_param('ss', $first, $last);
    $stmt->execute();
    $stmt->bind_result($uuid);
    $stmt->fetch();
    $stmt->close();
    if (!$uuid) {
        echo '<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">';
        echo '<div class="w3-card w3-padding w3-margin w3-red" style="max-width:400px">Benutzer nicht gefunden.</div>';
        exit;
    }
}

$sql = "SELECT * FROM userprofile WHERE useruuid=?";
$stmt = $db->prepare($sql);
$stmt->bind_param('s', $uuid);
$stmt->execute();
$result = $stmt->get_result();
$profile = $result->fetch_assoc();
$stmt->close();

if (!$profile) {
    echo '<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">';
    echo '<div class="w3-card w3-padding w3-margin w3-red" style="max-width:400px">Kein Profil für diesen Benutzer gefunden.</div>';
    exit;
}


$imgData = null;
if ($profile && !empty($profile['profileImage'])) {
    $imgUuid = $profile['profileImage'];
    $sql = "SELECT data FROM assets WHERE id=? AND assetType=0";
    $stmt = $db->prepare($sql);
    $stmt->bind_param('s', $imgUuid);
    $stmt->execute();
    $stmt->bind_result($imgData);
    $stmt->fetch();
    $stmt->close();
}

$firstImgData = null;
if ($profile && !empty($profile['profileFirstImage'])) {
    $firstImgUuid = $profile['profileFirstImage'];
    $sql = "SELECT data FROM assets WHERE id=? AND assetType=0";
    $stmt = $db->prepare($sql);
    $stmt->bind_param('s', $firstImgUuid);
    $stmt->execute();
    $stmt->bind_result($firstImgData);
    $stmt->fetch();
    $stmt->close();
}

echo '<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">';
echo '<div style="display:flex; gap:24px;">';

// Hauptprofil-Card (links)
echo '<div class="w3-card w3-padding w3-margin" style="max-width:400px; flex:1;">';
// ...Profiltext-Ausgabe...
echo "<h3>Profil von: <span class='w3-text-blue'>" . htmlspecialchars($profile['useruuid']) . "</span></h3>";
echo "<p><b>Partner UUID:</b> " . htmlspecialchars($profile['profilePartner']) . "</p>";
//echo "<p><b>Profil veröffentlichen erlaubt:</b> " . ((ord($profile['profileAllowPublish']) ? 'Ja' : 'Nein')) . "</p>";
echo "<p><b>Mature Publish:</b> " . ((ord($profile['profileMaturePublish']) ? 'Ja' : 'Nein')) . "</p>";
echo "<p><b>Profil-URL:</b> " . htmlspecialchars($profile['profileURL']) . "</p>";
//echo "<p><b>Will (Mask):</b> " . htmlspecialchars($profile['profileWantToMask']) . "</p>";
echo "<p><b>Will (Text):</b> " . nl2br(htmlspecialchars($profile['profileWantToText'])) . "</p>";
//echo "<p><b>Skills (Mask):</b> " . htmlspecialchars($profile['profileSkillsMask']) . "</p>";
echo "<p><b>Skills (Text):</b> " . nl2br(htmlspecialchars($profile['profileSkillsText'])) . "</p>";
echo "<p><b>Sprachen:</b> " . nl2br(htmlspecialchars($profile['profileLanguages'])) . "</p>";
echo "<p><b>Profilbild-UUID:</b> " . htmlspecialchars($profile['profileImage']) . "</p>";
echo "<p><b>Über mich:</b> " . nl2br(htmlspecialchars($profile['profileAboutText'])) . "</p>";
//echo "<p><b>Erstes Bild UUID:</b> " . htmlspecialchars($profile['profileFirstImage']) . "</p>";
echo "<p><b>Erster Text:</b> " . nl2br(htmlspecialchars($profile['profileFirstText'])) . "</p>";
echo "</div>";

// Bild-Card (rechts)
if ($imgData || $firstImgData) {
    echo '<div class="w3-card w3-padding w3-margin" style="max-width:220px; flex-shrink:0; text-align:center;">';
    $imagickAvailable = class_exists('Imagick');

    if ($imgData) {
        $imgFile = "data:image/jp2;base64," . base64_encode($imgData);
        echo "<div class='w3-margin-bottom'><b>Profilbild</b><br>";
        echo "<a href='$imgFile' download='profile.jp2' class='w3-button w3-blue w3-small w3-margin-bottom'>Herunterladen (JP2)</a><br>";
        // Bildvorschau mit ImageMagick
        if ($imagickAvailable) {
            try {
                $im = new Imagick();
                $im->readImageBlob($imgData);
                $im->setImageFormat('jpeg');
                $jpegData = $im->getImageBlob();
                $im->clear();
                $im->destroy();
                echo "<img src='data:image/jpeg;base64," . base64_encode($jpegData) . "' class='w3-image w3-margin-top' style='max-width:180px;border:1px solid #ccc'>";
            } catch (Exception $e) {
                echo "<div class='w3-text-red'>Vorschau nicht möglich</div>";
            }
        } else {
            echo "<div class='w3-text-grey'>Keine Bildvorschau (ImageMagick nicht installiert)</div>";
        }
        echo "</div>";
    }
    if ($firstImgData) {
        $firstImgFile = "data:image/jp2;base64," . base64_encode($firstImgData);
        echo "<div><b>Erstes Bild</b><br>";
        echo "<a href='$firstImgFile' download='firstimage.jp2' class='w3-button w3-green w3-small w3-margin-bottom'>Herunterladen (JP2)</a><br>";
        // Bildvorschau mit ImageMagick
        if ($imagickAvailable) {
            try {
                $im = new Imagick();
                $im->readImageBlob($firstImgData);
                $im->setImageFormat('jpeg');
                $jpegData = $im->getImageBlob();
                $im->clear();
                $im->destroy();
                echo "<img src='data:image/jpeg;base64," . base64_encode($jpegData) . "' class='w3-image w3-margin-top' style='max-width:180px;border:1px solid #ccc'>";
            } catch (Exception $e) {
                echo "<div class='w3-text-red'>Vorschau nicht möglich</div>";
            }
        } else {
            echo "<div class='w3-text-grey'>Keine Bildvorschau (ImageMagick nicht installiert)</div>";
        }
        echo "</div>";
    }
    echo "</div>";
}

echo '</div>'; // flex-container
echo '</div></body></html>';
?>
