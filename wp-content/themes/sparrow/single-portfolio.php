
<?php get_header() ?>
<!-- Page Title
================================================== -->

<!-- Content
================================================== -->
<div class="content-outer">

  <div id="page-content" class="row portfolio">

    <section class="entry cf">

      <div id="secondary" class="four columns entry-details">

        <h1><?php the_title() ?></h1>

        <div class="entry-description">

          <p><?php the_excerpt() ?></p>

        </div>

        <ul class="portfolio-meta-list">
          <li><span>Date: </span><?php the_field('project-date') ?></li>
          <li><span>Client </span><?php the_field('client') ?></li>
          <li><span>Skills: </span><?php the_terms( get_the_ID(), 'skills', '', ' / ', '' ); ?></li>
        </ul>

        <a class="button" href="http://behance.net">View project</a>

      </div> <!-- secondary End-->

      <div id="primary" class="eight columns">

        <div class="entry-media">

          <?php the_post_thumbnail() ?>

          <img src="images/portfolio/entries/geometric-backgrounds-02.jpg" alt="" />

        </div>

        <div class="entry-excerpt">

          <p><?php the_content() ?></p>

        </div>

      </div> <!-- primary end-->

    </section> <!-- end section -->

    <ul class="post-nav cf">
      <li class="prev"><a href="#" rel="prev"><strong>Previous Entry</strong> Duis Sed Odio Sit Amet Nibh
          Vulputate</a></li>
      <li class="next"><a href="#" rel="next"><strong>Next Entry</strong> Morbi Elit Consequat Ipsum</a></li>
    </ul>

  </div>

</div> <!-- content End-->

<!-- Tweets Section
================================================== -->
<section id="tweets">

  <div class="row">

    <div class="tweeter-icon align-center">
      <i class="fa fa-twitter"></i>
    </div>

    <ul id="twitter" class="align-center">
      <li>
        <span>
          This is Photoshop's version of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet.
          Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum
          <a href="#">http://t.co/CGIrdxIlI3</a>
        </span>
        <b><a href="#">2 Days Ago</a></b>
      </li>
      <!--
        <li>
            <span>
            This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet.
            Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum
            <a href="#">http://t.co/CGIrdxIlI3</a>
            </span>
            <b><a href="#">3 Days Ago</a></b>
        </li>
        -->
    </ul>

    <p class="align-center"><a href="#" class="button">Follow us</a></p>

  </div>

</section> <!-- Tweet Section End-->
<?php get_footer() ?>