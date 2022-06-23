<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div id="wrapper">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 page-breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="<?php echo lang_base_url(); ?>"><?php echo trans("breadcrumb_home"); ?></a>
                    </li>
                    <?php $categories = get_parent_category_tree($category->id, $this->categories);
                    $i = 0;
                    if (!empty($categories)):
                        foreach ($categories as $item):
                            if ($i == 0 && count($categories) > 1): ?>
                                <li class="breadcrumb-item active">
                                    <a href="<?php echo generate_category_url($item); ?>"><?php echo html_escape($item->name); ?></a>
                                </li>
                            <?php else: ?>
                                <li class="breadcrumb-item">
                                    <span><?php echo html_escape($item->name); ?></span>
                                </li>
                            <?php endif;
                            $i++;
                        endforeach;
                    endif; ?>
                </ol>
            </div>
            <?php
                          if($category->parent_id<=1):?>
            <div id="content" class="col-sm-8">
           
                        
                    <?php
                    $subcategories = get_subcategories($category->id, $this->categories);
                            foreach ($subcategories as $subcategory):
                    $this->load->view('partials/_category_block_type_4', ['category' => $subcategory]);
                        endforeach;
                        ?>
                <?php endif;
                    ?>
         
            
        
                <?php
            if($category->parent_id>=1):?>
           <div id="content" class="col-sm-8 col-xs-12">
                    <div class="section-content">
                        <div class="tab-content pull-left">
                            <div role="tabpanel" class="tab-pane fade in active" id="all-<?php echo html_escape($category->id); ?>">
                                <div class="row">
                                    <?php $category_posts = get_posts_by_category_id($category->id, $this->categories);
                                        $count = 0;
                                         foreach ($category_posts as $post): ?>
                                            <?php if ($count != 0 && $count % 3 == 0): ?>
                                                <div class="col-sm-8"></div>
                                            <?php endif; ?>
                                            <?php $this->load->view("post/_post_item_list", ["post" => $post]); ?>
                                            <?php if ($count == 1): ?>
                                                
                                                <?php $this->load->view("partials/_ad_spaces", ["ad_space" => "category_top", "class" => "p-b-30"]); ?>
                                                     
                                                <?php endif; ?>
                                            <?php $count++; ?>
                                        <?php endforeach; ?>
                        </div>
                    </div>
                    <?php  endif; ?>
                </div>
            </div>
        </div>
                    
            </div>
        </div>