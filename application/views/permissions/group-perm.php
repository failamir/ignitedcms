<div class="pmf-container" style="margin-left:auto; margin-right:auto; margin-top:30px; max-width:1170px; min-height:800px;  ">
	
	<!-- flash data -->
	<div class="row" style="margin-left:30px; margin-right:30px;">
		<div class="col-sm-12">
		    <?php if($this->session->flashdata('msg')) {?>
		                
		        <?php if($this->session->flashdata('type') =='0') { ?>
		    
		        <div class="alert alert-danger">
		    
		        <?php } else {?>
		        <div class="alert alert-success">
		            <?php } ?>
		            <button type="button" class="close" data-dismiss="alert"><i class="fa fa-times"></i>
		            </button> <i class="fa fa-ban-circle"></i>
		            <?php echo $this->session->flashdata('msg');?>
		        </div>
		    <?php } ?>

		</div>
		
	</div>

	<!-- breadcrumb -->
	   <div class="row" style="margin-left:30px; margin-right:30px;">
	      <div class="col-sm-12">
	        <!-- .breadcrumb -->
	        <ul class="breadcrumb">
	          <li><a href="<?php echo site_url('dashboard'); ?>"><i class="fa fa-home"></i> <?php echo ('Dashboard'); ?></a></li>
	          <li class='active'><a href="#"><i class="fa fa-list-ul"></i> <?php echo('Permissions');?></a></li>
	          
	        </ul>
	              
	        </div>
	    </div> 
	    <!-- end breadcrumb -->
	    
	    <div class="row" style="margin-left:30px; margin-right:30px;">
	   <div class="col-sm-12">
	       <header class="panel-heading font-bold">User Group Permissions</header>
	       <section class="panel">
	           
	           <div class="panel-body">

	           	<div class="row">
                        <div class="col-sm-10">
                            
                          
                        </div>
                        <div class="col-sm-2">
                            <a href="<?php echo site_url("permissions/new_group_view"); ?>">
                                <button  type="submit" class="btn btn-purplet btn-s-xs pull-right" id="">
                                <i class="fa fa-plus"></i> <strong>New Group</strong></button>
                            </a>
                        </div>
                    </div>

                    <div class="line"></div>



	           	<!-- search and sort -->
	           	<div class="row" >
	           		<div class="col-sm-2">
	           		<button type="submit" class="btn  btn-white " ><strong>Delete Selected</strong></button>
	           		
		           	</div>
		           	<?php $atts= array( 'data-validate'=>'parsley'); echo form_open_multipart('#',$atts); ?>
		           	<div class="col-sm-8">
		           		<div class="input-group">
		           		  
		           		  		
	                      <input type="text" name="search_term" class="input-sm form-control" placeholder="Search">
	                      <span class="input-group-btn">
	                        <button class="btn btn-sm btn-white" type="submit"> <i class="fa fa-search"> </i></button>
	                      </span>
	                      
                    	</div>
		           	</div>
		           	<?php echo form_close(); ?>
		           	<div class="col-sm-2">
		           		<div class="input-group-btn">
                            <button type="button" class="btn btn-white dropdown-toggle" data-toggle="dropdown"><i class="fa fa-sort-amount-desc"> <strong>Sort by Name</strong></i> <span class="caret"></span></button>
                            <ul class="dropdown-menu pull-right">
                              <li><a href="#">Name</a></li>
                              <li><a href="#">Handle</a></li>
                              <li><a href="#">Date Created</a></li>
                              <li class="divider"></li>
                              <li><a href="#">Ascending</a></li>
                              <li><a href="#">Descending</a></li>
                            </ul>
                          </div>
		           	</div>
	           	
	           	</div>
	           	


	           	<div class="table-responsive" style="margin-top:20px;">
                  <table class="table table-striped b-t text-sm">
                    <thead>

                      <tr>
                        <th width="20" ><input type="checkbox"></th>
                        <th class="text-muted">Name</th>
                        <th width="500" class="text-muted">Handle</th>
                        <th class="text-muted">Date Created</th>
                        
                      </tr>
                    </thead>
                    <tbody>
                    	<?php foreach ($query->result() as $row): ?>
                    		<?php $id = $row->groupID; ?>
                    		<tr>
		                        <td><input type="checkbox" name="post[]" value="<?php echo $id; ?>"></td>
		                        <td>
		                        	<a href="<?php echo site_url("permissions/update_permission_view/$id"); ?>"><?php echo $row->groupName; ?></a>
		                        </td>
		                        <td>...</td>
		                        <td>Jul 25, 2013</td>
                      		</tr>
                    	<?php endforeach ?>

                     
                    </tbody>
                  </table>
                </div>

	           </div>
	       </section>
	   </div>
	   
	 </div>
        


</div>	