# Oxygen Responsive Menu #

Implements [Superfish](https://github.com/joeldbirch/superfish) + [ResponsiveMenus.js](https://github.com/studiopress/responsive-menus) + [CSS-animated hamburger](https://jonsuh.com/hamburgers/) in Oxygen.

At the responsive breakpoint (959px by default), the menu will collapse into a hamburger (with the word `Menu` to its right). Tapping on the menu toggle button will smoothly slide open the menu and the hamburger will animate into a x.

Menu items that have children will have a down arrow which when tapped will expand to show the sub menu. Tapping on the up arrow will collapse the sub menu.

It is also possible to expand the menu without it pushing the page content below by uncommenting lines 193-198 in main.css.

## Live Demo ##

[Demo Site](https://oxygenresponsivemenu.demo.site/)

## Note ##

* This plugin is meant for developers who are comfortable hand coding/tweaking the CSS to match their designs.
* Despite the name, this plugin is not integrated with Oxygen in any way. This means, it is not possible to set the mobile icon breakpoint, change the colors or any adjustments in the Oxygen editor. You will need to edit the plugin's CSS file using a FTP client or cPanel file manager etc.
* This plugin can be used with any WordPress site. When used in a non-Oxygen site, replace `CT_VERSION` with `'1.0.0'` in the plugin's PHP file.
* The plugin is offered as is without any guaranteed support.

## Installation ##

1. Click on the `Download ZIP` button at the right to download the plugin.
2. Upload the entire `oxygen-responsive-menu-master` folder to the `/wp-content/plugins/` directory.
3. Activate the plugin through the `Plugins` menu in WordPress.

## Usage ##

Use `[oxygen-responsive-menu menu="Main Menu"]` shortcode to display a WordPress menu named `Main Menu`.

If your menu is already named `Main Menu`, you can omit the shortcode parameter and just use `[oxygen-responsive-menu]`.

Follow this [blog post](https://wpdevdesign.com/oxygen-responsive-menu/) for step-by-step instructions for implementing this in Oxygen.

## Changelog ##

### 1.0.0 - November 18, 2018 ###
* Initial Release

### 1.0.1 - November 18, 2018 ###
* Set Dashicons to load so the up and down arrows can be seen.

### 1.0.2 - November 19, 2018 ###
* Set arrows using pseudo element per [suggestion by David Browne](https://oxygenusers.slack.com/archives/CAJ5461DH/p1542592848347700?thread_ts=1542542814.345600&cid=CAJ5461DH) on desktop widths.
