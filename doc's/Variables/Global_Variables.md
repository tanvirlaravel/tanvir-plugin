<a id="top"></a>
- [Introduction](#introduction)
- [Example](#example)
- [Inside the Loop Variables](#inside-the-loop-variables)
- [Browser Detection Booleans](#browser-detection-booleans)
- [Web Server Detection Booleans](#web-server-detection-booleans)
- [Version Variables](#version-variables)
- [Miscellaneous Globals](#miscellaneous-globals)
- [Admin Globals](#admin-globals)

---

## Introduction 
[Back to Top](#top)
WordPress-specific global variables are used throughout WordPress code for various reasons. 

Almost all data that WordPress generates can be found in a global variable.

Note that it's best to use the appropriate API functions when available, instead of modifying globals directly.

To access a global variable in your code, you first need to globalize the variable with global $variable;

Developers are advised not to create local variables with the same names in Plugins or Themes. Under some circumstances, the global variable value will be replaced by the local variable value, causing errors in the WordPress Core that are difficult to diagnose.

---

## Example
[Back to Top](#top)

// The current user can be accessed via the global variable
global $current_user;.

 ---

## Inside the Loop variables 
[Back to Top](#top)
containing information about the current post being processed.

- $post (WP_Post) The post object for the current post. 
- $posts (not to be mistaken for $query->$posts).
- $authordata (WP_User) The author object for the current post. Class_Reference/WP_User.
- $currentday (string) Day that the current post was published.
- $currentmonth (string) Month that the curent post was published.
- $page (int) The page of the current post being viewed. Specified by the query var page.
- $pages (array)The content of the pages of the current post. Each page elements contains part of the content separated by the <!--nextpage--> tag.
- $multipage (boolean) 
- $more (boolean) 
- $numpages (int) Returns the number of pages in the post, related to $pages.

---

## Browser Detection Booleans 
[Back to Top](#top)
These globals store data about which browser the user is on.

- $is_iphone (boolean) 
- $is_chrome (boolean) 
- $is_safari (boolean)
- $is_NS4 (boolean) 
- $is_opera (boolean) 
- $is_macIE (boolean) 
- $is_winIE (boolean) 
- $is_gecko (boolean) 
- $is_lynx (boolean)
- $is_IE (boolean) 
- $is_edge (boolean)
---

## Web Server Detection Booleans 
[Back to Top](#top)
These globals store data about which web server WordPress is running on.

- $is_apache (boolean) 
- $is_IIS (boolean) 
- $is_iis7 (boolean) 
- $is_nginx (boolean) 
---

## Version Variables 
[Back to Top](#top)
- $wp_version (string)
- $wp_db_version (int) 
- $tinymce_version (string) 
- $manifest_version (string) 
- $required_php_version (string) 
- $required_mysql_version (string) 
---

## Misc 
[Back to Top](#top)
- $super_admins (array) An array of user IDs that should be granted super admin privileges (multisite). This global is only set by the site owner (e.g., in wp-config.php), and contains an array of IDs of users who should have super admin privileges. If set it will override the list of super admins in the database.
- $wp_query (object) The global instance of the Class_Reference/WP_Query class.
- $wp_rewrite (object) The global instance of the Class_Reference/WP_Rewrite class.
- $wp (object) The global instance of the Class_Reference/WP class.
- $wpdb (object) The global instance of the Class_Reference/wpdb class.
- $wp_locale (object)
- $wp_admin_bar (WP_Admin_Bar)
- $wp_roles (WP_Roles)
- $wp_meta_boxes (array) Object containing all registered metaboxes, including their id's, args, callback functions and title for all post types including custom.
- $wp_registered_sidebars (array)
- $wp_registered_widgets (array)
- $wp_registered_widget_controls (array)
- $wp_registered_widget_updates (array)
---

## Admin Globals 
[Back to Top](#top)
- $pagenow (string)
- $post_type (string) 
- $allowedposttags (array)
- $allowedtags (array)
- $menu (array)