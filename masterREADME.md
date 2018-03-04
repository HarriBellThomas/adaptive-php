# The Adaptive Web.

The Adaptive Web is a series of tools designed to improve accessibility of websites
to those with disabilities and make them more usable for those with specific needs.

To use the Adaptive Web, you need to:
* Download and install the plugin for your browser.
* Create an account at adaptive.org.uk to start making your custom styles.

## System Overview:
This is a technical overview of the architecture of the system.
The system is broken into three primary parts:
* **The Adaptive JS**. This is the JavaScript that changes the webpage, and a set
of tools to make this easier (along with its own preprocessor). Can be found in /adaptive-js.
* **The hosted platform**.  This is a website (adaptive.org.uk) where users can create, store and share styles.
It delivers both a friendly platform for users and an efficient REST API for the JS. Can be found in
/adaptive-php.
* **The plugins**. This is a variety of plugins used to inject the Adaptive JS into the webpage.
This ensures that the use of the Adaptive web is as frictionless as possible for the user. Can be found in
/adaptive-plugins.
