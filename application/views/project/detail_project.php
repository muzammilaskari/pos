<?php echo $header; ?>

	<div class="page-container row-fluid">

	  <!-- BEGIN SIDEBAR -->
        <?php echo $sidebar; ?>
	  <!-- END SIDEBAR -->

	  <!-- BEGIN PAGE CONTAINER-->

		<div class="page-content">

			<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->

			<div id="portlet-config" class="modal hide">

				<div class="modal-header">
					<button data-dismiss="modal" class="close" type="button"></button>
					<h3>Widget Settings</h3>
				</div>
				<div class="modal-body"> Widget settings form goes here </div>
			</div>

			<div class="clearfix"></div>

			<div class="content sm-gutter">

				  <div class="page-title">

				  </div>

				<div class="row">
					<div class="col-md-12">
						<div class="grid simple ">
								<div class="grid-body no-border pfc-grid-color-1">
									<h3 class="text-center heading_color">Project Detail</h3>
									<br>
									
									
									<!-- Prject Order Details  -->
									<div class="row">
										<div class="col-md-12">
											<div class="grid simple horizontal red ">
												<div class="grid-title ">
													<h4>Order Details</h4>
												</div>
												<div class="grid-body">
													<div class="table-responsive custom-red-grid custom-tabe-responsive">
														<table class="table table-hover table-striped table-bordered custom-table-1 ">
															<thead class="custom-table-fixed-h">
																<tr >
																	<th>Model</th>
																	<th>Quantity</th>
																	<th>Price</th>
																	<th>Discount</th>
																	<th>Total</th>
																</tr>
															</thead>
															<tbody class="custom-table-fixed-b">
																<tr>
																	<td>XY</td>		
																	<td>35</td>		
																	<td>$350</td>		
																	<td>$2</td>		
																	<td>$1000</td>		
																</tr>	
																<tr>
																	<td>YY</td>		
																	<td>75</td>		
																	<td>$550</td>		
																	<td>$20</td>
																	<td>$1000</td>	
																</tr>
																<tr>
																	<td>ZZ</td>		
																	<td>50</td>		
																	<td>$450</td>		
																	<td>$10</td>	
																	<td>$1000</td>	
																</tr>
																<tr>
																	<td>XY</td>		
																	<td>35</td>		
																	<td>$350</td>		
																	<td>$2</td>	
																	<td>$1000</td>	
																</tr>	
																<tr>
																	<td>YY</td>		
																	<td>75</td>		
																	<td>$550</td>		
																	<td>$20</td>	
																	<td>$1000</td>	
																</tr>
																<tr>
																	<td>ZZ</td>		
																	<td>50</td>		
																	<td>$450</td>		
																	<td>$10</td>	
																	<td>$1000</td>	
																</tr>
																<tr>
																	<td>XY</td>		
																	<td>35</td>		
																	<td>$350</td>		
																	<td>$2</td>	
																	<td>$1000</td>	
																</tr>	
																<tr>
																	<td>YY</td>		
																	<td>75</td>		
																	<td>$550</td>		
																	<td>$20</td>	
																	<td>$1000</td>	
																</tr>
																<tr>
																	<td>ZZ</td>		
																	<td>50</td>		
																	<td>$450</td>		
																	<td>$10</td>	
																	<td>$1000</td>	
																</tr>	
															</tbody>		
														</table>	
													</div>
												</div>
											</div>
										</div>
									</div>
									
									
									<!-- Project Status  -->
									<div class="row">
										<div class="col-md-12">
											<div class="grid simple horizontal red ">
												<div class="grid-title ">
													<div class="row">	
														<div class="col-md-8 col-sm-6 col-xs-12">
															<h4>Project Status</h4>
														</div>	
														<div class="col-md-4 col-sm-6 col-xs-12">				
															<select class="form-control">
																<option>Awarded Date</option>
																<option>Delivery Date</option>
																<option>Last Date To Order</option>
															</select>
														</div>
													</div>
												</div>
												<div class="grid-body">
													<div class="table-responsive custom-red-grid custom-tabe-responsive">
														<table class="table table-hover table-striped table-bordered custom-table-1 ">
															<thead class="custom-table-fixed-h">
																<tr >
																	<th>Tendering</th>
																	<th>Awarded</th>
																	<th>Order</th>
																	<th>Paid</th>
																	<th>Delivered</th>
																</tr>
															</thead>
															<tbody class="custom-table-fixed-b">
																<tr>
																	<td>Lorem Ipsum</td>		
																	<td>Not Awarded</td>		
																	<td>100 Order</td>		
																	<td>UnPaid</td>		
																	<td>Not Delivered</td>		
																</tr>	
																<tr>
																	<td>Lorem Ipsum</td>		
																	<td>Awarded</td>		
																	<td>200 Order</td>		
																	<td>Paid</td>		
																	<td>Delivered</td>		
																</tr>	
																<tr>
																	<td>Lorem Ipsum</td>		
																	<td>Not Awarded</td>		
																	<td>100 Order</td>		
																	<td>UnPaid</td>		
																	<td>Not Delivered</td>		
																</tr>	
																<tr>
																	<td>Lorem Ipsum</td>		
																	<td>Awarded</td>		
																	<td>200 Order</td>		
																	<td>Paid</td>		
																	<td>Delivered</td>		
																</tr>
																<tr>
																	<td>Lorem Ipsum</td>		
																	<td>Not Awarded</td>		
																	<td>100 Order</td>		
																	<td>UnPaid</td>		
																	<td>Not Delivered</td>		
																</tr>	
																<tr>
																	<td>Lorem Ipsum</td>		
																	<td>Awarded</td>		
																	<td>200 Order</td>		
																	<td>Paid</td>		
																	<td>Delivered</td>		
																</tr>
																<tr>
																	<td>Lorem Ipsum</td>		
																	<td>Not Awarded</td>		
																	<td>100 Order</td>		
																	<td>UnPaid</td>		
																	<td>Not Delivered</td>		
																</tr>	
																<tr>
																	<td>Lorem Ipsum</td>		
																	<td>Awarded</td>		
																	<td>200 Order</td>		
																	<td>Paid</td>		
																	<td>Delivered</td>		
																</tr>	
															</tbody>		
														</table>	
													</div>
												</div>
											</div>
										</div>
									</div>
									
									
									
									<!-- Prject Sample / Notes -->
									<div class="row">
										
										<div class="col-md-6">
											<div class="grid simple horizontal red ">
												<div class="grid-title ">
													<h4>Success Probability</h4>
												</div>
												<div class="grid-body">
													<div>
														<div class="form-group">
															<h3 class="col-md-6 control-label"><b>Success Probability :</b></h3>
															<div class="col-md-6">
																<h3>100%</h3>	
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
										
										<div class="col-md-6">
											<div class="grid simple horizontal red ">
												<div class="grid-title ">
													<h4>Notes</h4>
												</div>
												<div class="grid-body">
													<div class="row form-group">
														<textarea class="form-control" rows="5"></textarea>
													</div>	
													
													<div class="row form-group">
														<a class="btn btn-danger pull-right" href="">Add Notes</a>
													</div>	
													
													<div class="row form-group">
														<div class="scroller scrollbar-dynamic" data-height="120px">
															<p class="custom-color-1">
																Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the 
																industry's standard dummy text ever since the 1500s...
															</p>
															<p class="custom-color-2">
																Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the 
																industry's standard dummy text ever since the 1500s...
															</p>					
														</div>
													</div>	
													
												</div>
											</div>
										</div>
										
									</div>
									
									
									<div class="row">
										<div class="col-md-12">
											<!-- Address -->
											<div class="grid simple horizontal red">
												<div class="grid-title ">
													<h4>Address</h4>
												</div>
												<div class="custom-grid-body-1">
													<div class="form-group">
														<label class="col-md-6 control-label"><b>Delivery Address:</b></label>
														<div class="col-md-6">
															<p>Sample address</p>	
														</div>
													</div>	
													<div class="form-group">
														<label class="col-md-6 control-label"><b>Description:</b></label>
														<div class="col-md-6">
															<p>
																This is a test description of the project...
															</p>	
														</div>
													</div>	
												</div>
											</div>	
										</div>	

									</div>
									
									
									
									
									<!-- Prject History / Meeting Details  -->
									<div class="row">
										<div class="col-md-6">
											<div class="grid simple horizontal red ">
												<div class="grid-title ">
													<div class="row">
														<div class="col-md-3">
															<h4>History</h4>
														</div>
														<div class="col-md-4 col-md-offset-4">
															<div class="input-append danger date pull-right">
																<input type="text" class="form-control">
																<span class="add-on"><span class="arrow"></span><i class="fa fa-th"></i></span> 
															</div>
														</div>
													</div>		
												</div>
												<div class="grid-body">
													<div class="scroller scrollbar-dynamic" data-height="300px">
														<p class="custom-color-1">
															Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the 
															industry's standard dummy text ever since the 1500s...
														</p>
														<p class="custom-color-2">
															Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the 
															industry's standard dummy text ever since the 1500s...
														</p>	
														<p class="custom-color-1">
															Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the 
															industry's standard dummy text ever since the 1500s...
														</p>
														<p class="custom-color-2">
															Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the 
															industry's standard dummy text ever since the 1500s...
														</p>
														<p class="custom-color-1">
															Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the 
															industry's standard dummy text ever since the 1500s...
														</p>
														<p class="custom-color-2">
															Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the 
															industry's standard dummy text ever since the 1500s...
														</p>
														<p class="custom-color-1">
															Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the 
															industry's standard dummy text ever since the 1500s...
														</p>
														<p class="custom-color-2">
															Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the 
															industry's standard dummy text ever since the 1500s...
														</p>	
													</div>
														
												</div>
											</div>
										</div>
										
										<div class="col-md-6">
											<div class="grid simple horizontal red ">
												<div class="grid-title ">
													<h4>Meeting Details</h4>
												</div>
												<div class="grid-body">
														<div class="table-responsive custom-red-grid custom-tabe-responsive">
															<table class="table table-hover table-striped table-bordered custom-table-1 ">
																<thead class="custom-table-fixed-h">
																	<tr >
																		<th>Title</th>
																		<th>Description</th>
																		<th>Date</th>
																		<th>Edit</th>
																	</tr>
																</thead>
																<tbody class="custom-table-fixed-b">
																	<tr>
																		<td>Meeting Title</td>	
																		<td>Meeting Description</td>	
																		<td>29Feb,2016</td>	
																		<td>
																			<a href="" class="btn btn-danger"><i class="fa fa-pencil-square-o"></i></a>
																		</td>	
																	</tr>	
																	<tr>
																		<td>Meeting Title</td>	
																		<td>Meeting Description</td>	
																		<td>29Feb,2016</td>	
																		<td>
																			<a href="" class="btn btn-danger"><i class="fa fa-pencil-square-o"></i></a>
																		</td>	
																	</tr>
																	<tr>
																		<td>Meeting Title</td>	
																		<td>Meeting Description</td>	
																		<td>29Feb,2016</td>	
																		<td>
																			<a href="" class="btn btn-danger"><i class="fa fa-pencil-square-o"></i></a>
																		</td>
																	</tr>
																	<tr>
																		<td>Meeting Title</td>	
																		<td>Meeting Description</td>	
																		<td>29Feb,2016</td>	
																		<td>
																			<a href="" class="btn btn-danger"><i class="fa fa-pencil-square-o"></i></a>
																		</td>
																	</tr>
																	<tr>
																		<td>Meeting Title</td>	
																		<td>Meeting Description</td>	
																		<td>29Feb,2016</td>	
																		<td>
																			<a href="" class="btn btn-danger"><i class="fa fa-pencil-square-o"></i></a>
																		</td>
																	</tr>	
																	<tr>
																		<td>Meeting Title</td>	
																		<td>Meeting Description</td>	
																		<td>29Feb,2016</td>	
																		<td>
																			<a href="" class="btn btn-danger"><i class="fa fa-pencil-square-o"></i></a>
																		</td>
																	</tr>
																	<tr>
																		<td>Meeting Title</td>	
																		<td>Meeting Description</td>	
																		<td>29Feb,2016</td>	
																		<td>
																			<a href="" class="btn btn-danger"><i class="fa fa-pencil-square-o"></i></a>
																		</td>
																	</tr>
																	<tr>
																		<td>Meeting Title</td>	
																		<td>Meeting Description</td>	
																		<td>29Feb,2016</td>	
																		<td>
																			<a href="" class="btn btn-danger"><i class="fa fa-pencil-square-o"></i></a>
																		</td>
																	</tr>
																	<tr>
																		<td>Meeting Title</td>	
																		<td>Meeting Description</td>	
																		<td>29Feb,2016</td>	
																		<td>
																			<a href="" class="btn btn-danger"><i class="fa fa-pencil-square-o"></i></a>
																		</td>
																	</tr>	
																</tbody>		
															</table>
														</div>	
													</div>	
												</div>
											</div>
										</div>
								
									
									<!-- Prject Emails  -->
									
									<div class="row">
										<div class="col-md-12">
											<div class="grid simple horizontal red ">
												<div class="grid-title ">
													<h4>E-Mail</h4>
												</div>
												<div class="grid-body">
													<div class="row dataTables_wrapper">
														<h3 class=" inline">Messages </h3>
														<div class="btn-group m-l-10 m-b-10">
															<a class="btn btn-white btn-mini dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret single"></span></a>
															<ul class="dropdown-menu">
																<li><a href="#">Action</a></li>
																<li><a href="#">Another action</a></li>
																<li><a href="#">Something else here</a></li>
																<li class="divider"></li>
																<li><a href="#">Separated link</a></li>
															</ul>
														</div>
														<div class="pull-right margin-top-20">
															<div class="dataTables_paginate paging_bootstrap pagination">
																<ul>
																	<li class="prev disabled"><a href="#"><i class="fa fa-chevron-left"></i></a></li>
																	<li class="active"><a href="#">1</a></li><li><a href="#">2</a></li>
																	<li class="next"><a href="#"><i class="fa fa-chevron-right"></i></a></li>
																</ul>
															</div>
															<!--<div id="example_info" class="dataTables_info hidden-xs">Showing <b>1 to 10</b> of 14 entries</div>-->
														</div>
														<div class="clearfix"></div>
													</div>	
													<div class="row">
														<div id="email-list">
															<div class="tabe-responsive">
																<table id="emails" class="table table-striped table-fixed-layout table-hover">
																	<thead>
																		<tr>
																		  <th class="small-cell"></th>
																		  <th class="small-cell"></th>
																		  <th class="medium-cell"></th>
																		  <th></th>
																		  <th class="medium-cell"></th>

																		</tr>
																	</thead>
																	<tbody>	
																		<tr>
																			<td class="small-cell v-align-middle">
																				<div class="checkbox check-danger ">
																					<input type="checkbox" value="1" id="checkbox81">
																					<label for="checkbox81"></label>
																				</div>
																			</td>
																			<td class="small-cell v-align-middle">
																				<div class="star">
																					<input type="checkbox" checked="" value="1" id="checkbox91">
																					<label for="checkbox91"></label>
																				</div>
																			</td>
																			<td class="clickable v-align-middle">David Nester</td>
																			<td class="clickable tablefull v-align-middle"><span class="muted">Less spam, and mobile access. Gmail is email that's intuitive, ...efficient, and useful. And maybe even fun.</span></td>
																			<td class="clickable"><span class="muted">Yesterday </span></td>
																		</tr>
																		<tr>
																			<td class="small-cell v-align-middle">
																				<div class="checkbox check-danger ">
																					<input type="checkbox" value="1" id="checkbox82">
																					<label for="checkbox82"></label>
																				</div>
																			</td>
																			<td class="small-cell v-align-middle">
																				<div class="star">
																					<input type="checkbox" checked="" value="1" id="checkbox92">
																					<label for="checkbox92"></label>
																				</div>
																			</td>
																			<td class="clickable v-align-middle">Jane Smith</td>
																			<td class="clickable tablefull v-align-middle">
																				<span class="label label-important">HOME</span>
																				<span class="muted">Open the door to success, maximum revanue efficient, and useful</span>
																			</td>
																			<td class="clickable"><span class="muted">Yesterday </span></td>
																		</tr>	
																		<tr>
																			<td class="small-cell v-align-middle">
																				<div class="checkbox check-danger ">
																					<input type="checkbox" value="1" id="checkbox83">
																					<label for="checkbox83"></label>
																				</div>
																			</td>
																			<td class="small-cell v-align-middle">
																				<div class="star">
																					<input type="checkbox" checked="" value="1" id="checkbox93">
																					<label for="checkbox93"></label>
																				</div>
																			</td>
																			<td class="clickable v-align-middle">David Nester</td>
																			<td class="clickable tablefull v-align-middle"><span class="muted">Less spam, and mobile access. Gmail is email that's intuitive, ...efficient, and useful. And maybe even fun.</span></td>
																			<td class="clickable"><span class="muted">Yesterday </span></td>
																		</tr>
																		<tr>
																			<td class="small-cell v-align-middle">
																				<div class="checkbox check-danger ">
																					<input type="checkbox" value="1" id="checkbox84">
																					<label for="checkbox84"></label>
																				</div>
																			</td>
																			<td class="small-cell v-align-middle">
																				<div class="star">
																					<input type="checkbox" checked="" value="1" id="checkbox94">
																					<label for="checkbox94"></label>
																				</div>
																			</td>
																			<td class="clickable v-align-middle">Jane Smith</td>
																			<td class="clickable tablefull v-align-middle">
																				<span class="label label-success">HOME</span>
																				<span class="muted">Open the door to success, maximum revanue efficient, and useful</span>
																			</td>
																			<td class="clickable"><span class="muted">Yesterday </span></td>
																		</tr>
																		<tr>
																			<td class="small-cell v-align-middle">
																				<div class="checkbox check-danger ">
																					<input type="checkbox" value="1" id="checkbox85">
																					<label for="checkbox85"></label>
																				</div>
																			</td>
																			<td class="small-cell v-align-middle">
																				<div class="star">
																					<input type="checkbox" checked="" value="1" id="checkbox95">
																					<label for="checkbox95"></label>
																				</div>
																			</td>
																			<td class="clickable v-align-middle">David Nester</td>
																			<td class="clickable tablefull v-align-middle"><span class="muted">Less spam, and mobile access. Gmail is email that's intuitive, ...efficient, and useful. And maybe even fun.</span></td>
																			<td class="clickable"><span class="muted">Yesterday </span></td>
																		</tr>
																		<tr>
																			<td class="small-cell v-align-middle">
																				<div class="checkbox check-danger ">
																					<input type="checkbox" value="1" id="checkbox86">
																					<label for="checkbox86"></label>
																				</div>
																			</td>
																			<td class="small-cell v-align-middle">
																				<div class="star">
																					<input type="checkbox" checked="" value="1" id="checkbox96">
																					<label for="checkbox96"></label>
																				</div>
																			</td>
																			<td class="clickable v-align-middle">Jane Smith</td>
																			<td class="clickable tablefull v-align-middle">
																				<span class="label label-important">HOME</span>
																				<span class="muted">Open the door to success, maximum revanue efficient, and useful</span>
																			</td>
																			<td class="clickable"><span class="muted">Yesterday </span></td>
																		</tr>	
																	</tbody>	
																</table>
															</div>
														</div>
													</div>	
												</div>
											</div>	
										</div>	
									</div>
									
									<!-- Prject Follow Up  -->
									
									<div class="row">
										<div class="col-md-12">
											<div class="grid simple horizontal red ">
												<div class="grid-title ">
													<h4>Follow Up</h4>
												</div>
												<div class="grid-body">
													<div class="row form-group">
														<div id='calendar' ></div>
													</div>
												</div>
											</div>
										</div>
									</div>
									
									
									
									<!-- Prject Quotations / Invoices  -->
									<div class="row">
										<div class="col-md-6">
											<div class="grid simple horizontal red ">
												<div class="grid-title ">
													<h4>Quotations</h4>
												</div>
												<div class="grid-body">
													<div class="table-responsive custom-red-grid custom-tabe-responsive">
														<table class="table table-hover table-striped table-bordered custom-table-1 ">
															<thead class="custom-table-fixed-h">
																<tr >
																	<th>Date</th>
																	<th>Quotation Ref#</th>
																	<th>Select Project</th>
																</tr>
															</thead>
															<tbody class="custom-table-fixed-b">
																<tr>
																	<td>1Feb, 2015</td>	
																	<td>NUB8062015</td>	
																	<td>
																		<select class="form-control">
																			<option>THE PINES NOVOTEL PUBLIC AREA</option>
																			<option>THE PINES NOVOTEL PUBLIC AREA</option>
																			<option>THE PINES NOVOTEL PUBLIC AREA</option>
																			<option>THE PINES NOVOTEL PUBLIC AREA</option>
																			<option>THE PINES NOVOTEL PUBLIC AREA</option>
																		</select>	
																	</td>	
																</tr>	
																<tr>
																	<td>1Feb, 2015</td>	
																	<td>NUB8062015</td>	
																	<td>
																		<select class="form-control">
																			<option>THE PINES NOVOTEL PUBLIC AREA</option>
																			<option>THE PINES NOVOTEL PUBLIC AREA</option>
																			<option>THE PINES NOVOTEL PUBLIC AREA</option>
																			<option>THE PINES NOVOTEL PUBLIC AREA</option>
																			<option>THE PINES NOVOTEL PUBLIC AREA</option>
																		</select>	
																	</td>	
																</tr>
																<tr>
																	<td>1Feb, 2015</td>	
																	<td>NUB8062015</td>	
																	<td>
																		<select class="form-control">
																			<option>THE PINES NOVOTEL PUBLIC AREA</option>
																			<option>THE PINES NOVOTEL PUBLIC AREA</option>
																			<option>THE PINES NOVOTEL PUBLIC AREA</option>
																			<option>THE PINES NOVOTEL PUBLIC AREA</option>
																			<option>THE PINES NOVOTEL PUBLIC AREA</option>
																		</select>	
																	</td>	
																</tr>
																<tr>
																	<td>1Feb, 2015</td>	
																	<td>NUB8062015</td>	
																	<td>
																		<select class="form-control">
																			<option>THE PINES NOVOTEL PUBLIC AREA</option>
																			<option>THE PINES NOVOTEL PUBLIC AREA</option>
																			<option>THE PINES NOVOTEL PUBLIC AREA</option>
																			<option>THE PINES NOVOTEL PUBLIC AREA</option>
																			<option>THE PINES NOVOTEL PUBLIC AREA</option>
																		</select>	
																	</td>	
																</tr>
																<tr>
																	<td>1Feb, 2015</td>	
																	<td>NUB8062015</td>	
																	<td>
																		<select class="form-control">
																			<option>THE PINES NOVOTEL PUBLIC AREA</option>
																			<option>THE PINES NOVOTEL PUBLIC AREA</option>
																			<option>THE PINES NOVOTEL PUBLIC AREA</option>
																			<option>THE PINES NOVOTEL PUBLIC AREA</option>
																			<option>THE PINES NOVOTEL PUBLIC AREA</option>
																		</select>	
																	</td>	
																</tr>	
																<tr>
																	<td>1Feb, 2015</td>	
																	<td>NUB8062015</td>	
																	<td>
																		<select class="form-control">
																			<option>THE PINES NOVOTEL PUBLIC AREA</option>
																			<option>THE PINES NOVOTEL PUBLIC AREA</option>
																			<option>THE PINES NOVOTEL PUBLIC AREA</option>
																			<option>THE PINES NOVOTEL PUBLIC AREA</option>
																			<option>THE PINES NOVOTEL PUBLIC AREA</option>
																		</select>	
																	</td>	
																</tr>
																<tr>
																	<td>1Feb, 2015</td>	
																	<td>NUB8062015</td>	
																	<td>
																		<select class="form-control">
																			<option>THE PINES NOVOTEL PUBLIC AREA</option>
																			<option>THE PINES NOVOTEL PUBLIC AREA</option>
																			<option>THE PINES NOVOTEL PUBLIC AREA</option>
																			<option>THE PINES NOVOTEL PUBLIC AREA</option>
																			<option>THE PINES NOVOTEL PUBLIC AREA</option>
																		</select>	
																	</td>	
																</tr>
																<tr>
																	<td>1Feb, 2015</td>	
																	<td>NUB8062015</td>	
																	<td>
																		<select class="form-control">
																			<option>THE PINES NOVOTEL PUBLIC AREA</option>
																			<option>THE PINES NOVOTEL PUBLIC AREA</option>
																			<option>THE PINES NOVOTEL PUBLIC AREA</option>
																			<option>THE PINES NOVOTEL PUBLIC AREA</option>
																			<option>THE PINES NOVOTEL PUBLIC AREA</option>
																		</select>	
																	</td>	
																</tr>
																<tr>
																	<td>1Feb, 2015</td>	
																	<td>NUB8062015</td>	
																	<td>
																		<select class="form-control">
																			<option>THE PINES NOVOTEL PUBLIC AREA</option>
																			<option>THE PINES NOVOTEL PUBLIC AREA</option>
																			<option>THE PINES NOVOTEL PUBLIC AREA</option>
																			<option>THE PINES NOVOTEL PUBLIC AREA</option>
																			<option>THE PINES NOVOTEL PUBLIC AREA</option>
																		</select>	
																	</td>	
																</tr>
															</tbody>		
														</table>	
													</div>
												</div>
											</div>
										</div>
										
										<div class="col-md-6">
											<div class="grid simple horizontal red ">
												<div class="grid-title ">
													<h4>Invoices</h4>
												</div>
												<div class="grid-body">
													<div class="table-responsive custom-red-grid custom-tabe-responsive">
														<table class="table table-hover table-striped table-bordered custom-table-1 ">
															<thead class="custom-table-fixed-h">
																<tr >
																	<th>Model</th>
																	<th>Name</th>
																	<th>Price</th>
																</tr>
															</thead>
															<tbody class="custom-table-fixed-b">
																<tr>
																	<td>NUB8062015</td>	
																	<td>NUB8062015</td>	
																	<td>
																		<select class="form-control">
																			<option>THE PINES NOVOTEL PUBLIC AREA</option>
																			<option>THE PINES NOVOTEL PUBLIC AREA</option>
																			<option>THE PINES NOVOTEL PUBLIC AREA</option>
																			<option>THE PINES NOVOTEL PUBLIC AREA</option>
																			<option>THE PINES NOVOTEL PUBLIC AREA</option>
																		</select>	
																	</td>	
																</tr>	
																<tr>
																	<td>NUB8062015</td>	
																	<td>NUB8062015</td>
																	<td>
																		<select class="form-control">
																			<option>THE PINES NOVOTEL PUBLIC AREA</option>
																			<option>THE PINES NOVOTEL PUBLIC AREA</option>
																			<option>THE PINES NOVOTEL PUBLIC AREA</option>
																			<option>THE PINES NOVOTEL PUBLIC AREA</option>
																			<option>THE PINES NOVOTEL PUBLIC AREA</option>
																		</select>	
																	</td>	
																</tr>
																<tr>
																	<td>NUB8062015</td>	
																	<td>NUB8062015</td>
																	<td>
																		<select class="form-control">
																			<option>THE PINES NOVOTEL PUBLIC AREA</option>
																			<option>THE PINES NOVOTEL PUBLIC AREA</option>
																			<option>THE PINES NOVOTEL PUBLIC AREA</option>
																			<option>THE PINES NOVOTEL PUBLIC AREA</option>
																			<option>THE PINES NOVOTEL PUBLIC AREA</option>
																		</select>	
																	</td>	
																</tr>
																<tr>
																	<td>NUB8062015</td>	
																	<td>NUB8062015</td>
																	<td>
																		<select class="form-control">
																			<option>THE PINES NOVOTEL PUBLIC AREA</option>
																			<option>THE PINES NOVOTEL PUBLIC AREA</option>
																			<option>THE PINES NOVOTEL PUBLIC AREA</option>
																			<option>THE PINES NOVOTEL PUBLIC AREA</option>
																			<option>THE PINES NOVOTEL PUBLIC AREA</option>
																		</select>	
																	</td>	
																</tr>
																<tr>
																	<td>NUB8062015</td>	
																	<td>NUB8062015</td>
																	<td>
																		<select class="form-control">
																			<option>THE PINES NOVOTEL PUBLIC AREA</option>
																			<option>THE PINES NOVOTEL PUBLIC AREA</option>
																			<option>THE PINES NOVOTEL PUBLIC AREA</option>
																			<option>THE PINES NOVOTEL PUBLIC AREA</option>
																			<option>THE PINES NOVOTEL PUBLIC AREA</option>
																		</select>	
																	</td>	
																</tr>	
																<tr>
																	<td>NUB8062015</td>	
																	<td>NUB8062015</td>
																	<td>
																		<select class="form-control">
																			<option>THE PINES NOVOTEL PUBLIC AREA</option>
																			<option>THE PINES NOVOTEL PUBLIC AREA</option>
																			<option>THE PINES NOVOTEL PUBLIC AREA</option>
																			<option>THE PINES NOVOTEL PUBLIC AREA</option>
																			<option>THE PINES NOVOTEL PUBLIC AREA</option>
																		</select>	
																	</td>	
																</tr>
																<tr>
																	<td>NUB8062015</td>	
																	<td>NUB8062015</td>
																	<td>
																		<select class="form-control">
																			<option>THE PINES NOVOTEL PUBLIC AREA</option>
																			<option>THE PINES NOVOTEL PUBLIC AREA</option>
																			<option>THE PINES NOVOTEL PUBLIC AREA</option>
																			<option>THE PINES NOVOTEL PUBLIC AREA</option>
																			<option>THE PINES NOVOTEL PUBLIC AREA</option>
																		</select>	
																	</td>	
																</tr>
																<tr>
																	<td>NUB8062015</td>	
																	<td>NUB8062015</td>
																	<td>
																		<select class="form-control">
																			<option>THE PINES NOVOTEL PUBLIC AREA</option>
																			<option>THE PINES NOVOTEL PUBLIC AREA</option>
																			<option>THE PINES NOVOTEL PUBLIC AREA</option>
																			<option>THE PINES NOVOTEL PUBLIC AREA</option>
																			<option>THE PINES NOVOTEL PUBLIC AREA</option>
																		</select>	
																	</td>	
																</tr>
																<tr>
																	<td>NUB8062015</td>	
																	<td>NUB8062015</td>
																	<td>
																		<select class="form-control">
																			<option>THE PINES NOVOTEL PUBLIC AREA</option>
																			<option>THE PINES NOVOTEL PUBLIC AREA</option>
																			<option>THE PINES NOVOTEL PUBLIC AREA</option>
																			<option>THE PINES NOVOTEL PUBLIC AREA</option>
																			<option>THE PINES NOVOTEL PUBLIC AREA</option>
																		</select>	
																	</td>	
																</tr>
															</tbody>	
														</table>	
													</div>	
												</div>
											</div>
										</div>
									</div>
									
									<div class="row">
										<div class="col-md-6">
											<div class="grid simple horizontal red ">
												<div class="grid-title ">
													<h4>Designer</h4>
												</div>
												<div class="grid-body">
													<div class="scroller scrollbar-dynamic" data-height="300px">
														<div class="table-responsive custom-red-grid ">
															<table class="table table-striped table-bordered custom-table-1 ">
																<tbody class="custom-table-fixed-b">
																	<tr>
																		<td class="text-center" colspan="4"><b>Interior Designer</b></td>	
																	</tr>
																	<tr>
																		<td colspan="4"><b>Firm Name</b></td>	
																	</tr>
																	<tr>
																			
																		<td colspan="4">Beck Design Corporation</td>
																	</tr>	
																	<tr>
																			
																		<td class="text-center" colspan="4"><b>Firm Other Contacts</b></td>
																		
																	</tr>	
																	<tr>
																			
																		<td colspan="2"><b>Name</b></td>		
																		<td colspan="2"><b>Phone</b></td>			
																	</tr>	
																	<tr>	
																		<td colspan="2"><a href="#">Michael</a></td>		
																		<td colspan="2"><a href="#">+920000000</a></td>	
																	</tr>
																	<tr>	
																		<td colspan="2"><a href="#">Julie</a></td>		
																		<td colspan="2"><a href="#">+920000000</a></td>		
																	</tr>
																	<tr>	
																		<td colspan="2"><a href="#">Tine</a></td>	
																		<td colspan="2"><a href="#">+920000000</a></td>		
																	</tr>	
																	<tr>	
																		<td colspan="2"><a href="#">Michael</a></td>		
																		<td colspan="2"><a href="#">+920000000</a></td>		
																	</tr>
																	<tr>	
																		<td colspan="2"><a href="#">Julie</a></td>		
																		<td colspan="2"><a href="#">+920000000</a></td>		
																		
																	</tr>
																	<tr>	
																		<td colspan="2"><a href="#">Tine</a></td>	
																		<td colspan="2"><a href="#">+920000000</a></td>		
																			
																	</tr>	
																</tbody>		
															</table>	
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="col-md-6">
											<div class="grid simple horizontal red ">
												<div class="grid-title ">
													<h4>Contractor</h4>
												</div>
												<div class="grid-body">
													<div class="scroller scrollbar-dynamic" data-height="300px">
														<div class="table-responsive custom-red-grid ">
															<table class="table table-striped table-bordered custom-table-1 ">
																<tbody class="custom-table-fixed-b">
																	<tr>
																		<td class="text-center" colspan="4"><b>Main Contractor</b></td>	
																	</tr>
																	<tr>
																		<td colspan="4"><b>Contractor Name</b></td>	
																	</tr>
																	<tr>
																			
																		<td colspan="4">Seven Contractors Co.</td>
																	</tr>	
																	<tr>
																			
																		<td class="text-center" colspan="4"><b>Contractor Other Contacts</b></td>
																		
																	</tr>	
																	<tr>
																			
																		<td colspan="2"><b>Name</b></td>		
																		<td colspan="2"><b>Phone</b></td>			
																	</tr>	
																	<tr>	
																		<td colspan="2"><a href="#">Shaaz</a></td>		
																		<td colspan="2"><a href="#">+920000000</a></td>	
																	</tr>
																	<tr>	
																		<td colspan="2"><a href="#">James</a></td>		
																		<td colspan="2"><a href="#">+920000000</a></td>		
																	</tr>
																	<tr>	
																		<td colspan="2"><a href="#">Bond</a></td>	
																		<td colspan="2"><a href="#">+920000000</a></td>		
																	</tr>	
																	<tr>	
																		<td colspan="2"><a href="#">Shaaz</a></td>		
																		<td colspan="2"><a href="#">+920000000</a></td>		
																	</tr>
																	<tr>	
																		<td colspan="2"><a href="#">James</a></td>		
																		<td colspan="2"><a href="#">+920000000</a></td>		
																		
																	</tr>
																	<tr>	
																		<td colspan="2"><a href="#">Bond</a></td>	
																		<td colspan="2"><a href="#">+920000000</a></td>		
																			
																	</tr>	
																</tbody>		
															</table>	
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									
									<div class="row">
										<div class="col-md-6">
											<div class="grid simple horizontal red ">
												<div class="grid-title ">
													<h4>Sub Contractor</h4>
												</div>
												<div class="grid-body">
													<div class="scroller scrollbar-dynamic" data-height="300px">
														<div class="table-responsive custom-red-grid ">
															<table class="table table-striped table-bordered custom-table-1 ">
																<tbody class="custom-table-fixed-b">
																	<tr>
																		<td class="text-center" colspan="4"><b>Sub Contractor</b></td>	
																	</tr>
																	<tr>
																		<td colspan="4"><b>Sub Contractor Name</b></td>	
																	</tr>
																	<tr>
																			
																		<td colspan="4">Steve Corporations</td>
																	</tr>	
																	<tr>
																			
																		<td class="text-center" colspan="4"><b>Sub Contractor Other Contacts</b></td>
																		
																	</tr>	
																	<tr>
																			
																		<td colspan="2"><b>Name</b></td>		
																		<td colspan="2"><b>Phone</b></td>			
																	</tr>	
																	<tr>	
																		<td colspan="2"><a href="#">Khan</a></td>		
																		<td colspan="2"><a href="#">+920000000</a></td>	
																	</tr>
																	<tr>	
																		<td colspan="2"><a href="#">Mike</a></td>		
																		<td colspan="2"><a href="#">+920000000</a></td>		
																	</tr>
																	<tr>	
																		<td colspan="2"><a href="#">Mike</a></td>	
																		<td colspan="2"><a href="#">+920000000</a></td>		
																	</tr>	
																	<tr>	
																		<td colspan="2"><a href="#">Khan</a></td>		
																		<td colspan="2"><a href="#">+920000000</a></td>		
																	</tr>
																	<tr>	
																		<td colspan="2"><a href="#">Mike</a></td>		
																		<td colspan="2"><a href="#">+920000000</a></td>		
																		
																	</tr>
																	<tr>	
																		<td colspan="2"><a href="#">Mike</a></td>	
																		<td colspan="2"><a href="#">+920000000</a></td>		
																			
																	</tr>	
																</tbody>		
															</table>	
														</div>
													</div>
												</div>
											</div>
										</div>
										
										<div class="col-md-6">
											<div class="grid simple horizontal red ">
												<div class="grid-title ">
													<h4>Owner</h4>
												</div>
												<div class="grid-body">
													<div class="scroller scrollbar-dynamic" data-height="300px">
														<div class="table-responsive custom-red-grid ">
															<table class="table table-striped table-bordered custom-table-1 ">
																<tbody class="custom-table-fixed-b">
																	<tr>
																		<td class="text-center" colspan="4"><b>Owner</b></td>	
																	</tr>
																	<tr>
																		<td colspan="4"><b>Owner Name</b></td>	
																	</tr>
																	<tr>
																			
																		<td colspan="4">Sharon </td>
																	</tr>	
																	<tr>
																			
																		<td class="text-center" colspan="4"><b>Owner Other Contacts</b></td>
																		
																	</tr>	
																	<tr>
																			
																		<td colspan="2"><b>Name</b></td>		
																		<td colspan="2"><b>Phone</b></td>			
																	</tr>	
																	<tr>	
																		<td colspan="2"><a href="#">Usman</a></td>		
																		<td colspan="2"><a href="#">+920000000</a></td>	
																	</tr>
																	<tr>	
																		<td colspan="2"><a href="#">Allister</a></td>		
																		<td colspan="2"><a href="#">+920000000</a></td>		
																	</tr>
																	<tr>	
																		<td colspan="2"><a href="#">John</a></td>	
																		<td colspan="2"><a href="#">+920000000</a></td>		
																	</tr>	
																	<tr>	
																		<td colspan="2"><a href="#">Usman</a></td>		
																		<td colspan="2"><a href="#">+920000000</a></td>		
																	</tr>
																	<tr>	
																		<td colspan="2"><a href="#">Allister</a></td>		
																		<td colspan="2"><a href="#">+920000000</a></td>		
																		
																	</tr>
																	<tr>	
																		<td colspan="2"><a href="#">John</a></td>	
																		<td colspan="2"><a href="#">+920000000</a></td>		
																			
																	</tr>	
																</tbody>		
															</table>	
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									
									<div class="row">
										<div class="col-md-6">
											<div class="grid simple horizontal red ">
												<div class="grid-title ">
													<h4>Supplier</h4>
												</div>
												<div class="grid-body">
													<div class="scroller scrollbar-dynamic" data-height="300px">
														<div class="table-responsive custom-red-grid ">
															<table class="table table-striped table-bordered custom-table-1 ">
																<tbody class="custom-table-fixed-b">
																	<tr>
																		<td class="text-center" colspan="4"><b>Supplier</b></td>	
																	</tr>
																	<tr>
																		<td colspan="4"><b>Supplier Name</b></td>	
																	</tr>
																	<tr>
																			
																		<td colspan="4">Jhonny and Jhonny Co.</td>
																	</tr>	
																	<tr>
																			
																		<td class="text-center" colspan="4"><b>Supplier Other Contacts</b></td>
																		
																	</tr>	
																	<tr>
																			
																		<td colspan="2"><b>Name</b></td>		
																		<td colspan="2"><b>Phone</b></td>			
																	</tr>	
																	<tr>	
																		<td colspan="2"><a href="#">Shina</a></td>		
																		<td colspan="2"><a href="#">+920000000</a></td>	
																	</tr>
																	<tr>	
																		<td colspan="2"><a href="#">Shawn</a></td>		
																		<td colspan="2"><a href="#">+920000000</a></td>		
																	</tr>
																	<tr>	
																		<td colspan="2"><a href="#">Shina</a></td>	
																		<td colspan="2"><a href="#">+920000000</a></td>		
																	</tr>	
																	<tr>	
																		<td colspan="2"><a href="#">Shawn</a></td>		
																		<td colspan="2"><a href="#">+920000000</a></td>		
																	</tr>
																	<tr>	
																		<td colspan="2"><a href="#">Shina</a></td>		
																		<td colspan="2"><a href="#">+920000000</a></td>		
																		
																	</tr>
																	<tr>	
																		<td colspan="2"><a href="#">Shawn</a></td>	
																		<td colspan="2"><a href="#">+920000000</a></td>		
																			
																	</tr>	
																</tbody>		
															</table>	
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="col-md-6">
											<div class="grid simple horizontal red ">
												<div class="grid-title ">
													<h4>Sample</h4>
													<a class="btn btn-danger pull-right" href="">Add Samples</a>	
												</div>
												<div class="grid-body">
													<div class="table-responsive custom-red-grid custom-tabe-responsive">
														<table class="table table-hover table-striped table-bordered custom-table-1 ">
															<thead class="custom-table-fixed-h">
																<tr >
																	<th>Date</th>
																	<th>Name</th>
																	<th>Quantity</th>
																</tr>
															</thead>
															<tbody class="custom-table-fixed-b">
																<tr>
																	<td>29Feb,2016</td>	
																	<td>Project 1</td>	
																	<td>$35.00</td>	
																</tr>	
																<tr>
																	<td>29Feb,2016</td>	
																	<td>Project 1</td>	
																	<td>$35.00</td>		
																</tr>
																<tr>
																	<td>29Feb,2016</td>	
																	<td>Project 1</td>	
																	<td>$35.00</td>	
																</tr>
																<tr>
																	<td>29Feb,2016</td>	
																	<td>Project 1</td>	
																	<td>$35.00</td>	
																</tr>
																<tr>
																	<td>29Feb,2016</td>	
																	<td>Project 1</td>	
																	<td>$35.00</td>	
																</tr>	
																<tr>
																	<td>29Feb,2016</td>	
																	<td>Project 1</td>	
																	<td>$35.00</td>	
																</tr>
																<tr>
																	<td>29Feb,2016</td>	
																	<td>Project 1</td>	
																	<td>$35.00</td>	
																</tr>
																<tr>
																	<td>29Feb,2016</td>	
																	<td>Project 1</td>	
																	<td>$35.00</td>	
																</tr>
																<tr>
																	<td>29Feb,2016</td>	
																	<td>Project 1</td>	
																	<td>$35.00</td>	
																</tr>	
																<tr>
																	<td>29Feb,2016</td>	
																	<td>Project 1</td>	
																	<td>$35.00</td>	
																</tr>
																<tr>
																	<td>29Feb,2016</td>	
																	<td>Project 1</td>	
																	<td>$35.00</td>	
																</tr>
																<tr>
																	<td>29Feb,2016</td>	
																	<td>Project 1</td>	
																	<td>$35.00</td>	
																</tr>
																<tr>
																	<td>29Feb,2016</td>	
																	<td>Project 1</td>	
																	<td>$35.00</td>	
																</tr>	
															</tbody>		
														</table>	
													</div>
												</div>
											</div>
										</div>
										
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>

		</div>
	</div>

	<!-- Modal -->
	<div class="modal fade myModal_1-modal-lg" id="myModal_1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Follow Up</h4>
				</div>
				<div class="modal-body">
					<div class="row form-group custom-form-group-1">
						<label  class="col-md-3 control-label custom-control-label-1">Date</label>
						<div class="col-md-9">
							<div class="input-append danger date no-padding">
								<input type="text" class="form-control">
								<span class="add-on"><span class="arrow"></span><i class="fa fa-th"></i></span> 
							</div>
						</div>
					</div>	
					<div class="row form-group custom-form-group-1">
						<label  class="col-md-3 control-label custom-control-label-1">Description</label>
						<div class="col-md-9">
							<textarea class="form-control" rows="3" placeholder="Meeting Description"></textarea>
						</div>
					</div>	
					<div class="row form-group custom-form-group-1">
						<label  class="col-md-3 control-label custom-control-label-1">Deadline  Date</label>
						<div class="col-md-9">
							<div class="input-append input-append_1 danger date no-padding">
								<input type="text" class="form-control">
								<span class="add-on"><span class="arrow"></span><i class="fa fa-th"></i></span> 
							</div>
						</div>
					</div>		
					<div class="row form-group custom-form-group-1">
						<label  class="col-md-3 control-label custom-control-label-1">Completed</label>
						<div class="col-md-9">
							<div class="radio radio-danger">
								<input type="radio" value="yes" name="optionyes" id="yes">
								<label for="yes">Yes</label>
								<input type="radio" checked="checked" value="no" name="optionyes" id="no">
								<label for="no">No</label>
							</div>
							
						</div>	
					</div>
				</div>			
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-danger">Save changes</button>
				</div>
			</div>
		</div>
	</div>
	
	<!-- Start Calender modal -->
                <div id="CalenderModalNew" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog">
                        <div class="modal-content">

                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h4 class="modal-title" id="myModalLabel">New Calender Entry</h4>
                            </div>
                            <div class="modal-body">
                                <div id="testmodal" >
                                    <form id="antoform" class="calender" role="form">
										<div class="row form-group custom-form-group-1">
											<label  class="col-md-3 control-label custom-control-label-1">Purpose</label>
											<div class="col-md-9">
												<input type="text" class="form-control" placeholder="Purpose">
											</div>	
										</div>
                                        <div class="row form-group custom-form-group-1">
											<label  class="col-md-3 control-label custom-control-label-1">Date</label>
											<div class="col-md-9">
												<div class="input-append danger date no-padding">
													<input type="text" class="form-control">
													<span class="add-on"><span class="arrow"></span><i class="fa fa-th"></i></span> 
												</div>
											</div>
										</div>	
										<div class="row form-group custom-form-group-1">
											<label  class="col-md-3 control-label custom-control-label-1">Description</label>
											<div class="col-md-9">
												<textarea class="form-control" rows="3" placeholder="Meeting Description"></textarea>
											</div>
										</div>	
										<div class="row form-group custom-form-group-1">
											<label  class="col-md-3 control-label custom-control-label-1">Deadline  Date</label>
											<div class="col-md-9">
												<div class="input-append input-append_1 danger date no-padding">
													<input type="text" class="form-control">
													<span class="add-on"><span class="arrow"></span><i class="fa fa-th"></i></span> 
												</div>
											</div>
										</div>		
										<div class="row form-group custom-form-group-1">
											<label  class="col-md-3 control-label custom-control-label-1">Completed</label>
											<div class="col-md-9">
												<div class="radio radio-danger">
													<input type="radio" value="yes" name="optionyes" id="yes">
													<label for="yes">Yes</label>
													<input type="radio" checked="checked" value="no" name="optionyes" id="no">
													<label for="no">No</label>
												</div>
												
											</div>	
										</div>
                                    </form>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default antoclose" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-danger antosubmit">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="CalenderModalEdit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">

                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h4 class="modal-title" id="myModalLabel2">Edit Calender Entry</h4>
                            </div>
                            <div class="modal-body">

                                <div id="testmodal2" style="padding: 5px 20px;">
                                    <form id="antoform2" class="form-horizontal calender" role="form">
                                        <div class="row form-group custom-form-group-1">
											<label  class="col-md-3 control-label custom-control-label-1">Purpose</label>
											<div class="col-md-9">
												<input type="text" class="form-control" placeholder="Purpose">
											</div>	
										</div>
                                        <div class="row form-group custom-form-group-1">
											<label  class="col-md-3 control-label custom-control-label-1">Date</label>
											<div class="col-md-8">
												<div class="input-append danger date no-padding">
													<input type="text" class="form-control">
													<span class="add-on"><span class="arrow"></span><i class="fa fa-th"></i></span> 
												</div>
											</div>
										</div>	
										<div class="row form-group custom-form-group-1">
											<label  class="col-md-3 control-label custom-control-label-1">Description</label>
											<div class="col-md-9">
												<textarea class="form-control" rows="3" placeholder="Meeting Description"></textarea>
											</div>
										</div>	
										<div class="row form-group custom-form-group-1">
											<label  class="col-md-3 control-label custom-control-label-1">Deadline  Date</label>
											<div class="col-md-8">
												<div class="input-append input-append_1 danger date no-padding">
													<input type="text" class="form-control">
													<span class="add-on"><span class="arrow"></span><i class="fa fa-th"></i></span> 
												</div>
											</div>
										</div>		
										<div class="row form-group custom-form-group-1">
											<label  class="col-md-3 control-label custom-control-label-1">Completed</label>
											<div class="col-md-9">
												<div class="radio radio-danger">
													<input type="radio" value="yes" name="optionyes" id="yes">
													<label for="yes">Yes</label>
													<input type="radio" checked="checked" value="no" name="optionyes" id="no">
													<label for="no">No</label>
												</div>
												
											</div>	
										</div>

                                    </form>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default antoclose2" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-danger antosubmit2">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="fc_create" data-toggle="modal" data-target="#CalenderModalNew"></div>
                <div id="fc_edit" data-toggle="modal" data-target="#CalenderModalEdit"></div>

<?php echo $footer; ?>