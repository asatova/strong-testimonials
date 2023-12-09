<?php
get_header();
?>
    <main>
        <section class="section-banner page">
            <div class="container" style="position: relative;">
                <div class="heading-banner">
                    <h1><?php the_title(); ?></h1>
                </div>
            </div>
        </section>
        <section class="section-content page section">
            <div class="container">
                <div class="content-blogs">
                    <div class="flex-content-blos">
                        <?php the_post_thumbnail(); ?>
                        <div>
                            <?php the_content(); ?>
                        </div>
                    </div>
                    <?php the_field('description_add_text'); ?>
                    <div class="footer-text">
                        <?php the_field('additional_text_content'); ?>
                        <span><?php the_field('important_text'); ?></span>
                    </div>
                </div>
                <div class="blog-share"></div>
                <?php
                $args = array(
                    'post_type' => 'Blog',
                    'posts_per_page' => 3,
                    'tax_query' => array(
                    )
                );
                ?>
            </div>
        </section>
        <section class="section-blog section">
            <div class="container">
                <div class="so-link">
                    <h3>Share This Story, Choose Your Platform!</h3>
                    <?php echo do_shortcode('[Sassy_Social_Share]') ?>
                </div>
                <div class="row">
                    <?php $loop = new WP_Query($args); ?>
                    <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
                        <div class="col-lg-4 col-md-6 col-12">
                            <div class="item">
                                <div class="img-blog"><?php the_post_thumbnail(); ?></div>
                                <div class="blog-text">
                                    <h6><?php the_title(); ?></h6>
                                    <p><?php echo wp_trim_words( get_the_content(), 10, '...' ); ?></p>
                                    <a href="<?php the_permalink(); ?>">Read more...</a>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                    <?php wp_reset_query();?>
                </div>
                <?php wp_list_comments(); ?>
                <?php if (is_single ()) comments_template (); ?>
            </div>
        </section>
    </main>
<?php
get_footer();