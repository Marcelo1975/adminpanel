<?php
namespace Controllers;

use \Core\Controller;
use \Models\Users;
use \Models\Categories;
use \Models\Options;

class OptionsController extends Controller {
    
    private $user;
    private $arrayInfo;
    
    public function __construct() {
        $this->user = new Users();
        
        if(!$this->user->isLogged()) {
            header("Location: ".BASE_URL."login");
            exit;
        }

        if(!$this->user->hasPermission('products_view')) {
            header("Location: ".BASE_URL);
            exit;
        }

        $this->arrayInfo = array(
            'user' => $this->user,
            'menuActive' => 'options'
        );
    }

    public function index() {
        $options = new Options();

        $this->arrayInfo['list'] = $options->getAll(true);
        $this->loadTemplate('options', $this->arrayInfo);
    }

    public function add() {
        $this->arrayInfo['errorItems'] = array();
        $options = new Options();

        if(isset($_SESSION['formError']) && count($_SESSION['formError']) > 0) {
            $this->arrayInfo['errorItems'] = $_SESSION['formError'];
            unset($_SESSION['formError']);
        }

        $this->loadTemplate('options_add', $this->arrayInfo);
    }

    public function add_action() {
        $options = new Options();
        if(!empty($_POST['name'])) {
            $name = $_POST['name'];
            $options->add($name);

            header("Location: ".BASE_URL.'options');
            exit;

        } else {
            $_SESSION['formError'] = array('name');

            header("Location: ".BASE_URL.'options/add');
            exit;
        }
    }

    public function edit($id) {
        if(!empty($id)) {
            $options = new Options();
            $this->arrayInfo['errorItems'] = array();
            $this->arrayInfo['option_item'] = $options->get($id);
            $this->arrayInfo['option_id'] = $id;

            if(isset($_SESSION['formError']) && count($_SESSION['formError']) > 0) {
                $this->arrayInfo['errorItems'] = $_SESSION['formError'];
                unset($_SESSION['formError']);
            }

            $this->loadTemplate('options_edit', $this->arrayInfo);
        } else {
            header("Location: ".BASE_URL.'options');
            exit;
        }
    }

    public function action_edit($id) {
        $options = new Options();
        if(!empty($id)) {
            if(!empty($_POST['name'])) {
                $name = $_POST['name'];

                $options->update($name, $id);

                header("Location: ".BASE_URL.'options');
                exit;

            } else {
                $_SESSION['formError'] = array('name');

                header("Location: ".BASE_URL.'options/edit/'.$id);
                exit;
            }
        } else {
            header("Location: ".BASE_URL.'options');
            exit;
        }
    }

    public function del($id) {
        if(!empty($id)) {
            $options = new Options();
            $options->del($id);
        }

        header("Location: ".BASE_URL.'options');
        exit;
    }

}