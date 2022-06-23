
<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
 <!-- Link Swiper's CSS -->
 <meta
      name="viewport"
      content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1"
    />
    <!-- Link Swiper's CSS -->
    <link
      rel="stylesheet"
      href="https://unpkg.com/swiper/swiper-bundle.min.css"
    />

 <link
      rel="stylesheet"
      href="https://unpkg.com/swiper/swiper-bundle.min.css"
    />

    <!-- Demo styles -->
    <style>
   
      .swiper {
        width: 100%;
        height: 100%;
      }

      .swiper-slide {
        text-align: center;
        font-size: 18px;
        background: #fff;

        /* Center slide text vertically */
        display: -webkit-box;
        display: -ms-flexbox;
        display: -webkit-flex;
        display: flex;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        -webkit-justify-content: center;
        justify-content: center;
        -webkit-box-align: center;
        -ms-flex-align: center;
        -webkit-align-items: center;
        align-items: center;
      }

      .swiper-slide img {
        display: block;
        width: 100%;
        height: 100%;
        object-fit: cover;
      }
    
    </style>
  </head>
<?php $subcategories = get_subcategories($category->id, $this->categories); ?>
<div class="col-sm-12 col-xs-12">
    <div class="row">
        <section class="section section-block-4">
            <div class="section-head" style="border-bottom: 2px solid <?php echo html_escape($category->color); ?>;">
                <h4 class="title" style="background-color: <?php echo html_escape($category->color); ?>">
                    <a href="<?php echo generate_category_url($category); ?>" style="color: <?php echo html_escape($category->color); ?>">
                        <?php echo html_escape($category->name); ?>
                    </a>
                </h4>
                <!--Include subcategories-->
                <?php $this->load->view('partials/_block_subcategories', ['category' => $category, 'subcategories' => $subcategories]); ?>
            </div>
                <div id="content" class="col-sm-8 col-xs-12">
                    <div class="section-content">
                        <div class="tab-content pull-left">
                            <div role="tabpanel" class="tab-pane fade in active" id="all-<?php echo html_escape($category->id); ?>">
                                <div class="row">
                                <div class="swiper mySwiper">
                                    <div class="swiper-wrapper">
                                    <?php $category_posts = get_posts_by_category_id($category->id, $this->categories);
                                        $i = 0;
                            if (!empty($category_posts)):
                                foreach ($category_posts as $post):
                                    if ($i < 4):?>
                                        <!-- <div class="col-sm-3"> -->
                                        <div class="swiper-slide">
                                            <?php $this->load->view("post/_post_item_mid", ["post" => $post]); ?>
                                        <!-- </div> -->
                                    </div>
                                    <?php endif;
                                    $i++;
                                endforeach;
                            endif; ?>
                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                        </div>
                    </div>

                    <?php if (!empty($subcategories)):
                        foreach ($subcategories as $subcategory): ?>
                            <div role="tabpanel" class="tab-pane fade in " id="<?php echo html_escape($subcategory->name_slug); ?>-<?php echo html_escape($subcategory->id); ?>">
                                <div class="row">
                                <div class="swiper mySwiper">
                                    <div class="swiper-wrapper">
                                    <?php $category_posts = get_posts_by_category_id($subcategory->id, $this->categories);
                                    $i = 0;
                                    
                                    if (!empty($category_posts)):?>
                                     
                            
                                            <?php
                                        foreach ($category_posts as $post):
                                            if ($i < 4):?>
                                                <!-- <div class="col-sm-3"> -->
                                                <div class="swiper-slide">
                                                    <?php $this->load->view("post/_post_item_mid", ["post" => $post]); ?>
                                                </div>
                                            <!-- </div> -->
                                            
                                            <?php endif;
                                            $i++;
                                        endforeach;
                                       
                                    endif; ?>
                                     </div>
                                            </div>
                                </div>
                            </div>
                        <?php endforeach;
                    endif; ?>

                </div>
            </div>
        </section>
    </div>
</div>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<!-- Initialize Swiper -->
<script>
 var swiper = new Swiper(".mySwiper", {
        spaceBetween: 30,
        slidesPerView: 3,
        centeredSlides: true,
        autoplay: {
          delay: 2500,
          disableOnInteraction: false,
        },
        pagination: {
          el: ".swiper-pagination",
          clickable: true,
        },
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
      });
</script>
</body>
</html>
