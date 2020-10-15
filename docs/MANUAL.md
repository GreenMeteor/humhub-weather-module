## End User Manual

### Location Field
This field you must enter the location of the area you've entered in the Forecast7 Weather URL field (e.g: `TOKYO`), this field is case sensitive, meaning it must be capitalized.

### Language & Custom Language
You can use either the default URL generated (e.g: `https://forecast7.com/en/35d71139d73/tokyo/`) or use the same URL with `{language}` (e.g: `https://forecast7.com/{language}/35d71139d73/tokyo/`).

### CSP
In some cases this is a requirement, in these cases use the below snippet, for those that don't know if this applies to them ***please*** read the [official docs](https://docs.humhub.org/docs/admin/security/#web-security-configuration).
 - Requires `frame-src` https://weatherwidget.io/ in case you've overwritten the default csp header.
 
 ```php
"frame-src" => [
    "self" => true,
    "allow" => [
        'https://weatherwidget.io/'
    ]
],
```
