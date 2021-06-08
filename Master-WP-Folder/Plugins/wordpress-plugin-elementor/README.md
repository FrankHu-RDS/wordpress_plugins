# Release procedure

Until we have added the plugin to the WordPress plugin store we have to release changes manually. This is done in the following way.

1. Create a new zip file of the wordpress-plugin folder named `plugin.zip`
2. Update the `last_updated` field of `manifest.json`
3. Upload the `plugin.zip` and `manifest.json` to efs filesystem through bastion