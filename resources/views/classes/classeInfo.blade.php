
              <style type="text/css">
              	.caadimic{
              		white-space: normal;
              		width:450px;
              	}
              	.action{
              		text-align: center;
              		vertical-align: middle;
              		width:60px;

              	}
              </style>

              <table class="table-bordered table-hover table-condensed table-striped" id="table-class-info" style="width: 100%">
                <thead>
                  <tr>
                    <th>Annee Scolaire</th>
                    <th>Programme</th>
                      <th>Niveau</th>
                      <th>Groupe</th>
                        <th>Details</th>
                    <th id="hidden">Action</th>


                  </tr>
                </thead>
                <tbody>
                	@foreach($classes as $c)
                  <tr>
                      <td>{{$c->annee}}</td>
                    <td>{{$c->nom}}</td>
                      <td>{{$c->niveau}}</td>
                     <td>{{$c->groupe}}</td>


                    <td class="caadimic">
                    	<a href="#" data-id="{{$c->id_classe}}" id="class-edite">
                    		Programme:{{$c->programe}} / Niveau: {{$c->niveau}} / Groupe:{{$c->groupe}}


                    </a>

                    </td>
                    <td class="action" id="hidden"><button value="{{$c->id_classe}}" class="btn btn-danger  del-class"> Supprimer </button></td>



                    </tr>

                   @endforeach


                </tbody>
              </table>
