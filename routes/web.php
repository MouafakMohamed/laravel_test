<?php

use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

Route::get('test', function() {
    dd(base_path());
    // Storage::disk('google')->put('test.txt', 'Hello World');
});

Route::post('test1', function() {
    request()->file('image')->store('1QJ9tpJ3KVyOgILPsG2fubMDH4-jELsaq', 'google');
});

Route::group(['middleware' => ['guest','re_staff:staff','re_prof:prof','student:student']], function() {
    Route::get('/', 'RegisterController@index');
    Auth::routes();
    Route::get('/register', 'RegisterController@register');
    Route::get('/change', 'RegisterController@PasswordChange');
    Route::post('/register', 'RegisterController@registerPost');
    Route::get('/login', 'RegisterController@index')->name('login');
    Route::get('space/login', 'RegisterController@space');
    Route::post('user/login', 'RegisterController@user_login');
    Route::post('space/login', 'RegisterController@space_login');
    Route::get('prof/login', 'RegisterController@prof');
    Route::post('prof/login', 'RegisterController@prof_login');
    Route::get('admin/password/reset', 'RegisterController@reset_password');
    Route::post('admin/password/reset', 'RegisterController@reset_password1');
    Route::get('admin/newPassword/{token}', 'RegisterController@newPassword');
    Route::post('admin/newPassword/{token}', 'RegisterController@newPassword_Post');
});

Route::group(['middleware' => 'auth'], function() {


    Route::get('/admin/recu/check/{id}', 'Check@check');

    Route::get('/admin/logout', 'RegisterController@admin_logout');
    Route::get('/admin/Dashboard', 'Admin\dashboard@index')->name('home');
    Route::get('/admin', 'Admin\dashboard@index')->name('home');

    Route::get('/admin/Backend/Cycle', 'Admin\Backend@Cycle');
    Route::post('/admin/Cycles', 'Admin\Backend@CyclePost');
    Route::post('/admin/Categorie', 'Admin\Backend@Categorie');
    Route::post('/admin/Cycles/edit', 'Admin\Backend@CycleEdit');
    Route::post('/admin/Categorie/edit', 'Admin\Backend@categorieEdit');
    Route::delete('/admin/delete/cycle/{id}', 'Admin\Backend@delete_Cycle');
    Route::delete('/admin/delete/categorie/{id}', 'Admin\Backend@delete_Categorie');

    Route::get('/admin/Backend/Salle', 'Admin\Backend@Salle');
    Route::post('/admin/Salles', 'Admin\Backend@SallePost');
    Route::post('/admin/Salles/edit', 'Admin\Backend@SalleEdit');
    Route::delete('/admin/delete/salle/{id}', 'Admin\Backend@delete_salle');

    Route::get('/admin/Backend/Matiere', 'Admin\Backend@Matiere');
    Route::post('/admin/Matieres', 'Admin\Backend@MatierePost');
    Route::post('/admin/Matieres/edit', 'Admin\Backend@MatiereEdit');
    Route::delete('/admin/delete/matiere/{id}', 'Admin\Backend@delete_Matiere');
    
    Route::get('/salam/salam/{id}', 'Admin\dashboard@salam');
    Route::get('/admin/GRH', 'Admin\User@index');
    Route::get('/admin/GRH/ajoute', 'Admin\User@create');
    Route::post('/admin/add_user', 'RegisterController@add_user');
    Route::get('/admin/GRH/profil/{id}', 'Admin\User@user_profil');
    Route::get('/admin/GRH/PRMS/{id}', 'Admin\User@user_prms');
    Route::get('/admin/prof/profil/{id}', 'Admin\User@prof_profil');
    Route::post('/admin/add_document', 'Admin\User@add_document');
    Route::post('/admin/add_prof_class', 'Admin\User@add_prof_class');
    Route::post('/admin/add_document1', 'Admin\User@add_document1');
    Route::delete('/admin/file/{id}', 'Admin\User@FileDelete');
    Route::delete('/admin/delete/student_file/{id}', 'Admin\User@Delete_student_file');
    Route::delete('/admin/delete/user/{id}', 'Admin\User@delete_grh');
    Route::delete('/admin/delete/prof/{id}', 'Admin\User@delete_prof');
    Route::post('/admin/update_staff', 'Admin\User@update_staff');
    Route::post('/admin/update_staff1', 'Admin\User@update_staff1');
    Route::post('/admin/update_staff2', 'Admin\User@update_staff2');
    Route::post('/admin/update_staff3', 'Admin\User@update_staff3');
    Route::post('/admin/update_prof', 'Admin\User@update_prof');
    Route::post('/admin/update_prof1', 'Admin\User@update_prof1');
    Route::post('/admin/update_prof2', 'Admin\User@update_prof2');
    Route::post('/admin/update_prof3', 'Admin\User@update_prof3');
    Route::get('/admin/profil/{id}', 'Admin\User@profil');
    Route::post('/admin/update_profil', 'Admin\User@update_profil');
    
    
    Route::delete('/admin/delete/prof_class/{id}', 'Admin\User@delete_prof_class');


    
    Route::get('/admin/Class', 'Admin\Departement@Class');
    Route::get('/admin/class_profil/{id}', 'Admin\Departement@ClassProfil');
    Route::post('/admin/Class', 'Admin\Departement@ClassPost');
    Route::post('/admin/Class/edit', 'Admin\Departement@ClassEdit');
    Route::post('/admin/Class/profil/edit', 'Admin\Departement@ClassProfilEdit');
    Route::delete('/admin/delete/Class/{id}', 'Admin\Departement@delete_Class');
    
    Route::get('/admin/Transport', 'Admin\Departement@Transport');
    Route::post('/admin/Transport', 'Admin\Departement@TransportPost');
    Route::post('/admin/Transport/edit', 'Admin\Departement@TransportEdit');
    Route::delete('/admin/delete/transport/{id}', 'Admin\Departement@delete_Transport');
    
    Route::get('/admin/Transport/profil/{id}', 'Admin\Departement@Transport_profil');
    Route::post('/admin/Transport/profil', 'Admin\Departement@Transport_profil_post');
    Route::post('/admin/Transport/profil/edit/{id}', 'Admin\Departement@Transport_profil_edit');
    Route::delete('/admin/Transport/profil/delete/{id}', 'Admin\Departement@Transport_profil_delete');
    
    Route::get('/admin/Horaire', 'Admin\Departement@Horaire');
    Route::post('/admin/Horaire', 'Admin\Departement@Emploi');
    Route::get('/admin/Horaire/{id}', 'Admin\Departement@HoraireGet');
    Route::post('/admin/Horaire/edit', 'Admin\Departement@HoraireeEdit');
    Route::delete('/admin/delete/Horaire/{id}', 'Admin\Departement@delete_Horaire');

    Route::get('/admin/base_donne_eleve', 'Admin\Departement@base_donne_eleve');
    Route::get('/admin/base_donne_grh', 'Admin\Departement@base_donne_grh');
    
    Route::get('/admin/Etudiant/Id_card/{id}', 'Admin\StudentController@student_id_card');
    Route::get('/admin/id_cart', 'Admin\StudentController@students_carts');

    Route::post('/admin/exams', 'Admin\StudentController@exams');
    Route::post('/admin/Absence', 'Admin\StudentController@Absence');


    Route::get('/admin/Exam/prochaine', 'Admin\Departement@Exam_prochaine');

    Route::get('/admin/Etudiant', 'Admin\StudentController@student');
    Route::post('/admin/add_student', 'Admin\StudentController@studentPost');
    Route::get('/admin/Etudiants', 'Admin\StudentController@allstudent');
    Route::post('/admin/Etudiants', 'Admin\StudentController@studentPost');
    Route::get('/admin/Ancien_eleve', 'Admin\StudentController@Ancien_eleve');
    Route::get('/admin/reinscription/{id}', 'Admin\StudentController@reinscription');
    Route::delete('/admin/delete/Etudiant/{id}', 'Admin\StudentController@delete_Student');
    Route::get('/admin/eleve/profil/{id}', 'Admin\StudentController@student_profil');
    Route::post('/admin/update_student', 'Admin\StudentController@update_student');
    Route::post('/admin/reinscription', 'Admin\StudentController@reinscriptionPost');
    Route::post('/admin/add_student_file/', 'Admin\StudentController@add_file');
    Route::post('/admin/add_student_parent/', 'Admin\StudentController@add_student_parent');
    Route::post('/admin/add_student_prix/', 'Admin\StudentController@add_student_prix');
    Route::post('/admin/add_student_frai_multiple/', 'Admin\StudentController@add_student_frai_multiple');
    Route::post('/admin/add_timeline/', 'Admin\StudentController@add_timeline');
    Route::get('/admin/download/timeline_file/{id}', 'Admin\StudentController@Download_timeline_file');
    Route::get('/admin/download/visiter/image/{id}', 'Admin\StudentController@Download_visiter_file');
    Route::get('/admin/Parent/{id}', 'Admin\StudentController@Parent');
    Route::post('/admin/Parent', 'Admin\StudentController@ParentPost');
    Route::get('/admin/Parents', 'Admin\StudentController@Parents');
    Route::delete('/admin/delete/parent/{id}', 'Admin\StudentController@delete_Parents');
    Route::get('/admin/parent/profil/{id}', 'Admin\StudentController@ParentsGet');
    Route::post('/admin/parent/profil/edit/{id}', 'Admin\StudentController@ParentsEdit');
    Route::post('/admin/parent/student/edit/{id}', 'Admin\StudentController@ParentsEdit1');
    Route::get('/admin/Devoires/', 'Admin\StudentController@Devoires');
    Route::post('/admin/Devoires/', 'Admin\StudentController@DevoiresPost');
    Route::post('/admin/deviore/edit', 'Admin\StudentController@DevoiresEdit');
    Route::post('/admin/update_tuteur', 'Admin\StudentController@update_tuteur');
    Route::delete('/admin/delete/devoire/{id}', 'Admin\StudentController@delete_devoire');
    Route::delete('/admin/delete/friend/{id}/{id1}', 'Admin\StudentController@delete_friend');
    Route::post('/admin/add_friend', 'Admin\StudentController@add_friend');
    Route::post('/admin/add_student_image', 'Admin\StudentController@add_student_image');
    Route::get('/admin/Frais', 'Admin\StudentController@Frais');
    Route::get('/admin/certificate', 'Admin\StudentController@certificate');
    Route::post('/admin/certificate', 'Admin\StudentController@certificatePost');

    Route::get('/admin/biblio', 'Admin\App@Biblio');
    Route::post('/admin/biblio', 'Admin\App@BiblioPost');
    Route::delete('/admin/delete/biblio/{id}', 'Admin\App@delete_book');

    Route::get('/admin/cours', 'Admin\App@cours');
    Route::post('/admin/cours', 'Admin\App@cours1');
    Route::post('/admin/cours1', 'Admin\App@coursPost');
    Route::post('/admin/cours/edit/{id}', 'Admin\App@coursEdit');
    Route::delete('/admin/delete/cour/{id}', 'Admin\App@delete_cour');

    Route::get('/admin/recu/{id}', 'Admin\App@recu');


    Route::get('/admin/visites', 'Admin\App@visites');
    Route::post('/admin/visites', 'Admin\App@visites_ajoute');
    Route::delete('/admin/delete/visite/{id}', 'Admin\App@delete_visite');

    Route::get('/admin/contact', 'Admin\App@contact');
    Route::post('/admin/contact', 'Admin\App@contact_ajoute');
    Route::post('/admin/contact/edit', 'Admin\App@contact_edit');
    Route::delete('/admin/delete/contact/{id}', 'Admin\App@delete_contact');

    Route::get('/admin/club', 'Admin\App@club');
    Route::get('/admin/club_profil/{id}', 'Admin\App@club_profil');
    Route::post('/admin/club', 'Admin\App@clubPost');
    Route::post('/admin/club/edit', 'Admin\App@clubEdit');
    Route::delete('/admin/delete/club/{id}', 'Admin\App@delete_club');
    Route::delete('/admin/delete/club_student/{id}', 'Admin\App@delete_club_student');
    Route::get('/admin/club/update/{id}', 'Admin\App@clubupdate');
    
    Route::get('admin/stock_produit', 'Admin\Product@stock_produit');
    Route::post('admin/stock_produit/ajouter', 'Admin\Product@stock_produit_ajoute');
    Route::post('admin/stock_produit/ajoute_encien', 'Admin\Product@stock_produit_ajoute_encien');
    Route::post('admin/stock_produit/update', 'Admin\Product@stock_produit_update');
    Route::delete('admin/delete/pro/{id}', 'Admin\Product@delete_pro');

    Route::get('admin/liste', 'Admin\Product@liste');
    Route::get('admin/stock_commande', 'Admin\Product@stock_commande');
    Route::post('admin/stock_commande/ajouter', 'Admin\Product@stock_commande_ajoute');
    
    Route::get('admin/salaire', 'Admin\Comptabilite@salaire');
    Route::get('admin/paiement/', 'Admin\Comptabilite@paiement');
    Route::get('admin/charges/', 'Admin\Comptabilite@charges');
    Route::post('admin/charge/ajouter', 'Admin\Comptabilite@charge_ajoute');
    Route::post('admin/charge/Ajoute1', 'Admin\Comptabilite@charge_ajoute1');
    Route::post('admin/charge_a/ajouter', 'Admin\Comptabilite@charge_a_ajoute');
    Route::post('admin/charge/modifier', 'Admin\Comptabilite@charge_modifier');
    Route::post('admin/charge/modifier1', 'Admin\Comptabilite@charge_modifier1');
    Route::delete('/admin/delete/charge/{id}', 'Admin\Comptabilite@delete_charge');
    Route::delete('/admin/delete/charge1/{id}', 'Admin\Comptabilite@delete_charge1');
    Route::get('admin/statistique', 'Admin\Comptabilite@statistique');
    Route::get('admin/tracabilite/{id}', 'Admin\Comptabilite@tracabilite');
    Route::get('admin/update', 'Admin\Comptabilite@update1');
    
    Route::post('/admin/ajax_get_cycle_by_categorie', 'Admin\dashboard@ajax_get_cycle_by_categorie');
    Route::post('/admin/ajax_get_class_by_categorie', 'Admin\dashboard@ajax_get_class_by_categorie');
    Route::post('/admin/ajax_get_class_by_cycle', 'Admin\dashboard@ajax_get_class_by_cycle');
    Route::post('/admin/ajax_get_student_by_class', 'Admin\dashboard@ajax_get_student_by_class');
    Route::post('/admin/ajax_get_student_by_class1', 'Admin\dashboard@ajax_get_student_by_class1');
    Route::post('/admin/ajax_get_student_by_class_friend', 'Admin\dashboard@ajax_get_student_by_class_friend');
    Route::post('/admin/ajax_get_matiere_by_categorie', 'Admin\dashboard@ajax_get_matiere_by_categorie');
    Route::post('/admin/ajax_get_trajet_by_transport', 'Admin\dashboard@ajax_get_trajet_by_transport');
    Route::post('/admin/ajax_get_student_by_phone', 'Admin\dashboard@ajax_get_student_by_phone');
    Route::post('/admin/ajax_get_student_by_cin', 'Admin\dashboard@ajax_get_student_by_cin');
    Route::post('/admin/ajax_get_student_by_massar', 'Admin\dashboard@ajax_get_student_by_massar');
    Route::post('/admin/ajax_get_student_by_massar1', 'Admin\dashboard@ajax_get_student_by_massar1');
    Route::post('/admin/ajax_get_Paiements', 'Admin\dashboard@ajax_get_Paiements');
    Route::post('/admin/ajax_get_grh_by_fonction', 'Admin\dashboard@ajax_get_grh_by_fonction');
    Route::post('/admin/ajax_add_salaire1', 'Admin\dashboard@ajax_add_salaire1');
    Route::post('/admin/ajax_add_salaire2', 'Admin\dashboard@ajax_add_salaire2');
    Route::post('/admin/ajax_get_statistiques', 'Admin\dashboard@ajax_get_statistiques');
    Route::post('/admin/ajax_update', 'Admin\dashboard@ajax_update');
    Route::post('/admin/ajax_update_prms', 'Admin\dashboard@ajax_update_prms');
    Route::post('/admin/ajax_update_block_user', 'Admin\dashboard@ajax_update_block_user');
    Route::post('/admin/ajax_update_block_prof', 'Admin\dashboard@ajax_update_block_prof');
    Route::post('/admin/ajax_update_prix_student', 'Admin\dashboard@ajax_update_prix_student');
    
    Route::get('/admin/download/{id}', 'Admin\User@getDownload');
    Route::get('/admin/download/student_file/{id}', 'Admin\User@Download_student_file');
    Route::get('/admin/download/devoire/file/{id}', 'Admin\User@Download_devoire_file');
    Route::get('/admin/download/charge/file/{id}', 'Admin\User@Download_charge_file');
    Route::get('/admin/download/book/{id}', 'Admin\App@Download_book');
});

Route::group(['middleware' => ['auth_staff:staff']], function() {

    Route::group(['middleware' => ['User_Block:'.url('user/Logout').',staff']], function() {

        Route::get('/user/Dashboard', 'staff\dashboard@index');
        Route::get('/user/Class', 'staff\dashboard@class');
    
        Route::get('/user/Class1', 'staff\dashboard@class1');
    });



    
    Route::get('/user/Logout', 'RegisterController@user_logout');
});

Route::group(['middleware' => ['auth_prof:prof']], function() {
    Route::group(['middleware' => ['User_Block:'.url('prof/Logout').',prof']], function() {
        Route::get('/prof/Dashboard', 'Prof\Dashboard@index');

        Route::get('/prof/Absences/', 'Prof\Devoires@Absences');
        Route::get('/prof/Absences/{id}', 'Prof\Devoires@Absences1');

        Route::get('/prof/Devoires/', 'Prof\Devoires@Devoires');
        Route::post('/prof/Devoires/', 'Prof\Devoires@DevoiresPost');
        Route::post('/prof/deviore/edit', 'Prof\Devoires@DevoiresEdit');
        Route::delete('/prof/delete/devoire/{id}', 'Prof\Devoires@delete_devoire');

        Route::get('/prof/class_profil/{id}', 'Prof\Students@ClassProfil');
        Route::get('/prof/eleve/profil/{id}', 'Prof\Students@student_profil');
        Route::post('/prof/Class/profil/edit', 'Prof\Students@ClassProfilEdit');
        Route::post('/prof/add_timeline/', 'Prof\Students@add_timeline');

        Route::get('/prof/Examen/Ajoute', 'Prof\Students@Examen');
        Route::post('/prof/Examen/', 'Prof\Students@ExamenPost');
        Route::post('/prof/Examen/edit', 'Prof\Students@ExamenEdit');
        Route::delete('/prof/delete/exam/{id}', 'Prof\Students@delete_exam');

        Route::get('/prof/Examen/Note', 'Prof\Students@Note');
        Route::post('/prof/Examen/Note', 'Prof\Students@NotePost');
        Route::delete('/prof/delete/note/{id}', 'Prof\Students@delete_note');
        Route::get('/prof/clubs', 'Prof\Students@clubs');
        Route::get('/prof/club/profil/{id}', 'Prof\Students@clubProfil');
        Route::get('/prof/club/update/{id}', 'Admin\App@clubupdate');
        Route::delete('/prof/delete/club_student/{id}', 'Admin\App@delete_club_student');
        Route::delete('/prof/delete/annonce/{id}', 'Prof\Students@delete_annonce');
        Route::post('/prof/annonce', 'Prof\Students@annonce');
        

        
        Route::get('/prof/profil', 'Prof\Students@profil');
        Route::get('/prof/securité', 'Prof\Students@securité');
        Route::post('/prof/update_profil', 'Prof\Students@update_profil');

        Route::post('/prof/ajax_get_cycle_by_categorie', 'Prof\dashboard@ajax_get_cycle_by_categorie');
        Route::post('/prof/ajax_get_class_by_categorie', 'Prof\dashboard@ajax_get_class_by_categorie');
        Route::post('/prof/ajax_get_class_by_cycle', 'Prof\dashboard@ajax_get_class_by_cycle');
        Route::post('/prof/ajax_get_student_by_class', 'Prof\dashboard@ajax_get_student_by_class');
        Route::post('/prof/ajax_get_student_by_class1', 'Prof\dashboard@ajax_get_student_by_class1');
        Route::post('/prof/ajax_get_student_by_class_friend', 'Prof\dashboard@ajax_get_student_by_class_friend');
        Route::post('/prof/ajax_get_matiere_by_categorie', 'Prof\dashboard@ajax_get_matiere_by_categorie');
        Route::post('/prof/ajax_get_trajet_by_transport', 'Prof\dashboard@ajax_get_trajet_by_transport');
        Route::post('/prof/ajax_get_student_by_phone', 'Prof\dashboard@ajax_get_student_by_phone');
        Route::post('/prof/ajax_get_grh_by_fonction', 'Prof\dashboard@ajax_get_grh_by_fonction');
        Route::post('/prof/ajax_add_salaire1', 'Prof\dashboard@ajax_add_salaire1');
        Route::post('/prof/ajax_add_salaire2', 'Prof\dashboard@ajax_add_salaire2');
        Route::post('/prof/ajax_add_absence', 'Prof\dashboard@ajax_add_absence');
        Route::post('/prof/ajax_get_class_by_exam', 'Prof\dashboard@ajax_get_class_by_exam');
        Route::post('/prof/ajax_get_student_by_exam', 'Prof\dashboard@ajax_get_student_by_exam');
        Route::post('/prof/ajax_get_add_student_note', 'Prof\dashboard@ajax_get_add_student_note');
        Route::get('/prof/download/timeline_file/{id}', 'Admin\StudentController@Download_timeline_file');

        Route::post('/prof/update_prof1', 'Admin\User@update_prof1');
        Route::post('/prof/update_prof2', 'Admin\User@update_prof2');
        Route::post('/prof/update_prof3', 'Admin\User@update_prof3');
        Route::post('/prof/update_prof', 'Admin\User@update_prof');
        Route::post('/prof/add_document1', 'Admin\User@add_document1');
        Route::delete('/prof/file/{id}', 'Admin\User@FileDelete');

        
        Route::get('/prof/download/{id}', 'Admin\User@getDownload');
        Route::get('/prof/download/student_file/{id}', 'Admin\User@Download_student_file');
        Route::get('/prof/download/devoire/file/{id}', 'Admin\User@Download_devoire_file');
        Route::get('/prof/download/exam/file/{id}', 'Admin\User@Download_exam_file');
        Route::get('/prof/download/book/{id}', 'Admin\App@Download_book');

    });

    Route::get('/prof/Logout', 'RegisterController@prof_logout');

});

Route::group(['middleware' => ['auth_Student:student']], function() {

    Route::get('/Student/Dashboard', 'Space\Student@index');
    Route::get('/Student/Profs', 'Space\Student@Profs');
    Route::get('/Student/photos', 'Space\Student@photos');
    Route::get('/Student/devoires', 'Space\Student@devoires');
    Route::get('/Student/Horaire', 'Space\Student@Horaire');
    Route::get('/Student/Cours', 'Space\Student@Cours');
    Route::get('/Student/Idee', 'Space\Student@Idee');
    Route::post('/Student/Idee', 'Space\Student@get_idee');
    Route::get('/Student/download/devoire/file/{id}', 'Admin\User@Download_devoire_file');

    Route::get('/Student/logout', 'RegisterController@student_logout');

});

Route::group(['middleware' => 'auth_parent:parent'], function () {

    Route::get('/Parent/Home', 'Parent\Parents@index');

    Route::get('/Parent/Dashboard', 'Parent\Parents@Dashboard');
    Route::post('/Parent/Dashboard', 'Parent\Parents@Dashboard_post');


    Route::get('/Parent/Professeurs', 'Parent\Parents@Professeurs');
    Route::get('/Parent/devoirs', 'Parent\Parents@devoirs');
    Route::get('/Parent/gallery', 'Parent\Parents@gallery');
    Route::get('/Parent/Horaire', 'Parent\Parents@Horaire');
    Route::get('/Parent/Transport', 'Parent\Parents@Transport');
    Route::get('/Parent/Timeline', 'Parent\Parents@Timeline');
    Route::post('/Parent/add_timeline', 'Parent\Parents@add_timeline');
    Route::get('/Parent/Frai', 'Parent\Parents@Frai');
    Route::get('/Parent/download/timeline_file/{id}', 'Parent\Parents@Download_timeline_file');



    Route::get('/Parent/logout', 'Parent\Parents@logout');

});

