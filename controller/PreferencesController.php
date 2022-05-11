<?php
class PreferencesController extends Controller
{
    public $model;

    public function getUserPreferences()
    {
        $this->model->getUserPreferences();
        $data = array(
            'user_actor_preferences' => $this->model->user_actor_preferences,
            'user_genre_preferences' => $this->model->user_genre_preferences,
            'user_realisator_preferences' => $this->model->user_realisator_preferences,
            'actor' => $this->model->getAll("actor"),
            'realisator' => $this->model->getAll("realisator"),
            'genre' => $this->model->getAll("genre")
        );
        $this->render('preferences', $data);
    }

    public function setUserPreferences()
    {
        // Avoir l'id de l'utilisateur et l'id de l'acteur/réalisateur/genre
        if (isset($_POST['preferences_submit'])) {
            if (!empty($_POST['realisator'])) {
                $realisator = $_POST['realisator'];
                // ajout d'une ligne datatype
                $datatype = 'realisator';
                $data = $realisator;
            }
            if (!empty($_POST['actor'])) {
                $actor = $_POST['actor'];
                $datatype = 'actor';
                $data = $actor;
            }
            if (!empty($_POST['genre'])) {
                $genre = $_POST['genre'];
                $datatype = 'genre';
                $data = $genre;
            }


            // Ajouter une ligne dans preferences_$type 
            // Empêcher d'ajouter un doublon
            // Ajouter $datatype pour tester dans la méthode du model plus tard
            $this->model->setUserPreferences($datatype, $data);
        }
    }

    public function routeManager($errors)
    {
    }
}
