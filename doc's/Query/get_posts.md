link https://kinsta.com/blog/wordpress-get_posts/

# Introduction 
WordPress get_posts is a powerful function allowing developers to retrieve pieces of content from the WordPress database. You can specify in the finest detail which posts, pages, and custom post types you’re looking for, get your custom result set, then filter and order the items like a PHP/MySQL ninja.

you have to build your custom query. Actually, it won’t look like a MySQL query, and you won’t write any SELECT statement. You just need to define an array of parameters and pass it to the get_posts function. WordPress converts that array into a real and secure MySQL query, runs it against the database, and returns an array of posts.

All these post types are stored in the ‘wp_posts’ table of the database. The main difference between post types is in the value of the ‘post_type’ field. From a developer’s perspective, posts, pages, and custom post types are all posts.

get_posts uses WP_Query to retrieve post items, and it keeps an array of the same parameters available in WP_Query (with few exceptions). 

 These parameters are grouped in the following 15 categories:

1 Author Parameters
2 Category Parameters
3 Tag Parameters
4 Taxonomy Parameters
5 Search Parameters
6 Post & Page Parameters
7 Password Parameters
8 Post Type Parameters
9 Order & Orderby Parameters
10 Date Parameters
11 Custom Field (post meta) Parameters
12 Permission Parameters
13 Mime Type Parameters
14 Caching Parameters
15 Return Fields Parameter