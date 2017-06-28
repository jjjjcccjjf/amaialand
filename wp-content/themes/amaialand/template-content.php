<?php 

/* Template Name: Content Pages */

get_header(); ?>
      
      <section class="content">
        <div class="pagewrapper2">
          <h3><?php the_title(); ?></h3>
          <div class="content2col">
            <article>
              <p><?php the_content(); ?></p>
            </article>
          </div>
        </div>
      </section>

      
<?php get_footer(); ?>