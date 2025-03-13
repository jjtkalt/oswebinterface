# oswebinterface

### German:
**OpenSimulator Viewer Webinterface:**

Dieses Webinterface dient ausschließlich dazu, die Kommunikationslücke zwischen dem OpenSimulator und dem Viewer, wie beispielsweise Firestorm, zu schließen. 
Es ermöglicht eine nahtlose Interaktion und erleichtert die Verwaltung und Steuerung der virtuellen Umgebung direkt über den Viewer.

Das normale Webinterface wird in der Regel separat installiert und bietet zusätzliche Funktionen zur Verwaltung des OpenSimulator-Servers. 
Mittlerweile gibt es hierfür einige ansprechende und benutzerfreundliche Lösungen, die die Administration und Konfiguration des Systems erheblich vereinfachen. 
Diese Tools sind besonders nützlich für Benutzer, die keine tiefergehenden technischen Kenntnisse besitzen, aber dennoch effizient mit der Plattform arbeiten möchten.

---

### English:
**OpenSimulator Viewer Webinterface:**  

This web interface is exclusively designed to bridge the communication gap between OpenSimulator and the viewer, such as Firestorm.  
It enables seamless interaction and simplifies the management and control of the virtual environment directly through the viewer.  

The standard web interface is typically installed separately and offers additional functions for managing the OpenSimulator server.  
By now, there are several appealing and user-friendly solutions available that significantly streamline the administration and configuration of the system.  
These tools are particularly useful for users who do not have in-depth technical knowledge but still want to work efficiently with the platform.  

---

### Spanish:
**Interfaz web del visor de OpenSimulator:**  

Esta interfaz web está diseñada exclusivamente para cerrar la brecha de comunicación entre OpenSimulator y el visor, como por ejemplo Firestorm.  
Permite una interacción fluida y facilita la gestión y el control del entorno virtual directamente a través del visor.  

La interfaz web normal generalmente se instala por separado y ofrece funciones adicionales para la administración del servidor de OpenSimulator.  
Actualmente, existen varias soluciones atractivas y fáciles de usar que simplifican considerablemente la administración y configuración del sistema.  
Estas herramientas son especialmente útiles para usuarios que no tienen conocimientos técnicos profundos, pero que desean trabajar de manera eficiente con la plataforma.  

---

### French:
**Interface web du viewer OpenSimulator :**  

Cette interface web est exclusivement conçue pour combler le fossé de communication entre OpenSimulator et le viewer, tel que Firestorm.  
Elle permet une interaction fluide et facilite la gestion et le contrôle de l'environnement virtuel directement via le viewer.  

L'interface web standard est généralement installée séparément et offre des fonctionnalités supplémentaires pour la gestion du serveur OpenSimulator.  
Aujourd'hui, il existe plusieurs solutions attrayantes et conviviales qui simplifient considérablement l'administration et la configuration du système.  
Ces outils sont particulièrement utiles pour les utilisateurs qui ne possèdent pas de connaissances techniques approfondies, 
mais qui souhaitent travailler efficacement avec la plateforme.

  ---

    Setup oswebinterface/include/config.php
    Setup oswebinterface/include/env.php
    Setup opensim/bin/Robust.HG.ini

  ---
## Robust Setup

    MapTileURL = "${Const|BaseURL}:${Const|PublicPort}/oswebinterface/maptile.php";
    SearchURL = "${Const|BaseURL}:${Const|PublicPort}/oswebinterface/searchservice.php";
    DestinationGuide = "${Const|BaseURL}/oswebinterface/guide.php"
    AvatarPicker = "${Const|BaseURL}/oswebinterface/avatarpicker.php"
    GridSearch = "${Const|BaseURL}/oswebinterface/gridsearch.php";
    MessageURI = ${Const|BaseURL}/oswebinterface/messages.php
    welcome = ${Const|BaseURL}/oswebinterface/welcomesplashpage.php
    economy = ${Const|BaseURL}:8008/
    about = ${Const|BaseURL}/oswebinterface/aboutinformation.php
    register = ${Const|BaseURL}/oswebinterface/createavatar.php
    help = ${Const|BaseURL}/oswebinterface/help.php
    password = ${Const|BaseURL}/oswebinterface/passwordreset.php
    partner = ${Const|BaseURL}/oswebinterface/partner.php
    GridStatus = ${Const|BaseURL}:${Const|PublicPort}/oswebinterface/gridstatus.php
    GridStatusRSS = ${Const|BaseURL}:${Const|PublicPort}/oswebinterface/gridstatusrss.php

  ---
  
