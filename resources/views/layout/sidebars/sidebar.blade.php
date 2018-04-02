<aside>
      <div id="sidebar" class="nav-collapse " >
        <!-- sidebar menu start-->
        <ul class="sidebar-menu">
          <li class="active">
            <a class="" href="index.html">
                          <i class="fa fa-dashboard"></i>
                          <span>Statistique</span>
                      </a>
          </li>
          <li class="sub-menu">
            <a href="javascript:;" class="">
                          <i class="icon_document_alt"></i>
                          <span> Les Classes</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
            <ul class="sub">
              <li><a class="" href="{{ url('/gestion/cours') }}">Gestion des classes</a></li>
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
                          <span>Les Elèves</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
            <ul class="sub">
              <li><a class="" href="{{ url('/gestion/eleve') }}">Ajouter un élève</a></li>
              <li><a class="" href="{{ url('/gestion/eleve/info') }}">Chercher un élève</a></li>
            </ul>
          </li>
          <li class="sub-menu">
            <a href="javascript:;" class="">
                          <i class="fa fa-font" ></i>
                          <span>Les Matieres</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
            <ul class="sub">
              <li><a class="" href="{{ url('/matiere/getRigister') }}">Ajouter une matiere</a></li>
              <li><a class="" href="{{ url('/matiere/ListMatiere') }}">Liste des Matieres</a></li>
            </ul>
          </li>
           <li class="sub-menu">
            <a href="javascript:;" class="">
                 <i class="fa fa-money"></i>

                          <span>Frais</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
            <ul class="sub">
              <li><a class="" href="">Paiement eleve </a></li>
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
              <li><a class="" href="">Student Lists </a></li>
              <li><a class="" href="">Student Enroll </a></li>
            </ul>
          </li>



     

        

        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>