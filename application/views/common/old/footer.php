
<!-- END CONTAINER -->

<!-- BEGIN CORE JS FRAMEWORK-->

    

<!--[if lt IE 9]>

<script src="assets/plugins/respond.js"></script>

<![endif]-->



<script src="<?php echo SURL; ?>assets/plugins/jquery-1.8.3.min.js" type="text/javascript"></script>

<script src="<?php echo SURL; ?>assets/plugins/jquery-ui/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>

<script src="<?php echo SURL; ?>assets/plugins/boostrapv3/js/bootstrap.min.js" type="text/javascript"></script>

<script src="<?php echo SURL; ?>assets/plugins/breakpoints.js" type="text/javascript"></script>

<script src="<?php echo SURL; ?>assets/plugins/jquery-unveil/jquery.unveil.min.js" type="text/javascript"></script>

<script src="<?php echo SURL; ?>assets/plugins/jquery-block-ui/jqueryblockui.js" type="text/javascript"></script>

<script src="<?php echo SURL; ?>assets/plugins/jquery-lazyload/jquery.lazyload.min.js" type="text/javascript"></script>

<script src="<?php echo SURL; ?>assets/plugins/jquery-scrollbar/jquery.scrollbar.min.js" type="text/javascript"></script>

<!-- END CORE JS FRAMEWORK -->

<!-- BEGIN PAGE LEVEL JS -->

<script src="<?php echo SURL; ?>assets/plugins/jquery-slider/jquery.sidr.min.js" type="text/javascript"></script>

<script src="<?php echo SURL; ?>assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js" type="text/javascript"></script>

<script src="<?php echo SURL; ?>assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>

<script src="<?php echo SURL; ?>assets/plugins/pace/pace.min.js" type="text/javascript"></script>

<script src="<?php echo SURL; ?>assets/plugins/jquery-numberAnimate/jquery.animateNumbers.js" type="text/javascript"></script>

<script src="<?php echo SURL; ?>assets/plugins/jquery-ricksaw-chart/js/raphael-min.js"></script>

<script src="<?php echo SURL; ?>assets/plugins/jquery-ricksaw-chart/js/d3.v2.js"></script>

<script src="<?php echo SURL; ?>assets/plugins/jquery-ricksaw-chart/js/rickshaw.min.js"></script>

<script src="<?php echo SURL; ?>assets/plugins/jquery-sparkline/jquery-sparkline.js"></script>

<script src="<?php echo SURL; ?>assets/plugins/skycons/skycons.js"></script>

<script src="<?php echo SURL; ?>assets/plugins/owl-carousel/owl.carousel.min.js" type="text/javascript"></script>

<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>

<script src="<?php echo SURL; ?>assets/plugins/jquery-gmap/gmaps.js" type="text/javascript"></script>

<script src="<?php echo SURL; ?>assets/plugins/Mapplic/js/jquery.easing.js" type="text/javascript"></script>

<script src="<?php echo SURL; ?>assets/plugins/Mapplic/js/jquery.mousewheel.js" type="text/javascript"></script>

<script src="<?php echo SURL; ?>assets/plugins/Mapplic/js/hammer.js" type="text/javascript"></script>

<script src="<?php echo SURL; ?>assets/plugins/Mapplic/mapplic/mapplic.js" type="text/javascript"></script>

<script src="<?php echo SURL; ?>assets/plugins/jquery-flot/jquery.flot.js" type="text/javascript"></script>

<script src="<?php echo SURL; ?>assets/plugins/jquery-flot/jquery.flot.resize.min.js" type="text/javascript"></script>

<script src="<?php echo SURL; ?>assets/plugins/jquery-metrojs/MetroJs.min.js" type="text/javascript" ></script>

<script src="<?php echo SURL; ?>assets/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js" type="text/javascript"></script> 

<script src="<?php echo SURL; ?>assets/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js" type="text/javascript"></script> 







<!-- END PAGE LEVEL PLUGINS -->

<!-- <script src="assets/js/form_elements.js" type="text/javascript"></script> -->

<!-- BEGIN CORE TEMPLATE JS -->
<script src="<?php  echo SURL;?>assets/css/zelect.js"></script>
<script src="<?php echo SURL; ?>assets/js/core.js" type="text/javascript"></script>

<script src="<?php echo SURL; ?>assets/js/chat.js" type="text/javascript"></script>

<script src="<?php echo SURL; ?>assets/js/demo.js" type="text/javascript"></script>


<script src="<?php echo SURL; ?>assets/js/jquery.floatThead.js" type="text/javascript"></script>

<!-- <script src="assets/js/dashboard_v2.js" type="text/javascript"></script> -->

	<script type="text/javascript">

			$(document).ready(function () {

				$(".live-tile,.flip-list").liveTile();

				$(function () {
				  $('[data-toggle="tooltip"]').tooltip()
				})	
				
				$('.input-append.date').datepicker({

				});
				
				$('.input-append_1.date').datepicker({

				});
				
				$('#sandbox-container input').datepicker({
				});
				
				$('#dp5').datepicker();
				
				
			});

	</script>

	<script>
		
		$(function() {
			var availableTags = [
			  "ActionScript",
			  "AppleScript",
			  "Asp",
			  "BASIC",
			  "C",
			  "C++",
			  "Clojure",
			  "COBOL",
			  "ColdFusion",
			  "Erlang",
			  "Fortran",
			  "Groovy",
			  "Haskell",
			  "Java",
			  "JavaScript",
			  "Lisp",
			  "Perl",
			  "PHP",
			  "Python",
			  "Ruby",
			  "Scala",
			  "Scheme"
			];
			
				$( "#tags" ).autocomplete({
				  source: availableTags
				});
				
			var availableTags = [
			  "ActionScript",
			  "AppleScript",
			  "Asp",
			  "BASIC",
			  "C",
			  "C++",
			  "Clojure",
			  "COBOL",
			  "ColdFusion",
			  "Erlang",
			  "Fortran",
			  "Groovy",
			  "Haskell",
			  "Java",
			  "JavaScript",
			  "Lisp",
			  "Perl",
			  "PHP",
			  "Python",
			  "Ruby",
			  "Scala",
			  "Scheme"
			];
			
				$( "#modal_tags" ).autocomplete({
				  source: availableTags
				});
			
			var availableTags = [
				"Model 1",								
				"Model 2",								
				"Model 3",								
				"Model 4",								
				"Model 5"								
			];
			
				$( "#tags2" ).autocomplete({
				  source: availableTags
				});
				
		});
		
		
		
  </script>	

  
  <script src="<?php echo SURL; ?>assets/plugins/fullcalendar/moment.min.js" type="text/javascript"></script> 

<script src="<?php echo SURL; ?>assets/plugins/fullcalendar/fullcalendar.js" type="text/javascript"></script> 
  
  <script>
            $(window).load(function () {

                var date = new Date();
                var d = date.getDate();
                var m = date.getMonth();
                var y = date.getFullYear();
                var started;
                var categoryClass;

                var calendar = $('#calendar').fullCalendar({
                    header: {
                        left: 'prev,next today',
                        center: 'title',
                        right: 'month,agendaWeek,agendaDay'
                    },
                    selectable: true,
                    selectHelper: true,
                    select: function (start, end, allDay) {
                        $('#fc_create').click();

                        started = start;
                        ended = end

                        $(".antosubmit").on("click", function () {
                            var title = $("#title").val();
                            if (end) {
                                ended = end
                            }
                            categoryClass = $("#event_type").val();

                            if (title) {
                                calendar.fullCalendar('renderEvent', {
                                        title: title,
                                        start: started,
                                        end: end,
                                        allDay: allDay
                                    },
                                    true // make the event "stick"
                                );
                            }
                            $('#title').val('');
                            calendar.fullCalendar('unselect');

                            $('.antoclose').click();

                            return false;
                        });
                    },
                    eventClick: function (calEvent, jsEvent, view) {
                        //alert(calEvent.title, jsEvent, view);

                        $('#fc_edit').click();
                        $('#title2').val(calEvent.title);
                        categoryClass = $("#event_type").val();

                        $(".antosubmit2").on("click", function () {
                            calEvent.title = $("#title2").val();

                            calendar.fullCalendar('updateEvent', calEvent);
                            $('.antoclose2').click();
                        });
                        calendar.fullCalendar('unselect');
                    },
                    editable: true,
                    events: [
                        {
                            title: 'All Day Event',
                            start: new Date(y, m, 1)
                    },
                        {
                            title: 'Long Event',
                            start: new Date(y, m, d - 5),
                            end: new Date(y, m, d - 2)
                    },
                        {
                            title: 'Meeting',
                            start: new Date(y, m, d, 10, 30),
                            allDay: false
                    },
                        {
                            title: 'Lunch',
                            start: new Date(y, m, d + 14, 12, 0),
                            end: new Date(y, m, d, 14, 0),
                            allDay: false
                    },
                        {
                            title: 'Birthday Party',
                            start: new Date(y, m, d + 1, 19, 0),
                            end: new Date(y, m, d + 1, 22, 30),
                            allDay: false
                    },
                        {
                            title: 'Click for Google',
                            start: new Date(y, m, 28),
                            end: new Date(y, m, 29),
                            url: 'http://google.com/'
                    }
                ]
                });
            });
        </script>
		
		<script>

			$(document).ready(function(){
				
				
				
				$(function() {
				  $('#colorselector').change(function(){
					$('.colors').hide(1000);
					$('#' + $(this).val()).show(1000);
				  });
				});
				
			});
			
			
			
			
		</script>
		
		
<script>
   $("#add_contact").click(function(){

            $.ajax({

                type: "POST",

                url: "<?php echo base_url();?>users/add_contacts_dynamic/",

                success: function(result){ 

                  	$("#add_stage_div").append(result); 

					$("#frm_add").validate({

        			});                             

                }

            });       

        });
		
var count=0;
		
		 $("#add_product").click(function(){
count++;

            $.ajax({

                type: "POST",

                url: "<?php echo base_url();?>product/add_product_dynamic/"+count,

                success: function(result){ 

                  	$("#add_stage_div").append(result); 
					 $('select#model_sizes'+count).zelect({ placeholder:'Please Select ' });
                      
					$("#frm_add").validate({

        			});                             

                }

            });       

        });
		
		
		
			
  </script>
  <script>
  $(document ).on('click', '.stage_cancel', function(){

            $(this).closest('.stage_div').remove();

        });  

  </script>
   <script type="text/javascript">
      jQuery(document).ready(function() {
		 
    	$("#search_news").keyup(function(){
		//	if($("#search_news").val().length>2){
				//alert($("#search_news").val());
				
				$.ajax({
					type: "post",
					url: "<?php echo SURL;?>users/search_interior",
					cache: false,				
					data:'search='+$("#search_news").val(),
					success: function(response){
						$('#newsResult').html(response);
						}
				});
			//}
		});
    
    });
    </script>
    
      <script type="text/javascript">
      jQuery(document).ready(function() {
		 
    	$("#search_news1").keyup(function(){
			//if($("#search_news1").val().length>2){
				//alert($("#search_news").val());
				
				$.ajax({
					type: "post",
					url: "<?php echo SURL;?>users/search_contractor",
					cache: false,				
					data:'search='+$("#search_news1").val(),
					
					success: function(response){
						$('#newsResult').html(response);
						}
				});
			//}
		});
    
    });
    </script>
    
     <script type="text/javascript">
      jQuery(document).ready(function() {
		 
    	$("#search_news2").keyup(function(){
			///if($("#search_news2").val().length>2){
				//alert($("#search_news").val());
				
				$.ajax({
					type: "post",
					url: "<?php echo SURL;?>users/search_subcontractor",
					cache: false,				
					data:'search='+$("#search_news2").val(),
					
					success: function(response){
						$('#newsResult').html(response);
						}
				});
			//}
		});
    
    });
    </script>
    
     <script type="text/javascript">
      jQuery(document).ready(function() {
		 
    	$("#search_news3").keyup(function(){
		//	if($("#search_news3").val().length>2){
				//alert($("#search_news").val());
				
				$.ajax({
					type: "post",
					url: "<?php echo SURL;?>users/search_supplier",
					cache: false,				
					data:'search='+$("#search_news3").val(),
					
					success: function(response){
						$('#newsResult').html(response);
						}
				});
			//}
		});
    
    });
    </script>
    
     <script type="text/javascript">
      jQuery(document).ready(function() {
		 
    	$("#search_news4").keyup(function(){
			//if($("#search_news4").val().length>2){
				//alert($("#search_news").val());
				
				$.ajax({
					type: "post",
					url: "<?php echo SURL;?>users/search_owner",
					cache: false,				
					data:'search='+$("#search_news4").val(),
					
					success: function(response){
						$('#newsResult').html(response);
						}
				});
			//}
		});
    
    });
    </script>
    
     <script type="text/javascript">
      jQuery(document).ready(function() {
		
    	$("#catalog").keyup(function(){
			//if($("#catalog").val().length>2){
				//alert($("#search_news").val());
				
				$.ajax({
					type: "post",
					url: "<?php echo SURL;?>catalog/search_catalog",
					cache: false,				
					data:'search='+$("#catalog").val(),
					
					success: function(response){
						$('#newsResult').html(response);
						}
				});
			//}
		});
    
    });
	
	 jQuery(document).ready(function() {
		
    	$("#asssign_catalog").keyup(function(){
			//if($("#asssign_catalog").val().length>2){
				//alert($("#search_news").val());
				
				$.ajax({
					type: "post",
					url: "<?php echo SURL;?>catalog/search_assign_catalog",
					cache: false,				
					data:'search='+$("#asssign_catalog").val(),
					
					success: function(response){
						$('#newsResult').html(response);
						}
				});
			//}
		});
    
    });
	
	 jQuery(document).ready(function() {
		
    	$("#product").keyup(function(){
			//if($("#product").val().length>2){
				//alert($("#search_news").val());
				
				$.ajax({
					type: "post",
					url: "<?php echo SURL;?>product/search_product",
					cache: false,				
					data:'search='+$("#product").val(),
					
					success: function(response){
						$('#newsResult').html(response);
						}
				});
			//}
		});
    
    });
	
	jQuery(document).ready(function() {
		
    	$("#model").keyup(function(){
			//if($("#model").val().length>2){
				//alert($("#search_news").val());
				
				$.ajax({
					type: "post",
					url: "<?php echo SURL;?>product/search_size",
					cache: false,				
					data:'search='+$("#model").val(),
					
					success: function(response){
						$('#newsResult').html(response);
						}
				});
			//}
		});
    
    });
    </script>
    
    
    <script>
$(document).ready(function() {
	$(window).load(function() {
		
        $("#button").show();
		 $("#button1").hide();
       
    });
    $("#firm").click(function() {
        $("#button").show();
		 $("#button1").hide();
       
    });
	$("#individual").click(function() {
       $("#button").hide();
		 $("#button1").show();
       
    });
});

function view_firms(){


var str=$("#firm_name").val();

		if(window.XMLHttpRequest){
			
		// for chrome firefox safari opera IE7
 		xmlhttp= new XMLHttpRequest();
			
		}
		else{
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp.onreadystatechange= function(){
			
		if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
			{
		document.getElementById('pack').innerHTML= xmlhttp.responseText;
		$('select#sub_firm_name').zelect({  });
	   
	
			}
		}
		
		
	xmlhttp.open("GET","<?php echo base_url();?>catalog/get_firms?id="+str,true);
		xmlhttp.send();
		
		 

}


function view_firm(){


var str=$("#firm_name").val();

		if(window.XMLHttpRequest){
			
		// for chrome firefox safari opera IE7
 		xmlhttp= new XMLHttpRequest();
			
		}
		else{
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp.onreadystatechange= function(){
			
		if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
			{
		document.getElementById('pack').innerHTML= xmlhttp.responseText;
		$('select#sub_firm_name').zelect({ placeholder:'Please Select ' });
	   
	
			}
		}
		
		
	xmlhttp.open("GET","<?php echo base_url();?>catalog/get_firm?id="+str,true);
		xmlhttp.send();
		
		 

}

function view_data(){


var str=$("#product_name").val();

		if(window.XMLHttpRequest){
			
		// for chrome firefox safari opera IE7
 		xmlhttp= new XMLHttpRequest();
			
		}
		else{
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp.onreadystatechange= function(){
			
		if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
			{
		document.getElementById('pack1').innerHTML= xmlhttp.responseText;
		$('select#sizes').zelect({ placeholder:'Please Select ' });
	   
	
			}
		}
		
		
	xmlhttp.open("GET","<?php echo base_url();?>product/view_data?id="+str,true);
		xmlhttp.send();
		
		 

}

function next_data(){


var str=$("#sizes").val();
alert(str);
		if(window.XMLHttpRequest){
			
		// for chrome firefox safari opera IE7
 		xmlhttp= new XMLHttpRequest();
			
		}
		else{
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp.onreadystatechange= function(){
			
		if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
			{
		document.getElementById('pack2').innerHTML= xmlhttp.responseText;
		$('select#sample').zelect({ placeholder:'Please Select ' });
	   
	
			}
		}
		
		
	xmlhttp.open("GET","<?php echo base_url();?>product/next_data?id="+str,true);
		xmlhttp.send();
		
		 

}




</script>


<!-- END CORE TEMPLATE JS -->

</body>

</html>

