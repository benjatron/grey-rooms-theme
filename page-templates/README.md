# fwd-boilerplate-theme/page-templates

## 0. Sub-Directory Structure
```
page-templates/                    # -> Template and component markup files
|--404.php                         # -> 404 Error page template
|--components/                     # -> Theme components directory
|--|--blank-component.php          # -> Blank component file
|--└--meta/                        # -> Theme meta components
|-----|--adobe-fonts.php           # -> Adobe Fonts component
|-----|--foot.php                  # -> WordPress foot component
|-----|--google-tag-manager.php    # -> Google Tag Manager (GTM) component
|-----|--gtm-noscript.php          # -> GTM no-script fallback component
|-----└--head.php                  # -> Generic <head> tags
|--homepage.php                    # -> Homepage template
|--layouts/                        # -> Theme layout directory
|--|--body-open.php                # -> Body-open layout file
|--└--header.php                   # -> Document header layout file
|--README.md                       # -> This readme
```

## 1. Page Templates
Page templates encapsulate the entire markup for a given page. At the top of each template, a namespace alias is declared:
```
use FWD_Helper as FWD;
```
This allows the use of ```FWD``` helper functions throughout the template markup, such as ```FWD::preload()```, ```FWD::the_component()```, etc.

Each template uses a template Class as its base, declared near the top of each template. This is used to pass values to variables used within the template, such as ```$slug``` for the template slug (which is used for loading assets and prefixing CSS classes) and ```$meta``` for the Object of metadata used in the ```<head>``` and in other meta tags.

While it is not absolutely necessary, a ```<div id="page-wrapper">``` is included in the body of the page. This is to support script libraries such as [mmenu](https://mmenujs.com/) (FWD's go-to menu library) to have the correct wrapper element to target.

### 1.1 Included Templates
By default, a 404 error page template and homepage template are included with the theme. If a new template is needed, a layout file should be placed in the ```page-templates``` directory and should also be declared in the ```$THEME->templates``` array within ```functions.php``` file for the theme. This will ensure that scripts and styles can be loaded, assuming that they are present.

## 2. Components
Components contain interchangeable markup, potentially dependent on a single passed Object. Similar to page templates, this is a combination of markup languages. Also similar to a page template, ```FWD_Helper``` is aliased at the top of the file. If an Object has been passed to the component, it can be dedicated to a useful variable name and its contents used within the file.

### 2.1 Included Components
Included in the theme is a blank component template, as well as several meta components commonly found in a theme, in their own ```meta``` directory. These place common meta tags in the ```<head>``` as well as throughout the rest of the document. Browse through those files for further information on their particular capabilities.

## 3. Layouts
Unlike page templates and components, layout files are meant to be exclusively comprised of PHP code. They provide a shorthand for including multiple components or other repetitive code blocks into a page template without cluttering the markup unnecessarily. While page templates and components both may have associated scripts and styles, layout files are intended to function on their own, without other dependencies. As such, you will not find a ```layouts``` directory within the ```resources``` folder.

## 3.1 Included Layouts
A ```header``` and ```body-open``` layout are included with the theme as a way to group repetitive meta tags and functions together. Typically, a universal footer can exist in a theme which would be a good candidate for a layout file.
