<a id="top"></a>

- [Introduction](#introduction)
- [Sen](#sen)
  - [docs 1](#docs-1)
  - [docs 2](#docs-2)

# Introduction

[Back to Top](#top)

The WordPress Query class.

Most of the time you can find the information you want without actually dealing with the class internals and global variables. There are a whole bunch of functions that you can call from anywhere that will enable you to get the information you need.

There are two main scenarios you might want to use WP_Query in. The first is to find out what type of request WordPress is currently dealing with. The $is_* properties are designed to hold this information

The second is during The Loop. WP_Query provides numerous functions for common tasks within The Loop. To begin with, have_posts() , which calls $wp_query->have_posts(), is called to see if there are any posts to show. If there are, a while loop is begun, using have_posts() as the condition. This will iterate around as long as there are posts to show. In each iteration, the_post() , which calls $wp_query->the_post() is called, setting up internal variables within $wp_query and the global $post variable (which the Template Tags rely on), as above. These are the functions you should use when writing a theme file that needs a loop.

Note: If you use the_post() with your query, you need to run wp_reset_postdata() afterwards to have template tags use the main query’s current post again.

---

#  Usage
```php
<?php
// The Query.
$the_query = new WP_Query( $args );

// The Loop.
if ( $the_query->have_posts() ) {
	
	while ( $the_query->have_posts() ) {
		$the_query->the_post();
		echo  esc_html( get_the_title() ) ;
	}
	
}
// Restore original Post Data.
wp_reset_postdata();
```

## Multiple Loops
```php
<?php

// The Query
$query1 = new WP_Query( $args );

// The Loop
while ( $query1->have_posts() ) {
$query1->the_post();
echo '<li>' . get_the_title() . '</li>';
}

/* Restore original Post Data
* NB: Because we are using new WP_Query we aren't stomping on the
* original $wp_query and it does not need to be reset with
* wp_reset_query(). We just need to set the post data back up with
* wp_reset_postdata().
*/
wp_reset_postdata();

/* The 2nd Query (without global var) */
$query2 = new WP_Query( $args2 );

// The 2nd Loop
while ( $query2->have_posts() ) {
$query2->the_post();
echo '<li>' . get_the_title( $query2->post->ID ) . '</li>';
}

// Restore original Post Data
wp_reset_postdata();

?>

```

# When we use wp_reset_query() ?

---

# Properties and Methods

[Back to Top](#top)

use the methods to interact with them.


## Properties


##### query string (defination)
A query string is a part of a URL (Uniform Resource Locator) that contains data that is passed to the server to retrieve specific information. It typically appears after a question mark (?) and is composed of one or more key-value pairs separated by an equal sign (=), with multiple pairs separated by an ampersand (&).

```php
https://example.com/products?category=books&sort=price
https://example.com/?p=123
This query string fetches a specific post with ID 123.
```

WordPress has a global variable called $wp_query that processes the query string and retrieves the corresponding data (posts, pages, etc.) based on the parameters.
```php
 Query String: category=electronics&sort=price_asc&page=2
    - category: Filter products by the "electronics" category.
    - sort: Sort products by price in ascending order.
    - page: Display products from page 2.
```
- $query

Holds the query string that was passed to the $wp_query object by WP class.

```php
https://example.com/?category=books&sort=price_asc
The global $query will contain:
category=books&sort=price_asc
```
- $query_vars

An associative array of the query variables and their respective values.

Query variables are parameters in a query string (or internally set in WordPress) that control the content WordPress retrieves from the database. They correspond to values passed in the URL or specified in custom queries.


```php

URL: https://example.com/?category_name=news&paged=2
Query Variables:
array(
    'category_name' => 'news',
    'paged' => 2,
)

```
### Common Query variables
| **Query Variable** | **Description**                                                                 |
|---------------------|---------------------------------------------------------------------------------|
| `post_type`         | The type of content to retrieve (e.g., `post`, `page`, `custom_post_type`).    |
| `p`                 | The ID of a specific post to retrieve.                                         |
| `page_id`           | The ID of a specific page to retrieve.                                         |
| `category_name`     | The slug of a category to filter posts by.                                     |
| `tag`               | The slug of a tag to filter posts by.                                          |
| `author`            | The ID or username of an author to filter posts by.                           |
| `s`                 | A search term for WordPress to match against post titles and content.          |
| `paged`             | The page number for paginated results.                                         |
| `posts_per_page`    | The number of posts to display per page.                                       |
| `orderby`           | Field to sort posts by (e.g., `title`, `date`, `meta_value`).                  |
| `order`             | Sort order (`ASC` or `DESC`).                                                 |
| `meta_query`        | Filter posts by custom fields (meta data).                                     |
| `tax_query`         | Filter posts by custom taxonomy terms.                                         |


- $queried_object
Applicable if the request is a category, author, permalink or Page. Holds information on the requested category, author, post or Page.
- $queried_object_id
If the request is a category, author, permalink or post / page, holds the corresponding ID.
- $posts
Gets filled with the requested posts from the database.
- $post_count
The number of posts being displayed.
- $found_posts
The total number of posts found matching the current query parameters
- $max_num_pages
The total number of pages. Is the result of - $found_posts / - $posts_per_page
- $current_post
(available during The Loop) Index of the post currently being displayed.
- $post
(available during The Loop) The post currently being displayed.
- $is_single, - $is_page, - $is_archive, - $is_preview, - $is_date, - $is_year, - $is_month, - $is_time, - $is_author, - $is_category, - $is_tag, - $is_tax, - $is_search, - $is_feed, - $is_comment_feed, - $is_trackback, - $is_home, - $is_404, - $is_comments_popup, - $is_admin, - $is_attachment, - $is_singular, - $is_robots, - $is_posts_page, - $is_paged
Booleans dictating what type of request this is. For example, the first three represent ‘is it a permalink?’, ‘is it a Page?’, ‘is it any type of archive page?’, respectively. See also Conditional Tags.



## docs 2
sddfs