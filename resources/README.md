# fwd-boilerplate-theme/resources

## 0. Sub-Directory Structure
```
resources/                         # -> Styles, scripts, images, and fonts
|--acf/                            # -> Advanced Custom Fields JSON directory
|--fonts/                          # -> Theme-hosted font files
|--images/                         # -> Theme-hosted image files
|--README.md                       # -> This readme
|--scripts/                        # -> Theme scripts directory
|--|--dist/                        # -> Compiled theme scripts
|--|--README.md                    # -> Theme scripts readme
|--└--src/                         # -> Theme scripts source directory
|-----|--components/               # -> Component scripts
|-----|--pages/                    # -> Page template scripts
|-----|--universal.js              # -> Universal theme scripts
|-----└--vendor/                   # -> Vendor script settings
|--styles/                         # -> Theme styles directory
|--|--dist/                        # -> Compiled theme styles
|--|--README.md                    # -> Theme styles readme
|--└--src/                         # -> Theme styles readme
|-----|--_starter.scss             # -> Theme starter style manifest
|-----|--base/                     # -> Base style directory
|-----|--|--elements/              # -> HTML element styles
|-----|--|--settings/              # -> Theme setting styles
|-----|--|--tools/                 # -> Theme style tools
|-----|--└--vendor/                # -> Vendor styles directory
|-----|--components/               # -> Theme component styles
|-----|--libraries/                # -> Style libraries
|-----|--pages/                    # -> Page template styles
|-----└--universal.scss            # -> Universal theme styles
```

## 1. ACF Directory
Field groups created by Advanced Custom Fields (ACF) are saved and loaded from this folder.

## 2. Fonts Directory
Any fonts that are included with the theme should be included here in the nested ```src``` directory.

## 3. Images Directory
Images shipped with the theme are found here. Initially they are placed in a ```src``` folder and then processed into a ```dist``` folder if referenced in the scripts and styles.

## 4. Scripts Directory
Scripts for the theme are stored here. Further information can be found in the scripts directory readme file.

## 5. Styles Directory
Styles for the theme are stored here. Further information can be found in the styles directory readme file.
