# fwd-boilerplate-theme/app

## Sub-Directory Structure
```
|app/                           # -> Theme classes and functionality
|--class-fwd-component.php      # -> Base component class
|--class-fwd-helper.php         # -> Helper function class
|--class-fwd-setup.php          # -> Theme setup class
|--class-fwd-template.php       # -> Page template class
|--classes/                     # -> Theme classes
|--|--components/               # -> Component classes
|--|--└--component-footer.php   # -> Universal footer component
|--└--templates/                # -> Page template classes
|-----|--template-404.php       # -> 404 Error page template class
|-----└--template-homepage.php  # -> Homepage template class
|--init.php                     # -> Class autoload functions
└--README.md                    # -> app directory readme
```

## 1. ```init.php```
The ```init.php``` file exists for two primary purposes. It loads any autoloader libraries from Composer and sets up autoload functions for classes within the theme. There are four classes included with the theme by default: ```FWD_Component```, ```FWD_Helper```, ```FWD_Setup```, and ```FWD_Template```, which all accomplish different things. While the are described here, further details can be gleaned from diving into each base class file and reading the docblocks there.

## 2. ```FWD_Setup``` Class
Theme setup is largely controlled by the ```FWD_Setup``` class object. This stores the theme version, various directory locations, and sets up WordPress-specific theme features. This is also the class that creates a base "Theme Settings" page.

## 3. ```FWD_Helper``` Class
The ```FWD_Helper``` class is abstracted so it won't be instantiated at any point, but does allow for the use of various namespaced helper functions throughout the site. It allows for some helpful shorthand when including page templates, components, and short-cutting the development of things such as responsive image ```srcset``` attributes.

## 4. ```FWD_Template``` Classes
Template classes are created per page template and extend the base ```FWD_Template``` class. Included as examples are templates for a 404 error page and homepage class, in the ```app/templates/``` directory. This allows page-specific values to be housed and declared.

## 5. ```FWD_Component``` Classes
Template components can be created within individual component classes, which reside in the ```app/components/``` directory. There is the option to automatically build a generic component by simply passing an ACF field to the component class, if that is all that is necessary to retrieve and order the necessary information. Otherwise, a ```build_component()``` function is included to re-order data and construct anything beyond basic object contents. By default, a universal footer component is included to give a skeleton class to work from.