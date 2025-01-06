- [Basic Settings](#basic-settings)
  - [Post Type Slug](#post-type-slug)
  - [Customizing the Slug in URLs](#customizing-the-slug-in-urls)
  - [Plural Label](#plural-label)
  - [Singular Label](#singular-label)
- [Settings](#settings)
  - [Public](#public)
  - [Publicly Queryable](#publicly-queryable)
    - [When `publicly_queryable` is true](#when-publicly_queryable-is-true)
    - [When `publicly_queryable` is false](#when-publicly-queryable-is-false)
    - [Real-World Example](#real-world-example)

# Basic Settings

## Post Type Slug
In WordPress, the Post Type Slug refers to the unique identifier (or "key") used to define a specific post type. This slug is a string that acts as an internal identifier for the post type and is also used in URLs (permalinks) to differentiate between types of content.

register_post_type('product', array()); // post type is 'product' and also slug is 'product'

##### Key Points About Post Type Slug
- Internal Identifier:
  - The slug is used internally by WordPress to distinguish this post type from others, such as post (default blog posts) or page (static pages).
- URL Structure:
  - By default, the slug is used in the URL of posts and archives for the custom post type unless you customize it with the rewrite argument.

##### Customizing the Slug in URLs
register_post_type('product', array(
    'rewrite' => array('slug' => 'custom-slug')
));


---

## Plural Label
The plural label appears in various locations in the WordPress admin interface, such as:

- The menu item for the custom post type.
- The screen heading for listing all items.
- Contextual links and messages.

 'labels' => array(
            'name' => __('Products', 'textdomain'), // Plural label         
)

--- 
## Singular Label 
 'labels' => array(           
            'singular_name' => __('Product', 'textdomain'), // Singular label
        ),

---

# Settings

## public
It determines the visibility of the custom post type to both the WordPress admin interface and the front-end of the website.

- true:
    - The custom post type will appear in the WordPress admin dashboard.
    - It can be queried on the front-end (e.g., in templates or using URLs).
    - Archives, single pages, and custom queries will work automatically (if configured).
- false:
    - The custom post type is hidden from the admin interface for most users.
    - It cannot be queried on the front-end unless additional settings are provided.
    - Used for private or programmatically managed post types, such as logs or system entries.

--- 

## Publicly Queryable
It determines whether a custom post type can be queried on the front-end using publicly accessible URLs, such as:

- Single item URLs (e.g., example.com/product/some-product/).
- Archive URLs (e.g., example.com/products/, if has_archive is enabled)

##### When publicly_queryable is true
If publicly_queryable => true, the custom post type:

- Can have single and archive pages accessible via URLs.
- Will work with query parameters like ?post_type=your_post_type.
- Example URL for a custom post type product:
    - Single: https://example.com/product/item-name/
    - Archive: https://example.com/products/ (if has_archive => true).
##### When publicly_queryable is false
If publicly_queryable => false, the custom post type:

- Cannot be accessed via public-facing URLs.
- Queries to access the post type on the front-end will return a 404 error.
- This is useful for post types that are managed in the admin but shouldn’t be exposed publicly (e.g., logs or private data).

#### Real-World Example
For an e-commerce site:

- Products should be publicly queryable (publicly_queryable => true) so customers can view products via single product pages or product archives.
- Internal logs, like order processing logs, should not be publicly queryable (publicly_queryable => false) but still managed in the admin interface.

---
## Show UI
"Show UI" refers to the user interface elements that make it possible for users to interact with and manage the custom post type within the WordPress dashboard. 

The `show_ui` argument determines whether the WordPress admin interface (UI) should display a user interface for managing the custom post type.

##### When `show_ui` is set to `true`
  - WordPress will display the UI for the custom post type in the WordPress admin.
  - The post type will have an entry in the admin menu (like posts or pages).
  - Users can add, edit, view, and manage posts of this custom post type using the WordPress admin interface.
  
##### When `show_ui` is set to `false`  
  - The custom post type will **not** have an entry in the WordPress admin menu.
  - It won’t be visible to users in the admin area, although the post type can still exist and be used programmatically.
#### User Case 
This setting is often used when the custom post type is meant to be used programmatically or should not be managed directly through the WordPress admin dashboard.

#### Example Usage of `show_ui`
```php
function create_custom_post_type() {
    register_post_type('product', array(        
        'show_ui' => true,  // This will show the UI for managing 'product' posts in the admin dashboard       
    ));
}
```


#### Why Use `show_ui = false`?

- **Logging or tracking data**: If you're using a custom post type to track internal data or logs that users don't need to manage via the admin interface.
- **Programmatic post types**: For post types that are handled programmatically and only accessed through specific code or APIs.


---