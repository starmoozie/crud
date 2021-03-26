``` bash

// ------ 
// ACCESS
// ------

// allow or deny access user untuk CRUD operation.
$this->crud->allowAccess('list');
$this->crud->allowAccess(['list', 'create', 'delete']);
$this->crud->denyAccess('list');
$this->crud->denyAccess(['list', 'create', 'delete']);

$this->crud->hasAccess('add'); // returns true/false
$this->crud->hasAccessOrFail('add'); // throws 403 error
$this->crud->hasAccessToAll(['create', 'update']); // returns true/false
$this->crud->hasAccessToAny(['create', 'update']); // returns true/false

// -------------
// EAGER LOADING
// -------------

// eager loading
$this->crud->with('relation_name');

// ------------
// CUSTOM VIEWS
// ------------

// custom view pada CRUD
$this->crud->setShowView('your-view');
$this->crud->setEditView('your-view');
$this->crud->setCreateView('your-view');
$this->crud->setListView('your-view');
$this->crud->setReorderView('your-view');
$this->crud->setDetailsRowView('your-view');

// -------------
// CONTENT CLASS
// -------------

// custom css class pada CRUD
$this->crud->setShowContentClass('col-md-12');
$this->crud->setEditContentClass('col-md-12');
$this->crud->setCreateContentClass('col-md-12');
$this->crud->setListContentClass('col-md-12');
$this->crud->setReorderContentClass('col-md-12');
$this->crud->setRevisionsContentClass('col-md-12');
$this->crud->setRevisionsTimelineContentClass('col-md-12');

// -------
// OPERATIONS
// -------

$this->crud->setOperation('list');
$this->crud->getOperation();

// -------
// ACTIONS
// -------

$this->crud->getActionMethod(); // returns method pada controller, GET, POST, PUT etc

$this->crud->getTitle('create'); // get Title pada create
$this->crud->getHeading('create'); // get Heading title pada create
$this->crud->getSubheading('create'); // get Subheading title pada create

$this->crud->setTitle('some string', 'create'); // set Title pada create
$this->crud->setHeading('some string', 'create'); // set Heading title pada create
$this->crud->setSubheading('some string', 'create'); // set Subheading title pada create

// ---------------------------
// CrudPanel Basic Information
// ---------------------------
$this->crud->setModel("App\Models\Artikel");
$this->crud->setRoute("admin/path");
// OR 
$this->crud->setRouteName("admin.path");
$this->crud->setEntityNameStrings("menu", "menu");

```