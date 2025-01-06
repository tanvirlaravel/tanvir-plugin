### Global Variables in WordPress

Doc Link 
https://wp-kama.com/1586/global-variables-in-wordpress#current_screen


During page generation, WordPress gets a bunch of data and important data is stored in global variables. For example:

- The category ID on the category page is $cat.
- Or all the posts received on a category page - ### $wp_query.
- Or the post object on the post page - $post.

<a id="top"></a>

So, WordPress creates a bunch of global variables that you can use in your code.




# Common variables
### $wp_rewrite(object)
Stores everything about URL rewrite rules. Global class instance WP_Rewrite. Installed in the wp-setings.php file before the setup_theme event.
### $wp_scripts(WP_Scripts)
Stores all connected and put to output scripts. Global instance WP_Scripts.
### $wp_styles(WP_Styles)
Stores all connected and rendered styles. Global instance WP_Styles.
### $wpdb(object)
Stores the current connection to the database. Global class instance wpdb. Allows communication with the database.
$table_prefix(string)
Prefix a table in the database.
### $wp_admin_bar(WP_Admin_Bar)
All data of the admin bar.
### $wp_meta_boxes(array)
Object of all registered metaboxes. Contains their IDs, parameters (args), callback functions and headers of all record types, including arbitrary ones.
### $wp_registered_sidebars(array)
All data about registered areas for the sidebar.
### $wp_registered_widgets(array)
Data of all registered widgets.
### $wp_registered_widget_controls(array)
____
### $wp_registered_widget_updates(array)
____
$allowedposttags(array)
Allowed HTML tags when publishing an entry. See file for list wp-includes/kses.php.
$allowedtags(array)
Allowed HTML tags when posting comments. See the list in the file wp-includes/kses.php. See allowed_tags()
### $wp_filter(array)
All WordPress hooks.
### $wp_actions(array)
An array with event names in the index and the number of times the event was triggered in the value.
### $wp_object_cache(WP_Object_Cache)
The entire object cache. It's stored this way when the object cache plugin isn't installed... Global class instance. WP_Object_Cache.
$shortcode_tags(array)
All registered shortcodes and their data.

### $wp_embed(WP_Embed)
The class responsible for embedding objects. For example, when HTML code of youtube video link is created in the text of an article. The variable contains an instance of the class WP_Embed.

This class is based on the class WP_oEmbed - It contains the basic functionality of the embeds, and WP_Embed is a kind of wrapper. You can get the WP_oEmbed object through a function: _wp_oembed_get_object(). Separately, this object has no global variable.

### $wp_oembed(WP_oEmbed)
There is no such global variable! You can get the WP_oEmbed object through a function: _wp_oembed_get_object().
### $wp_taxonomies(array)
Data of all taxonomies.
### $wp_post_types(array)
Data of all record types. Object array WP_Post_Type
$l10n(array)
An array of all translations. Contains MO class objects obtained from .mo files. See load_textdomain().
$l10n_unloaded(array)
An array of domains for which translations have been unloaded (cancelled). An array with elements: 'domain' => true. See unload_textdomain().
### $wp_post_statuses(array)
An array of data about all the statuses of entries. publish, future, etc.
$current_user(WP_User)
The data object of the current user is an instance of WP_User. Some of the data is stored in separate global variables for quick access: $user_login, $user_ID, $user_email, $user_url, $user_identity (Usually login).
### $wp_roles(WP_Roles)
All data of user roles on site.
### $wpsmiliestrans(array)
An array of special strings that can be translated into emoticons. Translate text into smilies. :x into smiley, :| Into smiley, etc.
$super_admins(array)
An array of IDs of users who have extra super-administrator rights in MU build. This global variable is set by the site owner (e.g. in the wp-config.php file). If set, the variable overwrites (overwrites) the list of super-admins in the database.
$content_width(number)
Sets the width of the site content. Used in the file functions.php.
### $wp_filesystem(object)
An instance of the selected object extending the class WP_Filesystem_Base, for working with files on the server. An instance can be one of the classes: WP_Filesystem_Direct, WP_Filesystem_FTPext, WP_Filesystem_ftpsockets, WP_Filesystem_SSH2.

Variable set by the function WP_Filesystem().

### $wp_theme_directories
An array containing the paths to the folders where the themes are located. Usually there is only one path. The variable is created with the function register_theme_directory().
Localization (translation)
### $wp_locale(WP_Locale)
Data of the current site locale (site language). Global instance класса WP_Locale.
$locale(string)
Site locale, for example ru_RU.
$weekday(array)
Array of all days of week translated to current locale. [ __('Sunday'), __('Monday'), ... ]
$weekday_initial(array)
Array of first letters of all days of week translated to current locale. [ __('Sunday') => __('S'), __('Monday') => __('M'), ... ]
$weekday_abbrev(array)
An array of short names of all days of week translated to current locale. [ __('Sunday') => __('Sun'), __('Monday') => __('Mon'), ... ]
$month(array)
An array of all months translated to the current locale. [ __('January'), __('February'), ... ]
$month_abbrev(array)
An array of abbreviated names of all months translated to the current locale. [ __('January') => __('Jan'), __('February') => __('Feb'), ... ]
Main WordPress query
IMPORTANT: Don't use the names of the variables listed below in your code, because they are used by the WordPress core. And if you do use them, you should understand what you're doing.

The main request is made by the wp() method WP::main().

### $wp(WP).
Stores the current request of WordPress itself - an instance of WP class, which contains the request parameters obtained from the URL.
The variables below are set by WP::register_globals(), which is called from WP::main().

### $wp_query(WP_Query)
### $wp_the_query(WP_Query)
Stores result of global WP query - instance of WP_Query class. It is set by function query_posts().

### $wp_the_query must always be equal to ### $wp_query. If someone suddenly used query_posts() instead of get_posts()) in their code, the ### $wp_the_query variable allows you to return the value of ### $wp_query to the correct state, see. wp_reset_query().

$query_string(string)
The string (parameters) of the current query.
$posts(array)
All the posts of the main WP_Query.
$post(WP_Post|null)
The WP_Post object of the current post. If the page implies output of posts or a post.
$request(string)
SQL query to get all posts for the current page.
$more(int)
Equals 1 when the condition is triggered - is_single() || is_page().
$single(int)
Whether the current page is the post page. Equals 1 when the condition is triggered - is_single() || is_page().
$authordata(WP_User)
User data get_userdata(). Set only on the author archive page is_author().
The WP::register_globals() method also extracts all variables of the main WP_Query into global variables:

// Extract updated query vars back into global namespace.
foreach ( (array) ### $wp_query->query_vars as $key => $value ) {
	$GLOBALS[ $key ] = $value;
}
See WP_Query::parse_query() and WP_Query::fill_query_vars():

$attachment
$attachment_id
$author
$author__in
$author__not_in
$author_name
$cat
$category__and
$category__in
$category__not_in
$category_name
$day
$embed
$error
$favicon
$feed
$fields
$hour
$m
$menu_order
$meta_key
$meta_value
$minute
$monthnum
$name
$p
$page
$page_id
$paged
$pagename
$post__in
$post__not_in
$post_name__in
$post_parent
$post_parent__in
$post_parent__not_in
$post_status
$post_type
$preview
$robots
$s
$second
$sentence
$subpost
$subpost_id
$tag
$tag__and
$tag__in
$tag__not_in
$tag_id
$tag_slug__and
$tag_slug__in
$tb
$title
$w
$withcomments
$withoutcomments
$year
Inside the WordPress loop
Inside the posts loop
You can use these global variables inside the WordPress loop. They change as you go through the items in the loop. They all contain information about the current entry (post) in the loop.

They are set by WP_Query::setup_postdata(). Or a wrapper for this method setup_postdata().

$post(WP_Post)
The object of the current post. On the record page it is the record itself. On the headings page it is the current entry in the loop.
$authordata(WP_User)
The object of the author of the current post. The object is described in WP_User.
$currentday(string)
The day when the current post was published.
$currentmonth(string)
The month when the current post was published.
$page(number)
The page of the current post, when the post is paginated Using the tag. <!--nextpage-->.
$pages(array)
The content pages of the current entry (post). Each page is paginated here using the tag <!--nextpage-->.
$multipage(true/false)
Determines whether the current post is paginated using the <!--nextpage-->. Contains true or false.
$numpages(number)
Number of pages if the entry is paginated with a tag <!--nextpage-->.
$more(true/false)
Whether there is a tag <!--more--> in the post content.
In the comments loop
$comment(WP_Comment)
The object of the current comment in the loop. See the description for an example of such an object get_comment()
In the Front Part (Front-end)
$template(string)
The path to the template file that is responsible for outputting the HTML code of the current page. For example: C:/sites/wptest.com/www/wp-content/themes/twentyfifteen/archive.php
In the Admin Panel
$current_screen(array)
The data of the current admin screen. See. get_current_screen()
$pagenow(string)
Determines what page we are on now - the current page of the admin panel. Stores the name of the php file that handles the current page. For example options-general.php. It takes the last element taken from $_SERVER['PHP_SELF'] and standardizes the value where needed.

The variable is set early, immediately after the event muplugins_loaded, but before the event plugins_loaded.

The variable is also set at the frontend, only there it almost always contains index.php or wp-login.php.

$post_type(string)
Record type in the admin. On the record or taxonomy page.
$menu(array)
Array of data with the admin menu items that were added via add_menu_page(). Contains an Array of data arrays for each menu.
$submenu(array)
Array of data with the admin sub-menu items that were added via add_submenu_page(). Contains an Array of data arrays of each sub-menu.
$admin_page_hooks(array)
The main menu items of the admin menu in the array. Where the array index is the menu ID, which is specified in the fourth parameter add_menu_page().

It is almost the same as $menu, only it is an index array.

Array(
	[index.php]               => dashboard
	[separator1]              => separator1
	[upload.php]              => media
	[link-manager.php]        => links
	[edit-comments.php]       => comments
	[edit.php]                => posts
	[edit.php?post_type=page] => pages
	[separator2]              => separator2
	[themes.php]              => appearance
	[plugins.php]             => plugins
	[users.php]               => users
	[tools.php]               => tools
	[options-general.php]     => settings
	[separator-last]          => separator-last
	[woocommerce]             => woocommerce
)
Version Variables
### $wp_version(string)
The current version of WordPress.
### $wp_db_version(number)
Current version of the database.
$tinymce_version(string)
Current version of the TinyMCE editor.
$manifest_version(string)
Cache manifest version.
$required_php_version(string)
The minimum version of PHP, which is required for the current WordPress.
$required_mysql_version(string)
The minimum MySQL version required for the current WordPress.
Browser Variables
These variables contain data about the current browser the user is using.

$is_iphone(true/false)
iPhone Safari.
$is_chrome(true/false)
Google Chrome.
$is_safari(true/false)
Safari.
$is_NS4(true/false)
Netscape 4.
$is_opera(true/false)
Opera.
$is_macIE(true/false)
Mac Internet Explorer.
$is_winIE(true/false)
Windows Internet Explorer.
$is_gecko(true/false)
FireFox.
$is_lynx(true/false)
Linux.
$is_IE(true/false)
A global variable defined by WordPress and used to determine if the current browser is Internet Explorer.
$is_edge(true/false)
Microsoft Edge.
Web Server Variables
These global variables contain data about which server WordPress is running on.

$is_apache(true/false)
Apache HTTP Server.
$is_IIS(true/false)
Microsoft Internet Information Services (IIS).
$is_iis7(true/false)
Microsoft Internet Information Services (IIS) v7.x.
Multisite
$blog_id(number)
ID of the current blog.
