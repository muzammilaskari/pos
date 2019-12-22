$(document).ready(function() {

    $('input[type=radio][name=have_family]').change(function() {

		if (this.value == '1') {
			
            $('#addFamilyMemberForm').slideDown();
			
			$('#div_have_family').show();
			
			$('#div_dont_have_family').hide();
			
        }else if (this.value == '0') {

            $('#addFamilyMemberForm').slideUp();
			
			$('#div_dont_have_family').show();

			$('#div_have_family').hide();

        }

    });

	

	

	//Adding more family members

	$( "#addMoreMembers" ).click(function() {

	  	var numberOfMem = $('#numberOfMembers').val();

		numberOfMem = parseInt(numberOfMem);

		numberOfMem++;

		var str = '';

		var funcRem = "removedivs('div_"+numberOfMem+"')";

		str += '<hr /><div  id="div_'+numberOfMem+'"><div style="text-align:right;cursor:pointer;color:red;font-size:14px;"><span  onclick="'+funcRem+'">Remove[X]</span></div><div class="row form-group"><div class="col-md-6 col-sm-12 col-xs-12 contact_field_margin"><label>First Name </label><input type="text" required placeholder="First Name" name="family_data['+numberOfMem+'][firstName]" id="firstName'+numberOfMem+'" class="form-control"></div><div class="col-md-6 col-sm-12 col-xs-12"><label>Last Name </label><input type="text" required placeholder="Last Name" name="family_data['+numberOfMem+'][lastname]" id="lastname'+numberOfMem+'" class="form-control"></div></div>';

		

		str += '<div class="row form-group"><div class="col-md-6 col-sm-12 col-xs-12 contact_field_margin"><label>Gender </label><fieldset class="birthdayPicker">\
<select class="bigsel span2 classic" name="family_data['+numberOfMem+'][member_gender]" ><option value="0">Male</option><option value="1">Female</option></select></fieldset></div><div class="col-md-6 col-sm-12 col-xs-12"><label>Age </label><input type="text" required placeholder="Age" id="bed_type_'+numberOfMem+'" name="family_data['+numberOfMem+'][member_age]" class="form-control"></div></div>';

		

		

		str += '<div class="row form-group"><div class="col-md-12 col-sm-12 col-xs-12 contact_field_margin"><label>Relation </label><fieldset class="birthdayPicker">\
<select class="bigsel span2 classic" id="bathroom_type_'+numberOfMem+'" name="family_data['+numberOfMem+'][member_relation]"><option value="">Select</option><option value="Wife">Wife</option><option value="Son">Son</option><option value="Daughter">Daughter</option><option value="Brother">Brother</option><option value="Sister">Sister</option><option value="Cousin" >Cousin</option><option value="Husband" >Husband</option><option value="Other">Other</option></select></fieldset></div></div></div>';

		



		

		$('#moreFamilyMembers').append(str); 

		$('#numberOfMembers').val(numberOfMem);

	});
	
	//Adding more rooms

	$( "#AddMoreRooms" ).click(function(){

	  	var numberOfRooms = $('#numberOfRooms').val();

		numberOfRooms = parseInt(numberOfRooms);

		numberOfRooms++;

		var funcRem = "removeRoomdivs('div_"+numberOfRooms+"')";

		var str = '';

		str += '<div class=""  id="div_'+numberOfRooms+'"><hr>';

		str += '<div>';

		

		str += '<div style="text-align:right;cursor:pointer;color:red;font-size:14px;"><span  onclick="'+funcRem+'">Remove[X]</span></div><br />';

		str += '<div class="form-group">';
        str += '<div class="col-md-6 col-sm-12 col-xs-12 contact_field_margin">';
		
        str += ' <label>Bedroom Name </label>\
		<input type="text" required placeholder="Eg. Room 1 / Left Room" id="room_name_'+numberOfRooms+'" name="bedroom['+numberOfRooms+'][room_name]" class="form-control">\
                        </div>\
                        <div class="col-md-6 col-sm-12 col-xs-12">\
                            <label>Beds </label>\
						<div class=""><fieldset class="birthdayPicker">\
						 <select class="bigsel span2 classic" id="bed_type_'+numberOfRooms+'"  name="bedroom['+numberOfRooms+'][bed_type]">\
                                <option value="">Select</option>\
								<option value="49">Single bed</option>\
								<option value="50">Double bed</option>\
								<option value="134">Double bed/Two singles</option>\
                              </select></feildset></div>\
                        </div>\
						</div>';

		

		str += '<div class="row form-group" style="margin-left:0px;"><div class="col-md-8 col-sm-12 col-xs-12 ">\
                            <label>Upload Bedroom Picture</label><br>\
                        <div id="uploadDiv" class="pure-button fileContainer pull-left">\
                            <span>Upload file</span>	\
                            <input type="file"  name="room'+numberOfRooms+'" id="uploadInput'+numberOfRooms+'"   onchange="selectImage('+numberOfRooms+');"  />\
                        </div>\
						</div>';

						

						str += 	'<div class="col-md-4" ><div id="dvPreview'+numberOfRooms+'" class="profilepic"><img style="width: 80%;" src="http://birjobs.com/saystay/assets/images/bed.png"></div></div></div>';

						

		

		str += '<div class="row form-group" style="margin-left:0px;">\
                        <div class="col-md-6 col-sm-12 col-xs-12">\
                            <label>Bathroom Type </label>\
                              <div class="">\
							  <fieldset class="birthdayPicker">\
						 <select class="bigsel span2 classic" required  id="bathroom_type_'+numberOfRooms+'" name="bedroom['+numberOfRooms+'][bathroom_type]" >\
                                <option value="">Select</option>\
                               <option value="54" >Ensuite (within room)</option><option value="55" >Shared (with family)</option><option value="56" >Private (exclusive to guest)</option></select></fieldset>\
							   </div>\
                        </div>\
                    </div></div>';

					

		

						var func = "ischeckboxChecked("+numberOfRooms+")";

						var funcdatestart = "firstclick("+numberOfRooms+")";

						var funcdateend = "secondclick("+numberOfRooms+")";

						

						str += '<div class="row form-group" style="margin-left:20px;"><div class="col-md-12 col-sm-12 col-xs-12 contact_field_margin">\
											<div class="row">\
													 <div class="col-md-4">\
										<label class="checkbox" for="availability_'+numberOfRooms+'">\
														<input class="checkbox1 custom-checkbox" type="checkbox" value="'+numberOfRooms+'" name="availability_'+numberOfRooms+'" id="availability_'+numberOfRooms+'" data-toggle="checkbox" onchange="'+func+'">\
													<span class="icons"><span class="icon-unchecked"></span><span class="icon-checked"></span></span>   Room Availability\
													</label>\
										</div>\
										</div>';

						str += '<div id="div_checkbox_'+numberOfRooms+'" style="display:none;">\
											<div class="col-md-6 col-sm-12 col-xs-12 contact_field_margin">\
												<label>To </label>\
												<input type="text"   class="from_date form-control available_from" placeholder="Select start date" contenteditable="false" id="available_from_'+numberOfRooms+'" name="bedroom['+numberOfRooms+'][available_from]"   onclick="'+funcdatestart+'"  />\
											</div>\
											<div class="col-md-6 col-sm-12 col-xs-12">\
												<label>From </label>\
											  <input type="text" class="to_date form-control available_to" placeholder="Select end date" contenteditable="false" id="available_to_'+numberOfRooms+'" name="bedroom['+numberOfRooms+'][available_to]"   onclick="'+funcdateend+'"  />\
											</div>\
										</div>\
								   </div></div>';

								   

					str += '<div class="row form-group" >\
                        <div class="col-md-12 col-sm-12 col-xs-12 contact_field_margin">\
                            <label style="margin-left:15px;">Facilities </label>\
                            <div class="row" style="margin-left:20px;">\
                                     <div class="col-md-4">\
                     				<label class="checkbox" for="Desk-and-Lamp_'+numberOfRooms+'">\
                                        <input  class="custom-checkbox" type="checkbox" name="bedroom['+numberOfRooms+'][room_facility][]" value="Desk and Lamp" id="Desk-and-Lamp_'+numberOfRooms+'" data-toggle="checkbox">\
                                        		 <span class="icons"><span class="icon-unchecked"></span><span class="icon-checked"></span></span>Desk and Lamp\
                                    </label>\
                                    <label class="checkbox" for="Air-Conditioning_'+numberOfRooms+'">\
                                        <input class="checkbox1 custom-checkbox" type="checkbox" value="Air Conditioning"  name="bedroom['+numberOfRooms+'][room_facility][]"   id="Air-Conditioning_'+numberOfRooms+'" data-toggle="checkbox">\
                                        <span class="icons"><span class="icon-unchecked"></span><span class="icon-checked"></span></span>Air Conditioning\
                                    </label>\
                                    <label class="checkbox" for="Bedside-Locker-Nightstand_'+numberOfRooms+'">\
                                        <input class="checkbox1 custom-checkbox" type="checkbox" value="Bedside Locker / Nightstand"\  name="bedroom['+numberOfRooms+'][room_facility][]"   id="Bedside-Locker-Nightstand_'+numberOfRooms+'" data-toggle="checkbox">\
                                       <span class="icons"><span class="icon-unchecked"></span><span class="icon-checked"></span></span> Bedside Locker / Nightstand\
                                    </label>\
                                    <label class="checkbox" for="Dresser-Drawers_'+numberOfRooms+'">\
                                        <input class="checkbox1 custom-checkbox" type="checkbox" value="Dresser / Drawers"  name="bedroom['+numberOfRooms+'][room_facility][]" id="Dresser-Drawers_'+numberOfRooms+'" data-toggle="checkbox">\
                                     <span class="icons"><span class="icon-unchecked"></span><span class="icon-checked"></span></span>   Dresser / Drawers\
										</label>\
                                    <label class="checkbox" for="Carpet-Moquette_'+numberOfRooms+'">\
                                        <input class="checkbox1 custom-checkbox" type="checkbox" value="Carpet / Moquette"  name="bedroom['+numberOfRooms+'][room_facility][]" id="Carpet-Moquette_'+numberOfRooms+'" data-toggle="checkbox">\
                                     <span class="icons"><span class="icon-unchecked"></span><span class="icon-checked"></span></span>   Carpet / Moquette\
                                    </label>\
                 					</div>\
                                    <div class="col-md-4">\
                                    <label class="checkbox" for="Closet-Wardrobe_'+numberOfRooms+'">\
                                        <input class="checkbox1 custom-checkbox" type="checkbox" value="Closet / Wardrobe"  name="bedroom['+numberOfRooms+'][room_facility][]" id="Closet-Wardrobe_'+numberOfRooms+'" data-toggle="checkbox">\
                                    <span class="icons"><span class="icon-unchecked"></span><span class="icon-checked"></span></span>    Closet / Wardrobe\
                                    </label>\
                                    <label class="checkbox" for="Wheelchair-Accessible_'+numberOfRooms+'">\
                                        <input class="checkbox1 custom-checkbox" type="checkbox" value="Wheelchair Accessible"  name="bedroom['+numberOfRooms+'][room_facility][]" id="Wheelchair-Accessible_'+numberOfRooms+'" data-toggle="checkbox">\
                                    <span class="icons"><span class="icon-unchecked"></span><span class="icon-checked"></span></span>    Wheelchair Accessible\
                                    </label>\
                                    <label class="checkbox" for="Radio_'+numberOfRooms+'">\
                                        <input class="checkbox1 custom-checkbox" type="checkbox" value="Radio"  name="bedroom['+numberOfRooms+'][room_facility][]" id="Radio_'+numberOfRooms+'" data-toggle="checkbox">\
                                    <span class="icons"><span class="icon-unchecked"></span><span class="icon-checked"></span></span>    Radio\
                                    </label>\
                                    <label class="checkbox" for="TV_'+numberOfRooms+'">\
                                        <input class="checkbox1 custom-checkbox" type="checkbox" value="TV"  name="bedroom['+numberOfRooms+'][room_facility][]" id="TV_'+numberOfRooms+'" data-toggle="checkbox">\
                                   <span class="icons"><span class="icon-unchecked"></span><span class="icon-checked"></span></span>     TV\
                                    </label>\
                                    <label class="checkbox" for="Mirror_'+numberOfRooms+'">\
                                        <input class="checkbox1 custom-checkbox" type="checkbox" value="Mirror"  name="bedroom['+numberOfRooms+'][room_facility][]" id="Mirror_'+numberOfRooms+'" data-toggle="checkbox">\
                                   <span class="icons"><span class="icon-unchecked"></span><span class="icon-checked"></span></span>     Mirror\
                                    </label>\
                                </div>\
                                <div class="col-md-4">\
                                    <label class="checkbox" for="Hair-dryer_'+numberOfRooms+'">\
                                        <input class="checkbox1 custom-checkbox" type="checkbox" value="Hair-dryer"  name="bedroom['+numberOfRooms+'][room_facility][]" id="Hair-dryer_'+numberOfRooms+'" data-toggle="checkbox">\
                                  <span class="icons"><span class="icon-unchecked"></span><span class="icon-checked"></span></span>     Hair-dryer                                    </label>\
									<label class="checkbox" for="Insect-Screen'+numberOfRooms+'">\
                                        <input type="checkbox" value="Insect Screen"  name="bedroom['+numberOfRooms+'][room_facility][]" id="Insect-Screen'+numberOfRooms+'" data-toggle="checkbox" class="checkbox1 custom-checkbox" >\
                                       <span class="icons"><span class="icon-unchecked"></span><span class="icon-checked"></span></span> Insect Screen\
                                    </label>\
									 <label class="checkbox" for="Fan_'+numberOfRooms+'">\
                                        <input type="checkbox" value="Fan"  name="bedroom['+numberOfRooms+'][room_facility][]" id="Fan_'+numberOfRooms+'" data-toggle="checkbox" class="checkbox1 custom-checkbox" >\
                                        <span class="icons"><span class="icon-unchecked"></span><span class="icon-checked"></span></span> Fan\
                                    </label>\
									<label class="checkbox" for="Heater_'+numberOfRooms+'">\
                                        <input type="checkbox" value="Heater"  name="bedroom['+numberOfRooms+'][room_facility][]" id="Heater_'+numberOfRooms+'" data-toggle="checkbox" class="checkbox1 custom-checkbox" >\
                                       <span class="icons"><span class="icon-unchecked"></span><span class="icon-checked"></span></span> Heater\
                                    </label>\
                                </div>\
                            </div>\
         				</div>\
                    </div>\
					<div class="clear10"></div></div>';

		$('#moreFamilyMembers').append(str); 

		$('#numberOfRooms').val(numberOfRooms);

		

	});

	

	

	$( "#div_forget_pass" ).click(function() {

		$( "#div_login_form" ).toggle( );

		$( "#credits" ).toggle();

	});

	

	$( "#div_login" ).click(function() {

		$( "#div_login_form" ).toggle( );

		$( "#credits" ).toggle();

	});

	

	

	

	

});



function changeAction(val){

	window.location = val;

}//



function removedivs(id){

	$('#'+id).remove();

	var numberOfMem = $('#numberOfMembers').val();

	//alert(numberOfMem);

	$('#numberOfMembers').val( eval( parseInt(numberOfMem) - 1 ) );

}//



function removeRoomdivs(id){

	$('#'+id).remove();

	var numberOfMem = $('#numberOfRooms').val();

	//alert(numberOfMem);

	$('#numberOfRooms').val( eval( parseInt(numberOfMem) - 1 ) );

}//