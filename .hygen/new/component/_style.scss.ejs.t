---
to: <%= absPath %>/_style.scss
---
@use "styles/base/variables" as *;
@use "styles/base/mixins" as *;

[is='joi-<%= h.inflection.transform(component_name, ['underscore', 'dasherize']) %>'] {

}
