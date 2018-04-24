<!DOCTYPE html>
<html>
<head>
	<title>Recus de paiement</title>
	<style type="text/css">
		html,body{
			padding: 0px;
			margin: 0px;
			width: 100%;
			background :#fff;
         font-family: Arial ,'Sans Serif','Time News Roman';
	     font-size: 10pt;
		}
		table{
			width: 700px;
			margin: 0 auto;
			text-align: left;
			border-collapse: collapse;
		}
		th{ padding-left: 2px;  }
		th{ padding: 2px; }
		.aeu{ text-align: right;
			padding-right: 10px;
		 	font-family: 'time news roman','Khmer Os Muol Light';
		 }
		 .line-top{
		 	border-left: 1px solid;
		 	padding-left: 10px;
		 	font-family: 'time news roman','Khmer Os Muol Light';
		 }
		 .verify{
		 	font-family: 'time news roman','Khmer Os Muol Light';
		 }
		 .imageAou{ width: 50px; height: 70px;  }
		 .th{  background-color: #ddd;
		 	border:1px solid;
		 	text-align: center;
		  }
		  #container{
		  	width: 100%;
		  	margin: 0 auto;
		  }
		  .khm-os{font-family: 'time news roman';}
		  .divide{width: 100% margin:0 auto;}
		  hr{
		  	width: 100%;
		  	margin-right: 0;
		  	margin-right: 0;
		  	padding: 0;
		  	margin-top: 35px;
		  	margin-bottom: 20px;
		  	border:0 none;
		  	background:none;
		  	border-top: 1px dashed #322f32;
		  	height:0;

		  }
		  button{
		  	margin: 0 auto;
		  	text-align: center;
		  	height: 100%;
		  	width: 100%;
		  	cursor: pointer;
		  	font-weight: bold;
				background: #abcdef;
				border-color: #abcdef

		  }
		  .lenghth-limit{max-height: 350px; min-height: 350px}
		  .div-button{
		  	width: 100%;
		  	margin-top: 0px;
		  	height: 50px;
		  	text-align: center;
		  	margin-bottom: 10px;
		  	border-bottom: 1px;
		  	background: #ccc;
		  }
		  .line-row{
		  	background-color: #fff;
		  	border:1px solid;
		  	text-align: center;
		  }
	</style>
</head>
<body>

	<div class="div-button" > <button onclick="printContent('divide')">Imprimer</button></div>
	<div id="divide">
		<?php for($i=0;$i<2;$i++){ ?>
		<div id="container">
			<div class="lenghth-limit">



  			<table>
  				<tr>
  					<td style="padding-left: 40px; width: 50px">
  						<img src="{{ asset('img/logo-big.png') }}" class="imageAou">
  					</td>
  					<td class="aeu">
 						<b style="font-weight: normal;"></b>
 						<!-- <br>
 						<b>Ecole ...</b>
  					 </td>
  					 <td class="line-top">
                <b style="font-weight: normal;"></b>
 						<br> -->
 						<b style="center">Recus de paiement</b>
  					 </td>

  				</tr>

  				<tr>
  					<td colspan="2" style="text-align: right;"> </td>
  					<td colspan="0" style="text-align: right; padding-left: 80px">
  						<b> Recus N <sup>o</sup>:{{ sprintf("%05d",$Invoice->id_reçus) }} </b>
  					</td>
  				</tr>

  				<tr>
  					<td colspan="2" style="text-align: right;"> </td>
  					<td colspan="0" style="text-align: right; padding-left: 80px">
  						<b>  Date: <sup></sup> {{ date('d-M-Y',strtotime ($Invoice->date)) }} </b>
  					</td>
  				</tr>
  			</table>
                   {{---------------------------}}


                   <table>
                   	<tr>
                   		<td style="width: 120px; padding: 5px 0px">
                   			ID etudiant : <b>{{ sprintf("%05d",$Invoice->id_eleve) }}</b>
                   		</td>

                   		<td style="width: 200px; padding: 5px 0px">
                   			Prenom : <b>{{ $Invoice->prenom}}</b>
                   		</td>
                   		<td style="width: 120px; padding: 5px 0px">
                   			Nom : <b>{{ $Invoice->nom }}</b>
                   		</td>
                   		<td>Sexe:
                   			<b>
                   				@if($Invoice->sex==0) Fille  @else Garcon @endif
                   			</b>

                   		</td>
                   	</tr>
                   </table>

                  {{---------------------------}}
                  <table>
                  	<thead>
                  		<tr>

                  		<th style="width: 70px" class="th">Frais</th>
                  		<th style="width: 70px" class="th">Mantant</th>
                  		<th style="width: 70px" class="th">Paye</th>
                  		<th style="width: 70px" class="th">Reste</th>
											<th class="th" style="text-align: left;"> Description </th>

                  	</tr>

                  	</thead>
                  	<tbody>
                  		<tr>

                  			<td class="line-row">
                  				${{ number_format($Invoice->school_fee,2) }}
                  			</td>

                  			<td class="line-row">
													${{ number_format($studentFee->montant,2) }}
                  			</td>
                  			<td class="line-row">
													${{ number_format($Invoice->paye,2) }}
                  			</td>
                  			<td class="line-row">
													${{ number_format($studentFee->montant-$totalPaid,2) }}

                  			</td>
												<td class="line-row" style="text-align: left">
													{{ $status->detail }}

												</td>
                  		</tr>
                  	</tbody>
                  </table>
                 {{---------------------------}}
</br></br>
                 <table>
                 	<tr>
                 		<td>
                 			<b class="verify">Note:</b>
                 			<p style="display: inline-block;">
                 		</br> 	Tous les paiements ne sont
										ni remboursables ni transférables.
                 			</p>
                 		</td>
                 		<td>
											<!-- {{ $Invoice->name }} -->
                 			<b style="margin-bottom: 5px"> Cashier:</b><br><br>
                 			Le: {{date('d-M-Y g:i:s A')}}
                 		</td>
                 		<td style="vertical-align: top;">
                 			Imprimer par: {{Auth::user()->name}}
                 		</td>
                 	</tr>
                 </table>

			</div>
			<br><br><br><br><br>
			{{------------------------}}
			<table>
				<tr>
					<td style="font-size: 10pt;text-align: center;">
						Coopy right 2018
					</td>
				</tr>
				<td style="font-size: 10pt ;text-align: center;" >

					Telephone :(212)0670448107  Email : ghizlan.atifi@gmail.com
				</td>
			</table>
		</div>
		@if ($i==0)
		<br>
		<hr>
		@endif
		<?php }?>
	</div>
<script type="text/javascript">
	function printContent (el){
		var restorepage = document.body.innerHTML;
		var printcontent = document.getElementById(el).innerHTML;
		document.body.innerHTML=printcontent;

		window.print();
		document.body.innerHTML=restorepage;
		window.close();
	}
</script>
</body>
</html>
