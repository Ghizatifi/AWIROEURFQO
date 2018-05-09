
<script type="text/javascript">




/////========================================//////////////

$('#id_annee').on('change',function(e){
	showClassInfo()
})
$('#id_programm').on('change',function(e){
	showClassInfo()
})
$('#id_matiere').on('change',function(e){
	showClassInfo()
})

$('#id_niveau').on('change',function(e){
	showClassInfo()
})

$('#id_group').on('change',function(e){
	showClassInfo()
})
$('#id_classe').on('change',function(e){
	showClassInfo()
})

/////////////////////////////////////////////////////////////////slect class///////


////////////////////////////////////





//////////////////////////============================select classPopup//////////////////

	$('#show-class-info').on('click',function(e){
	showClassInfo()

		e.preventDefault();
		$('#academic-choose').modal('show');
	})


//////////////////////////////////////////////// addAclass in table
function showClassInfo(){
	var data = $('#form-view-class').serialize();
	//console.log(data);
	$.get("{{ route('viewClasses') }}",data,function(data){
			$('#add-class-info').empty().append(data);
			$('td#hidden').addClass('hidden');
			$('th#hidden').addClass('hidden');

			MergeCommonRows($('#table-class-info'))


	})

}

/////////////////////




////////////////////////////////////////////////////call class///////////


function MergeCommonRows(table){

	var firstColumnBrakes =[];
	$.each(table.find('th'),function(i){
		var previous = null,cellToExtend =null ,rowspan = 1;
		table.find("td:nth-child("+ i +")").each(function(index ,e){
			var jthis= $(this),content = jthis.text();
			if (previous == content && content!== "" && $.inArray(index, firstColumnBrakes) === -1) {
				jthis.addClass('hidden');
				cellToExtend.attr("rowspan", (rowspan=rowspan+1));


			}
			else{
				if (i == 1) firstColumnBrakes.push(index);
				rowspan=1;
				previous = content;
				cellToExtend=jthis;


			}

		});
	});
	$('td.hidden').remove();
}
</script>
