# fwd-boilerplate-theme/config

## 0. Sub-Directory Structure
```
config/                        # -> Theme development configuration files
|--.stylelintrc                 # -> Stylelint configuration file
|--postcss.config.js            # -> PostCSS configuration file
|--README.md                    # -> This readme
└--webpack.config.js            # -> Webpack configuration file
```

## 1. Stylelint Configuration
Regular CSS linting is extended by the ```stylelint-scss``` plugin. For further information, you can read through the ```.stylelintrc``` file and get more context from the plugin websites:
 - [stylelint](https://stylelint.io/)
 - [stylelint-scss](https://github.com/kristerkari/stylelint-scss)

## 2. PostCSS Configuration
The theme uses PostCSS for processing styles with a few separate plugins:
 - [autoprefixer](https://github.com/postcss/autoprefixer)
 - [cssnano](https://github.com/cssnano/cssnano)
 - [postcss-dialog-polyfill](https://github.com/komachi/postcss-dialog-polyfill)

## 3. Webpack
This theme uses [Webpack](https://webpack.js.org/) as an asset bundler. At a high level, it separates script and style files by page template but also generates a "universal" package for scripts and styles that are carried across each template.

### 3.1 Entry Points
Whenever a new page template is registered it should be added to the entry points within the file. By default, the existing 404 error page and homepage templates are already in the file, but any extras created throughout the theme development process should be added.

### 3.2 Bundling Configuration
All style files are piped through their associated template script files to be included in the processing pipeline. This also allows for any images and fonts referenced in JavaScript and CSS/SCSS files to be process as well. However, any images or fonts that should be included in a ```dist``` folder that are not referenced explicitly will need to be copied over by hand (sorry!).
