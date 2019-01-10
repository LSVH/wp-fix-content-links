=== Fix Content Links ===
Contributors: fleuv
Tags: content, tool
Requires at least: 5.0
Requires PHP: 7.0
Tested up to: 5.0.2
Stable tag: trunk
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Replaces incorrect links to sources located in the uploads, plugins, themes or wp-content folder.

== Description ==

Ever had to replace a couple of links after a migration or because another user added it somehow incorrectly to the 
site? Well no worries about that anymore, by simply installing and activating this plugin that problem will be gone for 
good!

With this plugin you can either replace incorrect links temporary or permanently. At the plugin settings page you're
able to tweak the replace algorithm at the following aspects:

* Only replace links with a certain path prefix.
* Exclude links from being replaced.

In the future there might also be a feature added to help specify on what content the replacement will be executed. For
now the plugin does only replaces incorrect links in the `any` post type's post content.

By using this plugin on your WordPress site, you're allowing the plugin to replace URL's in the `src` attribute which
are stored in your WordPress site's database and thus can be altered via the WordPress admin area.

== Installation ==

This section describes how to install the plugin and get it working.

1. Upload the wp-fix-content-links.zip to the `/wp-content/plugins/` directory.
1. Activate the plugin through the 'Plugins' menu in WordPress.
1. Modify the plugin settings to your needs, by default the plugin will replace links temporary.

== Frequently Asked Questions ==

= Why can't I set the plugin to permanently replace links by default? =

For software design principals the plugin will only permanently replace links on command and not like the temporary
setting on every request.

= Why did the plugin break my links instead of fixing them? =

You will probably have to try a different configuration. Try to disable link fixer, where after you go back to the page
where you want to fix your links. Check if you can find some similarity what can be used as a general identifier to
match against. Update your settings and see the effect of it by enabling the temporary link fixer. Setting up the plugin
might be a though process and requires you to do some research like explained above as well as your intuition.

== Screenshots ==

1. The plugin's settings page, located in the Settings submenu.

== Changelog ==

N.A.

== Upgrade Notice ==

N.A.

== Arbitrary section ==

The plugin comes with one hook `fix-content-links_save_option_{$setting}` where $setting is either: type, path or
exclude. With this filter you can add your own functionality before the saving process of an option completes.

Use with the Transient API to modify the admin notice during the saving process.

= Example =
`<?php
add_filter('fix-content-links_save_option_type', function ($value) {
	$transient = 'fix-content-links_' . get_current_user_id() . '_admin_notice'
	$update = get_transient($transient);

	if ($value === 'disable' && is_array($update) && array_key_exists('message', $update)) {
		$update['message'] = '<p>' . __('Plugin disabled.') '</p>';
		set_transient($update);
	}

	return $value;
}
?>`