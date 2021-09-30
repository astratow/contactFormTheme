<?php get_header(); ?>
  <div id="primary" class="site-content">
    <div id="content" role="main">
    
      <?php while ( have_posts() ) : the_post(); ?>
        
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

          <header class="entry-header">
          
            <h1 class="entry-title"><? the_title(); ?> </h1>

          </header>

          <div class="entry-content">
            <?php the_content(); ?>
            <div id="respond">
                <?php echo $response; ?>
                <form action="<?php the_permalink(); ?>" method="POST">
                    <p>
                        <label for="name">
                    </p>
                </form>
            </div>
          </div><!-- .entry-content -->
        </article> <!-- #post -->    
    
      <?php endwhile; // end of the loop. ?>
    </div> <!-- #content -->
  </div> <!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
