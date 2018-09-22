<?php namespace App\Controllers;

use System\BaseController;
use App\Helpers\Session;
use App\Helpers\Url;
use App\Models\Item;

class Items extends BaseController
{
    protected $item;

    public function __construct()
    {
        parent::__construct();

        if (! Session::get('logged_in')) {
            Url::redirect('/admin/login');
        }

        $this->item = new Item();
    }

    public function index()
    {
        $items = $this->item->get_items();
        $title = 'Items';

        $this->view->render('admin/items/index', compact('items', 'title'));
    }

    public function add()
    {
        $errors = [];

        if (isset($_POST['submit'])) {
            $DELETED       = (isset($_POST['DELETED']) ? $_POST['DELETED'] : null);
            $ID            = (isset($_POST['ID']) ? $_POST['ID'] : null);
            $NAME          = (isset($_POST['NAME']) ? $_POST['NAME'] : null);
            $DESCRIPTION   = (isset($_POST['DESCRIPTION']) ? $_POST['DESCRIPTION'] : null);
            $ITEMTYPE      = (isset($_POST['ITEMTYPE']) ? $_POST['ITEMTYPE'] : null);
            $COND          = (isset($_POST['COND']) ? $_POST['COND'] : null);
            $IS_CONTAINER  = (isset($_POST['IS_CONTAINER']) ? $_POST['IS_CONTAINER'] : null);
            $PARENT_ID     = (isset($_POST['PARENT_ID']) ? $_POST['PARENT_ID'] : null);
            $ENTERED       = (isset($_POST['ENTERED']) ? $_POST['ENTERED'] : null);
            $UPDATED       = (isset($_POST['UPDATED']) ? $_POST['UPDATED'] : null);
/*      
            if (strlen($NAME) < 3) {
                $errors[] = 'NAME is too short';
            } else {
                if ($NAME == $this->item->get_item_NAME($NAME)){
                    $errors[] = 'NAME address is already in use';
                }
            }

            if (!filter_var($DESCRIPTION, FILTER_VALIDATE_DES$DESCRIPTION)) {
                $errors[] = 'Please enter a valid DES$DESCRIPTION address';
            } else {
                if ($DESCRIPTION == $this->item->get_item_DES$DESCRIPTION($DESCRIPTION)){
                    $errors[] = 'DES$DESCRIPTION address is already in use';
                }
            }

            if ($password != $password_confirm) {
                $errors[] = 'Passwords do not match';
            } elseif (strlen($password) < 3) {
                $errors[] = 'Password is too short';
            }
*/
            if (count($errors) == 0) {

                $data = [
                    'DELETED' => $DELETED,
                    'ID' => $ID,
                    'NAME' => $NAME,
                    'DESCRIPTION' => $DESCRIPTION,
                    'ITEMTYPE' => $ITEMTYPE,
                    'COND' => $COND,
                    'IS_CONTAINER' => $IS_CONTAINER,
                    'PARENT_ID' => $PARENT_ID,
                    'ENTERED' => $ENTERED,
                    'UPDATED' => $UPDATED               
                ];

                $this->item->insert($data);

                Session::set('success', 'Item created');

                Url::redirect('/items');

            }

        }

        $title = 'Add Item';
        $this->view->render('admin/items/add', compact('errors', 'title'));
    }

    public function edit($ID)
    {
        if (! is_numeric($ID)) {
            Url::redirect('/items');
        }

        $item = $this->item->get_item($ID);

        if ($item == null) {
            Url::redirect('/404');
        }

        $errors = [];

        if (isset($_POST['submit'])) {
            $DELETED       = (isset($_POST['DELETED']) ? $_POST['DELETED'] : null);
            $ID            = (isset($_POST['ID']) ? $_POST['ID'] : null);
            $NAME          = (isset($_POST['NAME']) ? $_POST['NAME'] : null);
            $DESCRIPTION   = (isset($_POST['DESCRIPTION']) ? $_POST['DESCRIPTION'] : null);
            $ITEMTYPE      = (isset($_POST['ITEMTYPE']) ? $_POST['ITEMTYPE'] : null);
            $COND          = (isset($_POST['COND']) ? $_POST['COND'] : null);
            $IS_CONTAINER  = (isset($_POST['IS_CONTAINER']) ? $_POST['IS_CONTAINER'] : null);
            $PARENT_ID     = (isset($_POST['PARENT_ID']) ? $_POST['PARENT_ID'] : null);
            $ENTERED       = (isset($_POST['ENTERED']) ? $_POST['ENTERED'] : null);
            $UPDATED       = (isset($_POST['UPDATED']) ? $_POST['UPDATED'] : null);
/*
            if (strlen($NAME) < 3) {
                $errors[] = 'NAME is too short';
            }

            if (!filter_var($DESCRIPTION, FILTER_VALIDATE_DESCRIPTION)) {
                $errors[] = 'Please enter a valid DESCRIPTION address';
            }

            if ($password != null) {
                if ($password != $password_confirm) {
                    $errors[] = 'Passwords do not match';
                } elseif (strlen($password) < 3) {
                    $errors[] = 'Password is too short';
                }
            }
*/
            if (count($errors) == 0) {

                $data = [
                    'DELETED' => $DELETED,
                    'ID' => $ID,
                    'NAME' => $NAME,
                    'DESCRIPTION' => $DESCRIPTION,
                    'ITEMTYPE' => $ITEMTYPE,
                    'COND' => $COND,
                    'IS_CONTAINER' => $IS_CONTAINER,
                    'PARENT_ID' => $PARENT_ID,
                    'ENTERED' => $ENTERED,
                    'UPDATED' => $UPDATED                       
                ];
/*
                if ($password != null) {
                    $data['password'] = password_hash($password, PASSWORD_BCRYPT);
                }
*/
                $where = ['ID' => $ID];

                $this->item->update($data, $where);

                Session::set('success', 'Item updated');

                Url::redirect('/items');

            }

        }

        $title = 'Edit Item';
        $this->view->render('admin/items/edit', compact('item', 'errors', 'title'));
    }

    public function delete($ID)
    {
        if (! is_numeric($ID)) {
            Url::redirect('/items');
        }
/*
        if (Session::get('item_id') == $ID) {
            die('You cannot delete yourself.');
        }
*/
        $item = $this->item->get_item($ID);

        if ($item == null) {
            Url::redirect('/404');
        }

        $where = ['ID' => $item->ID];

        //$this->item->delete($where);

        Session::set('success', 'Item deleted');

        Url::redirect('/items');
    }
}
