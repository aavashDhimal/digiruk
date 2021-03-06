<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
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
                                    <?php $category_posts = get_posts_by_category_id($category->id, $this->categories);
                                        $i = 0;
                            if (!empty($category_posts)):
                                foreach ($category_posts as $post):
                                    if ($i < 4):?>
                                        <div class="col-sm-3">
                                            <?php $this->load->view("post/_post_item_mid", ["post" => $post]); ?>
                                        </div>
                                    <?php endif;
                                    $i++;
                                endforeach;
                            endif; ?>
                        </div>
                    </div>

                    <?php if (!empty($subcategories)):
                        foreach ($subcategories as $subcategory): ?>
                            <div role="tabpanel" class="tab-pane fade in " id="<?php echo html_escape($subcategory->name_slug); ?>-<?php echo html_escape($subcategory->id); ?>">
                                <div class="row">
                                    <?php $category_posts = get_posts_by_category_id($subcategory->id, $this->categories);
                                    $i = 0;
                                    if (!empty($category_posts)):
                                        foreach ($category_posts as $post):
                                            if ($i < 4):?>
                                                <div class="col-sm-3">
                                                    <?php $this->load->view("post/_post_item_mid", ["post" => $post]); ?>
                                                </div>
                                            <?php endif;
                                            $i++;
                                        endforeach;
                                    endif; ?>
                                </div>
                            </div>
                        <?php endforeach;
                    endif; ?>

                </div>
            </div>
        </section>
    </div>
<<<<<<< HEAD
</div>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<!-- Initialize Swiper -->
<script>
 var swiper = new Swiper(".mySwiper", {
        spaceBetween: 30,
        slidesPerView: 3,
        centeredSlides: true,
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
=======
</div>
>>>>>>> parent of dcf2794 ( slider done)
