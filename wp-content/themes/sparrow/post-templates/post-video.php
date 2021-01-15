<article class="post">

  <div class="entry-header cf">

    <h1><a href="<?php the_permalink() ?>" title=""><?php the_title()?></a></h1>

  </div>

  <div class="post-thumb">
    <a href="<?php the_permalink() ?>" title=""><?php the_post_thumbnail('post_thumb') ?></a>
  </div>

  <div class="post-content">

    <p><?php the_content() ?></p>

  </div>

</article> <!-- post end -->