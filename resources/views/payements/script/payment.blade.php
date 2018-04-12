<script type="text/javascript">

	var n =$('#disabled').val();
	$('.create-fee').on('click',function(e) {$('#createFeeOpup').modal('show')});

	//=======================  creer Frais ==///////////////////////


	$('#formFee').on('submit',function(e) {
		e.preventDefault();
		enableFormatElemrnt(this);
		var data =$(this).serialize();
		var url =$(this).attr('action');
		$.post(url,data,function(data){
			location.reload();
		})

	})
	function enableFormatElemrnt(frmName){
		$.each($(frmName).find('input,select'),function(i,element){
			$(element).attr('disabled',false).css({'background':'#fff','border':'1px solid #ccc'});
		})
	}

	/////===============================///////
	$('.btn-paid').on('click',function(e){
		e.preventDefault();
		id_frais_etudiant=$(this).data('id-paid');
		balance = $(this).val();

		$.get("{{ route('pay') }}",{id_frais_etudiant:id_frais_etudiant},function(data){
			$('#Paid').attr('id','Pay');
			$('#id_frais_etudiant').val(data.id_frais_etudiant);
			//$('#program_id').val(data.program_id);
			//$('#level_Id').val(data.level_id);
			$('#id_eleve').val(data.level_id);
			$('#Fee').val(data.school_fee);
			$('#id_frais').val(data.fee_id);
			$('#Paid').val(data.student_amount);
			// $('#Discount').val(data.discount);
			$('#Pay').val(balance);
			$('#Pay').focus();
			$('#Pay').select();
			$('#b').val(balance);
			addItme(data);
			showLevelStudent(data);

			})
		})



	////////////////////////////
	function addItme(data)
	{
		$('#id_programm').empty().append($("<option/>",{
			value :data.program_id,
			text  :data.program
		}))
		$('#id_niveau').empty().append($("<option/>",{
			value :data.level_id,
			text  :data.level
		}))
	}

/////////////////////////////////////
function showLevelStudent(data)
{
	$.get("",{id_niveau:data.id_niveau,id_eleve:data.id_eleve},function(data){
		$('.acadeaicDetails').text(data.detail)
	})
}

	////////////////////////////////////////////
	$('.btn-reset').on('click',function(e){
		e.preventDefault();
		var caption = $(this).val();
		if (caption == "Reset") {
			$(this).val('Cancel');
			$('#btn-go').val('Save');
			$('#Pay').attr('id','Paid');
			$('#formPayment').attr('action',"{{route('savePayment')}}");
			enableFormatElemrnt('#formPayment');
			return ;


		}
		loction.relod();
	})

	///====================///
	function disabled_input()
	{
		$.each($('body').find('.d'),function(i,item){
			$(item).attr('disabled',true).css({'background':'#f5f5f5','border':'1px solid #ccc'});
			$(item).attr('readonly',false);
		})
	}
	$(document).ready(function(){
		if(n==0)
		{
			disabled_input();
		}
	});
</script>
