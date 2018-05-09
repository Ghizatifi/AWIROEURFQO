<aside>
      <div id="sidebar" class="nav-collapse " >
        <!-- sidebar menu start-->
        <ul class="sidebar-menu">
          <li class="active">
            <a class="" href="{{ url('/dashboard') }}">
                          <i class="fa fa-dashboard"></i>
                          <span>Statistique</span>
                      </a>
          </li>
          <li class="sub-menu">
            <a href="javascript:;" class="">
                          <i class="fa fa-align-left"></i>
                          <span> Les Classes</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
            <ul class="sub">
              <li><a class="" href="{{ url('/gestion/cours') }}">Gestion des classes</a></li>
              <li><a class="" href="{{ url('/gestion/matiere') }}">Gestion des matieres</a></li>
            </ul>
          </li>
          <li class="sub-menu">
            <a href="javascript:;" class="">
                          <i class="fa fa-users"></i>
                          <span>Les enseignants</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                        </a>
                        <ul class="sub">
                        <li><a class="" href="{{ url('/gestion/prof/add-prof') }}">Ajouter un professeur</a></li>
                        <li><a class="" href="{{ url('/gestion/prof/getProf') }}">Liste des professeurs</a></li>
                        </ul>

          </li>
          <li class="sub-menu">
            <a href="javascript:;" class="">
                          <i class="fa fa-graduation-cap" ></i>
                          <span>Les etudiants</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
            <ul class="sub">
              <li><a class="" href="{{ url('/gestion/eleve') }}">Ajouter un etudiant</a></li>
              <li><a class="" href="{{ url('/gestion/eleve/search') }}">Chercher un etudiant</a></li>
            </ul>
          </li>
          <!-- <li class="sub-menu">
            <a href="javascript:;" class="">
                          <i class="fa fa-font" ></i>
                          <span>Les Matieres</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
            <ul class="sub">
              <li><a class="" href="{{ url('/matiere/ListMatiere') }}">Ajouter une matiere</a></li>
              <li><a class="" href="{{ url('/matiere/ListMatiere') }}">Affecter les Matieres</a></li>
            </ul>
          </li> -->
          <li class="sub-menu">
            <a href="javascript:;" class="">
                          <i class="fa fa-columns" ></i>
                          <span>Emploi du temps</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
            <ul class="sub">
              <li><a class="" href="{{ url('emplois/create') }}">Creer emploi du temps</a></li>
              <li><a class="" href="{{ url('/matiere/ListMatiere') }}">Liste des emplois du temps</a></li>
            </ul>
          </li>

          <li class="sub-menu">
            <a href="javascript:;" class="">
                          <i class="fa fa-edit" ></i>
                          <span>Examens</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
            <ul class="sub">
              <li><a class="" href="{{ url('/emplois/create') }}">Programmer un examen</a></li>
              <li><a class="" href="{{ url('/matiere/ListMatiere') }}">Liste des examens</a></li>
            </ul>
          </li>
           <li class="sub-menu">
            <a href="javascript:;" class="">
                 <i class="fa fa-money"></i>

                          <span>Paiement</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
            <ul class="sub">
              <li><a class="" href="{{route('getFeePayment')}}">Paiement eleve </a></li>
              <li><a class="" href="">Rapport de frais</a></li>

            </ul>
          </li>


    <li class="sub-menu">
            <a href="javascript:;" class="">
                 <i class="icon_documents_alt"></i>

                          <span>Les rapports</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
            <ul class="sub">
              <li><a class="" href="{{route('getListEtudiant')}}">Liste des etudiants </a></li>
              <li><a class="" href="{{route('NewStudentRegister')}}">Student Enroll </a></li>
            </ul>
          </li>

          <li class="sub-menu">
                  <a href="/agenda" class="">
                       <i class="fa fa-calendar"></i>

                                <span>Calendrier</span>
                                <span class="menu-arrow arrow_carrot-right"></span>
                            </a>

                </li>

                <li class="sub-menu">
                        <a href="javascript:;" class="">
                             <i class="fa fa-envelope"></i>

                                      <span>Messagerie</span>
                                      <span class="menu-arrow arrow_carrot-right"></span>
                                  </a>
                        <ul class="sub">
                          <li><a class="" href="">Envoyer un email </a></li>
                          <li><a class="" href="{{route('NewStudentRegister')}}">Liste des emails </a></li>
                        </ul>
                      </li>
          <li class="sub-menu">
                  <a href="javascript:;" class="">
                       <i class="fa fa-cog"></i>

                                <span>Parametres</span>
                                <span class="menu-arrow arrow_carrot-right"></span>
                            </a>
                  <ul class="sub">
                    <li><a class="" href="">Liste des etudiants </a></li>
                    <li><a class="" href="{{route('NewStudentRegister')}}">Student Enroll </a></li>
                  </ul>
                </li>




        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>
