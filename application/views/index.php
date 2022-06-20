<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<h1 class="title-index"><?php echo html_escape($home_title); ?></h1>
<div id="wrapper" class="index-wrapper m-t-0">
    <div class="container">
<?php 
$slug = 'news';
$category = $this->category_model->get_category_by_slug($slug);
    if($category->parent_id<=1):?>
            <div id="content" class="col-sm-8">
           
                        
             <?php
             $subcategories = get_subcategories($category->id, $this->categories);
                    foreach ($subcategories as $subcategory):
             $this->load->view('partials/_category_block_type_4', ['category' => $subcategory]);
                endforeach;
                ?>
                </div>
           <?php endif;
             ?>
        
            </div>
            </div>