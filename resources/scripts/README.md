# fwd-boilerplate-theme/resources/scripts

## 0. Sub-Directory Structure
```
scripts/                        # -> Theme scripts directory
|--dist/                        # -> Compiled theme scripts
|--README.md                    # -> This readme
|--src/                         # -> Theme scripts source directory
|--|--components/               # -> Component scripts
|--|--pages/                    # -> Page template scripts
|--|--universal.js              # -> Universal theme scripts
|--└--vendor/                   # -> Vendor script settings
```

## 1. Compiled Scripts
The ```dist``` folder contains scripts that are processed and bundled by Webpack.

## 2. Script Sources
The ```src``` folder houses the sources files for all scripts used in the theme.

### 2.1 Universal Scripts
A ```universal.js``` file exists for any scripts found on every page of the theme. By default, this includes polyfills, a lazy-loading library, and other tweaks that are necessary for each page to load and function optimally.

### 2.2 Vendor Scripts
The ```vendor``` directory houses files that define library settings. Typically, these files only include an ```import``` statement and some basic object definitions.

### 2.3 Page Template Scripts
For each page template, an associated JavaScript file should be created (as well as added to the Webpack configuration). These script files import their associated template styles for Webpack processing, as well as component files and any other page-specific scripting.

### 2.4 Component Scripts
Component script files are meant as interchangeable code that can be imported into page template files or the ```universal.js``` file without customization. For ease of organization, it is suggested that files are placed within directories in a way to mirror those of the component markup files.