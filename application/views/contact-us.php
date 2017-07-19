 
<div class="contact">
			
				<div class="contact-info">
					 
					 <div class="wrap">
					 <div class="contact-grids">
							 <div class="col_1_of_bottom span_1_of_first1">
								    <h5>Address</h5>
								    <ul class="list3">
										<li>
											<img src="<?=base_url()?>assets/site/images/home.png" alt="">
											<div class="extra-wrap">
											 <p><?php
							$result=$this->db->query("select address from tbl_contact_us WHERE id = '1'")->row();
							if($result)
							{ echo $result->address; }
						?></p>
											</div>
										</li>
									</ul>
							    </div>
								<div class="col_1_of_bottom span_1_of_first1">
								    <h5>Phones</h5>
									<ul class="list3">
										<li>
											   <img src="<?=base_url()?>assets/site/images/phone.png" alt="">
											<div class="extra-wrap">
												<p><span>Telephone:</span><?php
							$result=$this->db->query("select phone_no from tbl_contact_us WHERE id = '1'")->row();
							if($result)
							{ echo $result->phone_no; }
						?></p>
											</div>
												<img src="<?=base_url()?>assets/site/images/fax.png" alt="">
											<div class="extra-wrap">
												<p><span>FAX:</span><?php
							$result=$this->db->query("select fax_no from tbl_contact_us WHERE id = '1'")->row();
							if($result)
							{ echo $result->fax_no; }
						?></p>
											</div>
										</li>
									</ul>
								</div>
								<div class="col_1_of_bottom span_1_of_first1">
									 <h5>Email</h5>
								    <ul class="list3">
										<li>
											<img src="<?=base_url()?>assets/site/images/email.png" alt="">
											<div class="extra-wrap">
											  <p><span class="mail">
											  <?php
							$result=$this->db->query("select email_id from tbl_contact_us WHERE id = '1'")->row();
							if($result)
							{ ?><a href="mailto:<?=$result->email_id?>"> <?=$result->email_id?></a><?php }
						?>
						 </span></p>
											</div>
										</li>
									</ul>
							    </div>
								<div class="clear"></div>
					 </div>
					 	<form method="post" >
					          <div class="contact-form">
								<div class="contact-to">
			                     	<input type="text" class="text" value="Name..." onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Name...';}">
								 	<input type="text" class="text" value="Email..." style="margin-left: 10px;" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email...';}">
								 	<input type="text" class="text" value="Subject..." style="margin-left: 10px;" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Subject...';}">
								</div>
								<div class="text2">
				                   <textarea value="Message:" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Message';}">Message..</textarea>
				                </div>
				               <span><input type="submit" class="" value="Submit"></span>
				                <div class="clear"></div>
				               </div>
				           </form>
							</div>
			</div>
		</div>