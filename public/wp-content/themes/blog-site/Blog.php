<?php
/*
	Template Name: Blog
 */

get_header(); ?>
    <main>
        <section class="section-banner page">
            <div class="container" style="position: relative;">
                <div class="heading-banner">
                    <h1>Blog</h1>
                </div>
            </div>
        </section>
        <section class="section-blog section">
            <div class="container">
                <?php
                $args = array(
                    'post_type' => 'Blog',
                    'posts_per_page' => 10,
                    'tax_query' => array(
                    )
                );
                ?>
                <div class="row">
                    <?php $loop = new WP_Query($args); ?>
                    <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
                        <div class="col-lg-4 col-md-6 col-12">
                            <div class="item">
                                <div class="img-blog"><?php the_post_thumbnail(); ?></div>
                                <div class="blog-text">
                                    <h6><?php the_title(); ?></h6>
                                    <p><?php echo wp_trim_words( get_the_content(), 60, '...' ); ?></p>
                                    <a href="<?php the_permalink(); ?>">Read more...</a>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                    <?php wp_reset_query();?>
                </div>
            </div>
        </section>
    </main>











<?php get_footer();

