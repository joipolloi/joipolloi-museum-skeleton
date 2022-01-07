---
to: <%= absPath %>/index.twig
---

<div class="<%= component_name %>" is="joi-<%= h.inflection.transform(component_name, ['underscore', 'dasherize']) %>"></div>