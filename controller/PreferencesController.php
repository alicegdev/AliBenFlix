<?php
class PreferencesController extends Controller
{
    public $model;

    public function getUserPreferences()
    {
        $this->model->getUserPreferences();
        $data = array(
            'user_actor_preferences' => $this->model->user_actor_preferences,
            'user_genres_preferences' => $this->model->user_genres_preferences,
            'user_director_preferences' => $this->model->user_director_preferences
        );
        $this->render('preferences', $data);
    }
    public function preferencesAction()
    {
        // 
    }

    public function routeManager($errors)
    {
    }
}
