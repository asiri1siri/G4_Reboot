<?php namespace App\Controllers;

use System\BaseController;
use App\Helpers\Session;
use App\Helpers\Url;
use App\Models\User;
use App\Models\Comment;

class Users extends BaseController
{
    protected $user;

    public function __construct()
    {
        parent::__construct();

        if (! Session::get('logged_in')) {
            Url::redirect('/admin/login');
        }

        $this->user = new User();
    }

    public function index()
    {
        $users = $this->user->get_users();

        $title = 'Users';
        return $this->view->render('admin/users/index', compact('users', 'title'));
    }

    public function add()
    {
        $errors = [];

        if (isset($_POST['submit'])) {
            $ENABLED  = (isset($_POST['ENABLED']) ? $_POST['ENABLED'] : null);
            $ID = (isset($_POST['ID']) ? $_POST['ID'] : null);
            $NAME  = (isset($_POST['NAME']) ? $_POST['NAME'] : null);
            $USERNAME = (isset($_POST['USERNAME']) ? $_POST['USERNAME'] : null);
            $USERTYPE  = (isset($_POST['USERTYPE']) ? $_POST['USERTYPE'] : null);
            $EMAIL = (isset($_POST['EMAIL']) ? $_POST['EMAIL'] : null);

            if (strlen($NAME) < 3) {
                $errors[] = 'Name is too short';
            }

            if (count($errors) == 0) {

                $data = [
                    'ENABLED' => $ENABLED,
                    'ID' => $ID,
                    'NAME' => $NAME,
                    'USERNAME' => $USERNAME,
                    'USERTYPE' => $USERTYPE,
                    'EMAIL' => $EMAIL,
                ];

                $this->user->insert($data);

                Session::set('success', 'User created');

                Url::redirect('/users');

            }

        }

        $this->view->render('admin/users/add', compact('errors'));
    }

    public function edit($ID)
    {
        if (! is_numeric($ID)) {
            Url::redirect('/users');
        }

        $user = $this->user->get_user($ID);

        if ($user == null) {
            Url::redirect('/404');
        }

        $errors = [];

        if (isset($_POST['submit'])) {
            $ENABLED  = (isset($_POST['ENABLED']) ? $_POST['ENABLED'] : null);
            $ID = (isset($_POST['ID']) ? $_POST['ID'] : null);
            $NAME  = (isset($_POST['NAME']) ? $_POST['NAME'] : null);
            $USERNAME = (isset($_POST['USERNAME']) ? $_POST['USERNAME'] : null);
            $USERTYPE  = (isset($_POST['USERTYPE']) ? $_POST['USERTYPE'] : null);
            $EMAIL = (isset($_POST['EMAIL']) ? $_POST['EMAIL'] : null);

/*
            if (strlen($NAME) < 3) {
                $errors[] = 'Name is too short';
            }
*/
            if (count($errors) == 0) {

                $data = [
                    'ENABLED' => $ENABLED,
                    'ID' => $ID,
                    'NAME' => $NAME,
                    'USERNAME' => $USERNAME,
                    'USERTYPE' => $USERTYPE,
                    'EMAIL' => $EMAIL,
                ];

                $where = ['ID' => $ID];

                $this->user->update($data, $where);

                Session::set('success', 'User updated');

                Url::redirect('/users');

            }

        }

        $title = 'Edit User';
        $this->view->render('admin/users/edit', compact('user', 'errors', 'title'));
    }
/*
    public function view($ID)
    {
        if (! is_numeric($ID)) {
            Url::redirect('/users');
        }

        $user = $this->user->get_user($ID);

        if ($user == null) {
            Url::redirect('/404');
        }

        $comment = new Comment();

        if (isset($_POST['submit'])) {
            $body  = (isset($_POST['body']) ? $_POST['body'] : null);

            if ($comment !='') {

                $data = [
                    'body' => $body,
                    'user_id' => $ID,
                    'user_id' => Session::get('user_id')
                ];

                $comment->insert($data);

                Session::set('success', 'Comment created');

                Url::redirect("/users/view/$ID");

            }

        }

        $comments = $comment->get_comments($ID);

        $title = 'View User';
        $this->view->render('admin/users/view', compact('user', 'comments', 'title'));
    }
*/
    public function delete($ID)
    {
        if (! is_numeric($ID)) {
            Url::redirect('/users');
        }

        $user = $this->user->get_user($ID);

        if ($user == null) {
            Url::redirect('/404');
        }

        $where = ['ID' => $user->ID];

        $this->user->delete($where);

        Session::set('success', 'User deleted');

        Url::redirect('/users');
    }
}
