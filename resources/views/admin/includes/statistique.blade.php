<div class="row">
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
            <div class="inner">
            <h3>{{ App\Models\Section::count() }}</h3>

            <p>Les sections</p>
            </div>
            <div class="icon">
            <i class="ion ion-bag"></i>
            </div>
            <a href="{{ url('sections') }}" class="small-box-footer">Voir plus <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
            <div class="inner">
            <h3>{{ App\Models\Matiere::count() }}</h3>

            <p>Les Matiéres</p>
            </div>
            <div class="icon">
            <i class="ion ion-bag"></i>
            </div>
            <a href="{{ url('matieres') }}" class="small-box-footer">Voir plus <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
            <div class="inner">
            <h3>{{ App\Models\Formateur::count() }}</h3>

            <p>Les Formateurs</p>
            </div>
            <div class="icon">
            <i class="ion ion-bag"></i>
            </div>
            <a href="{{ url('admin/formateurs') }}" class="small-box-footer">Voir plus <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
            <div class="inner">
            <h3>{{ App\Models\Stagiaire::count() }}</h3>

            <p>Les Stagiaires</p>
            </div>
            <div class="icon">
            <i class="ion ion-bag"></i>
            </div>
            <a href="{{ url('admin/stagiares') }}" class="small-box-footer">Voir plus <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    

    
    <!-- ./col -->
</div>