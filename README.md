# AMP Facebook Fix

A mini plugin that puts temporary fix for [Facebook redirection issue](https://developers.facebook.com/support/bugs/386564952789501/?join_id=f22e1cd3806adb8), it removes redirection script if it found Facebook's in app browser agents `FB_IAB`, `FB4A`, and `FBAV`

# Warnning
The plugin may not work very well with Page caching, I will recommend turning off mobile redirection until Facbooks In-App Browser issue get's fixed OR issue [#5383](https://github.com/ampproject/amp-wp/issues/5387) of AMP plugin gets fixed.

## Notes

- The plugin will work if you not logged in as administrator (in case you are testing it by setting user agents in browsers )
- The plugin will work if you not previewing it in customizer 
- The plugin removes script for redirection.
- The plugin only work for Facebook android app.
- Feel free to reach us on WordPress Support forum of AMP plugin.

## Plugin Structure

```markdown
.
└── amp-facebook-fix.php
```

### Need a feature in plugin?
Feel free to create a issue and will add more examples.
