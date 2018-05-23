<?php
/**
 * The Main HomePage
 *
 * @package RED_Starter_Theme
 */

get_header(); ?>

<session class="page-hero">
    <h2 class="page-title"><span class="screen-reader-text">Inhabitent</span></h2>
</session>

<div class="content-to-center">

    <session class="page-content">
        <h2>Shop Stuff</h2>

        <?php 
            $query_args = array( 
                'taxonomy' => 'product_type', 
                'hide_empty' => false 
            );
            $product_types = get_terms( $query_args );
        ?>

        <div class="">
        <?php if ( !empty( $product_types ) ) : ?>
            <ul>
            <?php foreach ( $product_types as $product_type ): ?>
                <li class="<?php "product-type-".$product_type->slug ?>">
                    <h3> <?php echo $product_type->name; ?> </h3>
                    <img src= <?php echo esc_url( get_template_directory_uri() ) . "/build/img/product-type-icons/" . $product_type->slug . ".svg"; ?> />
                    <p> <?php echo $product_type->description; ?> </p>
                    <a href=" <?php echo get_term_link( $product_type ); ?> " class=""><?php echo $product_type->name . " stuff"; ?></a>
                </li>
            <?php endforeach; ?>
            </ul>
        <?php endif; ?>
        </div>
    </session>

    <session class="page-content">
        <h2>Inhabitent Journal</h2>

        <?php
            $query_args = array( 
                'post_type' => 'post', 
                'posts_per_page' => 3,
                'order' => 'DESC'
            );
            $blog_posts = get_posts( $query_args ); // returns an array of posts
        ?>

        <div class="">
        <?php if ( !empty( $blog_posts ) ) : ?>
            <ul class="">
            <?php foreach ( $blog_posts as $post ) : setup_postdata( $post ); ?>
                <li>
                    <div class=""><?php the_post_thumbnail( 'small' ); ?></div>
                    <div class=""><?php red_starter_posted_on(); ?> / <?php red_starter_comment_count(); ?></div>
                    <h3 class=""><a href="<?php the_permalink(); ?>" class=""><?php the_title(); ?></a></h3>
                    <a href="<?php the_permalink(); ?>" class="">Read entry</a>
                <li>
            <?php endforeach; wp_reset_postdata(); ?>
            </ul>
        <?php endif; ?>
        <div>
    </session>

    <session class="page-content">
        <h2>Latest Adventures</h2>

        <?php
            $query_args = array( 
                'post_type' => 'adventures', 
                'posts_per_page' => 4,
                'order' => 'ASC'
            );
            $adventures_posts = get_posts( $query_args ); // returns an array of posts
        ?>

        <div class="">
        <?php if ( !empty( $adventures_posts ) ) : ?>
            <ul class="">
            <?php foreach ( $adventures_posts as $post ) : setup_postdata( $post ); ?>
                <li>
                    <div class=""><?php the_post_thumbnail( 'small' ); ?></div>
                    <div class=""><?php red_starter_posted_on(); ?> / <?php red_starter_comment_count(); ?></div>
                    <h3 class=""><a href="<?php the_permalink(); ?>" class=""><?php the_title(); ?></a></h3>
                    <a href="<?php the_permalink(); ?>" class="">Read entry</a>
                <li>
            <?php endforeach; wp_reset_postdata(); ?>
            </ul>
        <?php endif; ?>
        <div>
    </session>


</div>

<!-- <?php //get_sidebar(); ?> -->
<?php get_footer(); ?>
