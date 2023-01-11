## IMPORTANT

This repository should only be used as an upstream source for projects.

### Prerequisites

-   Node v16
-   Yarn
-   Composer 2

### Using this repository as a project base

-   clone repo
-   `cd theme-src/joipolloi && composer install && cd ../../`
-   Copy `wordpress/wp-config-local-sample.php` and rename to `wordpress/wp-config-local.php` and update setting to make your local database
-   Copy `wordpress/wp-config-sample.php` and rename to `wordpress/wp-config.php`
-   Setup MAMP Document root to the wordpress directory
-   `yarn` **(from the root directory)**
-   `yarn watch` to build a dev version, start up a dev server and watch files

### Database

A relatively stripped back database to begin with is located at https://www.dropbox.com/s/oxo0sgpta5zaoi2/jp_wordpress_skeleton.sql?dl=0. This may have some project specific terms but overall it'll be a good baseline to work from. The administrator account has username "admin" and password "password" - make sure this is changed before the project is moved to any live hosting. You will also need to update the site URL, home URL, site name and admin email.

### Components

To scaffold a new component run `yarn new:component` and be sure to remove any files that won't be used such as \_admin.scss and script.js

### Project Specific

Allowed block types - Once you create a block, you will need to add it to the list of allowed blocks in `inc/allowedBlocks.php`. The reference will be `acf/` followed by the block name in snake case (lower case with hypens for spaces).

Searching custom post types - If you need to add a custom post type to be available when searching, you need to add it to the post type array located in `inc/search.php`.

Editor colour palette - To update the default colour swatches located in the Gutenberg colour picker, you will need to update the array located in `inc/theme.php`.
