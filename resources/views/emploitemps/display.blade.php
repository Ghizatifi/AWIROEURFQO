
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
        th {
            background-color: #0055AA;
            color: white;

        }
        table tr th {
            color: white;
        }
      </style>

      <table class="table-bordered table-hover table-condensed table-striped" id="table-class-info" style="width: 100%">
        <thead>
          <tr>
            <th>ID CLasse</th>
            <th>Jour</th>
            <th>Matiere</th>
						<th>Horaire</th>
						<th>Professeur</th>

            <th>Salle</th>

            <th id="hidden">Action</th>
            <th>
              <input type="checkbox" id="checkAll">
            </th>

          </tr>
        </thead>
        <tbody>
          @foreach($classes as $c)
          <tr>
            <td>{{$c->id_classe}}</td>
            <td>{{$c->jour}}</td>
             <td>{{$c->matiere}}</td>
						 <td>{{$c->heure}}</td>

						 <td>{{$c->nom}} {{$c->prenom}}</td>

             <td>{{$c->salle}}</td>
          <!-- <td class="caadimic">
              <a href="#" data-id="{{$c->id_classe}}" id="class-edite">

            </a>

            </td> -->
            <td class="action" id="hidden"><button value="{{$c->id_classe}}" class="btn btn-danger  del-class"> Supp </button></td>
        <td>
            <input type="checkbox" name="chk[]" id="checkbox" value="{{$c->id_classe}}" class="chk">

         </td>


            </tr>

           @endforeach


        </tbody>
      </table>
