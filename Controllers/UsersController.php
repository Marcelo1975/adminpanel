<?php
namespace Controllers;

use \Core\Controller;
use \Models\Users;
use \Models\Categories;
use \Models\Brands;
use \Models\Permissions;

class UsersController extends Controller {
    
    private $user;
    private $arrayInfo;
    
    public function __construct() {
        $this->user = new Users();
        
        if(!$this->user->isLogged()) {
            header("Location: ".BASE_URL."login");
            exit;
        }

        if(!$this->user->hasPermission('users_view')) {
            header("Location: ".BASE_URL);
            exit;
        }

        $this->arrayInfo = array(
            'user' => $this->user,
            'menuActive' => 'users'
        );
    }

    public function index() {
        $users = new Users();
        $permissions = new Permissions();
        //FILTRO
        $this->arrayInfo['filter'] = array('name'=>'', 'permission'=>'');

        if(!empty($_GET['name'])) {
            $this->arrayInfo['filter']['name'] = $_GET['name'];
        }
        if(!empty($_GET['permission'])) {
            $this->arrayInfo['filter']['permission'] = $_GET['permission'];
        }
        //PAGINAÇÃO
        $this->arrayInfo['pag'] = array('currentpage'=>0, 'total'=>0, 'per_page'=>3);
        if(!empty($_GET['p'])) {
            $this->arrayInfo['pag']['currentpage'] = intval($_GET['p'] - 1);
        }        

        $this->arrayInfo['permission_list'] = $permissions->getAllGroups();
        $this->arrayInfo['list'] = $users->getAll($this->arrayInfo['filter'], $this->arrayInfo['pag']);
        $this->arrayInfo['pag']['total'] = $users->getTotal($this->arrayInfo['filter']);

        $this->loadTemplate('users', $this->arrayInfo);
    }
    /*
    public function add() {
        $this->arrayInfo['errorItems'] = array();
        $b = new Brands();

        $this->arrayInfo['brands_items'] = $b->getAll();

        if(isset($_SESSION['formError']) && count($_SESSION['formError']) > 0) {
            $this->arrayInfo['errorItems'] = $_SESSION['formError'];
            unset($_SESSION['formError']);
        }

        $this->loadTemplate('brand_add', $this->arrayInfo);
    }

    public function add_action() {
        $b = new Brands();
        if(!empty($_POST['name'])) {
            $name = $_POST['name'];
            $id = $b->addBrands($name);

            header("Location: ".BASE_URL.'brands');
            exit;

        } else {
            $_SESSION['formError'] = array('name');

            header("Location: ".BASE_URL.'brands/add');
            exit;
        }
    }

    public function items_edit($id) {
        if(!empty($id)) {
            $b = new Brands();
            $this->arrayInfo['errorItems'] = array();
            $this->arrayInfo['brand_item'] = $b->getItem($id);
            $this->arrayInfo['brand_id'] = $id;

            if(isset($_SESSION['formError']) && count($_SESSION['formError']) > 0) {
                $this->arrayInfo['errorItems'] = $_SESSION['formError'];
                unset($_SESSION['formError']);
            }

            $this->loadTemplate('items_brand_edit', $this->arrayInfo);
        } else {
            header("Location: ".BASE_URL.'brands');
            exit;
        }
    }

    public function items_brand_edit_action($id) {
        if(!empty($id)) {
            $b = new Brands();
            if(!empty($_POST['name'])) {
                $name = $_POST['name'];

                $b->editBrand($id, $name);

                header("Location: ".BASE_URL.'brands');
                exit;

            } else {
                $_SESSION['formError'] = array('name');

                header("Location: ".BASE_URL.'brands/items_edit/'.$id);
                exit;
            }
        } else {
            header("Location: ".BASE_URL.'brands');
            exit;
        }
    }

    public function items_del($id_item) {
        $b = new Brands();

        $b->delBrandItem($id_item);

        header("Location: ".BASE_URL.'brands');
        exit;
    }
*/
}