<?php namespace Backpack\PermissionManager\app\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION
use Backpack\PermissionManager\app\Http\Requests\PermissionCrudRequest as StoreRequest;
use Backpack\PermissionManager\app\Http\Requests\PermissionCrudRequest as UpdateRequest;

class PermissionCrudController extends CrudController {

	public function __construct() {
		parent::__construct();

        $this->crud->setModel("Backpack\PermissionManager\app\Models\Permission");
        $this->crud->setEntityNameStrings('permission', 'permissions');
        $this->crud->setRoute('admin/permission');
        $this->crud->setColumns(['name']);

		$this->crud->fields = [
								[
									'name' => 'name',
									'label' => 'Name',
									'type' => 'text',
								],
								[			
									'label' => "Roles",
									'type' => 'checklist',
									'name' => 'roles',
									'entity' => 'roles',
									'attribute' => 'name', 
									'model' => "Backpack\PermissionManager\app\Models\Role", 
									'pivot' => true,
								],
							];
	}

	public function store(StoreRequest $request)
	{
		return parent::storeCrud();
	}

	public function update(UpdateRequest $request)
	{
		return parent::updateCrud();
	}
}