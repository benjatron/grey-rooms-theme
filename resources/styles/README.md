# fwd-boilerplate-theme/resources/styles

## 0. Sub-Directory Structure
```
styles/                         # -> Theme styles directory
|--dist/                        # -> Compiled theme styles
|--README.md                    # -> This readme
|--src/                         # -> Theme styles readme
|--|--_starter.scss             # -> Theme starter style manifest
|--|--base/                     # -> Base style directory
|--|--|--elements/              # -> HTML element styles
|--|--|--settings/              # -> Theme setting styles
|--|--|--tools/                 # -> Theme style tools
|--|--└--vendor/                # -> Vendor styles directory
|--|--components/               # -> Theme component styles
|--|--libraries/                # -> Style libraries
|--|--pages/                    # -> Page template styles
|--└--universal.scss            # -> Universal theme styles
```

## 1. Compiled Styles
The ```dist``` folder contains styles that are processed and bundled by Webpack.

## 2. Style Sources
The ```src``` folder houses the sources files for all styles used in the theme.

### 2.1 Starter Manifest
The ```_starter.scss``` file functions as a "manifest" that outlines what libraries all pages should have access to, as well as any other tools that should be available. Importantly, any imported files here should not emit any code of their own - they merely define placeholders, mixins, functions, and the like.

### 2.2 Base Styles
These styles define a baseline for the theme to built upon. Not only are theme settings and tools defined, but base HTML element styles are also set.

#### 2.2.1 Element Styles
All styles here are tied to specific HTML elements. These are broken up into different files that are named to roughly group the associated tags.

#### 2.2.2 Theme Setting Styles
Theme variables are set in these files.

#### 2.2.3 Theme Tool Styles
SCSS functions, mixins, and placeholders are housed in these files.

#### 2.2.4 Vendor Library Styles
Where necessary, overrides of included vendor library styles can be set here. It is suggested that the file names associated match the packages they should be affecting.

### 2.3 Style Libraries
If, for some reason, a code import cannot be made to include SCSS or CSS into the theme, it can be placed en masse in files in the ```libraries``` directory. Included in the theme, for example, are the WordPress core styles as well as the [Destyle](https://nicolas-cusan.github.io/destyle.css/) library contents.

### 2.4 Universal Styles
The ```universal.scss``` file, similar to the ```universal.js``` file, contains code present on all pages. This includes the starter file, but also any vendor libraries that need to be accessed throughout the site as well. For further information, investigate the import statements in the ```universal.scss``` file.

### 2.5 Page Template Styles
For each page template, an associated SCSS file should be created. These import component files and any other page-specific styling.

### 2.6 Component Styles
Component style files are meant as interchangeable code that can be imported into page template files or the ```universal.scss``` file without customization. For ease of organization, it is suggested that files are placed within directories in a way to mirror those of the component markup files.