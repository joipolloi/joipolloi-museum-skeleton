
### Prerequisites

* Node v16
* Yarn
* Composer 2

### Make it so

* clone repo
* `cd theme-src/joipolloi && composer install && cd ../../`
* Copy `wordpress/wp-config-local-sample.php` and rename to `wordpress/wp-config-local.php` and update setting to make your local database
* Setup MAMP Document root to the wordpress directory
* `yarn` **(from the root directory)**
* `yarn watch` to build a dev version, start up a dev server and watch files

### Components

To scaffold a new component run `yarn new:component` and be sure to remove any files that won't be used such as _admin.scss and script.js
