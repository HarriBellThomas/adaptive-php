# Adaptive - Backend Laravel Project

[![Build Status](https://travis-ci.com/HarriBellThomas/adaptive-php.svg?token=zdqxmjKjYitf3HJEzgrp&branch=master)](https://travis-ci.com/HarriBellThomas/adaptive-php)

This is the code for our hosted platform used to manipulate, share and store styles.
It has three major components:
* The backend code: written in PHP for the Laravel framework.
* Html templates: the styling and markdown for our general website.
* The React app: used to create and edit styles in an intuitive way.

You can find a user guide for using our product in userGuide.md.

## Backend:
This includes:
* The database schema (src/database/migrations)
* Models (src/app)
* Controllers (src/app/Http/Controllers)
* Routes (src/routes)
* Views (src/views)

## React app:
The component classes, used to generate a JavaScript file (src/public/js/app.js) can be found in
src/resources/assets/js/components.

## Html templates:
Can be found in html-templates.
