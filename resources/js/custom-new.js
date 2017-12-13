$(document).ready(function () {
$('.stepwizard-row .stepwizard-step:first-child a').removeClass('disabled');

  var navListItems = $('div.setup-panel div a'),
          allWells = $('.setup-content'),
          allNextBtn = $('.nextBtn'),
  		  allPrevBtn = $('.prevBtn');

  allWells.hide();

  navListItems.click(function (e) {
      e.preventDefault();
      var $target = $($(this).attr('href')),
              $item = $(this);

      if (!$item.hasClass('disabled')) {
          navListItems.removeClass('btn-primary').addClass('btn-default');
          $item.addClass('btn-primary');
          allWells.hide();
          $target.show();
          $target.find('input:eq(0)').focus();
      }
  });
  
  allPrevBtn.click(function(){
      var curStep = $(this).closest(".setup-content"),
          curStepBtn = curStep.attr("id"),
          prevStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().prev().children("a");

          prevStepWizard.removeAttr('disabled').trigger('click');
  });

  allNextBtn.click(function(){
      var curStep = $(this).closest(".setup-content"),
          curStepBtn = curStep.attr("id"),
          nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
          curInputs = curStep.find("input[type='text'],input[type='url']"),
          isValid = true;

      $(".form-group").removeClass("has-error");
      for(var i=0; i<curInputs.length; i++){
          if (!curInputs[i].validity.valid){
              isValid = false;
              $(curInputs[i]).closest(".form-group").addClass("has-error");
          }
      }

      if (isValid)
          nextStepWizard.removeAttr('disabled').trigger('click');
  });

  $('div.setup-panel div a.btn-primary').trigger('click');
});

function ShowHideDetailedPro() { 

        var chkYDetailedPro = document.getElementById("chkYDetailedPro");

        var dvDetailedPro = document.getElementById("dvDetailedPro");

        dvDetailedPro.style.display = chkYDetailedPro.checked ? "block" : "none";

}

function ShowHidecompanyAct() { 

        var chkYcompanyAct = document.getElementById("chkYcompanyAct");

        var dvcompanyAct = document.getElementById("dvcompanyAct");

        dvcompanyAct.style.display = chkYcompanyAct.checked ? "block" : "none";

}

function ShowHideAudited() { 

        var chkYAudited = document.getElementById("chkYAudited");

        var dvAudited = document.getElementById("dvAudited");

        dvAudited.style.display = chkYAudited.checked ? "block" : "none";

} 
function ShowHideImpMachinery() {   

        var chkYImpMachinery = document.getElementById("chkYImpMachinery");

        var dvImpMachinery = document.getElementById("dvImpMachinery");

        dvImpMachinery.style.display = chkYImpMachinery.checked ? "block" : "none";

} 

function ShowHideallotment() { 

        var chkYallotment = document.getElementById("chkYallotment");

        var dvAllotment = document.getElementById("dvAllotment");

        dvAllotment.style.display = chkYallotment.checked ? "block" : "none";

} 

function ShowHideStateGovt() { 

        var chkYStateGovt = document.getElementById("chkYStateGovt");

        var dvStateGovt = document.getElementById("dvStateGovt");

        dvStateGovt.style.display = chkYStateGovt.checked ? "block" : "none";

} 

function ShowHideundertake() { 

        var chkYundertake = document.getElementById("chkYundertake");

        var dvundertake = document.getElementById("dvundertake");

        dvundertake.style.display = chkYundertake.checked ? "block" : "none";

} 

function ShowHideGeological() { 

        var chkYgeological = document.getElementById("chkYgeological");

        var dvgeological = document.getElementById("dvgeological");

        dvgeological.style.display = chkYgeological.checked ? "block" : "none";

} 

function ShowHideEPCcontracts() {   

        var chkYEPCcontracts = document.getElementById("chkYEPCcontracts");

        var dvEPCcontracts = document.getElementById("dvEPCcontracts");

        dvEPCcontracts.style.display = chkYEPCcontracts.checked ? "block" : "none";

} 

function ShowHideTransmission() {   

        var chkYTransmission = document.getElementById("chkYTransmission");

        var dvTransmission = document.getElementById("dvTransmission");

        dvTransmission.style.display = chkYTransmission.checked ? "block" : "none";
 
}   

function ShowHidePhysical() {  

        var chkYphysical = document.getElementById("chkYphysical");

        var dvphysical = document.getElementById("dvphysical");

        dvphysical.style.display = chkYphysical.checked ? "block" : "none";
 
}   

function ShowHidePowerAgreement() {   

        var chkYPowerAgreement = document.getElementById("chkYPowerAgreement");

        var dvPowerAgreement = document.getElementById("dvPowerAgreement");

        dvPowerAgreement.style.display = chkYPowerAgreement.checked ? "block" : "none";
 
}   

function ShowHideStatusNecessary() {   

        var chkYStatusNecessary = document.getElementById("chkYStatusNecessary");

        var dvStatusNecessary = document.getElementById("dvStatusNecessary");

        dvStatusNecessary.style.display = chkYStatusNecessary.checked ? "block" : "none";
 
} 

function ShowHideLandAcquisition() {   

        var chkYLandAcquisition = document.getElementById("chkYLandAcquisition");

        var dvLandAcquisition = document.getElementById("dvLandAcquisition");

        dvLandAcquisition.style.display = chkYLandAcquisition.checked ? "block" : "none";
 
}

function ShowHideEarlierLoan() {   

        var chkYEarlierLoan = document.getElementById("chkYEarlierLoan");

        var dvEarlierLoan = document.getElementById("dvEarlierLoan");

        dvEarlierLoan.style.display = chkYEarlierLoan.checked ? "block" : "none";
 
} 

function ShowHidemobilization() {   

        var chkYmobilization = document.getElementById("chkYmobilization");

        var dvmobilization = document.getElementById("dvmobilization");

        dvmobilization.style.display = chkYmobilization.checked ? "block" : "none";
 
} 

function ShowHideRelevantDocument() {   

        var chkYRelevantDocument = document.getElementById("chkYRelevantDocument");

        var dvRelevantDocument = document.getElementById("dvRelevantDocument");

        dvRelevantDocument.style.display = chkYRelevantDocument.checked ? "block" : "none";
 
}

function ShowHideEnvironment() {   

        var chkYEnvironment = document.getElementById("chkYEnvironment");

        var dvEnvironment = document.getElementById("dvEnvironment");

        dvEnvironment.style.display = chkYEnvironment.checked ? "block" : "none";
 
}  

function ShowHideSocioEconomic() {   

        var chkYSocioEconomic = document.getElementById("chkYSocioEconomic");

        var dvSocioEconomic = document.getElementById("dvSocioEconomic");

        dvSocioEconomic.style.display = chkYSocioEconomic.checked ? "block" : "none"; 
 
}  

function ShowHideApplicableSubsidy() {   

        var chkYApplicableSubsidy = document.getElementById("chkYApplicableSubsidy");

        var dvApplicableSubsidy = document.getElementById("dvApplicableSubsidy");

        dvApplicableSubsidy.style.display = chkYApplicableSubsidy.checked ? "block" : "none"; 
 
}

function ShowHideRiskManagement() {    

        var chkYRiskManagement = document.getElementById("chkYRiskManagement");

        var dvRiskManagement = document.getElementById("dvRiskManagement");

        dvRiskManagement.style.display = chkYRiskManagement.checked ? "block" : "none"; 
 
}

function ShowHidePollutionxyz() {

        var chkYPollutionxyz = document.getElementById("chkYPollutionxyz");

        var dvPollutionxyz = document.getElementById("dvPollutionxyz");

        dvPollutionxyz.style.display = chkYPollutionxyz.checked ? "block" : "none";

    }
	
	function ShowHideWaterxyz() {

        var chkYwaterxyz = document.getElementById("chkYwaterxyz");

        var dvWaterxyz = document.getElementById("dvWaterxyz");

        dvWaterxyz.style.display = chkYwaterxyz.checked ? "block" : "none";

    }
	
	function ShowHideEvsxyz() {

        var chkYevsxyz = document.getElementById("chkYevsxyz");

        var dvEvsxyz = document.getElementById("dvEvsxyz");

        dvEvsxyz.style.display = chkYevsxyz.checked ? "block" : "none";

    }
	
	function ShowHideForestxyz() {

        var chkYforestxyz = document.getElementById("chkYforestxyz");

        var dvForestxyz = document.getElementById("dvForestxyz");

        dvForestxyz.style.display = chkYforestxyz.checked ? "block" : "none";

    }
	
	function ShowHideEvacuationxyz() {

        var chkYevacuationxyz = document.getElementById("chkYevacuationxyz");

        var dvEvacuationxyz = document.getElementById("dvEvacuationxyz");

        dvEvacuationxyz.style.display = chkYevacuationxyz.checked ? "block" : "none";

    }
	
	function ShowHideCivilxyz() {

        var chkYcivilxyz = document.getElementById("chkYcivilxyz");

        var dvCivilxyz = document.getElementById("dvCivilxyz");

        dvCivilxyz.style.display = chkYcivilxyz.checked ? "block" : "none";

    }
	
	function ShowHideGenprotyp() {

        var chkGenprotyp2 = document.getElementById("chkGenprotyp2");

        var dvGenprotyp2 = document.getElementById("dvGenprotyp2");

        dvGenprotyp2.style.display = chkGenprotyp2.checked ? "block" : "none";

    }
	
$(document).ready(function() {

	

    $("#addborrowerdirector2").click(function() {

        $("#borrowerdirector2 ul").append("<li><div class='dvborrowerdirector'><div class='form-group col-md-11'><label>Director</label><input type='text' class='form-control' name='ss_gn_b[directors][]' required></div><div class='form-group col-md-1'><label>Remove</label><div class='add-feild'><button type='button' id='removeborrowerdirector2' class='btn btn-danger addsub'>X</button></div></div></div></li>");

    });

    

});

$(document).on('click', '#removeborrowerdirector2', function() {

    $(this).parent().parent().parent().parent().remove();

});

$(document).ready(function() {

	

    $("#addpromotersdetails2").click(function() {

        $("#promotersdetails2").append("<div class='promotersdiv'><div class='form-group col-md-6'><label>Name of The Promoters of Borrower</label><input class='form-control' type='text' name='ss_gn_b1[borrower_promoters_name][]' required></div><div class='form-group col-md-6'><label>% Shareholding of Promoter  </label><input class='form-control' min='0' max='100' type='number' required step='0.01'  name='ss_gn_b1[shareholding_promoter][]'></div><div class='form-group col-md-6'><label>Phone No.</label><input class='form-control' type='text' required name='ss_gn_b1[phn_no][]' pattern='[789][0-9]{9}' step='0.01' ></div><div class='form-group col-md-6'><label>Email</label><input class='form-control' type='email' name='ss_gn_b1[email][]'></div><div class='form-group col-md-11'><label>Address(Address of the Promoter) </label><input class='form-control' type='text' name='ss_gn_b1[address][]' required></div><div class='form-group col-md-1'><label>Remove</label><div class='add-feild'><button type='button' id='removepromoter2' class='btn btn-danger addsub'>X</button></div></div></div>");

    });

    

});

$(document).on('click', '#removepromoter2', function() {

    $(this).parent().parent().parent().remove();

});


$(document).ready(function() {

	var counter = $(".test").length;

    $("#addmorebank2").click(function() {

		counter++;

		

		$("#insertbanktable2").append("<div class='test test_"+counter+"'><div class='form-group col-md-3'><label>Name of Bank/FI</label><input type='text' class='form-control'  name='ss_phase1_project_details[name_of_bank_FI][]' required></div><div class='form-group col-md-3'><label>Amount</label><input  type='number' required pattern='^\d+(?:\.\d{1,2})?$' step='0.01' class='form-control' name='ss_phase1_project_details[name_of_bank_amount][]'></div><div class='form-group col-md-4'><label>Status</label><div class=''><label for='chkYsanction' class='radio-inline'><input type='radio' id='chkYsanction"+counter+"' name='ss_phase1_project_details[name_of_bank_status"+counter+"]' value='Sanctioned' onclick='ShowHideSanction("+counter+")' checked />Sanctioned </label><label for='chkNsanction' class='radio-inline'><input type='radio' id='chkNsanction"+counter+"' name='ss_phase1_project_details[name_of_bank_status"+counter+"]' onclick='ShowHideSanction("+counter+")' value='Applied'  />Applied </label><div class='attach pull-right' id='dvSanction"+counter+"' style='display: block'> <span class='btn btn-primary btn-file'> <span><i class='fa fa-paperclip' aria-hidden='true'></i></span><input type='file' id='txtSanction' name='ss_name_of_bank_status_attach"+counter+"'><input type='file' id='txtSanction' name='ss_name_of_bank_status_attachname"+counter+"'></span></div></div></div><div class='form-group col-md-1'><label>Remove</label><div class='add-feild'><button type='button' id='removebank2' class='btn btn-danger addsub'>X</button></div></div></div>");

		 

    });

    

});

$(document).on('click', '#removebank2', function() {

    $(this).parent().parent().parent().remove();

});




$(document).ready(function() {

	

    $("#addteammember2").click(function() {

        $("#teammember2 ul").append("<li><div class='teamdiv'><div class='form-group col-md-11'><label>Team Member</label><input type='text' class='form-control' name='project_management_team_member[]' required></div><div class='form-group col-md-1'><label>Remove</label><div class='add-feild'><button type='button' id='removemember2' class='btn btn-danger addsub'>X</button></div></div></div></li>");

    });

    

});

$(document).on('click', '#removemember2', function() {

    $(this).parent().parent().parent().parent().remove();

});



function setorSelectCheck(nameSelect)

	{

		

		if(nameSelect){

			sectorOptionValue = document.getElementById("sectorOption").value;

			if(sectorOptionValue == nameSelect.value){

				document.getElementById("sectorDivCheck").style.display = "block";

			}

			else{

				document.getElementById("sectorDivCheck").style.display = "none";

			}

		}

		else{

			document.getElementById("sectorDivCheck").style.display = "none";

		}

}

$(document).ready(function() {
    
   $("#addotherLenders").click(function() {
        $("#otherLenders ul").append("<li><div class='dvotherLenders'><div class='form-group col-md-6'><label>Name</label><input type='text' name='name[]' class='form-control'></div><div class='form-group col-md-5'><label>% of loan out of total loan</label><input type='text' name='loan_out_total_loan[]' class='form-control'></div><div class='form-group col-md-1'><label>Remove</label><div class='add-feild'><button id='removeotherLenders' type='button' class='btn btn-danger addsub'=''>X</button></div></div></div></li>");
    });
    
});


$(document).on('click', '#removeotherLenders', function() {
    $(this).parent().parent().parent().parent().remove();
});

$('.radioChange').on('change', function() {
	 var radioVal=$('input[type="radio"][class="radioChange"]:checked').val();
	 if(radioVal=="Wind"){
		 $('.showSolartextarea').hide();
		 $('#showSolarPV').hide();
		 $('.show14abc').hide();
		 $('.show14abcbio').hide();
		 $('#showSmallHydro').hide();
		 $('#otherfeildopen').hide();
		 $('#showWind').show(); 
	}else if(radioVal=="Solar"){
		 $('#showSolarPV').hide();
		 $('.show14abc').hide();
		 $('.show14abcbio').hide();
		 $('#showSmallHydro').hide();
		 $('#otherfeildopen').hide();
		 $('#showWind').hide(); 
		 $('.showSolartextarea').show();
	}else if(radioVal=="Solar-thermal"){
		 $('.show14abc').hide();
		 $('.show14abcbio').hide();
		 $('#showSmallHydro').hide();
		 $('#otherfeildopen').hide();
		 $('#showWind').hide(); 
		 $('.showSolartextarea').hide();
		 $('#showSolarPV').show();
	}else if(radioVal=="Biomass"){
		 $('#showSmallHydro').hide();
		 $('#otherfeildopen').hide();
		 $('#showWind').hide(); 
		 $('.showSolartextarea').hide();
		 $('#showSolarPV').hide();
		  $('.show14abc').show();
		 $('.show14abcbio').show();
	}else if(radioVal=="Small hydro"){
		 $('.show14abc').hide();
		 $('.show14abcbio').hide();
		 $('#otherfeildopen').hide();
		 $('#showWind').hide(); 
		 $('.showSolartextarea').hide();
		 $('#showSolarPV').hide();
		 $('#showSmallHydro').show();
	}else if(radioVal=="Waste to energy"){
		 $('.show14abcbio').hide();
		 $('#otherfeildopen').hide();
		 $('#showWind').hide(); 
		 $('.showSolartextarea').hide();
		 $('#showSolarPV').hide();
		 $('#showSmallHydro').hide();
		 $('.show14abc').show();
	}else if(radioVal=="Others"){
		 $('.show14abc').hide();
		 $('.show14abcbio').hide();
		 $('#showWind').hide(); 
		 $('.showSolartextarea').hide();
		 $('#showSolarPV').hide();
		 $('#showSmallHydro').hide();
		 $('#otherfeildopen').show();
	}
	
});






