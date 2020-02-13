# fwd-boilerplate-theme
WordPress boilerplate theme for use as a starting point for development

## 0. Theme Directory Structure
```
themes/fwd-boilerplate-theme/         # -> Theme root directory
|--.gitattributes                     # -> Git attributes for web projects
|--.gitignore                         # -> Files ignored by Git
|--.vscode/                           # -> VS Code settings, dictionary, etc.
|--composer.json                      # -> Composer autoloader
|--app/                               # -> Theme classes and functionality
|--|--classes/                        # -> Theme classes
|--|-----components/                  # -> Component classes
|--|-----└--component-footer.php      # -> Universal footer component
|--|-----templates/                   # -> Page template classes
|--|-----|--template-404.php          # -> 404 Error page template class
|--|-----└--template-homepage.php     # -> Homepage template class
|--|--init.php                        # -> Class autoload functions
|--└--README.md                       # -> app directory readme
|--config/                            # -> Webpack, ESLint, stylelint, etc.
|--|--.stylelintrc                    # -> Stylelint configuration file
|--|--postcss.config.js               # -> PostCSS configuration file
|--|--README.md                       # -> Configuration file readme
|--└--webpack.config.js               # -> Webpack configuration file
|--functions.php                      # -> WordPress functions file
|--index.php                          # -> WordPress catch-all template
|--LICENSE                            # -> Repository license file (don't edit)
|--node_modules/                      # -> Node.js packages (don't edit)
|--package.json                       # -> Node.js dependencies and scripts
|--page-templates/                    # -> Template and component markup files
|--|--404.php                         # -> 404 Error page template
|--|--components/                     # -> Theme components directory
|--|--|--blank-component.php          # -> Blank component file
|--|--└--meta/                        # -> Theme meta components
|--|-----|--adobe-fonts.php           # -> Adobe Fonts component
|--|-----|--foot.php                  # -> WordPress foot component
|--|-----|--google-tag-manager.php    # -> Google Tag Manager (GTM) component
|--|-----|--gtm-noscript.php          # -> GTM no-script fallback component
|--|-----└--head.php                  # -> Generic <head> tags
|--|--homepage.php                    # -> Homepage template
|--|--layouts/                        # -> Theme layout directory
|--|--|--body-open.php                # -> Body-open layout file
|--|--└--header.php                   # -> Document header layout file
|--└--README.md                       # -> Page templates readme
|--README.md                          # -> This readme
|--resources/                         # -> Styles, scripts, images, and fonts
|--|--acf/                            # -> Advanced Custom Fields JSON directory
|--|--fonts/                          # -> Theme-hosted font files
|--|--images/                         # -> Theme-hosted image files
|--|--README.md                       # -> Resources readme
|--|--scripts/                        # -> Theme scripts directory
|--|--|--dist/                        # -> Compiled theme scripts
|--|--|--README.md                    # -> Theme scripts readme
|--|--└--src/                         # -> Theme scripts source directory
|--|-----|--components/               # -> Component scripts
|--|-----|--pages/                    # -> Page template scripts
|--|-----|--universal.js              # -> Universal theme scripts
|--|-----└--vendor/                   # -> Vendor script settings
|--└--styles/                         # -> Theme styles directory
|-----|--dist/                        # -> Compiled theme styles
|-----|--README.md                    # -> Theme styles readme
|-----└--src/                         # -> Theme styles readme
|--------|--_starter.scss             # -> Theme starter style manifest
|--------|--base/                     # -> Base style directory
|--------|--|--elements/              # -> HTML element styles
|--------|--|--settings/              # -> Theme setting styles
|--------|--|--tools/                 # -> Theme style tools
|--------|--└--vendor/                # -> Vendor styles directory
|--------|--components/               # -> Theme component styles
|--------|--libraries/                # -> Style libraries
|--------|--pages/                    # -> Page template styles
|--------└--universal.scss            # -> Universal theme styles
|--style.css                          # -> Theme meta information
|--vendor/                            # -> Composer packages (don't edit)
└--yarn.lock                          # -> Yarn lockfile
```


## 1. Features
* [Webpack](https://webpack.js.org/) for packaging assets
* Modern JavaScript support
* [SCSS](https://sass-lang.com/) for writing styles
* Image optimization for GIF, JPEG, PNG, and WebP
* Object-oriented development workflow


## 2. Development Requirements
Mostly normal WordPress requirements, but you'll need a couple of extra things if you don't have them. This theme does require terminal commands, but only a couple!

* [WordPress](https://wordpress.org/download/), obviously
* [PHP](https://www.php.net/manual/en/install.php) >= 7.2
* [Composer](https://getcomposer.org/download/) >= 1.9.2
* [Node.js](https://nodejs.org/en/) >= 12.11.1
* [Yarn](https://classic.yarnpkg.com/en/docs/install) >= 1.21.1

This theme also requires you to use Advanced Custom Fields (ACF) as a plugin once your theme is set up, which you can get [here](https://www.advancedcustomfields.com/).


## 3. Installation
Put this project folder into your themes folder. Then, from the terminal:
```
cd /your/themes/folder
$ composer install
```
By default, there are no PHP library dependencies, but this will create the ```vendor``` directory and ```autoload.php``` file, which are required for the theme to function properly. This should take very little time. Once that is complete:
```
$ yarn
```
Wait for the installation to complete, and you're pretty much done!

### Note
If you do not run ```composer install``` and ```yarn``` before loading the theme, it will not work. Be sure to install all dependencies prior to viewing the theme.


## 4. CLI Commands
This theme includes two terminal commands: ```yarn build``` and ```yarn watch```. ```yarn build``` will package assets together and ```yarn watch``` will do the same, but also keep Webpack running on any updated files.

## 5. Theme Extras
Aside from the Webpack setup, there are a few things included in the theme.

### 5.1 Separate ```app``` Folder
Not everything has to be in a gigantic ```functions.php``` file! Theme functionality is broken up in classes under the ```app``` directory for simpler code management. The theme is still, in part, set up through the ```functions.php``` file and that's detailed [here](#5.4-functions.php). For information on the ```app``` directory contents, read the included [README](./app/README.md) file for that folder.

### 5.2 Page Templates Folder
All page templates are loaded from the ```page-templates``` directory.

### 5.3 ACF Local JSON Support
This theme will save and load ACF field groups via local JSON files in the ```resources``` directory.

### 5.4 functions.php

#### 5.4.1 Theme Version Variable
There is a global theme version variable used for basic cache-busting purposes. It's initially set to the current version of the boilerplate theme but can be set to whatever you like.

#### 5.4.2 Theme functions
There is a theme setup variable, ```$THEME```, set on initialization. After that there are several functions run to create menus, register templates, and set image sizes. This is generally set with simple function calls and passing arrays. Simply update the values as needed and you should see everything updated automatically.


## 6. 3rd Party Service Support
Within the theme and apart from ACF, there are services that are supported or utilized by the theme files:

#### 6.1 Adobe Fonts
Many of our sites use [Adobe Fonts](https://fonts.adobe.com/) (formerly, TypeKit) for font loading. Using ACF, a script is run in the ```<head>``` of the site to load Adobe Fonts projects.

#### 6.2 Google Tag Manager
Similar to Adobe Fonts, there is an ACF-enabled option to load [Google Tag Manager](https://marketingplatform.google.com/about/tag-manager/) (GTM) in the site header or as an invisible ```<iframe>``` if JavaScript is not enabled in the current window.
