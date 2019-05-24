<?php echo $this->load->view('header'); ?>
<section class="blog-details mt-4 ptb-4">
    <div class="container">
        <div class="row">
            <?php 
                if(isset($results)) 
                {
                    if($results->image=="")
                    {

                         $path = base_url('upload/blog/thumb/avatar.png');
                    }
                    else
                    {
                        $path=base_url('upload/blog/thumb/'.$results->image);
                    } 
            ?> 
                <div class="col-md-12">
                    <div class="blog-date">
                        <span class="d-block" style="font-size:24px;margin-bottom:-7px;"></span>
                            <small class="bolder"><?php echo isset($results->created_at) ? $results->created_at : ''; ?></small>
                            </div>
                            <div class="blog-title">
                                <h2 class="bolder"><?php echo isset($results->title) ? $results->title : ''; ?></h2>
                                <span><strong>Category :</strong> <a href="/en/category/ac-services"><?php echo isset($results->category_id) ? $results->title : ''; ?></a></span>
                            </div>
                        </div>
                        <div class="col-md-9 sm-padding-right">
                            <div class="blog-content mt-2">
                                <img src="<?php echo $path; ?>" class="blog-img mb-2 w-100">
                                <p dir="ltr"><span style="color:#000000"><span style="font-family:arial,helvetica,sans-serif"><span style="font-size:14px"><?php echo isset($results->description) ? substr($results->description,0,500) : ''; ?></p>
                    
                            </div>
                        <?php } ?>    
                        </div>
                        <?php  
                            if(isset($recent_blogs)) 
                            {
                          ?>      
                        <div class="col-md-3">
                            <div class="sidebar">
                                <div class="recent-blogs">
                                    <div class="row">
                                        <h5 class="feild-title feild-title-lg mt-2 mb-2 no-select">Recent Blogs</h5>
                                    </div>
                                        <ul>
                                        <?php
                                            foreach($recent_blogs as $recent_blog) { ?>
                                            <li>
                                                <a href="<?php echo $recent_blog['id']; ?>">
                                                    <?php echo $recent_blog['title'];?>      
                                                </a>
                                            </li>
                                        <?php } ?>
                                        </ul>
                                    </div>
                            <?php } ?>        
        </div>
    </div>
</section>
<?php echo $this->load->view('footer'); ?>
