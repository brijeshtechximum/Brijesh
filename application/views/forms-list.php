<?php $this->load->view('includes/header'); ?>
<?php $this->load->view('includes/form-navigation'); ?>

  <section class="loginform" style="padding-top: 28px; border: 1px solid gray;">
    <div class="container">
      <div class="row">
        <div class="col-md-12" >
		
		<?php //print_r($user_data); ?>
		
	
		<div class="box-body listing_data">   
		<table id="example3" class="table table-bordered table-striped ">      
		<thead>        
		<tr>          
		<th>S.no</th>       
		<th>Name</th>          
		<th>Email</th>            
		<th>Generation</th>
		<th>Renewable</th>
		<th>T&D</th>
		<th>State Sector Generation</th>		
		<!--<th>Action</th>---->             
		</tr>        </thead>   
		<tbody>  
        <?php 			
		$i=0;			
		foreach($user_data as $item){	
					
		if($item['fid'] || $item['rfid'] || $item['ssfid'] || $item['TDfid']) {
			$i++; 	
		?>        
		<tr>       		
		<td><?php echo $i;  ?></td> 
		<td><?php echo $item['name'] ?></td>         
		<td><?php echo $item['email'] ?></td>

		
		<td><?php if($item['gid']){ if($item['G_url']) { ?>  
		<a href="<?php echo base_url(); ?>form1/check/<?php echo $item['fid']?>/GN" class="btn btn-<?php if($item['G_url']){ echo "danger"; }else{ echo "success"; } ?> fid"  >	
		<?php if($item['G_url']){ echo "Pending"; } ?>   
		</a> <?php }else{ ?> 
			
			<a href="<?php echo base_url(); ?>wp-admin/users/form_gen/<?php echo $item['gid']?>" class="btn btn-success"  >	Print	</a> 
			
		<?php } } else{  ?>
			<a href="<?php echo base_url(); ?>form1/check/<?php if($item['fid']){ echo $item['fid'];}elseif($item['rfid']){echo $item['rfid']; }elseif($item['TDfid']){echo $item['TDfid'];}else{echo $item['ssfid'];}?>/GN?fid=<?php if($item['fid']){ echo $item['fid'];}elseif($item['rfid']){echo $item['rfid']; }elseif($item['TDfid']){echo $item['TDfid'];}else{echo $item['ssfid'];}?>" class="btn btn-primary fid" >Apply  </a>
		<?php }?></td> 




		
		<td><?php if($item['rid']){ if($item['RN_url']) {?>        
		<a href="<?php echo base_url(); ?>form1/check/<?php echo $item['rfid']?>/RN" class="btn btn-<?php if($item['RN_url']){ echo "danger"; }else{ echo "success"; } ?> fid"  >	
		<?php if($item['RN_url']){ echo "Pending"; } ?>   
		</a> <?php }else{ ?> 
			
			<a href="<?php echo base_url(); ?>wp-admin/users/form_ren/<?php echo $item['rid']?>" class="btn btn-success"  >	Print	</a>  
			
		<?php }} else{  ?>
			<a href="<?php echo base_url(); ?>form1/check/<?php if($item['fid']){ echo $item['fid'];}elseif($item['rfid']){echo $item['rfid']; }elseif($item['TDfid']){echo $item['TDfid'];}else{echo $item['ssfid'];}?>/RN?fid=<?php if($item['fid']){ echo $item['fid'];}elseif($item['rfid']){echo $item['rfid']; }elseif($item['TDfid']){echo $item['TDfid'];}else{echo $item['ssfid'];}?>" class="btn btn-primary fid" >Apply  </a>
		<?php }?></td> 
		
		
		
		<td><?php if($item['sid']){ if($item['TD_url']) { ?>        
		<a href="<?php echo base_url(); ?>form1/check/<?php echo $item['TDfid']?>/TD" class="btn btn-<?php if($item['TD_url']){ echo "danger"; }else{ echo "success"; } ?> fid"  >	
		<?php if($item['TD_url']){ echo "Pending"; } ?>   
		</a> <?php }else{ ?> 
			
			<a href="<?php echo base_url(); ?>wp-admin/users/form_ss/<?php echo $item['sid']?>" class="btn btn-success"  >	Print	</a>  
            
		<?php }}else{  ?>
			<a href="<?php echo base_url(); ?>form1/check/<?php if($item['fid']){ echo $item['fid'];}elseif($item['rfid']){echo $item['rfid']; }elseif($item['TDfid']){echo $item['TDfid'];}else{echo $item['ssfid'];}?>/TD?fid=<?php if($item['fid']){ echo $item['fid'];}elseif($item['rfid']){echo $item['rfid']; }elseif($item['TDfid']){echo $item['TDfid'];}else{echo $item['ssfid'];}?>" class="btn btn-primary fid" >Apply  </a>
		<?php }?></td> 
		
		
		
		<td><?php if($item['ssgid']){ if($item['SSG_url']) {?>        
		<a href="<?php echo base_url(); ?>form1/check/<?php echo $item['ssfid']?>/SSG" class="btn btn-<?php if($item['SSG_url']){ echo "danger"; }else{ echo "success"; } ?> fid"  >	
		<?php if($item['SSG_url']){ echo "Pending"; } ?>   
		</a>  <?php }else{ ?> 
			
			<a href="<?php echo base_url(); ?>wp-admin/users/form_ssgn/<?php echo $item['ssgid']?>" class="btn btn-success"  >	Print	</a>  
                       
		<?php }} else{  ?>
			<a href="<?php echo base_url(); ?>form1/check/<?php if($item['fid']){ echo $item['fid'];}elseif($item['rfid']){echo $item['rfid']; }elseif($item['TDfid']){echo $item['TDfid'];}else{echo $item['ssfid'];}?>/SSG?fid=<?php if($item['fid']){ echo $item['fid'];}elseif($item['rfid']){echo $item['rfid']; }elseif($item['TDfid']){echo $item['TDfid'];}else{echo $item['ssfid'];}?>" class="btn btn-primary fid" >Apply  </a>
		<?php }?></td> 
		
		
		
		<!--<td align="center"><a href="<?php echo base_url(); ?>wp-admin/enquiry/delete/<?php echo $item['id'] ?>" class="btn btn-danger"><i class="fa fa-close"></i></a></td>-->  
		</tr>     
		<?php } }?>      
		</tbody>    
		</table>   
		</div>
        </div>
      </div>
    </div>
  </section>
<?php $this->load->view('includes/footer');  ?><script>	$(function(){		$("#example3").DataTable();      });</script>	