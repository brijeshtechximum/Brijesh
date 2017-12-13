

$(document).ready(function(){
      $('#chky').click(function() {
        if ($(this).is(':checked')) {
			$('#chkybutton').removeAttr('disabled');
        } else {
            $('#chkybutton').attr('disabled', 'disabled');
        }
    });
});

$(document).ready(function(){

    $(".agree").click(function(){

        $(".agree i").css("color", "#ffffff");

    });

});

$(document).ready(function(){

    $(".generation").click(function(){

        $(".generation i").css("color", "#666666");

		$(".renewal i, .statesector i").css("color", "#ffffff");

		$(".generationthings, .generationthings #step-1").css("display", "block");

		$(".renewalthings, .statesectorthings, .statesector1things, .mainselection, .hideinstruction").css("display", "none");

    });

	$(".generation").mouseover(function(){

		$(".generation i").css({"color": "#666666", "transition": "0.4s"});

	});

	$(".generation").mouseout(function(){

		$(".generation i").css("color", "#ffffff");

	});
	$(".showgenerationthings").click(function(){
		$(".maingenerationthings, .maingenerationthings #step-1").css("display", "block");
		$(".generationthings, .generationthings ul.geninstruction1, .generationthings .generalcontain, .generationthings .btn").css({"height": "0px", "opacity": "0", "margin": "0px"});
	});

});

$(document).ready(function(){

    $(".renewal").click(function(){

        $(".renewal i").css("color", "#666666");

		$(".generation i, .statesector i").css("color", "#ffffff");

		$(".renewalthings, .renewalthings #renew-1").css("display", "block");

		$(".generationthings, .statesectorthings, .statesector1things, .mainselection, .hideinstruction").css("display", "none");

    });

	$(".renewal").mouseover(function(){

        $(".renewal i").css({"color": "#666666", "transition": "0.4s"});

	});

	$(".renewal").mouseout(function(){

        $(".renewal i").css("color", "#ffffff");

	});

});

$(document).ready(function(){

    $(".statesector").click(function(){

        $(".statesector i").css("color", "#666666");

		$(".generation i, .renewal i").css("color", "#ffffff");

		$(".statesectorthings, .statesectorthings #state-1").css("display", "block");

		$(".generationthings, .renewalthings, .statesector1things, .mainselection, .hideinstruction").css("display", "none");

    });

	$(".statesector").mouseover(function(){

        $(".statesector i").css({"color": "#666666", "transition": "0.4s"});

	});

	$(".statesector").mouseout(function(){

        $(".statesector i").css("color", "#ffffff");

	});

});

$(document).ready(function(){

    $(".statesector1").click(function(){

        $(".statesector1 i").css("color", "#666666");

		$("statesector i, .generation i, .renewal i").css("color", "#ffffff");

		$(".statesector1things, .statesector1things #ssgn_step-1").css("display", "block");

		$(".generationthings, .renewalthings, .statesectorthings, .mainselection, .hideinstruction").css("display", "none");

    });

	$(".statesector1").mouseover(function(){

        $(".statesector1 i").css({"color": "#666666", "transition": "0.4s"});

	});

	$(".statesector1").mouseout(function(){

        $(".statesector1 i").css("color", "#ffffff");

	});

});

$(window).resize(checkWidth);

    function checkWidth() {

    if ($(window).width() < 481) {

        $('.attach span span').html('<i class="fa fa-paperclip" aria-hidden="true"></i>');

    } 

    }

    $(window).resize(checkWidth);



$(document).ready(function() {

	var counter = $('.red').length;
	var add = 0;

	

    $("#adddirectordetails").click(function() {

    	

    	counter++;
		add++;

    	html = '<div class="directordiv red test1_'+counter+'">';

        html += '<div class="form-group col-md-6">';

        html += '<label>Full Name</label>';

        html += '<input required class="form-control" type="text" name="fullName[]" value="">';

        html += '</div>';

        html += '<div class="form-group col-md-6">';

        html += '<label>Date of Birth</label>';

        html += '<div class="attach">';

        html += '<input required type="text" class="span2 form-control birthDate" value="" id="dp4" placeholder="dd-mm-yyyy" name="birthDate[]">';

        html += '<span class="btn btn-primary btn-file attach-b"> <span><i class="fa fa-paperclip" aria-hidden="true"></i></span>';

        html += '<input type="file" name="birthdatefile'+add+'" >';

        html += '</span> </div>';

        html += '</div>';

        html += '<div class="form-group col-md-6">';

        html += '<label>Age</label>';

        html += '<input required class="form-control" type="number" name="age[]"  value="">';

        html += '</div>';

        html += '<div class="form-group col-md-6">'; 

        html += '<label>Address</label>';

        html += '<div class="attach">';

        html += '<input required class="form-control" type="text" name="address[]" value="">';

        html += '<span class="btn btn-primary btn-file attach-b"> <span><i class="fa fa-paperclip" aria-hidden="true"></i></span>';

        html += '<input type="file" name="addressfile'+add+'"  >';

        html += '</span> </div>';

        html += '</div>';

        html += '<div class="form-group col-md-6">';

        html += '<label>Qualification</label>';

        html += '<input required class="form-control" type="text" name="qualification[]"  value="">';

        html += '</div>';

        html += '<div class="form-group col-md-6">';

        html += '<label>PAN Number</label>';

        html += '<div class="attach">';

        html += '<input required class="form-control" type="text" name="pannumber[]" pattern="[a-zA-z]{5}\\d{4}[a-zA-Z]{1}" value="">';

        html += '<span class="btn btn-primary btn-file attach-b"> <span><i class="fa fa-paperclip" aria-hidden="true"></i></span>';

        html += '<input type="file" name="pan_numberfile'+add+'" >';

        html += '</span> </div>';

        html += '</div>';

        html += '<div class="form-group col-md-6">';

        html += '<label>DIN Number</label>';

        html += '<input required class="form-control" type="text" name="din_number[]"  value="">';

        html += '</div>';

        html += '<div class="form-group col-md-6">';

        html += '<label>Experience in power and other sectors</label>';

        html += '<input  required class="form-control" type="text" name="experience_power[]"  value="">';

        html += '</div>';

        html += '<div class="form-group col-md-6">';

        html += '<label>Nature</label>';

        html += '<input required class="form-control" type="text" name="nature[]" placeholder="Promoter/Independent/Professional/family member, etc."  value="">';

        html += '</div>';

        html += '<div class="form-group col-md-6">';

        html += '<label>Shareholding in the Company (%)</label>';

        html += '<input  required class="form-control" type="number" min="0" max="100"name="shareHolding[]"  value="" required>'; 

        html += '</div>';

        html += '<div class="form-group col-md-11">';

        html += '<label>Name of other Companies in which acting as Director and whether those companies are part of Promoter Group of Borrower</label>';

        html += '<input required class="form-control" type="text" name="name_of_company[]"  value="">'; 

        html += '</div>';

        html += '<div class="form-group col-md-1">';

        html += '<label>Remove</label>';

        html += '<div class="add-feild">';

        html += '<button type="button" class="btn btn-danger addsub" onclick="$(this).parent().parent().parent().remove()">X</button>';

        html += '</div></div></div>';

        

        html += '<script type="text\/javascript"> ';

        html += '$(document).ready(function(){ ';

		html += 'var date_input=$(\'.birthDate\'); ';

		html += 'var container=$(\'.bootstrap-iso form\').length>0 ? $(\'.bootstrap-iso form\').parent() : "body"; ';

		html += 'date_input.datepicker({ ';

		html += 'format: \'mm/dd/yyyy\', ';

		html += 'container: container, ';

		html += 'todayHighlight: true, ';

		html += 'autoclose: true, }) }); <\/script>';

		

		html += '<script type="text\/javascript"> ';

		html += 'var SITE = SITE || {}; ';

		

		html += 'SITE.fileInputs = function() { '; 

		html += 'var $this = $(this),';

		html += '$val = $this.val(),';

		html += 'valArray = $val.split(\'\\/\'), ';

		html += 'newVal = valArray[valArray.length-1], ';

		html += '$button = $this.siblings(\'span\'), ';

		html += '$location = $this.siblings(\'.file-name\'); ';

		html += 'if(newVal !== \'\') { ';

		html += '$button.text(\'\'); ';

		html += 'if($location.length === 0) { ';

		html += '$button.after(\'<span class="file-name">\' + newVal + \'</span>\'); ';

		html += '} else { ';

		html += '$location.text(newVal); } } }; ';

		

		html += '$(document).ready(function() { ';

		html += '$(\'.btn.btn-primary.btn-file input[type=file]\').bind(\'change focus click\', SITE.fileInputs); ';

		html += '}); ';

		html += '<\/script>';

		

		$("#directordetails").append(html);



    });

    

});

$(document).on('click', '#removeirector', function() {

    $(this).parent().parent().parent().remove();

});





function ShowHideNamea() {

        var chkYnamea = document.getElementById("chkYnamea");

        var dvNamea = document.getElementById("dvNamea");

        dvNamea.style.display = chkYnamea.checked ? "block" : "none";

    }

    

 function ShowHideHold() {

        var chkYhold = $("#chkYhold");

        var dvHold = $("#dvHold");

        chkYhold.is(':checked') ? dvHold.show() : dvHold.hide();

    }

       

$(document).ready(function() {

	var counter = $(".test").length;

    $("#addmorebank").click(function() {

		counter++;

		$("#insertbanktable").append("<div class='test test_"+counter+"'><div class='form-group col-md-3'><label>Name of Bank/FI</label><input type='text' class='form-control'  name='phase1_project_details[name_of_bank_FI][]' required></div><div class='form-group col-md-3'><label>Amount</label><input  type='number' required pattern='^\d+(?:\.\d{1,2})?$' step='0.01' class='form-control' name='phase1_project_details[name_of_bank_amount][]'></div><div class='form-group col-md-4'><label>Status</label><div class=''><label for='chkYsanction' class='radio-inline'><input type='radio' id='chkYsanction"+counter+"' name='phase1_project_details[name_of_bank_status"+counter+"]' value='Sanctioned' onclick='ShowHideSanction("+counter+")' checked />Sanctioned </label><label for='chkNsanction' class='radio-inline'><input type='radio' id='chkNsanction"+counter+"' name='phase1_project_details[name_of_bank_status"+counter+"]' onclick='ShowHideSanction("+counter+")' value='Applied'  />Applied </label><div class='attach pull-right' id='dvSanction"+counter+"' style='display: block'> <span class='btn btn-primary btn-file'> <span><i class='fa fa-paperclip' aria-hidden='true'></i></span><input type='file' id='txtSanction' name='name_of_bank_status_attach"+counter+"'><input type='hidden' id='txtSanction' name='name_of_bank_status_attachname"+counter+"'></span></div></div></div><div class='form-group col-md-1'><label>Remove</label><div class='add-feild'><button type='button' id='removebank' class='btn btn-danger addsub'>X</button></div></div></div>");

    });

});



$(document).on('click', '#removebank', function() {

    $(this).parent().parent().parent().remove();

});



$(document).ready(function() {

	var counter = $(".test1").length;

	$("#addmorebank1").click(function() {

    	counter++;

        $("#insertbanktable1").append("<div class='test1 test1_"+counter+"'><div class='form-group col-md-3'><label>Name of Bank/FI</label><input type='text' class='form-control' name='bank_name[]'  required></div><div class='form-group col-md-3'><label>Amount</label><input type='number' class='form-control' name='amnt[]' required></div><div class='form-group col-md-4'><label>Status</label><div class=''><label for='chkYsanction' class='radio-inline'><input value='Sanctioned' type='radio' id='chkY1sanction"+counter+"' name='chkSanction"+counter+"' onclick='ShowHideSanction1("+counter+")' checked />Sanctioned </label><label for='chkNsanction' class='radio-inline'><input type='radio' id='chkN1sanction"+counter+"' name='chkSanction"+counter+"' onclick='ShowHideSanction1("+counter+")'  value='Applied' />Applied </label><div class='attach pull-right' id='dv1Sanction"+counter+"' style='display: block'> <span class='btn btn-primary btn-file'> <span><i class='fa fa-paperclip' aria-hidden='true'></i></span><input type='file' id='txtSanction' name='sanction_file"+counter+"' value='0'></span></div></div></div><div class='form-group col-md-1'><label>Remove</label><div class='add-feild'><button type='button' id='removebank1' class='btn btn-danger addsub'>X</button></div></div></div>");

    });

    

});

$(document).on('click', '#removebank1', function() {

    $(this).parent().parent().parent().remove();

});





$(document).ready(function() {

	

    $("#addamtdtl").click(function() {

        $("#amtdetail").append("<div><div class='form-group col-md-4'><label>Name of The bank/FI</label><input type='text' class='form-control' required></div><div class='form-group col-md-3'><label>Loan amount(Rs. in Cr)</label><input type='text' class='form-control' required></div><div class='form-group col-md-4'><label>Date of Incorporation</label><div class='attach'><input type='text' class='form-control' required><span class='btn btn-primary btn-file attach-b'>Attach Sanction Letter<input type='file'></span></div></div><div class='form-group col-md-1'><label>Remove</label><div class='add-feild'><button type='button' id='removeamount' class='btn btn-danger addsub'>X</button></div></div></div>");

    });

    

});



$(document).on('click', '#removeamount', function() {

    $(this).parent().parent().parent().remove();

});





$(document).ready(function() {

	

    $("#addbiomasstype").click(function() {

        $("#biomasstype").append("<div class='biotypediv'><div class='form-group col-md-5'><label>Type</label><input type='text' class='form-control' name='biomass_type[]' required></div><div class='form-group col-md-5'><label>Quantity (Tons / yr) </label><input type='text' class='form-control' name='qty_tons_yr[]' required></div><div class='form-group col-md-2 text-center'><label>Remove</label><div class='add-feild'><button type='button' id='removetype' class='btn btn-danger addsub'>X</button></div></div></div>");

    });

    

});

$(document).on('click', '#removetype', function() {

    $(this).parent().parent().parent().remove();

});







$(document).ready(function() {

	

    $("#addteammember").click(function() {

        $("#teammember ul").append("<li><div class='teamdiv'><div class='form-group col-md-11'><label>Team Member</label><input type='text' class='form-control' name='project_management_team_member[]' required></div><div class='form-group col-md-1'><label>Remove</label><div class='add-feild'><button type='button' id='removemember' class='btn btn-danger addsub'>X</button></div></div></div></li>");

    });

    

});

$(document).on('click', '#removemember', function() {

    $(this).parent().parent().parent().parent().remove();

});





$(document).ready(function() {

	

    $("#addteammember1").click(function() {

        $("#teammember1 ul").append("<li><div class='teamdiv'><div class='form-group col-md-11'><label>Team Member</label><input type='text' class='form-control' name='team_member[]' required></div><div class='form-group col-md-1'><label>Remove</label><div class='add-feild'><button type='button' id='removemember1' class='btn btn-danger addsub'>X</button></div></div></div></li>");

    });

    

});

$(document).on('click', '#removemember1', function() {

    $(this).parent().parent().parent().parent().remove();

});





$(document).ready(function() {

	

    $("#addborrowerdirector").click(function() {

        $("#borrowerdirector ul").append("<li><div class='dvborrowerdirector'><div class='form-group col-md-11'><label>Director</label><input type='text' class='form-control' name='gn_b[directors][]' required></div><div class='form-group col-md-1'><label>Remove</label><div class='add-feild'><button type='button' id='removeborrowerdirector' class='btn btn-danger addsub'>X</button></div></div></div></li>");

    });

    

});

$(document).on('click', '#removeborrowerdirector', function() {

    $(this).parent().parent().parent().parent().remove();

});





$(document).ready(function() {

	

    $("#addborrowerdirector1").click(function() {

        $("#borrowerdirector1 ul").append("<li><div class='dvborrowerdirector'><div class='form-group col-md-11'><label>Director</label><input type='text' class='form-control' name='directors[]' required></div><div class='form-group col-md-1'><label>Remove</label><div class='add-feild'><button type='button' id='removeborrowerdirector1' class='btn btn-danger addsub'>X</button></div></div></div></li>");

    });

    

});

$(document).on('click', '#removeborrowerdirector1', function() {

    $(this).parent().parent().parent().parent().remove();

});



$(document).ready(function() {

	

    $("#addpromotersdetails").click(function() {

        $("#promotersdetails").append("<div class='promotersdiv'><div class='form-group col-md-6'><label>Name of The Promoters of Borrower</label><input class='form-control' type='text' name='gn_b1[borrower_promoters_name][]' required></div><div class='form-group col-md-6'><label>% Shareholding of Promoter  </label><input class='form-control' type='number' required min='0' max='100' step='0.01'  name='gn_b1[shareholding_promoter][]'></div><div class='form-group col-md-6'><label>Phone No.</label><input class='form-control' type='text' maxlength='10' required name='gn_b1[phn_no][]' step='0.01' ></div><div class='form-group col-md-6'><label>Email</label><input class='form-control' required type='email' name='gn_b1[email][]'></div><div class='form-group col-md-11'><label>Address(Address of the Promoter) </label><input class='form-control' type='text' name='gn_b1[address][]' required></div><div class='form-group col-md-1'><label>Remove</label><div class='add-feild'><button type='button' id='removepromoter' class='btn btn-danger addsub'>X</button></div></div></div>");

    });

    

});

$(document).on('click', '#removepromoter', function() {

    $(this).parent().parent().parent().remove();

});





$(document).ready(function() {

	

    $("#addpromotersdetails1").click(function() {

        $("#promotersdetails1").append("<div class='promotersdiv'><div class='form-group col-md-6'><label>Name of The Promoters of Borrower</label><input class='form-control' type='text' name='promoter_name[]' required></div><div class='form-group col-md-6'><label>% Shareholding of Promoter  </label><input class='form-control' type='text' min='0' max='100' name='promoter_shareholding[]' required ></div><div class='form-group col-md-6'><label>Phone No.</label><input class='form-control' type='text' required  maxlength=10  step='0.01'  name='promoter_phn[]'></div><div class='form-group col-md-6'><label>Email</label><input class='form-control' type='email' name='promoter_email[]' required></div><div class='form-group col-md-11'><label>Address(Address of the Promoter) </label><input class='form-control' type='text' name='promoter_add[]' required></div><div class='form-group col-md-1'><label>Remove</label><div class='add-feild'><button type='button' id='removepromoter1' class='btn btn-danger addsub'>X</button></div></div></div>");

    });

    

});

$(document).on('click', '#removepromoter1', function() {

    $(this).parent().parent().parent().remove();

});



    function ShowHideValue() {

        var chkYes = document.getElementById("chkYes");

        var dvName = document.getElementById("dvName");

        dvName.style.display = chkYes.checked ? "block" : "none";

    }



    function ShowHideDiv() {

        var chkYo = document.getElementById("chkYo");

        var dvRel = document.getElementById("dvRel");

        dvRel.style.display = chkYo.checked ? "block" : "none";

    }

    

    function ShowHideHold() {

        var chkHold = document.getElementById("chkYhold");

        var dvHold = document.getElementById("dvHold");

        dvHold.style.display = chkHold.checked ? "block" : "none";

    }



    function ShowHideShare() {

        var chkYshare = document.getElementById("chkYshare");

        var dvShare = document.getElementById("dvShare");

        dvShare.style.display = chkYshare.checked ? "block" : "none";

    }
	

	

	function ShowHideShare1() {

        var chkYshare1 = document.getElementById("chkYshare1");

        var dvShare1 = document.getElementById("dvShare1");

        dvShare1.style.display = chkYshare1.checked ? "block" : "none";

    }

    

    function ShowHideSanction(id) {

    	var chkYsanction = $("#chkYsanction"+id);

        var dvSanction = $("#dvSanction"+id);

        //alert(chkYsanction);

        //alert(dvSanction);

         dvSanction.css('display', chkYsanction.is(":checked") ? "block" : "none");

    }

    

    function ShowHideSanction1(id) {

    	var chkYsanction = $("#chkY1sanction"+id);

        var dvSanction = $("#dv1Sanction"+id);

        dvSanction.css('display', chkYsanction.is(":checked") ? "block" : "none");

    }

    

	function ShowHideWater() {

        var chkYwater = document.getElementById("chkYwater");

        var dvWater = document.getElementById("dvWater");

        dvWater.style.display = chkYwater.checked ? "block" : "none";

    }

    
    function ShowHideMou1() {

        var chkYmou = document.getElementById("chkYmou");

        var dvmou = document.getElementById("dvmou");

        dvmou.style.display = chkYmou.checked ? "block" : "none";

    }

    function ShowHideUtility1() {

        var chkYutility = document.getElementById("chkYutility");

        var dvUtility = document.getElementById("dvUtility");

        dvUtility.style.display = chkYutility.checked ? "block" : "none";
 
    }



	function ShowHideWater1() {

        var chkYwater1 = document.getElementById("chkYwater1");

        var dvWater1 = document.getElementById("dvWater1");

        dvWater1.style.display = chkYwater1.checked ? "block" : "none";

    }



	function ShowHideEvs() {

        var chkYevs = document.getElementById("chkYevs");

        var dvEvs = document.getElementById("dvEvs");

        dvEvs.style.display = chkYevs.checked ? "block" : "none";

    }

	

	function ShowHideEvs1() {

        var chkYevs1 = document.getElementById("chkYevs1");

        var dvEvs1 = document.getElementById("dvEvs1");

        dvEvs1.style.display = chkYevs1.checked ? "block" : "none";

    }

	

	function ShowHideForest() {

        var chkYforest = document.getElementById("chkYforest");

        var dvForest = document.getElementById("dvForest");

        dvForest.style.display = chkYforest.checked ? "block" : "none";

    }

	

	function ShowHideForest1() {

        var chkYforest1 = document.getElementById("chkYforest1");

        var dvForest1 = document.getElementById("dvForest1");

        dvForest1.style.display = chkYforest1.checked ? "block" : "none";

    }

	

	function ShowHideEvacuation() {

        var chkYevacuation = document.getElementById("chkYevacuation");

        var dvEvacuation = document.getElementById("dvEvacuation");

        dvEvacuation.style.display = chkYevacuation.checked ? "block" : "none";

    }

	

	function ShowHideEvacuation1() {

        var chkYevacuation1 = document.getElementById("chkYevacuation1");

        var dvEvacuation1 = document.getElementById("dvEvacuation1");

        dvEvacuation1.style.display = chkYevacuation1.checked ? "block" : "none";

    }

	

	function ShowHideCivil() {

        var chkYcivil = document.getElementById("chkYcivil");

        var dvCivil = document.getElementById("dvCivil");

        dvCivil.style.display = chkYcivil.checked ? "block" : "none";

    }
	
	function ShowHidePPA() {

        var chkYppa = document.getElementById("chkYppa");

        var dvppa = document.getElementById("dvppa");

        dvppa.style.display = chkYppa.checked ? "block" : "none";

    }

	

	function ShowHideCivil1() {

        var chkYcivil1 = document.getElementById("chkYcivil1");

        var dvCivil1 = document.getElementById("dvCivil1");

        dvCivil1.style.display = chkYcivil1.checked ? "block" : "none";

    }

	

	function ShowHideAvailability() {

        var chkNavailability = document.getElementById("chkNavailability");

        var dvAvailability = document.getElementById("dvAvailability");

        dvAvailability.style.display = chkNavailability.checked ? "block" : "none";

    }

	function ShowHideRnwprotyp() {

        var chkRnwprotyp = document.getElementById("chkRnwprotyp");

        var dvRnwprotyp = document.getElementById("dvRnwprotyp");

        dvRnwprotyp.style.display = chkRnwprotyp.checked ? "block" : "none";

    }

	function ShowHideGenprotyp() {

        var chkGenprotyp = document.getElementById("chkGenprotyp");

        var dvGenprotyp = document.getElementById("dvGenprotyp");

        dvGenprotyp.style.display = chkGenprotyp.checked ? "block" : "none";

    }

	function ShowHidePowersale() {

        var chkPowersale = document.getElementById("chkPowersale");

        var dvPowersale = document.getElementById("dvPowersale");

        dvPowersale.style.display = chkPowersale.checked ? "block" : "none";

    }

	function ShowHidePowersale1() {

        var chkPowersale1 = document.getElementById("chkPowersale1");

        var dvPowersale1 = document.getElementById("dvPowersale1");

        dvPowersale1.style.display = chkPowersale1.checked ? "block" : "none";

    }

	function ShowHideBiomass() {

        var chkYbiomass = document.getElementById("chkYbiomass");

        var dvBiomass = document.getElementById("dvBiomass");

        dvBiomass.style.display = chkYbiomass.checked ? "block" : "none";

    }

	function ShowHideSolorpv() {

        var chkYsolorpv = document.getElementById("chkYsolorpv");

        var dvSolorpv = document.getElementById("dvSolorpv");

        dvSolorpv.style.display = chkYsolorpv.checked ? "block" : "none";

    }

	function ShowHideSiie() {

        var chkYsiie = document.getElementById("chkYsiie");

        var dvSiie = document.getElementById("dvSiie");

        dvSiie.style.display = chkYsiie.checked ? "block" : "none";

    }

	

	function admSelectCheck(nameSelect)

	{

    //console.log(nameSelect);

    if(nameSelect){

        admOptionValue = document.getElementById("admOption").value;

        if(admOptionValue == nameSelect.value){

            document.getElementById("admDivCheck").style.display = "block";

        }

        else{

            document.getElementById("admDivCheck").style.display = "none";

        }

    }

    else{

        document.getElementById("admDivCheck").style.display = "none";

    }

}



$(document).ready(function(){

	$("#chkNsiie").click(function(){

		$("#showIE").css("display", "block");

		$("#admDivCheck").css("display", "none");

	});

	$("#chkYsiie").click(function(){

		$("#showIE, #dvSiieO").css("display", "none");

	});

	$("#chkOsiie").click(function(){

		$("#dvSiieO").css("display", "block");

		$("#showIE").css("display", "none");

		$("#admDivCheck, #dvSiie").css("display", "none");

	});

});



$(document).ready(function(){

$("#chkNsiie, #chkOsiie").on("click", function () {

    $("#SIIE option").prop("selected", function() {

        return this.defaultSelected;

    });

});

});

$(document).ready(function() {
    $("#AftChngAddProPlus").click(function() {
        $(".AftChngAddPro").append("<div><div class='form-group col-md-6'><label>a) Name of Project</label><input type='text' name='project_name_directors[]' class='form-control'></div><div class='form-group col-md-6'><label>b) Type of Project</label><input type='text' name='project_type_directors[]' class='form-control'></div><div class='form-group col-md-4'><label>c) Date of sanction</label><input type='date' name='date_sanction_directors[]' class='span2 form-control dp5' value='' placeholder='dd-mm-yyyy' ></div><div class='form-group col-md-4'><label>d) Amount (Rs. in Crore)</label><input type='number'  name='amount_rs_directors[]' class='form-control'></div><div class='form-group col-md-4'><label>e) Loan amount outstanding (Rs. in Crore)</label><input type='number' name='loan_amount_directors[]' class='form-control'></div><div class='form-group col-md-1 col-md-offset-11'><label>Remove</label><div class='add-feild'><button type='button' class='btn btn-danger addsub' id='AftChngAddProMinus'>X</button></div></div></div>");
    });
    
}); 

$(document).on('click', '#AftChngAddProMinus', function() {
    $(this).parent().parent().parent().remove();
});



$('input[name=chkAClitigation]').click(function () {
	
    if (this.id == "chkYAClitigation") {
        $("#dvAClitigation").show();
    } else {
        $("#dvAClitigation").hide();
    }
});
$('input[name=chkAClitigation]').click(function () {
    if (this.id == "chkNAClitigation") {
        $("#dvAClitigation1").show();
    } else {
        $("#dvAClitigation1").hide();
    }
});

$('input[name=chkAC28b]').click(function () {

    if (this.id == "chkYAC28b") {
        $(".dvAC28b").show();
    } else {
        $(".dvAC28b").hide();
    }
});



$(document).ready(function() {
	
    $("#addtideup").click(function() {
        $("#tideupcontains").append("<div class='tiedupholds'><div class='form-group col-md-4'><label>Date of PPA</label><input required type='date' class='span2 form-control' name='project_details[date_of_ppa][]' placeholder='dd-mm-yyyy'></div><div class='form-group col-md-4'><label>Utility/Discom</label><input required type='text' class='form-control' name='project_details[utility_discom][]'></div><div class='form-group col-md-4'><label>Capacity</label><input required type='number' class='form-control' name='project_details[ppa_capacity][]'></div><div class='form-group col-md-4'><label>Tariff</label><input required type='text' class='form-control' name='project_details[ppa_tariff][]'></div><div class='form-group col-md-4'><label>MoU/Case-I</label><input required type='text' class='form-control' name='project_details[ppa_mou_case_1][]'></div><div class='form-group col-md-1'><label>Remove</label><div class='add-feild'><button type='button' id='removetideup' class='btn btn-danger addsub'>X</button></div></div><div class='clearfix'></div><hr></div>");
    });
    
});

$(document).on('click', '#removetideup', function() {
    $(this).parent().parent().parent().remove();
});

$(document).ready(function() {
	
    $("#addtideup1").click(function() {
        $("#tideupcontains1").append("<div class='tiedupholds1'><div class='form-group col-md-4'><label>Date of PPA</label><input required type='text' class='span2 form-control dp12' name='phase1_project_details[date_of_ppa][]' placeholder='dd-mm-yyyy'></div><div class='form-group col-md-4'><label>Utility/Discom</label><input required type='text' class='form-control' name='phase1_project_details[utility_discom][]'></div><div class='form-group col-md-4'><label>Capacity</label><input required type='number' class='form-control' name='phase1_project_details[ppa_capacity][]'></div><div class='form-group col-md-4'><label>Tariff</label><input required type='text' class='form-control' name='phase1_project_details[ppa_tariff][]'></div><div class='form-group col-md-4'><label>MoU/Case-I</label><input required type='text' class='form-control' name='phase1_project_details[ppa_mou_case_1][]'></div><div class='form-group col-md-1'><label>Remove</label><div class='add-feild'><button type='button' id='removetideup1' class='btn btn-danger addsub'>X</button></div></div><div class='clearfix'></div><hr></div>");
    });
    
});




$(document).on('click', '#removetideup1', function() { 
    $(this).parent().parent().parent().remove();
});

$(document).ready(function() {
	
    $("#addyettideup").click(function() {
        $("#yettideupcontainer").append("<div class='yettideupholds'><div class='form-group col-md-4'><label>Capacity</label><input required type='number' class='form-control' name='project_details1[yet_tied_capacity][]'></div><div class='form-group col-md-4'><label>Proposed through</label><input required type='text' class='form-control' name='project_details1[yet_tied_proposed_through][]'></div><div class='form-group col-md-4'><label>Expected Tariff</label><input required type='text' class='form-control' name='project_details1[yet_tied_expected_tariff][]'></div><div class='form-group col-md-4'><label>Details of bidding participated</label><input required type='text' class='form-control' name='project_details1[yet_tied_detail_bidding_participated][]'></div><div class='form-group col-md-1'><label>Remove</label><div class='add-feild'><button type='button' id='removeyettideup' class='btn btn-danger addsub'>X</button></div></div><div class='clearfix'></div><hr></div>");
    });
    
});
$(document).on('click', '#removeyettideup', function() {
    $(this).parent().parent().parent().remove();
});


$(document).ready(function() {
	
    $("#addyettideup1").click(function() {
        $("#yettideupcontainer1").append("<div class='yettideupholds1'><div class='form-group col-md-4'><label>Capacity</label><input required type='number' class='form-control' name='project_details1[yet_tied_capacity][]'></div><div class='form-group col-md-4'><label>Proposed through</label><input required type='text' class='form-control' name='project_details1[yet_tied_proposed_through][]'></div><div class='form-group col-md-4'><label>Expected Tariff</label><input required type='text' class='form-control' name='project_details1[yet_tied_expected_tariff][]'></div><div class='form-group col-md-4'><label>Details of bidding participated</label><input required type='text' class='form-control' name='project_details1[yet_tied_detail_bidding_participated][]'></div><div class='form-group col-md-1'><label>Remove</label><div class='add-feild'><button type='button' id='removeyettideup1' class='btn btn-danger addsub'>X</button></div></div><div class='clearfix'></div><hr></div>");
    });
    
});
$(document).on('click', '#removeyettideup1', function() {
    $(this).parent().parent().parent().remove();
}); 

