<?php
$title = "TOS";
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

// Englische TOS (kann später hinzugefügt werden)
$tosTextEN = "
# **Terms of Service for [DEIN GRID-NAME]**  

**Last Updated:** [DATUM]  

Welcome to **[DEIN GRID-NAME]**! These Terms of Service govern your use of our virtual world, 
which is based on OpenSimulator. By registering and using our service, you agree to these terms. 
If you do not agree, you may not use our grid.  

---

## **1. General Provisions**  
1.1 **Scope:** These terms apply to all users of our OpenSimulator grid, including guests and registered users.  
1.2 **Changes:** We reserve the right to change these terms at any time. Changes take effect upon publication on our website.  
1.3 **Consent:** By using our grid, you agree to the current terms of service.  

---

## **2. User Accounts and Access**  
2.1 **Registration:**  
- You must be at least **[AGE, e.g., 16]** years old to create an account.  
- Providing accurate and complete information is required.  
- Only one account per person is allowed unless we explicitly permit multiple accounts.  

2.2 **Account Security:**  
- You are responsible for the security of your account and password.  
- If you suspect unauthorized access to your account, notify us immediately.  

2.3 **Account Suspension & Deletion:**  
- We reserve the right to suspend or delete your account if you violate these TOS.  
- Inactive accounts may be deleted after **[e.g., 6 months]** without prior notice.  

---

## **3. Virtual Content and Economy**  
3.1 **Ownership of Content:**  
- Content you create or upload remains your intellectual property.  
- However, you grant us the right to use, host, and manage your content within the grid.  

3.2 **Copyright and Licensing:**  
- Uploading copyrighted content without permission is prohibited.  
- If a user violates copyright, we reserve the right to remove the content and suspend the account.  

3.3 **Virtual Currency & Transactions:**  
- If our grid uses a virtual currency (**e.g., Gloebits, Podex, OMC**), you acknowledge that it has no real monetary value.  
- We are not responsible for losses or technical issues related to virtual currencies or transactions.  

---

## **4. Code of Conduct**  
4.1 **Allowed and Prohibited Content:**  
- No **harassment, hate speech, racist, or sexually explicit content** that violates applicable law.  
- No **spam, fraud, or impersonation of other users/admins**.  
- No **hacking, griefing, or disrupting other users** through scripts, exploits, or attacks.  

4.2 **Regional and Parcel Rules:**  
- Region/parcel owners may set their own rules as long as they do not violate these TOS.  
- Admins reserve the right to remove disruptive content or regions.  

---

## **5. Privacy and Data Storage**  
5.1 **Stored Data:**  
- We store your account information, IP address, avatar data, and in-world interactions for administrative purposes.  
- Personal data will not be shared with third parties unless required by law.  

5.2 **Use of Third Parties:**  
- If our grid uses external services like **Hypergrid teleports, Gloebits, or PayPal**, their privacy policies apply additionally.  
- When leaving our grid via Hypergrid teleports, your data may be processed by other grids.  

---

## **6. DMCA Policy (Copyright Protection)**  
If you believe that content on our grid violates your copyright, you can file a **DMCA complaint**:  

### **6.1 How to Submit a DMCA Notice:**  
Send a written complaint to **[DEINE KONTAKT-EMAIL]** with the following information:  
1. A description of the copyrighted work that has been infringed.  
2. The exact location of the infringing content (region, coordinates, UUID, screenshots).  
3. Your contact details (name, email, address, phone number).  
4. A statement that you are acting in good faith and that the content is being used unlawfully.  
5. A sworn statement that your information is accurate.  

### **6.2 Response to DMCA Notices:**  
- We will remove verified violations.  
- If you have been falsely accused of copyright infringement, you can submit a counter-notice.  

---

## **7. Disclaimer and Termination of Service**  
7.1 **Disclaimer:**  
- Our grid is provided as-is. We do not guarantee **uninterrupted, error-free, or continuous use**.  
- We are not liable for **data loss, hacks, or technical issues**.  

7.2 **Termination of Service:**  
- We reserve the right to terminate the grid or parts of it at any time.  
- In the event of closure, there is no entitlement to refunds of virtual balances or content.  

---

## **8. Contact**  
If you have questions about these terms of service, you can reach us at **[DEINE KONTAKT-EMAIL]**.  

---

### **Acceptance of Terms**  
By using **[DEIN GRID-NAME]**, you agree to these terms of service. If you do not agree, leave the grid and delete your account.
";

$tosText = $tosTextEN;

// 1️⃣ Platzhalter ersetzen
$tosText = replacePlaceholders($tosText, $variables);

// 2️⃣ Markdown in HTML umwandeln
$finalHTML = simpleMarkdownToHTML($tosText);

// 3️⃣ HTML ausgeben
echo "<div class='markdown-content'>$finalHTML</div>";
?>
