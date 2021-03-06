<?php 
    //response generation function
    $response = "";

    //function to generate response
    function my_contact_form_generate_response($type, $message){

        global $response;

        if($type == "success") $response = "<div class='success'>{$message}</div>";
        else $response = "<div class='error'>{$message}</div>";
    }

    // response messages
    $not_human          = "Human verification failed.";
    $missing_content    = "Please supply all information";
    $email_invalid      = "Email Address Invalid.";
    $message_unsent     = "Message was not sent. Try again.";
    $message_unsent     = "Thanks! Your message has been sent." ;

    // user posted variables
    $name       = $_POST['message_name'];
    $email      = $_POST['message_email'];
    $message    = $_POST['message_text'];

    // php mailer variables
    $to         = get_option('admin_email');
    $subject    = "Someone sent message from" .get_bloginfo('name');
    $headers    "From: " . $email . "\r\n" . "Reply-To: " . $email. "\r\n";
    
?>
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
                        Name:  <span>*</span> <br>
                        <input type="text" name="message_name" value="<?php echo esc_attr($_POST['message_name']); ?>">
                        </label>
                    </p>
                    <p>
                        <label for="message_email">
                            Email: <span>*</span> <br>
                            <input type="text" name="message_email" value="<?php echo esc_attr($_POST['message_email']); ?>">
                        </label>
                    </p>
                    <p>
                        <label for="message_text">
                            Message: <span>*</span> <br>
                            <textarea type="text" name="message_text">
                                <?php echo esc_textarea($_POST['message_text']); ?>
                            </textarea>
                        </label>
                    </p>
                    <p>
                        <label for="message_human">
                            Human Verification: <span>*</span> <br>
                            <input type="text" style="width: 60px;" name="message_human"> + 3 = 5                        
                        </label>
                    </p>
                    <input type="hidden" name="submitted" value="1">
                    <p>
                        <input  type="submit">
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
