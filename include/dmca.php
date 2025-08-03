<?php
$title = "DMCA";
include 'header.php';

// Platzhalter-Werte setzen
$variables = [
    "DEIN GRID-NAME" => SITE_NAME,
    "DATUM" => date("m.d.Y"),
    "DEINE EMAIL" => "admin@" . SITE_NAME . ".com",
    "DEINE KONTAKT-EMAIL" => "admin@" . SITE_NAME . ".com"
];
?>

<style>
   .markdown-content {
      max-width: 800px;
      margin: 0 auto;
      padding: 20px;
      color: rgb(31, 31, 31);  /* Korrektur: 'color' statt 'Color' */
      background-color: rgb(238, 241, 241);
      border: 1px solid #ddd;
      border-radius: 5px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
   }

   .language-switcher {
      text-align: right;
      margin-bottom: 20px;
   }

   .language-switcher a {
      text-decoration: none;
      color: #007BFF;
      margin: 0 5px;
   }

   .language-switcher a:hover {
      text-decoration: underline;
   }

   code {
      background-color: #f4f4f4;
      padding: 2px 5px;
      border-radius: 3px;
      font-family: monospace;
   }
</style>

<?php
function replacePlaceholders($text, $variables = []) {
    foreach ($variables as $key => $value) {
        $text = str_replace("[$key]", $value, $text);
    }
    return $text;
}

function simpleMarkdownToHTML($text) {
    // Zeilenumbrüche umwandeln
    $text = nl2br($text);

    // Fettdruck **text** -> <strong>text</strong>
    $text = preg_replace('/\*\*(.*?)\*\*/', '<strong>$1</strong>', $text);

    // Kursiv *text* -> <em>text</em>
    $text = preg_replace('/\*(.*?)\*/', '<em>$1</em>', $text);

    // Überschriften # -> <h1>, ## -> <h2> usw.
    for ($i = 6; $i >= 1; $i--) {
        $text = preg_replace('/^' . str_repeat('#', $i) . '\s*(.*?)$/m', "<h$i>$1</h$i>", $text);
    }

    // Links [Text](URL) -> <a href="URL">Text</a>
    $text = preg_replace('/\[(.*?)\]\((.*?)\)/', '<a href="$2">$1</a>', $text);

    // Inline-Code `text` -> <code>text</code>
    $text = preg_replace('/`(.*?)`/', '<code>$1</code>', $text);

    return $text;
}

// Englische DMCA-Richtlinie
$dmcaTextEN = "
# **DMCA Policy for [DEIN GRID-NAME]**  
**Last Updated:** [DATUM]  

This DMCA policy describes how **[DEIN GRID-NAME]** (hereinafter „we“, „us“, „our grid“) 
responds to complaints regarding copyright infringement under the **Digital Millennium Copyright Act (DMCA)**.  

If you believe that content within our OpenSimulator grid violates your copyright, 
you can file a **DMCA complaint** by following the steps below.  

---

## **1. Submitting a DMCA Complaint (Takedown Request)**  
If you believe that your copyrighted material has been used without permission in **[DEIN GRID-NAME]**, 
please send a written complaint to our **DMCA Agent** at:  

📩 **Email:** [DEINE EMAIL]  

**Your DMCA complaint must include the following information:**  

1. **Identification of the copyrighted work:**  
   - A detailed description of the copyrighted work (e.g., a screenshot, link, or documentation).  

2. **Location of the infringing content:**  
   - The exact location of the content in our grid, including:  
     - Region name  
     - Coordinates (if possible)  
     - UUID or asset ID of the affected object  
     - Screenshot or description  

3. **Contact information:**  
   - Your name, address, email address, and phone number.  

4. **Statement of infringement:**  
   - A statement that you have a **good faith belief** that the use is not authorized by the copyright owner, 
   their agent, or the law (e.g., fair use).  

5. **Sworn statement:**  
   - A statement that the information in your complaint is accurate and that you are the copyright owner or authorized to act on their behalf.  

6. **Digital or physical signature:**  
   - An electronic or handwritten signature of the copyright owner or their authorized representative.  

---

## **2. Our Response to a DMCA Complaint**  
Upon receiving a valid DMCA complaint, we will:  

- **Temporarily remove or disable access** to the allegedly infringing content.  
- Notify the user who provided the content about the complaint.  
- If the affected user submits a **counter-notice** (see Section 3), inform the copyright owner.  

If the copyright owner does not take legal action within **10 business days** of our notification, 
we may restore the removed content.  

---

## **3. Submitting a Counter-Notice**  
If you believe that the removed content does not infringe copyright or you had permission to use it, 
you can submit a **counter-notice**.  

Please send your counter-notice to **[DEINE EMAIL]** with the following information:  

1. **Identification of the removed content:**  
   - The original location of the content (region, coordinates, UUID, screenshots).  

2. **Statement of good faith:**  
   - A statement that you have a **good faith belief** that the removal was due to a mistake or misidentification.  

3. **Consent to jurisdiction:**  
   - If you are outside the USA, a statement that you consent to the jurisdiction of US federal courts.  

4. **Sworn statement:**  
   - A statement that the information in your counter-notice is accurate and that you are responsible for any legal consequences.  

5. **Digital or physical signature:**  
   - Your signature or that of your authorized representative.  

Upon receiving a valid counter-notice, the removed content may be restored within **10–14 days**, 
unless the original complainant files a lawsuit.  

---

## **4. Consequences for Repeated Violations**  
Users who repeatedly infringe copyright may:  
- Be **warned**,  
- **Temporarily suspended**,  
- Or **permanently banned** from the grid.  

We reserve the right to suspend accounts without prior warning in cases of severe violations.  

---

## **5. No Liability for User-Generated Content**  
Our grid provides a platform for virtual interactions and hosts user-generated content. 
We are not liable for copyrighted materials uploaded by users. 
All users are responsible for the content they upload.  

However, we actively work to **remove infringing content** upon receiving a **valid DMCA complaint**.  

---

## **6. Contact for Further Questions**  
If you have questions about this DMCA policy, you can reach us at **[DEINE KONTAKT-EMAIL]**.  
";

// Wähle den Text basierend auf der Sprache
$dmcaText = $dmcaTextEN;

// 1️⃣ Platzhalter ersetzen
$dmcaText = replacePlaceholders($dmcaText, $variables);

// 2️⃣ Markdown in HTML umwandeln
$finalHTML = simpleMarkdownToHTML($dmcaText);

// 3️⃣ HTML ausgeben
echo "<div class='markdown-content'>$finalHTML</div>";
?>
